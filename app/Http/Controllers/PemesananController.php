<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemesananRequest;
use App\Models\Lapangan;
use App\Models\Pemesanan;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public $sources = [
        [
            'model'      => Pemesanan::class,
            'date_field' => 'waktu_mulai',
            'date_field_to' => 'waktu_akhir',
            'field'      => 'user_id',
            'nama_lapangan' => 'lapangan_id',
        ],
    ];

    public function index(Request $request)
    {
       
        $pemesanan = [];
        $lapanganList = Lapangan::all();

        foreach ($this->sources as $source) {
            $models = $source['model']::where('status', 'Sukses')->get();

            foreach ($models as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);
                $crudFieldValueTo = $model->getOriginal($source['date_field_to']);
                $lapangan = Lapangan::findOrFail($model->getOriginal($source['nama_lapangan']));
                $userName = $model->getOriginal('nama');

                if (!$crudFieldValue && $crudFieldValueTo) {
                    continue;
                }

                $pemesanan[] = [
                    'title' =>  "$lapangan->nama_lapangan\n".  $userName,
                    'start' => $crudFieldValue,
                    'end' => $crudFieldValueTo,
                ];
            }
        }

        return view('user.pemesanan.index', compact('lapanganList', 'pemesanan'));
    }

    public function pemesanan(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Anda harus login untuk melakukan reservasi.');
        }
        $lapangan = Lapangan::all();
        $nama_lapangan = $request->get('nama_lapangan');

        return view('user.pemesanan.create', compact('lapangan', 'nama_lapangan'));
    }

   public function store(PemesananRequest $request)
{

    $lapangan = Lapangan::findOrFail($request->lapangan_id);

    // Periksa apakah ada reservasi yang bertabrakan
    $existingBooking = Pemesanan::where('lapangan_id', $request->lapangan_id)
        ->where(function ($query) use ($request) {
            $query->where('waktu_mulai', '<', $request->waktu_akhir)
                  ->where('waktu_akhir', '>', $request->waktu_mulai);
        })->first();

    if ($existingBooking) {
        toastr()->error('Waktu yang pilih sudah dipesan, silahkan pilih waktu lain!');
        return redirect()->back()->with('error', 'Waktu yang dipilih sudah dipesan. Silakan pilih waktu lain.');
    }

    $waktu_mulai = new DateTime($request->waktu_mulai);
    $waktu_akhir = new DateTime($request->waktu_akhir);

    $selisih_waktu = $waktu_mulai->diff($waktu_akhir);
    $jam_penyewaan = $selisih_waktu->h + ($selisih_waktu->i / 60);

    $total_harga = $lapangan->harga * $jam_penyewaan;

    $pemesanan = Pemesanan::create($request->validated() + [
        'user_id' => auth()->id(),
        'total_harga' => $total_harga,
        'tgl_pemesanan' => now(),
        'status' => !isset($request->status) ? "Menunggu Verifikasi" : $request->status
    ]);

    return redirect()->route('pemesanan.success', ['id' => $pemesanan->id, 'total_harga' => $total_harga])
        ->with([
            'message' => 'Reservasi anda berhasil, Silahkan upload bukti pembayaran!',
            'alert-type' => 'success'
        ]);
}


    public function success(Request $request, $id)
    {
        $pemesanans = Pemesanan::where('id', $id)->get();
        $total_harga = $request->get('total_harga');

        return view('user.pemesanan.success', compact('pemesanans', 'total_harga'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Lapangan;

class OwnerController extends Controller
{
    public function index(Request $request)
    {
        $query = Pemesanan::where('status', 'sukses');

        if ($request->has('month') && $request->month != '') {
            $query->whereMonth('tgl_pemesanan', $request->month);
        }

        if ($request->has('year') && $request->year != '') {
            $query->whereYear('tgl_pemesanan', $request->year);
        }

        $pemesanan = $query->get();
        $total_income = $query->sum('total_harga');

        return view('owner.dashboard', compact('pemesanan', 'total_income'));
    }

    public function nota($id)
    {
        $lapangan = Lapangan::all();
        $pemesanan = Pemesanan::find($id);
        return view('admin.pemesanan.nota', compact(['pemesanan', 'lapangan']));
    }
}

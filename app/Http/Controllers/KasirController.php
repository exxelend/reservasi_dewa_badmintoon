<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Carbon\Carbon;

class KasirController extends Controller
{
    public function index(Request $request)
    {
        $query = Pemesanan::where('status', 'sukses');

        // Filter berdasarkan bulan dan tahun
        if ($request->filled('month')) {
            $query->whereMonth('tgl_pemesanan', $request->month);
        }
        if ($request->filled('year')) {
            $query->whereYear('tgl_pemesanan', $request->year);
        }

        $pemesanan = $query->get();

        // Hitung total pendapatan
        $total_income = $query->sum('total_harga');

        return view('kasir.dashboard', compact('pemesanan', 'total_income'));
    }
}


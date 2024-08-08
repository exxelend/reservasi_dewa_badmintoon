<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Lapangan;
use App\Models\User;

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

        // Query for total users and total reservations
        $totalUsers = User::count();
        $totalPemesanan = Pemesanan::count();

        return view('owner.dashboard', compact('pemesanan', 'total_income', 'totalUsers', 'totalPemesanan'));
    }

    public function nota($id)
    {
        $lapangan = Lapangan::all();
        $pemesanan = Pemesanan::find($id);
        return view('admin.pemesanan.nota', compact(['pemesanan', 'lapangan']));
    }
}


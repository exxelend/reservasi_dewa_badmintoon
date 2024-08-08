<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Models\Member;
use App\Models\Pelatih;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMember = Member::count();
        $totalKursus = Kursus::count();
        $totalPelatih = Pelatih::count();
        $totalPemesanan = Pemesanan::count();
        $totalUsers = User::count();

        // Data for charts
        $monthlyReservations = Pemesanan::selectRaw('MONTH(tgl_pemesanan) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')->toArray();

        $yearlyReservations = Pemesanan::selectRaw('YEAR(tgl_pemesanan) as year, COUNT(*) as count')
            ->groupBy('year')
            ->pluck('count', 'year')->toArray();

        return view('admin.dashboard', compact('totalMember', 'totalKursus', 'totalPelatih', 'totalPemesanan', 'totalUsers', 'monthlyReservations', 'yearlyReservations'));
    }
}

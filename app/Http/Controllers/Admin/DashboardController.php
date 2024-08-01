<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Models\member;
use App\Models\Pelatih;
use App\Models\Pemesanan; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMember = member::getTotalMembers();
        $totalKursus = Kursus::getTotalKursus();
        $totalPelatih = Pelatih::getTotalPelatih();
        $totalPemesanan = Pemesanan::getTotalPemesanan();

        return view('admin.dashboard', compact('totalMember', 'totalKursus', 'totalPelatih', 'totalPemesanan'));
    }
}

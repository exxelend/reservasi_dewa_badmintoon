<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pemesanan;

class KasirController extends Controller
{
    public function index()
    {
        $pemesanan=Pemesanan::where('status', 'sukses')->get();
        return view('kasir.dashboard', compact('pemesanan'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pemesanan;

class PetugasController extends Controller
{
    public function index()
    {
        return view('petugas.dashboard');
    }
    public function reservasi()
    {
        $pemesanan=Pemesanan::all();
        return view('petugas.index', compact('pemesanan'));
    }
}

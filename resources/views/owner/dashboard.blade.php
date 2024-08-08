@extends('layouts.owner')

@section('content')
<div class="container">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fas fa-users fa-3x text-primary"></i>
                    <div class="ms-3">
                        <h4 class="mb-2">Total Pengguna</h4>
                        <h5 class="mb-0">{{ $totalUsers }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fas fa-calendar-check fa-3x text-success"></i>
                    <div class="ms-3">
                        <h4 class="mb-2">Total Reservasi</h4>
                        <h5 class="mb-0">{{ $totalPemesanan }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fas fa-users fa-3x text-primary"></i>
                    <div class="ms-3 flex-grow-1">
                        <h4 class="mb-2">Data Reservasi Sukses</h4>
                        <form action="{{ route('owner.dashboard') }}" method="GET" class="d-flex align-items-center">
                            <div class="row w-100">
                                <div class="col-md-4">
                                    <select name="month" class="form-control">
                                        <option value="">Pilih Bulan</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="year" class="form-control">
                                        <option value="">Pilih Tahun</option>
                                        @for ($i = \Carbon\Carbon::now()->year; $i >= 2000; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4 mt-4">
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fas fa-money-bill-wave fa-3x text-primary"></i>
                    <div class="ms-3">
                        <h4 class="mb-2">Total Uang Masuk</h4>
                        <h5 class="mb-0">Rp{{ number_format($total_income, 2, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap mt-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Lapangan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>No Handphone</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Akhir</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($pemesanan as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->lapangan->nama_lapangan }}</td>
                        <td>{{ $item->tgl_pemesanan }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->waktu_mulai }}</td>
                        <td>{{ $item->waktu_akhir }}</td>
                        <td>Rp{{ number_format($item->total_harga, 2, ',', '.') }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

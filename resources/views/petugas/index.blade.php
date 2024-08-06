@extends('layouts.petugas')
@section('content')
    <div class="container">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <h3 class="mb-4">Reservasi</h3>
                </div>
                <div class="col-12">
                    <div style="float: right;">
                        <form action="{{ route('petugas.index') }}" method="GET" class="d-flex align-items-center">
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
                <div class="col-12 mt-4">
                    <div class="bg-light rounded h-100 p-4">
                        <div class="table-responsive text-nowrap">
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
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.owner')

@section('content')
<div class="container">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fas fa-users fa-3x text-primary"></i>
                        <div class="ms-3">
                            <h4 class="mb-2">Data Reservasi Sukses</h4>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
            <div class="col-12">
                        <div class="table-responsive text-nowrap">
                            <table class="table table hover ">
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
                                            <td>
                                                <!-- <button type="button" class="btn btn-primary m-2"><a
                                                        href="/admin/pemesanan/{{ $item->id }}/update"
                                                        style="color: white"><i class="fas fa-edit"
                                                            style="color: white;"></i></a></button> -->
                                                <!-- <button type="button" class="btn btn-danger m-2"
                                                    onclick="showDeleteSuccessModal()"><a
                                                        href="/admin/pemesanan/{{ $item->id }}/delete"
                                                        style="color: white"><i class="fas fa-trash-alt"
                                                            style="color: white;"></i></a></button> -->
                                                <!-- <button type="button" class="btn btn-success m-2"
                                                    onclick="checkStatusAndPrintReceipt('{{ $item->status }}', '{{ $item->id }}')">
                                                    <i class="fas fa-receipt" style="color: white;"></i>
                                                </button> -->

                                                <!-- Modal for non-successful status -->
                                                <div class="modal fade" id="notaNotAvailableModal" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Nota Tidak
                                                                    Tersedia</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Maaf, nota tidak tersedia untuk pesanan ini.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal for successful delete -->
                                                <div class="modal fade" id="deleteSuccessModal" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Data
                                                                    Berhasil
                                                                    Dihapus</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Data berhasil dihapus.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                   
                    </div>
       </div>
     </div>
@endsection

@extends('layouts.admin')
@section('content')

<body>
  <div class="main-container">
    <div class="year-stats">
      <div class="month-group">
        <div class="bar h-100"></div>
        <p class="month">Jan</p>
      </div>
      <div class="month-group">
        <div class="bar h-50"></div>
        <p class="month">Feb</p>
      </div>
      <div class="month-group">
        <div class="bar h-75"></div>
        <p class="month">Mar</p>
      </div>
      <div class="month-group">
        <div class="bar h-25"></div>
        <p class="month">Apr</p>
      </div>
      <div class="month-group selected">
        <div class="bar h-100"></div>
        <p class="month">May</p>
      </div>
      <div class="month-group">
        <div class="bar h-50"></div>
        <p class="month">Jun</p>
      </div>
      <div class="month-group">
        <div class="bar h-75"></div>
        <p class="month">Jul</p>
      </div>
      <div class="month-group">
        <div class="bar h-25"></div>
        <p class="month">Aug</p>
      </div>
      <div class="month-group">
        <div class="bar h-50"></div>
        <p class="month">Sep</p>
      </div>
      <div class="month-group">
        <div class="bar h-75"></div>
        <p class="month">Oct</p>
      </div>
      <div class="month-group">
        <div class="bar h-25"></div>
        <p class="month">Nov</p>
      </div>
      <div class="month-group">
        <div class="bar h-100"></div>
        <p class="month">Dez</p>
      </div>
    </div>

    <div class="stats-info">
      <div class="graph-container">
        <div class="percent">
          <svg viewBox="0 0 36 36" class="circular-chart">
            <path class="circle" stroke-dasharray="100, 100" d="M18 2.0845
      a 15.9155 15.9155 0 0 1 0 31.831
      a 15.9155 15.9155 0 0 1 0 -31.831" />
            <path class="circle" stroke-dasharray="85, 100" d="M18 2.0845
      a 15.9155 15.9155 0 0 1 0 31.831
      a 15.9155 15.9155 0 0 1 0 -31.831" />
            <path class="circle" stroke-dasharray="60, 100" d="M18 2.0845
      a 15.9155 15.9155 0 0 1 0 31.831
      a 15.9155 15.9155 0 0 1 0 -31.831" />
            <path class="circle" stroke-dasharray="30, 100" d="M18 2.0845
      a 15.9155 15.9155 0 0 1 0 31.831
      a 15.9155 15.9155 0 0 1 0 -31.831" />
          </svg>
        </div>
        <p>Total data reservasi pertahun : 2075</p>
      </div>

      <div class="info">
        <p>Data Reservasi Sukses<br /><span> & Data Pemasukan Uang Reservasi</span></p>
        <p>Reservasi Sukses <span>100 Orang</span></p>
        <p>Pemasukan Uang Reservasi <br /><span>Rp. 800.000</brspan></p>
      </div>
    </div>
  </div>
</body>
<div class="container">
  <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
      <div class="col-sm-6 col-xl-4">
        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
          <i class="fas fa-users fa-3x text-primary"></i>
          <div class="ms-3">
            <h4 class="mb-2">Reservasi</h4>
            <h6 class="mb-0">{{ $totalPemesanan }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 equal-height">
                    <i class="fas fa-users fa-3x text-primary"></i>
                    <div class="ms-3">
                        <h4 class="mb-2">Reservasi</h4>
                        <h6 class="mb-0">{{ $totalPemesanan }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 equal-height">
                    <i class="fas fa-user-check fa-3x text-success"></i>
                    <div class="ms-3">
                        <h4 class="mb-2">Pengguna Terdaftar</h4>
                        <h6 class="mb-0">{{ $totalUsers }}</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-sm-12 col-xl-6">
                <h5>Reservasi per Bulan</h5> <!-- Keterangan di atas chart bulanan -->
                <canvas id="monthlyChart" width="400" height="400"></canvas>
            </div>
            <div class="col-sm-12 col-xl-6">
                <h5>Reservasi per Tahun</h5> <!-- Keterangan di atas chart tahunan -->
                <canvas id="yearlyChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>

<style>
  .equal-height {
    height: 100%;
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Data reservasi bulanan
    var monthlyData = @json($monthlyReservations);
    var monthlyLabels = [];
    var monthlyValues = [];
    for (var i = 1; i <= 12; i++) {
        monthlyLabels.push(new Date(0, i - 1).toLocaleString('default', { month: 'short' }));
        monthlyValues.push(monthlyData[i] || 0);
    }

    var monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
    var monthlyChart = new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: monthlyLabels,
            datasets: [{
                label: 'Reservasi per Bulan',
                data: monthlyValues,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            animation: false,
            responsive: false,
            maintainAspectRatio: false
        }
    });

    // Data reservasi tahunan
    var yearlyData = @json($yearlyReservations);
    var yearlyLabels = Object.keys(yearlyData);
    var yearlyValues = Object.values(yearlyData);

    var yearlyCtx = document.getElementById('yearlyChart').getContext('2d');
    var yearlyChart = new Chart(yearlyCtx, {
        type: 'bar',
        data: {
            labels: yearlyLabels,
            datasets: [{
                label: 'Reservasi per Tahun',
                data: yearlyValues,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            animation: false,
            responsive: false,
            maintainAspectRatio: false
        }
    });
});
</script>

@endsection

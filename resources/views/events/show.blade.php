@extends('layouts.app')

@section('title', $event->name)

@section('styles')
    <!-- Custom Styles for Event Details Page -->
    <style>
        /* Tambahkan gaya kustom di sini sesuai kebutuhan */
        .event-image {
            max-height: 400px; /* Sesuaikan tinggi maksimum gambar */
            object-fit: cover;
            width: 100%;
        }
        .event-details {
            margin-top: 20px;
        }
        .event-description {
            margin-top: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3 animated slideInDown">{{ $event->name }}</h1>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/events/' . $event->image) }}" class="card-img-top event-image" alt="Event Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text"><strong>Date:</strong> {{ $event->date }}</p>
                        <p class="card-text"><strong>Location:</strong> {{ $event->location }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm event-details">
                    <div class="card-body">
                        <h5 class="card-title">Event Details</h5>
                        <p class="card-text event-description">
                            {{ $event->description }}
                        </p>
                        <a href="{{ route('events.index') }}" class="btn btn-primary">Back to Events</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Additional Scripts for Event Details Page -->
    <script>
        // Tambahkan skrip kustom di sini jika diperlukan
    </script>
@endsection

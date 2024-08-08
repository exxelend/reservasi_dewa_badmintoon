@extends('layouts.user')

@section('content')
<div class="container">
    <h1>Events</h1>
    @if ($events->isEmpty())
    <p>No events available.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->date }}</td>
                <td><a href="{{ route('events.show', $event) }}" class="btn btn-info">Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@push('custom-css')
<link href="{{ asset('css/your-custom-styles.css') }}" rel="stylesheet">
@endpush

@push('custom-js')
<script src="{{ asset('js/your-custom-scripts.js') }}"></script>
@endpush
@endsection

<!-- resources/views/dashboard.blade.php -->

@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(Auth::user()->role === 'admin')
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Students</h5>
                            <p class="card-text">{{ $statistics['total_students'] }}</p>
                        </div>
                    </div>
                </div>
            @elseif(Auth::user()->role === 'ps')
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Students in Rayon</h5>
                            <p class="card-text">{{ $statistics['total_rayon_students'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Late Students Today</h5>
                            <p class="card-text">{{ $statistics['total_late_students_today'] }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

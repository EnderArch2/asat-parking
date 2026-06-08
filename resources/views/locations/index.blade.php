@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    <div class="container-fluid py-4">

        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="h4 font-weight-bold mb-0 text-primary">@yield('title', $title ?? '')</h2>
            </div>
            <div>
                <a href="{{ route('location.create') }}" class="btn bg-gradient-primary mb-0">
                    <i class="fas fa-plus me-1"></i> New Location
                </a>
            </div>
        </div>

        {{-- Table Section --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover admin-table align-middle mb-0">
                        <thead class="text-primary admin-table-head">
                            <tr>
                                <th class="ps-4 text-uppercase text-primary text-xxs font-weight-bolder opacity-7" width="5%">No.</th>
                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">Location Name</th>
                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">MAX MOTORCYCLE</th>
                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">MAX CAR</th>
                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">MAX OTHER</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $index => $location)
                                <tr>
                                    <td>{{ 1 + $index }}</td>
                                    <td>{{ $location->location_name }}</td>
                                    <td>{{ $location->max_motorcycle }}</td>
                                    <td>{{ $location->max_car }}</td>
                                    <td>{{ $location->max_other }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/plugins/sweetalert.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2500
                });
            @endif
        });
    </script>
@endsection

@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    {{-- header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 font-weight-bold mb-0 text-primary">New @yield('title', $title ?? '')</h2>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="">
                <div class="p-3">
                    <form id="create-form" role="form" action="{{ route('vehicle_type.store') }}" method="POST">
                        @csrf

                        {{-- INPUT NAME --}}
                        <label>Vehicle Name</label>
                        <div class="mb-3">
                            {{-- <input type="text" name="location_name" id="location_name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="ex. Gedung A"
                                value="{{ old('location_name') }}" required autocomplete="off"> --}}
                            <select name="vehicle_name" class="form-control">
                                <option value="">Select your Vehicle</option>
                                <option value="motorcycle">Motorcycle</option>
                                <option value="car">Car</option>
                                <option value="other">Other</option>
                            </select>
                            {{-- Container Error Realtime --}}
                            <small id="name-error-msg" class="text-danger fw-bold admin-error-msg"></small>

                            {{-- Error Laravel Bawaan (Backup) --}}
                            @error('location_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <label>First Hour Charges</label>
                        <div class="mb-3">
                            <input type="number" name="perjam_pertama" id="perjam_pertama"
                                class="form-control @error('name') is-invalid @enderror" placeholder="ex. 3"
                                value="{{ old('perjam_pertama') }}" required autocomplete="off">

                            {{-- Container Error Realtime --}}
                            <small id="name-error-msg" class="text-danger fw-bold admin-error-msg"></small>

                            {{-- Error Laravel Bawaan (Backup) --}}
                            @error('perjam_pertama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <label>Next Hourly Charges</label>
                        <div class="mb-3">
                            <input type="number" name="perjam_berikutnya" id="perjam_berikutnya"
                                class="form-control @error('name') is-invalid @enderror" placeholder="ex. 3"
                                value="{{ old('perjam_berikutnya') }}" required autocomplete="off">

                            {{-- Container Error Realtime --}}
                            <small id="name-error-msg" class="text-danger fw-bold admin-error-msg"></small>

                            {{-- Error Laravel Bawaan (Backup) --}}
                            @error('perjam_berikutnya')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <label>Max Cost Per Day</label>
                        <div class="mb-3">
                            <input type="number" name="max_perhari" id="max_perhari"
                                class="form-control @error('name') is-invalid @enderror" placeholder="ex. 3"
                                value="{{ old('max_oter') }}" required autocomplete="off">

                            {{-- Container Error Realtime --}}
                            <small id="name-error-msg" class="text-danger fw-bold admin-error-msg"></small>

                            {{-- Error Laravel Bawaan (Backup) --}}
                            @error('max_perhari')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        {{-- BUTTONS --}}
                        <div class="text-end">
                            <a href="/vehicle_type" onclick="confirmCancel(event)"
                                class="btn bg-gradient-light mt-4 mb-0">Cancel</a>
                            {{-- ID submit-btn penting untuk JS --}}
                            <button type="submit" id="submit-btn" class="btn bg-gradient-primary mt-4 mb-0">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- js stuff --}}
    <script src="{{ asset('assets/js/plugins/sweetalert.js') }}"></script>

<script>
    // 1. Cancel Confirmation
    function confirmCancel(event) {
        event.preventDefault();
        const redirectUrl = event.currentTarget.getAttribute('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "Any unsaved data will be lost.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, cancel!',
            cancelButtonText: 'No, stay'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = redirectUrl;
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        // DOM Elements
        const form = document.getElementById("create-form");

        if (form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Save Data?',
                    text: "Please review your inputs before submitting.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, save it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Saving...',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        form.submit(); // Resume form submission
                    }
                });
            });
        }
    });
</script>
@endsection

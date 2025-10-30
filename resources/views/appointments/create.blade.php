@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center py-4">
                    <!-- Logo -->
                    <svg width="60" height="60" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" class="mb-3">
                        <path d="M50 15 L85 80 L70 80 L50 50 L30 80 L15 80 Z" fill="#fff"/>
                        <path d="M50 38 L62 60 L50 60 Z" fill="rgba(102, 126, 234, 0.8)"/>
                    </svg>
                    <h4 class="mb-0"><i class="bi bi-calendar-plus"></i> Buat Appointment</h4>
                    <p class="mb-0 mt-2 small">Isi form di bawah untuk membuat janji temu</p>
                </div>
                <div class="card-body">
                    <!-- Info Layanan -->
                    <div class="alert alert-info">
                        <h5 class="alert-heading">Layanan yang Dipilih:</h5>
                        <hr>
                        <p class="mb-1"><strong>{{ $pricelist->service_name }}</strong></p>
                        <p class="mb-1">{{ $pricelist->description }}</p>
                        <p class="mb-1"><strong>Harga:</strong> Rp {{ number_format($pricelist->price, 0, ',', '.') }}</p>
                        <p class="mb-0"><strong>Durasi:</strong> {{ $pricelist->duration }} menit</p>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('appointments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pricelist_id" value="{{ $pricelist->id }}">

                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" 
                                   id="customer_name" name="customer_name" value="{{ old('customer_name', auth()->user()->name) }}" required>
                            @error('customer_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="customer_phone" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control @error('customer_phone') is-invalid @enderror" 
                                   id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}" 
                                   placeholder="08123456789" required>
                            @error('customer_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="customer_email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('customer_email') is-invalid @enderror" 
                                   id="customer_email" name="customer_email" value="{{ old('customer_email', auth()->user()->email) }}" required>
                            @error('customer_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="appointment_date" class="form-label">Tanggal Appointment <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('appointment_date') is-invalid @enderror" 
                                       id="appointment_date" name="appointment_date" value="{{ old('appointment_date') }}" 
                                       min="{{ date('Y-m-d') }}" required>
                                @error('appointment_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="appointment_time" class="form-label">Waktu Appointment <span class="text-danger">*</span></label>
                                <input type="time" class="form-control @error('appointment_time') is-invalid @enderror" 
                                       id="appointment_time" name="appointment_time" value="{{ old('appointment_time') }}" required>
                                @error('appointment_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Catatan (Opsional)</label>
                            <textarea class="form-control @error('notes') is-invalid @enderror" 
                                      id="notes" name="notes" rows="3" 
                                      placeholder="Tambahkan catatan khusus jika ada...">{{ old('notes') }}</textarea>
                            @error('notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Makanan & Minuman -->
                        <div class="alert alert-info">
                            <h6 class="alert-heading mb-3">
                                <i class="bi bi-cup-hot"></i> Pesan Makanan & Minuman
                            </h6>
                            
                            <div id="foodsContainer">
                                <div class="mb-3">
                                    <label class="form-label">Isi Catatan untuk memesan makanan dan Minuman (Opsional)</label>
                                    <div id="foodList" class="row g-3">
                                        <!-- Foods akan dimuat via JavaScript -->
                                    </div>
                                </div>
                            </div>

                            <div id="selectedFoodsCart" class="mt-3">
                                <!-- Selected items akan tampil di sini -->
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('home') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Lanjut ke Pembayaran <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
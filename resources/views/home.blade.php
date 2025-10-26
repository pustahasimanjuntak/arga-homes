@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Selamat Datang di Arga Homes Barbershop</h1>
        <p class="lead">Potong rambut dengan gaya terbaik dan layanan profesional</p>
    </div>
</div>

<!-- Pricelist Section -->
<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Daftar Layanan Kami</h2>
        <p class="text-muted">Pilih layanan sesuai kebutuhan Anda</p>
    </div>

    <div class="row g-4">
        @forelse($pricelists as $pricelist)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $pricelist->service_name }}</h5>
                        <p class="card-text text-muted">{{ $pricelist->description }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="text-primary mb-0">Rp {{ number_format($pricelist->price, 0, ',', '.') }}</h4>
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i> {{ $pricelist->duration }} menit
                                </small>
                            </div>
                        </div>
                        
                        @auth
                            <a href="{{ route('appointments.create', $pricelist->id) }}" class="btn btn-book w-100">
                                <i class="bi bi-calendar-plus"></i> Book Now
                            </a>
                        @else
                            <button type="button" class="btn btn-book w-100" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <i class="bi bi-calendar-plus"></i> Book Now
                            </button>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada layanan tersedia saat ini.
                </div>
            </div>
        @endforelse
    </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login Required</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <i class="bi bi-lock-fill text-warning" style="font-size: 3rem;"></i>
                <p class="mt-3">Anda harus login terlebih dahulu untuk melakukan booking.</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
            </div>
        </div>
    </div>
</div>

<!-- About Section -->
<div class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3 class="fw-bold mb-3">Tentang Arga Homes</h3>
                <p class="text-muted">
                    Arga Homes adalah barbershop modern yang menghadirkan pengalaman potong rambut terbaik 
                    dengan barber profesional dan berpengalaman. Kami berkomitmen memberikan pelayanan 
                    terbaik untuk setiap pelanggan.
                </p>
                <ul class="list-unstyled">
                    <li><i class="bi bi-check-circle-fill text-success"></i> Barber Profesional</li>
                    <li><i class="bi bi-check-circle-fill text-success"></i> Alat Modern & Steril</li>
                    <li><i class="bi bi-check-circle-fill text-success"></i> Harga Terjangkau</li>
                    <li><i class="bi bi-check-circle-fill text-success"></i> Booking Online Mudah</li>
                </ul>
            </div>
            <div class="col-md-6 text-center">
                <i class="bi bi-scissors" style="font-size: 10rem; color: #667eea;"></i>
            </div>
        </div>
    </div>
</div>
@endsection
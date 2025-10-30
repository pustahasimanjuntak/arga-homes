

@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Selamat Datang di Arga Homes</h1>
        <p class="lead">Good Day, Good Hair Cut</p>
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
                    terbaik untuk setiap pelanggan dengan standar kebersihan internasional.
                </p>
                <h5 class="fw-bold mt-4 mb-3">Keunggulan Kami:</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Barber Profesional & Berpengalaman</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Alat Modern & Steril</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Harga Terjangkau & Kompetitif</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Booking Online Mudah & Cepat</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Lingkungan Nyaman & Bersih</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Produk Berkualitas Premium</li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4">
                        <!-- Logo in Card -->
                        <div class="text-center mb-4">
                            <svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                <path d="M50 10 L90 85 L70 85 L50 50 L30 85 L10 85 Z" fill="#667eea"/>
                                <path d="M50 35 L65 60 L50 60 Z" fill="#fff"/>
                            </svg>
                        </div>
                        
                        <h5 class="card-title fw-bold mb-3">
                            <i class="bi bi-info-circle-fill text-primary"></i> Informasi Tambahan
                        </h5>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold text-primary">📍 Lokasi</h6>
                            <p class="text-muted small">
                                jl P. Siantar km2 Tampubolon, sibolahotang SAS, Balige, Sumatera Utara, Indonesia 22315
                            </p>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold text-primary">📞 Hubungi Kami</h6>
                            <p class="text-muted small">
                                <a href="tel:+6281234567890" class="text-decoration-none">
                                    0821-6789-3019
                                </a> (Telepon/WhatsApp)
                            </p>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold text-primary">⏰ Jam Operasional</h6>
                            <p class="text-muted small mb-1">
                                <strong>Senin - Jumat:</strong> 08:00 - 00:00
                            </p>
                            <p class="text-muted small">
                                <strong>Sabtu - Minggu:</strong> 10:00 - 00:00
                            </p>
                        </div>

                        <div>
                            <h6 class="fw-bold text-primary">👥 Ikuti Kami</h6>
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="https://www.instagram.com/arga_homes_barber_coffee_food/" target="_blank" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="https://web.facebook.com/junsmc.tambs/" target="_blank" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://wa.me/6282167893019" target="_blank" 
                                   class="btn btn-sm btn-outline-success">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                                <a href="https://www.tiktok.com/@argahomes10/@argahomes" target="_blank" 
                                   class="btn btn-sm btn-outline-dark">
                                    <i class="bi bi-tiktok"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
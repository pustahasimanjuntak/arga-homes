{{-- @extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="bi bi-speedometer2"></i> Admin Dashboard - Kelola Appointment</h4>
                </div>
                <div class="card-body">
                    <!-- Statistics -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h6>Pending</h6>
                                    <h3>{{ $appointments->where('status', 'pending')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h6>Confirmed</h6>
                                    <h3>{{ $appointments->where('status', 'confirmed')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <h6>Cancelled</h6>
                                    <h3>{{ $appointments->where('status', 'cancelled')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h6>Total</h6>
                                    <h3>{{ $appointments->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Kontak</th>
                                    <th>Layanan</th>
                                    <th>Tanggal & Waktu</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $appointment)
                                <tr>
                                    <td><span class="badge bg-secondary">#{{ $appointment->id }}</span></td>
                                    <td>
                                        <strong>{{ $appointment->customer_name }}</strong><br>
                                        <small class="text-muted">{{ $appointment->user->email }}</small>
                                    </td>
                                    <td>
                                        <i class="bi bi-telephone"></i> {{ $appointment->customer_phone }}<br>
                                        <i class="bi bi-envelope"></i> {{ $appointment->customer_email }}
                                    </td>
                                    <td>{{ $appointment->pricelist->service_name }}</td>
                                    <td>
                                        <i class="bi bi-calendar"></i> {{ $appointment->appointment_date->format('d/m/Y') }}<br>
                                        <i class="bi bi-clock"></i> {{ date('H:i', strtotime($appointment->appointment_time)) }}
                                    </td>
                                    <td>Rp {{ number_format($appointment->total_price, 0, ',', '.') }}</td>
                                    <td>
                                        @if($appointment->status == 'confirmed')
                                            <span class="badge bg-success">Dikonfirmasi</span>
                                        @elseif($appointment->status == 'cancelled')
                                            <span class="badge bg-danger">Dibatalkan</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($appointment->payment_sent)
                                            <span class="badge bg-info">
                                                <i class="bi bi-check-circle"></i> Terkirim
                                            </span><br>
                                            <a href="https://wa.me/{{ $appointment->customer_phone }}" 
                                               target="_blank" 
                                               class="btn btn-sm btn-success mt-1">
                                                <i class="bi bi-whatsapp"></i> Cek WA
                                            </a>
                                        @else
                                            <span class="badge bg-secondary">Belum Dikirim</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($appointment->status == 'pending')
                                            @if($appointment->payment_sent)
                                                <form action="{{ route('admin.appointments.confirm', $appointment->id) }}" 
                                                      method="POST" 
                                                      class="d-inline"
                                                      onsubmit="return confirm('Konfirmasi appointment ini?')">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success mb-1">
                                                        <i class="bi bi-check-circle"></i> Konfirmasi
                                                    </button>
                                                </form>
                                            @else
                                                <span class="badge bg-secondary">Menunggu Bukti Transfer</span>
                                            @endif
                                        @elseif($appointment->status == 'confirmed')
                                            <span class="badge bg-success">
                                                <i class="bi bi-check-circle-fill"></i> Sudah Dikonfirmasi
                                            </span>
                                        @endif
                                        
                                        @if($appointment->status != 'cancelled')
                                        <form action="{{ route('admin.appointments.cancel', $appointment->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Batalkan appointment ini?')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger mb-1">
                                                <i class="bi bi-x-circle"></i> Batalkan
                                            </button>
                                        </form>
                                        @else
                                            <span class="badge bg-dark">
                                                <i class="bi bi-x-circle-fill"></i> Dibatalkan
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4">
                                        <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                        <p class="text-muted mt-2">Belum ada appointment</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="bi bi-speedometer2"></i> Admin Dashboard - Kelola Appointment</h4>
                </div>
                <div class="card-body">
                    <!-- Statistics -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h6>Pending</h6>
                                    <h3>{{ $appointments->where('status', 'pending')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h6>Confirmed</h6>
                                    <h3>{{ $appointments->where('status', 'confirmed')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <h6>Cancelled</h6>
                                    <h3>{{ $appointments->where('status', 'cancelled')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h6>Total</h6>
                                    <h3>{{ $appointments->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Kontak</th>
                                    <th>Layanan</th>
                                    <th>Tanggal & Waktu</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $appointment)
                                <tr>
                                    <td><span class="badge bg-secondary">#{{ $appointment->id }}</span></td>
                                    <td>
                                        <strong>{{ $appointment->customer_name }}</strong><br>
                                        <small class="text-muted">{{ $appointment->user->email }}</small>
                                    </td>
                                    <td>
                                        <i class="bi bi-telephone"></i> {{ $appointment->customer_phone }}<br>
                                        <i class="bi bi-envelope"></i> {{ $appointment->customer_email }}
                                    </td>
                                    <td>{{ $appointment->pricelist->service_name }}</td>
                                    <td>
                                        <i class="bi bi-calendar"></i> {{ $appointment->appointment_date->format('d/m/Y') }}<br>
                                        <i class="bi bi-clock"></i> {{ date('H:i', strtotime($appointment->appointment_time)) }}
                                    </td>
                                    <td>Rp {{ number_format($appointment->total_price, 0, ',', '.') }}</td>
                                    <td>
                                        @if($appointment->status == 'confirmed')
                                            <span class="badge bg-success">Dikonfirmasi</span>
                                        @elseif($appointment->status == 'cancelled')
                                            <span class="badge bg-danger">Dibatalkan</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($appointment->payment_sent)
                                            <span class="badge bg-info">
                                                <i class="bi bi-check-circle"></i> Terkirim
                                            </span><br>
                                            <a href="https://wa.me/{{ $appointment->customer_phone }}" 
                                               target="_blank" 
                                               class="btn btn-sm btn-success mt-1">
                                                <i class="bi bi-whatsapp"></i> Cek WA
                                            </a>
                                        @else
                                            <span class="badge bg-secondary">Belum Dikirim</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($appointment->status == 'pending')
                                            <form action="{{ route('admin.appointments.confirm', $appointment->id) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('Konfirmasi appointment ini?')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success mb-1">
                                                    <i class="bi bi-check-circle"></i> Konfirmasi
                                                </button>
                                            </form>
                                        @elseif($appointment->status == 'confirmed')
                                            <span class="badge bg-success">
                                                <i class="bi bi-check-circle-fill"></i> Sudah Dikonfirmasi
                                            </span>
                                        @endif
                                        
                                        @if($appointment->status != 'cancelled')
                                            <form action="{{ route('admin.appointments.cancel', $appointment->id) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('Batalkan appointment ini?')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger mb-1">
                                                    <i class="bi bi-x-circle"></i> Batalkan
                                                </button>
                                            </form>
                                        @else
                                            <span class="badge bg-dark">
                                                <i class="bi bi-x-circle-fill"></i> Dibatalkan
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4">
                                        <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                        <p class="text-muted mt-2">Belum ada appointment</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="bi bi-calendar-check"></i> Appointment Saya</h4>
                </div>
                <div class="card-body">
                    @if($appointments->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Layanan</th>
                                    <th>Tanggal & Waktu</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                <tr>
                                    <td><span class="badge bg-secondary">#{{ $appointment->id }}</span></td>
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
                                            <span class="badge bg-info">Terkirim</span>
                                        @else
                                            <span class="badge bg-secondary">Belum</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('appointments.status', $appointment->id) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-5">
                        <i class="bi bi-calendar-x" style="font-size: 4rem; color: #ccc;"></i>
                        <h5 class="mt-3 text-muted">Belum ada appointment</h5>
                        <p class="text-muted">Silakan buat appointment baru dari halaman home</p>
                        <a href="{{ route('home') }}" class="btn btn-primary mt-2">
                            <i class="bi bi-plus-circle"></i> Buat Appointment
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
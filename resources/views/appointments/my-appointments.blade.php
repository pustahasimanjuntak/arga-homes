@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0"><i class="bi bi-clipboard-check"></i> Status Appointment</h4>
                </div>
                <div class="card-body">
                    <!-- Status Badge -->
                    <div class="text-center mb-4">
                        @if($appointment->status == 'confirmed')
                            <div class="alert alert-success">
                                <i class="bi bi-check-circle-fill" style="font-size: 3rem;"></i>
                                <h4 class="mt-2">Appointment Dikonfirmasi!</h4>
                                <p class="mb-0">Appointment Anda telah dikonfirmasi oleh admin. Silakan datang sesuai jadwal.</p>
                            </div>
                        @elseif($appointment->status == 'cancelled')
                            <div class="alert alert-danger">
                                <i class="bi bi-x-circle-fill" style="font-size: 3rem;"></i>
                                <h4 class="mt-2">Appointment Dibatalkan</h4>
                                <p class="mb-0">Appointment Anda telah dibatalkan. Silakan hubungi admin untuk informasi lebih lanjut.</p>
                            </div>
                        @else
                            <div class="alert alert-warning">
                                <i class="bi bi-hourglass-split" style="font-size: 3rem;"></i>
                                <h4 class="mt-2">Menunggu Konfirmasi</h4>
                                @if($appointment->payment_sent)
                                    <p class="mb-0">Bukti transfer Anda sudah dikirim. Admin sedang memverifikasi pembayaran.</p>
                                @else
                                    <p class="mb-0">Silakan kirim bukti transfer terlebih dahulu.</p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <!-- Detail Appointment -->
                    <h5 class="mb-3">Detail Appointment</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">ID Appointment</th>
                                <td><span class="badge bg-secondary">#{{ $appointment->id }}</span></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($appointment->status == 'confirmed')
                                        <span class="badge bg-success">Dikonfirmasi</span>
                                    @elseif($appointment->status == 'cancelled')
                                        <span class="badge bg-danger">Dibatalkan</span>
                                    @else
                                        <span class="badge bg-warning">Menunggu Konfirmasi</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status Pembayaran</th>
                                <td>
                                    @if($appointment->payment_sent)
                                        <span class="badge bg-info">Bukti Sudah Dikirim</span>
                                    @else
                                        <span class="badge bg-secondary">Belum Dikirim</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $appointment->customer_name }}</td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td>{{ $appointment->customer_phone }}</td>
                            </tr>
                            <tr>
                                <th>Layanan</th>
                                <td>{{ $appointment->pricelist->service_name }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>{{ $appointment->appointment_date->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Waktu</th>
                                <td>{{ date('H:i', strtotime($appointment->appointment_time)) }}</td>
                            </tr>
                            <tr class="table-primary">
                                <th>Total Harga</th>
                                <th class="text-end">Rp {{ number_format($appointment->total_price, 0, ',', '.') }}</th>
                            </tr>
                        </table>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('appointments.my') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Lihat Semua Appointment
                        </a>

                        @if(!$appointment->payment_sent)
                        <a href="{{ route('appointments.payment', $appointment->id) }}" class="btn btn-primary">
                            <i class="bi bi-credit-card"></i> Lanjutkan Pembayaran
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
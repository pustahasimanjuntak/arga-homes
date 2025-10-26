@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><i class="bi bi-credit-card"></i> Pembayaran</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle-fill"></i> Appointment berhasil dibuat!
                    </div>

                    <!-- Ringkasan Appointment -->
                    <h5 class="mb-3">Ringkasan Appointment</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Nama</th>
                                <td>{{ $appointment->customer_name }}</td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td>{{ $appointment->customer_phone }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $appointment->customer_email }}</td>
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
                            @if($appointment->notes)
                            <tr>
                                <th>Catatan</th>
                                <td>{{ $appointment->notes }}</td>
                            </tr>
                            @endif
                            <tr class="table-primary">
                                <th>Total Harga</th>
                                <th class="text-end">Rp {{ number_format($appointment->total_price, 0, ',', '.') }}</th>
                            </tr>
                        </table>
                    </div>

                    <!-- Info Transfer -->
                    <div class="card bg-light mt-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-bank"></i> Informasi Rekening</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-2"><strong>Bank:</strong> BCA</p>
                                    <p class="mb-2"><strong>No. Rekening:</strong> 1234567890</p>
                                    <p class="mb-0"><strong>Atas Nama:</strong> Arga Homes</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-2"><strong>Bank:</strong> Mandiri</p>
                                    <p class="mb-2"><strong>No. Rekening:</strong> 0987654321</p>
                                    <p class="mb-0"><strong>Atas Nama:</strong> Arga Homes</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Instruksi Pembayaran -->
                    <div class="alert alert-info mt-4">
                        <h6 class="alert-heading"><i class="bi bi-info-circle-fill"></i> Instruksi Pembayaran:</h6>
                        <ol class="mb-0">
                            <li>Transfer sesuai jumlah total ke salah satu rekening di atas</li>
                            <li>Kirim bukti transfer ke WhatsApp: <strong><a href="https://wa.me/6281234567890" target="_blank" class="text-decoration-none">0812-3456-7890</a></strong></li>
                            <li>Setelah mengirim bukti, klik tombol "Sudah Transfer" di bawah</li>
                            <li>Admin akan mengkonfirmasi pembayaran Anda</li>
                        </ol>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20mengirim%20bukti%20transfer%20untuk%20appointment%20atas%20nama%20{{ urlencode($appointment->customer_name) }}" 
                           target="_blank" 
                           class="btn btn-success">
                            <i class="bi bi-whatsapp"></i> Kirim Bukti via WhatsApp
                        </a>

                        @if(!$appointment->payment_sent)
                        <form action="{{ route('appointments.confirm-payment', $appointment->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary" 
                                    onclick="return confirm('Apakah Anda sudah mengirim bukti transfer via WhatsApp?')">
                                <i class="bi bi-check-circle"></i> Sudah Transfer & Kirim Bukti
                            </button>
                        </form>
                        @else
                        <a href="{{ route('appointments.status', $appointment->id) }}" class="btn btn-info">
                            <i class="bi bi-eye"></i> Lihat Status
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
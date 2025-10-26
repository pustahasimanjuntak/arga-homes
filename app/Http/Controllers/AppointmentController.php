<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pricelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function __construct()
    {
        // Semua route di controller ini butuh login
        $this->middleware('auth');
    }

    /**
     * Tampilkan form buat bikin appointment berdasarkan pricelist.
     */
    public function create($pricelistId)
    {
        $pricelist = Pricelist::findOrFail($pricelistId);
        return view('appointments.create', compact('pricelist'));
    }

    /**
     * Simpan data appointment baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pricelist_id'      => 'required|exists:pricelists,id',
            'customer_name'     => 'required|string|max:255',
            'customer_phone'    => 'required|string|max:20',
            'customer_email'    => 'required|email',
            'appointment_date'  => 'required|date|after_or_equal:today',
            'appointment_time'  => 'required',
            'notes'             => 'nullable|string|max:500',
        ]);

        $pricelist = Pricelist::findOrFail($validated['pricelist_id']);

        $appointment = Appointment::create([
            'user_id'           => Auth::id(),
            'pricelist_id'      => $validated['pricelist_id'],
            'customer_name'     => $validated['customer_name'],
            'customer_phone'    => $validated['customer_phone'],
            'customer_email'    => $validated['customer_email'],
            'appointment_date'  => $validated['appointment_date'],
            'appointment_time'  => $validated['appointment_time'],
            'notes'             => $validated['notes'] ?? null,
            'total_price'       => $pricelist->price,
            'status'            => 'pending',
        ]);

        return redirect()
            ->route('appointments.payment', $appointment->id)
            ->with('success', 'Appointment berhasil dibuat. Silakan lanjut ke pembayaran.');
    }

    /**
     * Halaman pembayaran appointment.
     */
    public function payment($id)
{
    $appointment = \App\Models\Appointment::with('pricelist')->findOrFail($id);

    if ($appointment->user_id !== auth()->id()) {
        abort(403, 'Akses ditolak.');
    }

    return view('appointments.payment', compact('appointment'));
}


    /**
     * Konfirmasi kalau user udah kirim bukti pembayaran.
     */
    public function confirmPayment($id)
    {
        $appointment = Appointment::findOrFail($id);

        if ($appointment->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        $appointment->update([
            'payment_sent' => true,
            'status'       => 'waiting_confirmation',
        ]);

        return redirect()
            ->route('appointments.status', $appointment->id)
            ->with('success', 'Bukti pembayaran dikirim. Tunggu konfirmasi dari admin.');
    }

    /**
     * Lihat status appointment & pembayaran.
     */
    public function status($id)
    {
        $appointment = Appointment::with('pricelist')->findOrFail($id);

        if ($appointment->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        return view('appointments.status', compact('appointment'));
    }

    /**
     * Tampilkan semua appointment milik user login.
     */
    public function myAppointments()
    {
        $appointments = Appointment::with('pricelist')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('appointments.my-appointments', compact('appointments'));
    }
}

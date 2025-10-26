<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $appointments = Appointment::with(['user', 'pricelist'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.appointments.index', compact('appointments'));
    }

    public function confirm($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'confirmed']);

        return redirect()->back()->with('success', 'Appointment berhasil dikonfirmasi');
    }

    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Appointment berhasil dibatalkan');
    }
}
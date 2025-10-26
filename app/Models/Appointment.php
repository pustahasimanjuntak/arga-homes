<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pricelist_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'appointment_date',
        'appointment_time',
        'notes',
        'total_price',
        'status',
        'payment_sent'
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'appointment_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pricelist()
    {
        return $this->belongsTo(Pricelist::class);
    }
}
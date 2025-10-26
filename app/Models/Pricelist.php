<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricelist extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'description',
        'price',
        'duration',
        'is_active'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
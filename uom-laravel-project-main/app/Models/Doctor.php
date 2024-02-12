<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function doctor_specialization(): BelongsTo
    {
        return $this->belongsTo(DoctorSpecialization::class, 'specialization_id');
    }

    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    public function DoctorTimeSlots(): HasMany
    {
        return $this->hasMany(DoctorHasTimeSlot::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function MedicalBookings(): HasMany
    {
        return $this->hasMany(MedicalBooking::class);
    }
}

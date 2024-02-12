<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DoctorHasTimeSlot extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function time_slot(): BelongsTo
    {
        return $this->belongsTo(TimeSlot::class,'time_slot_id');
    }
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
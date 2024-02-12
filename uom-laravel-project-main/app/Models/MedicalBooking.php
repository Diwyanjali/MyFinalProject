<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MedicalBooking extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function TimeSlot(): BelongsTo
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function Prescription(): HasOne
    {
        return $this->hasOne(Prescription::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prescription extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function MedicalBooking(): BelongsTo
    {
        return $this->belongsTo(MedicalBooking::class);
    }

    public function PrescriptionDrugs(): HasMany
    {
        return $this->hasMany(PrescriptionDrug::class);
    }
}

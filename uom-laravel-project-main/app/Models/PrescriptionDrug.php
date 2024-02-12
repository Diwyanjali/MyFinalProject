<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrescriptionDrug extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function Prescription(): BelongsTo
    {
        return $this->belongsTo(Prescription::class);
    }

    public function Drug(): BelongsTo
    {
        return $this->belongsTo(Drug::class);
    }
}

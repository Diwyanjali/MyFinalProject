<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TreatmentBooking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Treatment(): BelongsTo
    {
        return $this->belongsTo(Treatment::class);
    }
}

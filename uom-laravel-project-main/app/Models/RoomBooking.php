<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomBooking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function TreatmentBookings(): HasMany
    {
        return $this->hasMany(TreatmentBooking::class);
    }
}

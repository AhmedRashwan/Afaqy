<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FuelEntry extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id', 'entry_date', 'volume', 'cost'];


    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}

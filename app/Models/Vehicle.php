<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'plate_number', 'imei', 'vin', 'year', 'license'];

    public function fuelEntries(): HasMany
    {
        return $this->hasMany(FuelEntry::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function insurancePayments(): HasMany
    {
        return $this->hasMany(InsurancePayment::class);
    }
}

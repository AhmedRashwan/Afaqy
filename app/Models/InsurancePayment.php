<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsurancePayment extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id', 'contract_date', 'expiration_date', 'amount'];
}

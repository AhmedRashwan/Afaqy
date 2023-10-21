<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FuelEntry;
use App\Models\InsurancePayment;
use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Vehicle::factory(10)->create();
        FuelEntry::factory(10)->create();
        Service::factory(10)->create();
        InsurancePayment::factory(10)->create();
    }
}

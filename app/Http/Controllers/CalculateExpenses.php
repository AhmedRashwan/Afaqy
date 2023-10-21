<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpensesRequest;
use App\Models\FuelEntry;
use App\Models\InsurancePayment;
use App\Models\Service;
use App\Utils\ExpensesFilter;
use Exception;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CalculateExpenses extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(ExpensesRequest $request)
    {

        try {
            $fuel_entries = FuelEntry::select(['cost', 'entry_date AS created_at', 'vehicle_id', 'vehicles.name AS vehicle_name', 'vehicles.plate_number'])->selectRaw("'fuel' as type")->leftJoin('vehicles', 'vehicles.id', '=', 'fuel_entries.vehicle_id');
            $insurance_payments = InsurancePayment::select(['amount AS cost', 'contract_date AS created_at', 'vehicle_id', 'vehicles.name AS vehicle_name', 'vehicles.plate_number'])->selectRaw("'insurance' as type")->leftJoin('vehicles', 'vehicles.id', '=', 'insurance_payments.vehicle_id');
            $services = Service::select(['total AS cost', 'services.created_at', 'vehicle_id', 'vehicles.name AS vehicle_name', 'vehicles.plate_number'])->selectRaw("'service' as type")->leftJoin('vehicles', 'vehicles.id', '=', 'services.vehicle_id');
            $query = $fuel_entries->union($insurance_payments)->union($services);

            $filteredQuery = ExpensesFilter::applyFilters($query, $request->all());

            return new StreamedResponse(function () use ($filteredQuery, $request) {
                return $filteredQuery->chunk(100, function ($vehicles) {
                    echo json_encode($vehicles);
                    flush();
                });

            }, 200, [
                'Content-Type' => 'application/json'
            ]);
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}

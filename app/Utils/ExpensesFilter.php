<?php

namespace App\Utils;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ExpensesFilter
{
    /**
     * Apply filters to the query.
     * @var Builder $query
     * @var array $filters
     */
    public static function applyFilters(Builder $query, array $filters = []): \Illuminate\Database\Query\Builder
    {
        $rows = DB::table(DB::raw("({$query->toSql()}) as t"))->mergeBindings($query->getQuery());

        // Search by "vehicle_name"
        if (isset($filters['search'])) {
            $rows->where('t.vehicle_name', 'like', '%' . $filters['search'] . '%');
        }

        // Filter by expense type(s)
        if (isset($filters['expense_types'])) {
            $expenseTypes = explode(',', $filters['expense_types']);
            $rows->whereIn('t.type', $expenseTypes); //TODO:: create enum for it and validate
        }

        // Filter by minimum cost
        if (isset($filters['min_cost'])) {
            $rows->where('t.cost', '>=', $filters['min_cost']);
        }

        // Filter by maximum cost
        if (isset($filters['max_cost'])) {
            $rows->where('t.cost', '<=', $filters['max_cost']);
        }

        // Filter by minimum creation date
        if (isset($filters['min_creation_date'])) {
            $rows->whereDate('t.created_at', '>=', $filters['min_creation_date']);
        }

        // Filter by maximum creation date
        if (isset($filters['max_creation_date'])) {
            $rows->whereDate('t.created_at', '<=', $filters['max_creation_date']);
        }
        
        $rows->orderBy($filters['sort_by'] ?? 't.created_at', $filters['sort_direction'] ?? 'asc');

        return $rows;
    }
}

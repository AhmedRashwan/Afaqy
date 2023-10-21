<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ExpensesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'vehicle_name' => 'string',
            'expense_types' => 'array|in:fuel,insurance,service',
            'min_cost' => 'numeric',
            'max_cost' => 'numeric',
            'min_creation_date' => 'date',
            'max_creation_date' => 'date',
            'sort_by' => 'string|in:cost,created_at',
            'sort_direction' => 'string|in:asc,desc',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'success' => false,
                'message' => 'Validation errors',
                'data' => $validator->errors(),
            ]
        ));
    }
}

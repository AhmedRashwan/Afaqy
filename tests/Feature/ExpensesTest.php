<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpensesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_endpoint_exist_and_return_response(): void
    {
        $response = $this->get('/api/expenses');

        $response->assertStatus(200);
    }

    public function test_return_validation_message_for_sorting(): void
    {
        $response = $this->get('/api/expenses?sort_by=invalid');

        $response->assertJson(['success' => false, 'message' => 'Validation errors']);
    }
}

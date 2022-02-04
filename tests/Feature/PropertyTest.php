<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Property;

class PropertyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_property()
    {
        $response = $this->json('post','api/property/show',['property_id'=>10]);

        //Write the response in laravel.log
        // \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\Education;
use \App\Models\User;

class EducationTest extends TestCase
{
   
    public function test_create_education()
    {
        // Create test data
        $educationData = Education::factory()->create(); // This generates data but doesn't save it to the database

        // Send a POST request to the endpoint with the test data
        $response = $this->post('/api/education', $educationData->toArray());

        

        // Assert the response status code
        $response->assertStatus(200);

        // Assert the response structure
        $response->assertJsonStructure([
            'success',
            'message',
            'data' => [
                'institution',
                'degree',
                'date-range',
                'user_id'
            ],
        ]);

        
        $response->assertJson([
            'success' => true,
            'message' => 'success',
        ]);

        $this->assertDatabaseHas('education', [
            'institution' => $educationData->institution,
            'degree' => $educationData->degree,
        ]);
    }

}

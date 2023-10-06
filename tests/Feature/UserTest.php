<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\User;

class UserTest extends TestCase
{
    

    public function test_for_add_user_with_valid_data(){

        // Create test data using factory
        //$userData = User::factory()->make(); // This generates data but doesn't save it to the database
        $userData = User::factory()->create(); 
        // Send a POST request to the store endpoint with the test data
        $response = $this->post('/api/users', $userData->toArray());

        // Assert the response status code
        $response->assertStatus(200);

        // Assert the response structure
        $response->assertJsonStructure([
            'success',
            'message',
            'data' => [
                'name',
                'title',
                'about',
                'phone',
                'email',
                'portfolio_url',
                'github_url',
                'linkedin_url'
            ],
        ]);

        //assert specific data in the response
        $response->assertJson([
            'success' => true,
            'message' => 'success',
        ]);

         // Assert that the user was created in the database
        $this->assertDatabaseHas('users', [
            'name' => $userData->name,
            'email' => $userData->email,
        ]);

        

    }


    public function testStoreWithInvalidData()
    {
        // Mock invalid request data (missing 'name' field)
        $data = [
            'title' => 'Developer',
            'about' => 'Lorem ipsum',
            'phone' => '1234567890',
            'email' => 'john@example.com',
            'portfolio_url' => 'https://example.com/portfolio',
            'github_url' => 'https://github.com/johndoe',
            'linkedin_url' => 'https://www.linkedin.com/in/johndoe',
        ];

        $response = $this->post('/api/users', $data);

        // Assert that the response indicates validation error
        $response->assertStatus(400);
        $response->assertJson([
            'success' => false,
            'message' => 'Validation error',
        ]);

        // Assert that the error messages for missing 'name' field are in the response
        $response->assertJsonValidationErrors(['name']);
    }

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

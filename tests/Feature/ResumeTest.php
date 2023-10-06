<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Education;
use App\Models\Skills;
use App\Models\Experiences;
use App\Models\Responsibilities;
use App\Models\Projects;
use App\Models\Stacks;

class ResumeTest extends TestCase
{
    use RefreshDatabase;

   public function test_resume_api(){


        // Create a user with associated data (education, skills, experiences, projects)
        $user = User::factory()->create();
        $education = Education::factory()->create(['user_id' => $user->id]);
        $skills = Skills::factory()->count(3)->create(['user_id' => $user->id]);
        $experience = Experiences::factory()->create(['user_id' => $user->id]);
        $responsibility = Responsibilities::factory()->count(2)->create(['experiences_id' => $experience->id]);
        $project = Projects::factory()->create(['user_id' => $user->id]);
        $stacks = Stacks::factory()->count(2)->create(['projects_id' => $project->id]);

        // Create a GET request to the getresume endpoint
        $response = $this->get('/api/getresume');

        $response->assertStatus(200);

        //dd($response->json());

        $response->assertJson([
            'success' => true,
            'message' => 'success',
        ]);

         // Assert that the user's resume data is in the response
         $response->assertJsonFragment([
            'name' => $user->name,
            'title' => $user->title,
            'about' => $user->about,
            'phone' => $user->phone,
            'email' => $user->email,
        ]);

        // Assert the structure of the "data" field
        /* $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'name',
                    'title',
                    'about',
                    'phone',
                    'email',
                    'education' => [
                        '*' => [
                            'institution',
                            'degree',
                            'date-range',
                            'user_id',
                        ],
                    ],
                    'skills' => ['*'],
                    'experiences' => [
                        '*' => [
                            'title',
                            'company',
                            'date-range',
                            'responsibilities' => ['*'],
                        ],
                    ],
                    'projects' => [
                        '*' => [
                            'name',
                            'url',
                            'description',
                            'repository',
                            'stacks' => ['*'],
                        ],
                    ],
                ],
            ],
        ]); */
        


        
   }
}

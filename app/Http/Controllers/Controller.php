<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \App\Models\User;


/**
 * @OA\Info(
 *     title="Laravel Resume API - Test-Driven Application",
 *     version="1.0.0",
 *     description="The Laravel Resume API is a web application developed using the Laravel framework and Laravel Sail for Docker-based development. This API allows users to create and manage their professional resumes. Additionally, it includes Swagger documentation for easy reference and interaction.",
 *     @OA\Contact(
 *         email="samson_ude@yahoo.com",
 *         name="Samson Ude"
 *     )
 * )
 * @OA\Tag(
 *     name="Laravel Resume API - Test-Driven Application",
 *     description="Laravel Resume API - Test-Driven Application"
 * )
 * @OA\Schema(
 *     schema="Resume",
 *     @OA\Property(property="name", type="string", example="Samson Ude"),
 *     @OA\Property(property="title", type="string", example="Senior Software Engineer | Mobile Developer | Full Stack Developer")
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    /**
     * @OA\Get(
     *     path="/api/getresume",
     *     summary="Get user's resume data",
     *     tags={"Resume"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="success"),
     *             @OA\Property(property="data", type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="name", type="string", example="John Doe"),
     *                     @OA\Property(property="title", type="string", example="Software Developer"),
     *                     @OA\Property(property="about", type="string", example="Experienced software developer."),
     *                     @OA\Property(property="phone", type="string", example="(123) 456-7890"),
     *                     @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *                     @OA\Property(property="education", type="array",
     *                         @OA\Items(
     *                             @OA\Property(property="institution", type="string", example="University of Example"),
     *                             @OA\Property(property="degree", type="string", example="Bachelor of Science"),
     *                             @OA\Property(property="date-range", type="string", example="2010 - 2014"),
     *                             @OA\Property(property="user_id", type="integer", example=1),
     *                         ),
     *                     ),
     *                     @OA\Property(property="skills", type="array",
     *                         @OA\Items(type="string", example="PHP"),
     *                     ),
     *                     @OA\Property(property="experiences", type="array",
     *                         @OA\Items(
     *                             @OA\Property(property="title", type="string", example="Software Developer"),
     *                             @OA\Property(property="company", type="string", example="Tech Inc."),
     *                             @OA\Property(property="date-range", type="string", example="2015 - Present"),
     *                             @OA\Property(property="responsibilities", type="array",
     *                                 @OA\Items(type="string", example="Developed web applications."),
     *                             ),
     *                         ),
     *                     ),
     *                     @OA\Property(property="projects", type="array",
     *                         @OA\Items(
     *                             @OA\Property(property="name", type="string", example="Project A"),
     *                             @OA\Property(property="url", type="string", example="https://example.com/project-a"),
     *                             @OA\Property(property="description", type="string", example="Description of Project A."),
     *                             @OA\Property(property="repository", type="string", example="https://github.com/user/project-a"),
     *                             @OA\Property(property="stacks", type="array",
     *                                 @OA\Items(type="string", example="Laravel"),
     *                             ),
     *                         ),
     *                     ),
     *                 ),
     *             ),
     *         ),
     *     ),
     * )
     */
    public function getresume(){

        $user = User::where("id", 1)
        ->with("education")
        ->with("skills")
        ->with(["experiences" => function ($query) {
            $query->with("responsibilities");
        }])
        ->with(["projects" => function ($query) {
            $query->with("stacks");
        }])
        ->get();

        $userData = $user->map(function ($user) {
            return [
                'name' => $user->name,
                'title' => $user->title,
                'about' => $user->about,
                'phone' => $user->phone,
                'email' => $user->email,
                'education' => $user->education,
                'skills' => $user->skills->pluck('name')->toArray(),
                'experiences' => $user->experiences->map(function ($experience) {
                    return [
                        'title' => $experience->title,
                        'company' => $experience->company,
                        'date-range' => $experience->date_range,
                        'responsibilities' => $experience->responsibilities->pluck('details')->toArray(),
                    ];
                }),
                'projects' => $user->projects->map(function ($project) {
                    return [
                        'name' => $project->name,
                        'url' => $project->url,
                        'description' => $project->description,
                        'repository' => $project->repository,
                        'stacks' => $project->stacks->pluck('name')->toArray(),
                    ];
                }),
            ];
        });

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $userData
        ]);

    }
}

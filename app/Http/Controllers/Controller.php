<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

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

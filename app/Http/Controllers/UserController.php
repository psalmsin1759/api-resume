<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'title' => 'required',
            'about' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'portfolio_url' => 'required',
            'github_url' => 'required',
            'linkedin_url' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 400);
        }

        $input = $validator->validated();
        $user = User::create($input);

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $user
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return response()->json([
            'success'   => true,
            'message'   => "success",
            "data" => $user
        ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return response()->json([
            'success'   => true,
            'message'   => "success",
        ]);
    }
}

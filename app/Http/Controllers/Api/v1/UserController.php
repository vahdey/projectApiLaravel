<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Resources\v1\User as UserResource;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // Validation Data
        $validData = $this->validate($request, [
           'email' => 'required|max:255|email',
           'password' => 'required'
        ]);

        // Check Login User
        if(! auth()->attempt($validData)) {
            return response([
                'data' => 'اطلاعات صحیح نیست',
                'status' => 'error'
            ],403);
        }

        return new UserResource(auth()->user());
    }

    public function register(Request $request)
    {
        // Validation Data
        $validData = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $validData['name'],
            'email' => $validData['email'],
            'password' => bcrypt($validData['password']),
        ]);

        return new UserResource($user);
    }
}

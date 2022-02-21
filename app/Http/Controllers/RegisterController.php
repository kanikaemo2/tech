<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PersonalRegisterRequest;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
 
    public function show()
    {
        return view('register_user');
    }

    public function register(PersonalRegisterRequest $request) 
    {
        $user = User::create($request->validated());

        event(new Registered($user));

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
   
}

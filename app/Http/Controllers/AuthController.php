<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('site.register');
    }

    public function register(Request $request)
    {
        $this->validateRegister($request);
        $user = $this->registerUser($request->all());
        Auth::login($user);
        return redirect()->route('index')->with('registered', true);
    }

    private function validateRegister(Request $request)
    {
        $request->validate([
            'first_name' => 'required|regex:/^[a-z]*$/|min:3|max:20',
            'last_name' => 'required|regex:/^[a-z]*$/|min:3|max:20',
            'email' => 'required|email:rfc,dns|unique:App\Models\User,email',
            'password' => 'bail|required|min:6|confirmed',
        ]);
    }

    private function registerUser(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => User::TYPE_CUSTOMER,
        ]);
    }
}

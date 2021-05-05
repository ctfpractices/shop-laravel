<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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
        return redirect()->route('index');
    }

    private function validateRegister(Request $request)
    {
        $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z]*$/|min:3|max:20',
            'last_name' => 'required|regex:/^[a-zA-Z]*$/|min:3|max:20',
            'email' => 'required|email:rfc,dns|unique:App\Models\User,email',
            'password' => 'bail|required|min:6|confirmed',
            'profile_path' => 'required|regex:/^[a-zA-Z]*$/|min:3|max:20|unique:App\Models\User,profile_path',
            'social_network_url' => 'required|url|unique:App\Models\User,social_network_url',
        ]);
    }

    private function registerUser(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile_path' => $data['profile_path'],
            'social_network_url' => $data['social_network_url'],
            'type' => User::TYPE_CUSTOMER,
        ]);
    }

    public function loginForm(Request $request)
    {
        return view('site.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $isLogin = $this->attemptLogin($request);
        if (!$isLogin) {
            return back()->withErrors('Login failed');
        }

        session()->regenerate();
        $user = auth()->user();
        $routeName = $user->type == User::TYPE_CUSTOMER ? 'index' : 'admin.index';
        return redirect()->route($routeName);
    }

    private function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns|exists:App\Models\User,email',
            'password' => 'required',
        ]);
    }

    private function attemptLogin($request)
    {
        return Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->has('remember_me'));
    }

    public function logout()
    {
        session()->invalidate();
        auth()->logout();
        return redirect()->route('index');
    }

    public function recoveryForm(Request $request)
    {
        return view('site.recovery');
    }

    public function recovery(Request $request)
    {
        $this->validateRecovery($request);
        $response = Password::broker()->sendResetLink($request->only('email'));
        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('sent', true);
        }
        return back()->withErrors('Please try again');
    }

    private function validateRecovery(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns|exists:App\Models\User,email',
        ]);
    }

    public function passwordResetForm(string $token, Request $request)
    {
        return view('site.password', [
            'token' => $token,
            'email' => $request->input('email'),
        ]);
    }

    public function passwordReset(Request $request)
    {
        $this->validateReset($request);

        $response = Password::broker()->reset(
            $request->only('token', 'email', 'password', 'password_confirmation'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return $response === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('passwordChanged', true)
            : back()->withErrors('Please try again');
    }

    private function validateReset(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'email' => 'required|email|exists:App\Models\User,email',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}

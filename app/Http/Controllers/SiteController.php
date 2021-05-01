<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function index()
    {
        return auth()->check() ? 'You are logged in <a href="' . route('logout') . '">[Logout]</a>' : 'You are visitor';
    }
}

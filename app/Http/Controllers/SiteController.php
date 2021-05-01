<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function index()
    {
        return auth()->check() ? 'You are customer' : 'You are visitor';
    }
}

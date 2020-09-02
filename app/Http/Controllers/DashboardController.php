<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('dashboard', compact('user'));
    }

    public function config()
    {
        $user = auth()->user();

        return view('config', compact('user'));
    }
}

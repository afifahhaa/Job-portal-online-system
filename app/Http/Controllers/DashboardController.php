<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect('/login')->with('error', 'You must be logged in to access the dashboard.');
    }
}
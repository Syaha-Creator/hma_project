<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $totalUsers = User::count();
        $activeUsers = User::where('status', 1)->count();

        return view('dashboard', compact('totalUsers', 'activeUsers'));
    }
}

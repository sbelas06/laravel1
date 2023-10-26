<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        if (Auth::user()->utype === 'ADM') {
            return view('admin.dashboard');
        }
        return view('user.dashboard');
    }
}

<?php

namespace App\Http\Controllers\Application\CMMS;
use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}

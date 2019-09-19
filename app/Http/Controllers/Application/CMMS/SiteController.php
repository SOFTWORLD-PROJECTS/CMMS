<?php

namespace App\Http\Controllers\Application\CMMS;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return redirect()->route('dashboard');
    }
}

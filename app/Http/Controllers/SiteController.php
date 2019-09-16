<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function index()
    {
        return redirect()->route('dashboard');
    }
}

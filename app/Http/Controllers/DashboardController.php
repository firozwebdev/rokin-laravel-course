<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        return view('pages.dashboard');
    }
    public function category ()
    {
        return view('pages.category');
    }
    public function product ()
    {
        return view('pages.product');
    }

}

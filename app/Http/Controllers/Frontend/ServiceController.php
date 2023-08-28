<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function s_category()
    {
        return view('frontend.services');
    }

    public function list()
    {
        return view('frontend.services');
    }

    public function details()
    {
        return view('frontend.services');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function p_category()
    {
        return view('frontend.products');
    }

    public function list()
    {
        return view('frontend.products');
    }

    public function details()
    {
        return view('frontend.products');
    }
}

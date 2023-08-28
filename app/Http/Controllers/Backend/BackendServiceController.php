<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendServiceController extends Controller
{
    public function s_category()
    {
        return view('backend.services');
    }
}

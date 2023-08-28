<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestingController extends Controller
{
    public function testing()
    {
        return view('backend.testing');
    }
}

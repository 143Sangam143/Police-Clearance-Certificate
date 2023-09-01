<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceList;

class ServiceController extends Controller
{
    public function s_category()
    {
        $services = service::get()->all();
        return view('frontend.services', compact('services'));
    }

    public function list($category)
    {
        $services = $category;
        $lists = servicelist::where('category',$category)->get()->all();
        if(!$lists){
            return redirect()->route('services')->with('message', 'Services will be avialable soon');
        }
        return view('frontend.services', compact('lists', 'services'));
    }

    public function details()
    {
        return view('frontend.services');
    }
}

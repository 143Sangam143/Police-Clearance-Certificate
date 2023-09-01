<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\ProductList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function p_category()
    {
        $products = Product::get()->all();
        return view('frontend.products', compact('products'));
    }

    public function list($category)
    {
        $products = $category;
        $lists = ProductList::where('category',$category)->get()->all();
        if(!$lists){
            return redirect()->route('products')->with('message', 'products will be avialable soon');
        }
        return view('frontend.products', compact('lists', 'products'));
    }

    public function details()
    {
        return view('frontend.products');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
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

    public function cart(Request $request, $products){
        $lists = ProductList::where('category', $products)->get()->all();
        if(Cart::exists()){
            $name = $request->name;
            if(Cart::where('item_name', $name)->exists()){
                return view('frontend.products', compact('lists','products'));
            }
            else{
                $carts = new Cart;
                $carts->item_name = $request->name;
                $carts->item_image = $request->image;
                $carts->price = $request->price;
                $carts->quantity = $request->quantity;
                $carts->save();
                return view('frontend.products', compact('lists','products'));
            }
        }
        else{

            $carts = new Cart;
            $carts->item_name = $request->name;
            $carts->item_image = $request->image;
            $carts->price = $request->price;
            $carts->quantity = $request->quantity;
            $carts->save();
            return view('frontend.products', compact('lists','products'));
        }
        
    }

    public function cartlist(){
        $carts = Cart::get()->all();
        return view('frontend.products', compact('carts'));
    }

    public function cartlist_delete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function checkout(){
        return view('frontend.products');
    }
}

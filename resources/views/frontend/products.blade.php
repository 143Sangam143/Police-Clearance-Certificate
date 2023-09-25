@extends('frontend.layouts.app')
@section('title')
    Products
    @if (\Route::current()->getName() == 'products.cartlist')
        Shopping
    @endif 
@endsection
@section('meta-content')
    @if (\Route::current()->getName() == 'products') 
        Category
    @elseif (\Route::current()->getName() == 'products.list')
        list
    @elseif (\Route::current()->getName() == 'products.cartlist')
        Cart
    @elseif (\Route::current()->getName() == 'products.checkout')
        Checkout
    @endif   
@endsection

@section('main')
    @if (\Route::current()->getName() == 'products') 
        @include('frontend.products.landing')
        @include('frontend.products.category')
    @elseif ((\Route::current()->getName() == 'products.list') || (\Route::current()->getName() == 'products.cart'))
        @include('frontend.products.landing')
        @include('frontend.products.list')
    @elseif (\Route::current()->getName() == 'products.cartlist')
        @include('frontend.products.cartlist')
    @elseif (\Route::current()->getName() == 'products.checkout')
        @include('frontend.products.checkout')
    @elseif (\Route::current()->getName() == 'products.list.details')
        @include('frontend.products.details')
    @endif
@endsection
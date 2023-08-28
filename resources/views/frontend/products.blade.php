@extends('frontend.layouts.app')
@section('title')
    Products
@endsection
@section('meta-content')
    @if (\Route::current()->getName() == 'products') 
        Category
    @elseif (\Route::current()->getName() == 'products.list')
        list
    @elseif (\Route::current()->getName() == 'products.list.details')
        details
    @endif   
@endsection

@section('main')
    @if (\Route::current()->getName() == 'products') 
        @include('frontend.products.landing')
        @include('frontend.products.category')
    @elseif (\Route::current()->getName() == 'products.list')
        @include('frontend.products.list')
    @elseif (\Route::current()->getName() == 'products.list.details')
        @include('frontend.products.details')
    @endif
@endsection
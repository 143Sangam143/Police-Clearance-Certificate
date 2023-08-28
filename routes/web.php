<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ServiceController;

use App\Http\Controllers\Backend\TestingController;
use App\Http\Controllers\Backend\BackendHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/******************************* Public Routes ****************************************/ 
Route::get('/', function () {
    return view('home');
})->name('home');
route::get('/home', [HomeController::class, 'userfront']);


/******************************* User Routes ****************************************/ 
route::group(["middleware" => 'not-admin'], function() {
    route::get('/', [HomeController::class, 'index'])->name('home');
    route::get('/about', [HomeController::class, 'about'])->name('about');
    route::group(['prefix' => 'products'], function () {
        route::get('/', [ProductController::class, 'p_category'])->name('products');
        route::get('/list', [ProductController::class, 'list'])->name('products.list');
        route::get('/list/details', [ProductController::class, 'details'])->name('products.list.details');
    });
    route::group(['prefix' => 'services'], function () {
        route::get('/', [ServiceController::class, 's_category'])->name('services');
        route::get('/list', [ServiceController::class, 'list'])->name('services.list');
        route::get('/list/details', [ServiceController::class, 'details'])->name('services.list.details');
    });
    route::get('/contact-us', [HomeController::class, 'contact'])->name('contact-us');
});

/******************************* Admin Routes ****************************************/ 
route::group(['middleware' => 'admin', 'prefix' => 'backend'], function() {
    route::get('/testing', [TestingController::class, 'testing'])->name('backend.testing');
    route::get('/home', [BackendHomeController::class, 'index'])->name('backend.home');
});

/******************************* Extra Routes ****************************************/ 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/******************************* Routes Ends ****************************************/ 
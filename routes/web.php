<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Mail\OrderEndingSoon;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\StudentController;





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

// Home page route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Test routes
Route::get('/test', function () {
    return view('test');
});
Route::get('/testo', function () {
    return view('main');
});
Route::get('/hh', function () {
    return view('hh');
});

// Product routes
Route::get('/', [ProductController::class, 'index']);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::resource('products', ProductController::class);

Route::get('/products/{id}/create-info', [ProductController::class, 'createProductInfo'])->name('productinfo.create');
Route::post('/products/{id}/store-info', [ProductController::class, 'storeProductInfo'])->name('productinfo.store');
Route::get('/products/{product}/info/{info}/edit', [ProductController::class, 'editProductInfo'])->name('productinfo.edit');
Route::put('/products/{product}/info/{info}', [ProductController::class, 'updateProductInfo'])->name('productinfo.update');
Route::delete('{product}/info/{info}', 'ProductController@destroyProductInfo')->name('productinfo.destroy');
Route::delete('products/{product}/info/{info}', [ProductController::class, 'destroyProductInfo'])->name('productinfo.destroy');

// order routes
Route::resource('orders', OrderController::class);
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');



//mail test
Route::get('/test-email', function () {
    $order = \App\Models\Order::first(); // Get a sample order
    Mail::to('ilyashilane@gmail.com')->send(new OrderEndingSoon($order));
    return 'Test email sent!';
});


Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');


// Include authentication routes
require __DIR__.'/auth.php';

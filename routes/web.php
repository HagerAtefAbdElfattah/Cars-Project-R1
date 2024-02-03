<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\IndexController;

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

Route::get('/', function () {
    return view('welcome');
});

// --------------------------Pages----------------------------------------

Route::get('/index', [IndexController::class, 'index'])->name('index');
Route::get('/singleCar/{id}', [IndexController::class, 'singleCar'])->name('singleCar');
Route::get('/listing', [IndexController::class, 'listing'])->name('listing');
Route::get('/testimonials', [IndexController::class, 'testimonials'])->name('testimonials');
Route::get('/blog', [IndexController::class, 'blog'])->name('blog');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');

// -----------------------------------------------------------------------
Route::get('404', function () {
    return view('404');
})->name('404');

// -------------------------insert messages into database-----------------

Route::post('/storeMessages', [MessageController::class, 'store'])->name('storeMessages');

// -----------------------------------------------------------------------

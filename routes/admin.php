<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Auth;


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
Route::prefix('admin')->middleware('verified', 'notify')->group(function(){

    Route::get('/index',[UserController::class, 'index'])->name('adminIndex');

            Route::prefix('users')->group(function(){
                Route::get('/addUser',[UserController::class,'create'])->name('addUser');
                Route::post('/storeUser', [UserController::class, 'store'])->name('storeUser');
                Route::get('/editUser/{id}', [UserController::class, 'edit'])->name('editUser');
                Route::put('/updateUser/{id}', [UserController::class, 'update'])->name('updateUser');
            });

            Route::prefix('categories')->group(function () {
                Route::get('/categoriesList', [ CategoryController::class, 'index'])->name('categoriesList');
                Route::get('/addCategory', [CategoryController::class, 'create'])->name('addCategory');
                Route::post('/storeCategory', [CategoryController::class, 'store'])->name('storeCategory');
                Route::get('/editCategory/{id}', [CategoryController::class, 'edit'])->name('editCategory');
                Route::put('/updeteCategory/{id}', [CategoryController::class, 'update'])->name('updateCategory');
                Route::get('/deleteCategory/{id}', [CategoryController::class, 'destroy'])->name('deleteCategory');

            });

            Route::prefix('car')->group(function () {
                Route::get('/carsList', [CarController::class, 'index'])->name('carsList');
                Route::get('/addCar', [CarController::class, 'create'])->name('addCar');
                Route::post('/storeCar', [CarController::class, 'store'])->name('storeCar');
                Route::get('/editCar/{id}', [CarController::class, 'edit'])->name('editCar');
                Route::put('/updateCar/{id}', [CarController::class, 'update'])->name('updateCar');
                Route::get('/deleteCar/{id}', [CarController::class, 'destroy'])->name('deleteCar');
            });

            Route::prefix('testimonials')->group(function () {
                Route::get('/testimonialsList', [TestimonialController::class, 'index'])->name('testimonialsList');
                Route::get('/addTestimonial', [TestimonialController::class, 'create'])->name('addTestimonial');
                Route::post('/storeTestimonial', [TestimonialController::class, 'store'])->name('storeTestimonial');
                Route::get('/editTestimonial/{id}', [TestimonialController::class, 'edit'])->name('editTestimonial');
                Route::put('/updateTestimonial/{id}', [TestimonialController::class, 'update'])->name('updateTestimonial');
                Route::get('/deleteTestimonial/{id}', [TestimonialController::class, 'destroy'])->name('deleteTestimonial');
            });

            Route::prefix('messages')->group(function () {
                Route::get('/messagesList', [MessageController::class, 'index'])->name('messagesList');
                Route::get('/showMessages/{id}', [MessageController::class, 'show'])->name('showMessages');
                Route::get('/deleteMessages/{id}', [MessageController::class, 'destroy'])->name('deleteMessages');
            });

            Route::prefix('notifications')->group(function () {
                Route::get('/notification/{id}', [NotificationController::class, 'notification'])->name('notification');
                Route::get('/allNotification', [NotificationController::class, 'allNotification'])->name('allNotification');
               
    });

    });

Auth::routes(['verify' => true]);

Route::get('/home', function () {

    return view('home');

})->name('home');
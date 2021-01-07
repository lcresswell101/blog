<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function()
{
    Route::get('/dashboard', function () {
       return Inertia\Inertia::render('Dashboard');
    })->name('dashboard');

    // POSTS
    Route::resource('/post', PostController::class);

    // IMAGES
    Route::delete('/image/{image}', [ImageController::class, 'destroy'])->name('image.destroy');

    // USERS
    Route::resource('/user', UserController::class);
    Route::post('/user/{post}/favourite_{type}', [UserController::class, 'favourite'])->name('user.favourite');
});

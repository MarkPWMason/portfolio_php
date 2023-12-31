<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'homePage'])->name('homePage');

Route::get('/admin', [PageController::class, 'adminPage'])->name('admin');
Route::post('/adminLogin', [AdminController::class, 'adminLogin'])->name('adminLogin')->middleware('throttle:10,1');
Route::post('/adminLogout', [AdminController::class, 'adminLogout'])->name('adminLogout')->middleware('mustBeLoggedIn');

Route::get('/create-post', [PageController::class, 'createPost'])->name('create-post')->middleware('mustBeLoggedIn');
Route::post('/publish-post', [PostController::class, 'publishPost'])->name('publish-post')->middleware('mustBeLoggedIn');

//Access images
Route::get('image/{fileName}', [ImageController::class, 'getImage'])->name('image');
Route::get('video/{fileName}', [VideoController::class, 'getVideo'])->name('video');

Route::get('/post/{id}', [PostController::class, 'showPost'])->name('showPost');
// ->middleware('mustBeLoggedIn') -- this will be added to the routes that need to be logged in.

Route::get('/contact', [PageController::class, 'contactMe'])->name('contactMe');

Route::get('/cv', [PageController::class, 'cv'])->name('cv');

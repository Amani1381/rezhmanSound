<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SlideController;

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
Route::prefix('admin')->group(function (){
   Route::get('/login',[LoginController::class,'Index'])->name('login-form');
   Route::get('/register',[RegisterController::class,'Register'])->name('register-form');
   Route::post('/login/owner',[LoginController::class,'Login'])->name('admin.login');
   Route::get('/dashboard',[AdminController::class,'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::post('logout', [LoginController::class, 'Logout'])->name('admin-logout');
    Route::post('/register/owner', [RegisterController::class, 'Registertion'])->name('registertion');
<<<<<<< HEAD
    Route::get('/addcategory',[CategoryController::class,'index']);
    Route::get('/addslide',[SlideController::class,'index']);
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category-form');
    Route::Patch('/category/update/{id}',[CategoryController::class,'update'])->name('categories-uniform');
=======

    Route::get('/categories',[CategoryController::class,'Create'])->name('category-form');
    Route::post('categories/index',[CategoryController::class,'Store'])->name('category-uniform');
>>>>>>> 511f35bd85ef7a55c6b43d4739febe1b7e164e75
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

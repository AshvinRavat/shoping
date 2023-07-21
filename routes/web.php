<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\ImageCropperController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('login', [LoginController::class, 'index'])->name('login_index')->middleware('guest');
    Route::post('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
         Route::get('/', function () {
            return view('admin.index');
        })->name('index');


        Route::controller(AdminProfileController::class)->group(function () {
            Route::get('profile', 'index')->name('profile_index');
            Route::post('profile', 'profileUpdate')->name('profile_update');
            Route::post('password-update', 'updatePassword')->name('password_update');
        });


        Route::prefix('product/')->name('product.')->controller(ProductController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{product}', 'edit')->name('edit');
            Route::post('update/{product}', 'update')->name('update');
        });
    });
});


Route::get('/', [ImageCropperController::class,'index'])->name('welcome');
Route::post('/store', [ImageCropperController::class,'cropImageUploadAjax'])->name('store');


Route::get('/image', [ImageCropperController::class,'index'])->name('welcome');
Route::post('/', [ImageCropperController::class,'upload'])->name('upload');
Route::post('/session', [ImageCropperController::class,'sessionData'])->name('session_data');


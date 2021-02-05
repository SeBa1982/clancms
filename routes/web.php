<?php

use App\Http\Controllers\Admin\Post\CategoriesController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('admin')->middleware('can:manage-users')->group(function(){
    Route::resource('users', UsersController::class, ['except' => ['show', 'create', 'store']]);
    Route::resource('categories', CategoriesController::class);
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

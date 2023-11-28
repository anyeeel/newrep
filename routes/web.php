<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResolutionsController;

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

Auth::routes();

// user dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin dashboard
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
// Route::get('/admin/home/{category?}', [ResolutionsController::class, 'index'])->name('admin.home')->middleware('is_admin');

Route::get('resolutions', [App\Http\Controllers\ResolutionsController::class, 'index'])->name('resolutions.index');
Route::get('resolutions/create', [App\Http\Controllers\ResolutionsController::class, 'create'])->name('resolutions.create');
Route::post('resolutions', [App\Http\Controllers\ResolutionsController::class, 'store'])->name('resolutions.store');
Route::get('/resolutions/{resolution}/edit', [ResolutionsController::class, 'edit'])->name('resolutions.edit');
Route::delete('/resolutions/{resolution}', [ResolutionsController::class, 'destroy'])->name('resolutions.destroy');
Route::get('/resolutions/{resolution}', [ResolutionsController::class, 'show'])->name('resolutions.show');
// Route::get('/resolutions/dashboard/{category?}', [ResolutionsController::class, 'dashboard'])->name('admin.home');
// Route::get('/user/dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');

Route::resource('resolutions', ResolutionsController::class);

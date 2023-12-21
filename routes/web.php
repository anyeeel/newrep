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


Route::get('resolutions', [App\Http\Controllers\ResolutionsController::class, 'index'])->name('resolutions.index');
Route::get('resolutions/create', [App\Http\Controllers\ResolutionsController::class, 'create'])->name('resolutions.create');
Route::post('resolutions', [App\Http\Controllers\ResolutionsController::class, 'store'])->name('resolutions.store');
Route::get('/resolutions/{resolution}/edit', [ResolutionsController::class, 'edit'])->name('resolutions.edit');
Route::put('/resolutions/{resolution}', [ResolutionsController::class, 'update'])->name('resolutions.update');
Route::delete('/resolutions/{resolution}', [ResolutionsController::class, 'destroy'])->name('resolutions.destroy');
Route::get('/resolutions/{id}', [ResolutionsController::class, 'show'])->name('resolutions.show');

Route::resource('resolutions', ResolutionsController::class);

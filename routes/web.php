<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/dashboard', function () {
    $users = DB::table('users')->get();
    return view('dashboard', compact('users'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/category/all', [CategoryController::class, 'index'])->name('all.category');
    Route::post('/category/add', [CategoryController::class, 'addCategory'])->name('store.category');
    Route::get('/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/softdelete/category/delete/{id}', [CategoryController::class, 'softDelete'])->name('softdelete.category');


    // all brands
    Route::get('/brands/all', [BrandController::class, 'allBrands'])->name('all.brands');
    Route::post('/brands/addBrands', [BrandController::class, 'addBrads'])->name('store.brands');


});

require __DIR__.'/auth.php';

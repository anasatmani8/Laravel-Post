<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
 
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
Route::get('/', 'HomeController@index')->name('home2');
Route::get('/logout', [HomeController::class,'index'])->name('home');
Route::get('/post/{id}', [HomeController::class,'show'])->name('post.show');
Route::get('/create/post', [HomeController::class,'create'])->name('post.create');
Route::post('/create/store', 'HomeController@store')->name('post.store');
Route::get('/edit/post/{slug}', [HomeController::class, 'edit'])->name('post.edit');
Route::put('/update/post/{slug}', [HomeController::class, 'update'])->name('post.update');
Route::delete('/delete/post/{slug}', [HomeController::class, 'delete'])->name('post.delete');



Route::middleware([
    'auth:sanctum',
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    });
});

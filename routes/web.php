<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;


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

Route::get('/', [MainController::class, 'main'])->name('site.main');
Route::get('/about', [AboutController::class, 'about'])->name('site.about');
Route::get('/contact', [ContactController::class, 'contact'])->name('site.contact');


Route::get('/login', function(){ return 'login';})->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clients', function(){ return 'clients';})->name('app.clients');
    Route::get('/providers', function(){ return 'providers';})->name('app.providers');
    Route::get('/products', function(){ return 'products';})->name('app.products');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
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

Route::get('/', [MainController::class, 'main'])->name('site.main')->middleware('log.acesso');
Route::get('/about', [AboutController::class, 'about'])->name('site.about');
Route::get('/contact', [ContactController::class, 'contact'])->name('site.contact');
Route::post('/contact', [ContactController::class, 'contact'])->name('site.contact');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::prefix('/app')->group(function(){
    
    Route::middleware(['autenticacao:padrao, visitante'])->group(function () {
        
        Route::get('/home', [HomeController::class, 'index'])->name('app.home');
        Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
        Route::get('/client', [ClientController::class, 'index'])->name('app.client');
        
        //fornecedor stack
        Route::get('/provider', [ProviderController::class, 'index'])->name('app.provider');
        Route::post('/provider/list', [ProviderController::class, 'list'])->name('app.provider.list');
        Route::get('/provider/list', [ProviderController::class, 'list'])->name('app.provider.list');
        Route::get('/provider/add', [ProviderController::class, 'add'])->name('app.provider.add');
        Route::post('/provider/add', [ProviderController::class, 'add'])->name('app.provider.add');
        Route::get('/provider/edit/{id}/{msg?}', [ProviderController::class, 'edit'])->name('app.provider.edit');
        Route::get('/provider/delete/{id}', [ProviderController::class, 'delete'])->name('app.provider.delete');
        
        //products
        Route::resource('product', ProductController::class);

        //product details

        Route::resource('product_details', ProductDetailController::class);

    
    });

});
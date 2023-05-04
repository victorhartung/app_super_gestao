<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ClientController;



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

        Route::resource('product-detail', ProductDetailController::class);

        Route::resource('/client', ClientController::class);

        Route::resource('/order', OrderController::class);

        Route::get('/order-product/create/{pedido}', [OrderProductController::class, 'create'])->name('order-product.create');
        Route::post('/order-product/store/{pedido}', [OrderProductController::class, 'store'])->name('order-product.store');
        Route::delete('order-product.destroy/{pedidoProduto}/{pedido_id}', [OrderProductController::class,'destroy'])->name('order-product.destroy');

    });

});


Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});
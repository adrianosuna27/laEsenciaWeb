<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CestaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Models\Producto;
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
    $pro = Producto::all();
    $url = 'storage/img/';
    return view('home')->with('productos', $pro)->with("url", $url);
});

Route::get('catalogo', function () {
    $pro = Producto::all();
    $url = 'storage/img/';
    return view('catalogo')->with('productos', $pro)->with("url", $url);
});

Auth::routes(['verify' => true]);

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/home', HomeController::class);
    Route::resource('/cesta', CestaController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/pedidos', PedidoController::class);
    Route::resource('/producto', ProductoController::class);
    Route::resource('/catalogo', CatalogoController::class);

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

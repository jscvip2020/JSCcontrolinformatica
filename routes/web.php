<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Auth::routes();
Auth::routes(['register' => false]);
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function (){
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class, ['except' => ['show']]);

    Route::resource('clientes', ClienteController::class);
    Route::resource('fornecedores', FornecedorController::class);
    Route::resource('marcas', MarcaController::class, ['except' => ['show']]);
    Route::resource('equipamentos', EquipamentoController::class, ['except' => ['show']]);
    Route::resource('fabricantes', FabricanteController::class, ['except' => ['show']]);
    Route::resource('produtos', ProdutoController::class);
    Route::get('produtos/{id}/{status}', [ProdutoController::class,'status'])->name('produtos.status');
    Route::resource('servicos', ServicoController::class,['except' => ['show','create']]);
    Route::get('servicos/{id}/{status}', [ServicoController::class,'status'])->name('servicos.status');
});

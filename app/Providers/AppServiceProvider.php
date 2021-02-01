<?php

namespace App\Providers;

use App\Models\client;
use App\Models\Equipamento;
use App\Models\Fabricante;
use App\Models\Fornecedor;
use App\Models\Marca;
use App\Models\Produto;
use App\Models\Servico;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        if (Schema::hasTable('roles')) {
            $roles = count(Role::all());
            view()->share('rolesAll', $roles);
        }
        if (Schema::hasTable('users')) {
            $users = count(User::all());
            view()->share('users', $users);
        }
        if (Schema::hasTable('permissions')) {
            $permissions = count(Permission::all());
            view()->share('permissionsAll', $permissions);
        }
        if (Schema::hasTable('clients')) {
            $clientes = count(Client::all());
            view()->share('clientesAll', $clientes);
        }
        if (Schema::hasTable('fornecedors')) {
            $fornecedores = count(Fornecedor::all());
            view()->share('fornecedoresAll', $fornecedores);
        }
        if (Schema::hasTable('marcas')) {
            $marcas = count(Marca::all());
            view()->share('marcasAll', $marcas);
        }
        if (Schema::hasTable('equipamentos')) {
            $equipamentos = count(Equipamento::all());
            view()->share('equipamentosAll', $equipamentos);
        }
        if (Schema::hasTable('fabricantes')) {
            $fabricantes = count(Fabricante::all());
            view()->share('fabricantesAll', $fabricantes);
        }
        if (Schema::hasTable('produtos')) {
            $produtos = count(Produto::all());
            view()->share('produtosAll', $produtos);
        }
        if (Schema::hasTable('servicos')) {
            $servicos = count(Servico::all());
            view()->share('servicosAll', $servicos);
        }
    }
}

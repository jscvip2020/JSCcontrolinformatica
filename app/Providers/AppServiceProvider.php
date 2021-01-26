<?php

namespace App\Providers;

use App\Models\client;
use App\Models\Fornecedor;
use App\Models\Marca;
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

        $users = count(User::all());
        $roles = count(Role::all());
        $permissions = count(Permission::all());
        $clientes = count(Client::all());
        $fornecedores = count(Fornecedor::all());
        $marcas = count(Marca::all());
        view()->share('rolesAll', $roles);
        view()->share('users', $users);
        view()->share('permissionsAll', $permissions);
        view()->share('clientesAll', $clientes);
        view()->share('fornecedoresAll', $fornecedores);
        view()->share('marcasAll', $marcas);
    }
}

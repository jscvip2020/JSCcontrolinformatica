<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//      \App\Models\User::factory(10)->create();
//      \App\Models\Marca::factory(10)->create();
//      \App\Models\Fornecedor::factory(10)->create();
//      \App\Models\Equipamento::factory(10)->create();
      \App\Models\Produto::factory(25)->create();
    }
}

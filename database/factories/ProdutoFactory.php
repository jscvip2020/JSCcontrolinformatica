<?php

namespace Database\Factories;

use App\Models\Fabricante;
use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $valor_custo = $this->faker->randomFloat(2, 10, 50);
        $perc_lucro = $this->faker->numberBetween(0,3);
        $valor_final = $valor_custo +($valor_custo * $perc_lucro / 100);
        return [
            'codbarra' => $this->faker->ean13,
            'condicao' => $this->faker->randomElement(['Novo', 'Usado']),
            'nome' => $this->faker->word(2),
            'descricao' => $this->faker->text(10),
            'qtd' => $this->faker->randomNumber(2),
            'valor_custo' => $valor_custo,
            'perc_lucro' => $perc_lucro,
            'valor_final' => $valor_final,
            'fornecedor_id' => Fornecedor::pluck('id')[$this->faker->numberBetween(1,Fornecedor::count()-1)],
            'fabricante_id' => Fabricante::pluck('id')[$this->faker->numberBetween(1,Fabricante::count()-1)],
            'min_estoque' => $this->faker->numberBetween(3,10),
            'status' => 1,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Equipamento;
use App\Models\Marca;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipamento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'marca_id' => Marca::pluck('id')[$this->faker->numberBetween(1,Marca::count()-1)],
            'nome' => $this->faker->name,
            'modelo' => $this->faker->randomNumber(9),
            'descricao' => $this->faker->text(20)
        ];
    }
}

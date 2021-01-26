<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class FornecedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fornecedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'razaosocial' => $this->faker->company . $this->faker->companySuffix,
            'nomefantasia' => $this->faker->company,
            'cnpj' => $this->faker->unique()->cnpj,
            'inscricao' => $this->faker->numerify('###.###.###'),
            'contato' => $this->faker->name,
            'endereco' => $this->faker->streetAddress,
            'cep' => $this->faker->postcode,
            'bairro' => $this->faker->locale,
            'cidadeuf' => $this->faker->city . '-' . $this->faker->stateABBR,
            'celular' => $this->faker->cellphone,
            'whatsapp' => $this->faker->phoneNumber,
            'fixo' => $this->faker->phoneNumber,
            'skype' => '@'.$this->faker->unique()->sentence(1),
            'email' => $this->faker->unique()->companyEmail,
        ];
    }
}

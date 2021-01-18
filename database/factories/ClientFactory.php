<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->unique()->name,
            'razaosocial' => '',
            'nomefantasia' => '',
            'endereco' => $this->faker->streetAddress,
            'cep' => $this->faker->postcode,
            'bairro' => $this->faker->locale,
            'cidadeuf' =>$this->faker->city.'-'.$this->faker->stateABBR,
            'celular' => $this->faker->cellphone,
            'whatsapp' => $this->faker->phoneNumber,
            'fixo' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'pessoa' => 'Fisica',
            'cpf' => $this->faker->unique()->cpf,
            'cnpj' => '',
            'inscricao' =>''
        ];
    }
}

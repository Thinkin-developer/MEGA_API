<?php

namespace Database\Factories;

use App\Models\Contrat;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contrat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'energy' => $this->stringGenerator(10, false),
            'product' => $this->stringGenerator(10, false),
            'gsm' => '04' . rand(10000000, 99999999),
            'duration' => rand(12, 356),
            'codePromo' => $this->stringGenerator(12),
            'client_id' => rand(1, 50),
        ];
    }

    function stringGenerator($longueur = 10, $acceptNum = true)
    {
        if($acceptNum)
            $caracteres = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        else
            $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $longueurMax = strlen($caracteres);
        $chaineAleatoire = '';
        for ($i = 0; $i < $longueur; $i++)
        {
            $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        return $chaineAleatoire;
    }
}

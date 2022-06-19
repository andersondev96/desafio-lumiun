<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'type_category' => $this->faker
                ->randomElement(
                    $array = array(
                        'Genéricos',
                        'Cidades',
                        'Universidades',
                        'Pessoas físicas',
                        'Profissionais liberais',
                        'Pessoas jurídicas'
                    )),

            'name' => $this->faker->unique()
                ->randomElement(
                    $array = array(
                        'app.br',
                        'art.br',
                        'com.br',
                        'dev.br',
                        'eco.br',
                        'emp.br',
                        'log.br',
                        'net.br',
                        'ong.br',
                        'seg.br',
                        'tec.br',
                        'edu.br',
                        'blog.br',
                        'flog.br',
                        'nom.br',
                        'vlog.br',
                        'wiki.br',
                        'adm.br',
                        'adv.br',
                        'arq.br',
                        'ato.br'
                    )
                ),
            'description' => $this->faker->text($maxNbChars = 50)
        ];
    }
}

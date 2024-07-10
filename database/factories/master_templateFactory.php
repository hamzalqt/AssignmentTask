<?php

namespace Database\Factories;

use App\Models\master_template;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\master_template>
 */
class master_templateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $model =new master_template();
        return [
            'type'=>fake()->randomElement(['Single','Multi']),
            'size'=>fake()->numberBetween(1,100),
            'serial'=>fake()->numberBetween(1,10000),
            'method'=>fake()->randomElement(['m1','m2','m3','m4','m5','m6','m7','m8']),
            'master'=>1,
            'uid'=>$model->uid,
        ];
    }
}

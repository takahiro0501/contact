<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'gender' => $this->faker->numberBetween(1,2),
            'email' =>$this->faker->safeEmail(),
            'postcode' =>$this->faker->postcode(),
            'address' => mb_substr($this->faker->address(), 9),
            'building_name' =>$this->faker->sentence(2,true),
            'opinion' =>$this->faker->realText(50)
        ];
    }
}

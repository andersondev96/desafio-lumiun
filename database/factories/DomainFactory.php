<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class DomainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'domain_id' => $this->faker->unique()->randomNumber($nbDigits = 9, $strict = false),
            'name' => $this->faker->unique()->domainWord(),
            'description' => $this->faker->text($maxNbChars = 50),
            'url' => $this->faker->unique()->url(),
            'server_name' => $this->faker->ipv4(),
            'organization_name' => $this->faker->company(),
            'email_organization' => $this->faker->email(),
            'phone_organization' => $this->faker->phoneNumber(),
            'category_id' => Category::factory(),
            'expiration_date' => date($format = 'Y-m-d', $max = null)
        ];
    }
}

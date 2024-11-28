<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "name"=> "Sadnur Islam",
            "email"=> "sadnurislam2003@gmail.com",
            "phone"=> "01705851075",
            "role"=> "admin",
            "added_by"=> "admin",
            "password"=> Hash::make("sadnur"),
            "username"=> "sadnur",
        ];
    }
}

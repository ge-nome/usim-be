<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'mat_no' => "2019/".fake()->numberBetween(10,15),
            'surname' => fake()->lastName(),
            'firstname' => fake()->firstName(),
            'othername' => fake()->userName(),
            'dob' => fake()->date(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'school_id' => fake()->numberBetween(1, 6),
            'course_id' => fake()->numberBetween(1, 5),
            'level_id' => fake()->numberBetween(1, 4),
            'status' => 1,
            'qr_hash' =>bcrypt($this->mat_no),
            'passport' => fake()->image(),
            //
        ];
    }
}

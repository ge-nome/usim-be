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
            'mat_no' => Str::random(10),
            'surname' => fake()->name(),
            'firstname' => fake()->name(),
            'othername' => fake()->name(),
            'dob' => fake()->date(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'school_id' => 1,
            'course_id' => 1,
            'level_id' => 1,
            'status' => 1,
            'passport' => fake()->address() ,
            //
        ];
    }
}

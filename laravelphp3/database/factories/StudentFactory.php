<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        // Tạo 1 cái khuôn để dữ liệu củ mình đẩy lên đúng cái khôn mà mk đã chọn
        return [
            "name"=>$this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'date_of_birth'=> fake()->date(),
            'status'=>1
        ];
    }
}

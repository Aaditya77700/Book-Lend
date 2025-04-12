<?php

// database/factories/BookFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        $copies = $this->faker->numberBetween(2, 10);

        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'isbn' => $this->faker->unique()->isbn13(),
            'total_copies' => $copies,
            'available_copies' => $copies,
            'description' => $this->faker->paragraph(),
            'cover_image' => 'default.jpg', // handle file upload later
            'is_active' => true,
        ];
    }
}

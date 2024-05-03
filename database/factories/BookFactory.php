<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'publisher' => fake()->company(),
            'title' => fake()->sentence(rand(5,10)),
            'summary' => fake()->paragraph(50),
        ];
    }

    /**
     * Indicate that the book has authors.
     *
     * @param  int  $count
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function hasAuthors($count = 1)
    {
        return $this->afterCreating(function (Book $book) use ($count) {
            $authors = Author::inRandomOrder()->limit($count)->get();
            $book->authors()->attach($authors);
        });
    }
}

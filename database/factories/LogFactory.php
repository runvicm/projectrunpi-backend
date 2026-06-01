<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Model>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        $status = fake()->randomElement(['draft', 'published', 'archived']);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'overview' => fake()->paragraph(),
            'content' => '
                <h2>Introduction to the Topic</h2>
                <p>' . fake()->paragraph(4) . '</p>
                <p>' . fake()->paragraph(3) . '</p>

                <h3>Key Considerations</h3>
                <ul>
                    <li>' . fake()->sentence() . '</li>
                    <li>' . fake()->sentence() . '</li>
                    <li>' . fake()->sentence() . '</li>
                </ul>

                <blockquote>' . fake()->sentence(12) . '</blockquote>

                <h3>Implementation Details</h3>
                <p>' . fake()->paragraph(5) . '</p>
                <ol>
                    <li>' . fake()->sentence() . '</li>
                    <li>' . fake()->sentence() . '</li>
                    <li>' . fake()->sentence() . '</li>
                </ol>

                <p>Use <code>php artisan migrate</code> to run migrations. ' . fake()->paragraph(2) . '</p>

                <p>' . fake()->paragraph(4) . '</p>
                ',
            'status' => $status,
            'view_count' => fake()->numberBetween(0, 10000),
            'published_at' => $status === 'published' ? fake()->dateTimeBetween('-1 year', 'now') : null,
        ];
    }
}

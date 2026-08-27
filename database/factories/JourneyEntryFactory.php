<?php

namespace Database\Factories;

use App\Models\JourneyEntry;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JourneyEntry>
 */
class JourneyEntryFactory extends Factory
{
    protected $model = JourneyEntry::class;

    public function definition(): array
    {
        return [
            'course_name' => $this->faker->sentence(3),
            'source' => $this->faker->randomElement(['Udemy', 'Laracasts', 'Documentation', 'YouTube']),
            'learned' => 'Mempelajari konsep ' . $this->faker->words(3, true) . ' dan penerapan best practice di Laravel.',
            'applied_project_id' => Project::factory(),
            'result' => 'Berhasil mengimplementasikan fitur dengan performa dan struktur code yang lebih bersih.',
            'completed_at' => $this->faker->date(),
            'display_order' => $this->faker->numberBetween(1, 10),
            'status' => 'published',
        ];
    }

    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
        ]);
    }
}

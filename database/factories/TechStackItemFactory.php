<?php

namespace Database\Factories;

use App\Models\TechStackItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TechStackItem>
 */
class TechStackItemFactory extends Factory
{
    protected $model = TechStackItem::class;

    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->word()),
            'category' => $this->faker->randomElement(['Backend', 'Database', 'Tools', 'Frontend', 'DevOps']),
            'display_order' => $this->faker->numberBetween(1, 20),
        ];
    }
}

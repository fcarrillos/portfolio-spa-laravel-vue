<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Skill;
use Illuminate\Support\Facades\File;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $color = $this
            ->faker
            ->randomElement(Skill::getAvailableBackgroundColors());
        
            return [
            'name' => fake()->unique()->word(),
            'color' => $color,
        ];
    }
}

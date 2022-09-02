<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $colorName = $this
            ->faker
            ->randomElement(Project::getAvailableTextColors());

        $iconName = $this
            ->faker
            ->randomElement(Project::getAvailableIcons());    
        
        return [
            'title' => fake()->unique()->word(2, true),
            'description' => fake()->sentence(),
            'color' => $colorName,
            'icon_name' => $iconName,
        ];
    
    }
}

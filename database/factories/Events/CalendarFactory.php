<?php

namespace Database\Factories\Events;

use App\Models\Organisation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Events\Calendar>
 */
class CalendarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'organisation_id' => Organisation::factory(),
            'name' => fake()->name(),
            'color' => fake()->hexColor(),
            'organisation_event_count' => 0,
            'is_default' => 1,
            'fetch_events_on_load' => 1,
            'show_publicly' => 1
        ];
    }
}

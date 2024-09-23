<?php

namespace Database\Factories\Events;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Events\Calendar;
use App\Models\Organisation;
use DateInterval;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Events\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $eventName = fake()->name();
        $startDate = now();
        $endDate = now()->add( new DateInterval('P1D'));

        return [
            'organisation_id' => Organisation::factory(),
            'organisation_calendar_id' => Calendar::factory(),
            'event_name' => fake()->name(),
            'slug' => Str::slug($eventName),
            'short_description' => fake()->text(100),
            'long_description' => fake()->text(200),
            'start_dt' => $startDate->format('Y-m-d'),
            'end_dt' => $endDate->format('Y-m-d'),
            'all_day' => 0,
            'venue' => fake()->name(),
        ];
    }
}

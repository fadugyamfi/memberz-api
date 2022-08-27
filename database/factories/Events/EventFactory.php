<?php

namespace Database\Factories\Events;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Events\Calendar;
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
        $calendar = Calendar::factory()->create();
        $eventName = $this->faker->name();
        $startDate = now();
        $endDate = now()->add( new DateInterval('P1D'));

        return [
            'organisation_id' => 1,
            'organisation_calendar_id' => $calendar->id,
            'event_name' => $this->faker->name(),
            'slug' => Str::slug($eventName),
            'short_description' => $this->faker->text(200),
            'long_description' => $this->faker->text(400),
            'start_dt' => $startDate->format('Y-m-d'),
            'end_dt' => $endDate->format('Y-m-d'),
            'all_day' => 0,
            'venue' => $this->faker->name(),
        ];
    }
}

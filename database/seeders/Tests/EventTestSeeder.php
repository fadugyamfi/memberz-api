<?php

namespace Database\Seeders\Tests;

use App\Models\Contribution;
use App\Models\ContributionPaymentType;
use App\Models\ContributionReceipt;
use App\Models\ContributionType;
use App\Models\Events\Event;
use App\Models\Organisation;
use Illuminate\Database\Seeder;

class EventTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organisation = Organisation::find(1);

        Event::factory()->create(3, [
            'organisation_id' => $organisation->id
        ]);
    }
}

<?php

namespace Tests\Feature;

use App\Models\Events\Calendar;
use App\Models\Events\Event;
use App\Models\MemberAccount;
use App\Models\Organisation;
use App\Models\OrganisationMember;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\Tests\TestDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EventsTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        Mail::fake();
    }

    public function testCanLoadEvents() {

        $user = MemberAccount::factory()->create();

        $organisation = Organisation::factory()->create([
            'name' => 'Contribution Test Org',
            'member_account_id' => $user->id
        ]);

        $calendar = Calendar::factory()->recycle($organisation)->create();
        $events = Event::factory(3)->recycle( collect([$organisation, $calendar]) )->create();

        $response = $this->actingAs($user, 'api')->withHeaders([
            'X-Tenant-Id' => $organisation->uuid
        ])->getJson('/api/events', [
            'organisation_calendar_id' => $calendar->id
        ]);

        $response->assertStatus(200)
            ->assertJsonCount( $events->count(), 'data' )
            ->assertJson([
                'data' => [
                    ['organisation_calendar_id' => $calendar->id]
                ]
            ]);
    }
}

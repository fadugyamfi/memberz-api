<?php

namespace Tests\Feature;

use App\Models\MemberAccount;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{

    public function test_user_can_login_successfully(): void
    {
        $account = MemberAccount::factory()->create();

        $this->post( route('auth.login'), [
            'username' => $account->username,
            'password' => '123456'
        ])->assertStatus(200)
          ->assertJson([
            'token_type' => 'bearer'
          ]);

        $this->assertAuthenticated('api');
    }

    public function test_user_cannot_login_with_invalid_credentials(): void
    {
        $account = MemberAccount::factory()->create();

        $this->post( route('auth.login'), [
            'username' => $account->username,
            'password' => '12345'
        ])
        ->assertStatus(401);
    }
}

<?php

namespace Tests\Unit;

use App\Models\Member;
use App\Models\MemberAccount;
use App\Services\TwoFactorAuthService;
use Tests\TestCase;

class TwoFactorAuthServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testGenerated2faCodeSavedToAccount(): void
    {        
        $account = MemberAccount::factory()->create();

        $service = new TwoFactorAuthService();
        $accountCode = $service->generateCode($account);

        $this->assertNotEmpty($accountCode);
        $this->assertGreaterThan(0, $accountCode);
        $this->assertEquals($accountCode, $account->memberAccountCode->code);
    }
}

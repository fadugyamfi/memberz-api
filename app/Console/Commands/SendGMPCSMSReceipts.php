<?php

namespace App\Console\Commands;

use App\Jobs\SendSMSReceipt;
use App\Models\Contribution;
use App\Models\MemberAccount;
use App\Models\OrganisationAccount;
use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use NunoMazer\Samehouse\Facades\Landlord;

class SendGMPCSMSReceipts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-gmpc-sms-receipts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Single use command to trigger sending a backlog of SMS receipts for GMPC';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $GMPC_ORG_ID = 51;
        $RECEIPT_BACKLOG_START = '2024-09-22';
        
        Landlord::addTenant('organisation_id', $GMPC_ORG_ID);
        Landlord::applyTenantScopesToDeferredModels();

        $admin = OrganisationAccount::find(69);
        $user = MemberAccount::with(['tenantAccount'])->find($admin->member_account_id);

        Contribution::query()
            ->where([
                'organisation_id' => $GMPC_ORG_ID,
                'module_contribution_type_id' => 42,
            ])
            ->whereDate('created', '>', $RECEIPT_BACKLOG_START)
            ->chunkById(100, function ($contributions) use($user) {
                foreach ($contributions as $contribution) {
                    $contribution->shouldSendSmsNotification = true;
                    SendSMSReceipt::dispatch($contribution, $user); 
                }
            });
    }
}

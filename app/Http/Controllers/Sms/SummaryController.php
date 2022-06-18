<?php

namespace App\Http\Controllers\Sms;

use App\Http\Controllers\Controller;
use App\Models\SmsAccountMessage;
use App\Models\SmsBroadcast;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use NunoMazer\Samehouse\Facades\Landlord;

/**
 * @group SMS Summary
 */
class SummaryController extends Controller {

    public function __invoke(Request $request)
    {
        return [
            'trend' => $this->getMessageTrend($request),
            'total_messages' => $this->getTotalMessagesSent($request),
            'total_broadcasts' => $this->getTotalBroadcastsSent($request)
        ];
    }

    private function getMessageTrend(Request $request) {
        $year = $request->get('year') ?? Carbon::now()->get('year');

        return SmsAccountMessage::withoutGlobalScopes()
            ->sent()
            ->select(
                DB::raw("COUNT(module_sms_account_instant_messages.id) as messages_sent"),
                DB::raw('MONTH(module_sms_account_instant_messages.created) as month'),
                DB::raw('YEAR(module_sms_account_instant_messages.created) as year')
            )
            ->join('module_sms_accounts', 'module_sms_accounts.id', '=', 'module_sms_account_instant_messages.module_sms_account_id')
            ->where('module_sms_accounts.organisation_id', Landlord::getTenants()->values()->first())
            ->where(DB::raw("YEAR(module_sms_account_instant_messages.created)"), "=", $year)
            ->groupBy(
                DB::raw("MONTH(module_sms_account_instant_messages.created)"),
                DB::raw('YEAR(module_sms_account_instant_messages.created)')
            )
            ->orderBy(DB::raw('MONTH(module_sms_account_instant_messages.created)'), 'asc')
            ->get();
    }

    private function getTotalMessagesSent(Request $request) {
        $year = $request->get('year') ?? Carbon::now()->get('year');

        return SmsAccountMessage::sent()
            ->where(DB::raw("YEAR(module_sms_account_instant_messages.created)"), "=", $year)
            ->count();
    }

    private function getTotalBroadcastsSent(Request $request) {
        $year = $request->get('year') ?? Carbon::now()->get('year');

        return SmsBroadcast::sent()
            ->where(DB::raw("YEAR(module_sms_account_broadcasts.created)"), "=", $year)
            ->count();
    }
}

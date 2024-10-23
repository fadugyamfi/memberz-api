<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\ContributionPaymentTypeController;
use App\Http\Controllers\ContributionReceiptController;
use App\Http\Controllers\ContributionReceiptSettingController;
use App\Http\Controllers\ContributionSummaryReportController;
use App\Http\Controllers\ContributionTypeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\Events\CalendarController;
use App\Http\Controllers\Events\EventAttendeeController;
use App\Http\Controllers\Events\EventController;
use App\Http\Controllers\Events\EventRegistrationController;
use App\Http\Controllers\Events\EventReminderBroadcastController;
use App\Http\Controllers\Events\EventReminderController;
use App\Http\Controllers\Events\EventSessionController;
use App\Http\Controllers\Expenditure\ExpenseAccountBalanceController;
use App\Http\Controllers\Expenditure\ExpenseAccountController;
use App\Http\Controllers\Expenditure\ExpenseController;
use App\Http\Controllers\Expenditure\ExpenseRequestController;
use App\Http\Controllers\Expenditure\ExpenseRequestItemController;
use App\Http\Controllers\Expenditure\ExpenseTypeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\MemberAccountController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberImageController;
use App\Http\Controllers\MemberRelationController;
use App\Http\Controllers\MemberRelationTypeController;
use App\Http\Controllers\Membership\BirthdayController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrganisationAccountController;
use App\Http\Controllers\OrganisationAnniversaryController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\OrganisationFileImportController;
use App\Http\Controllers\OrganisationGroupController;
use App\Http\Controllers\OrganisationGroupLeaderController;
use App\Http\Controllers\OrganisationGroupTypeController;
use App\Http\Controllers\OrganisationInvoiceController;
use App\Http\Controllers\OrganisationInvoiceItemController;
use App\Http\Controllers\OrganisationInvoicePaymentController;
use App\Http\Controllers\OrganisationLogoController;
use App\Http\Controllers\OrganisationMemberAnniversaryController;
use App\Http\Controllers\OrganisationMemberCategoryController;
use App\Http\Controllers\OrganisationMemberCategorySettingController;
use App\Http\Controllers\OrganisationMemberController;
use App\Http\Controllers\OrganisationMemberGroupController;
use App\Http\Controllers\OrganisationMemberImportController;
use App\Http\Controllers\OrganisationPaymentPlatformController;
use App\Http\Controllers\OrganisationRegistrationFormController;
use App\Http\Controllers\OrganisationRoleController;
use App\Http\Controllers\OrganisationSettingController;
use App\Http\Controllers\OrganisationSettingTypeController;
use App\Http\Controllers\OrganisationSubscriptionController;
use App\Http\Controllers\OrganisationTypeController;
use App\Http\Controllers\PaymentPlatformController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Reporting\ContributorsByTypeController;
use App\Http\Controllers\Reporting\IncomeSummaryController;
use App\Http\Controllers\Reporting\MonthlyConsolidatedReportController;
use App\Http\Controllers\Reporting\NonContributingMembersController;
use App\Http\Controllers\Reporting\TopContributorsController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\Sms\SummaryController;
use App\Http\Controllers\SmsAccountController;
use App\Http\Controllers\SmsAccountMessageController;
use App\Http\Controllers\SmsAccountTopupController;
use App\Http\Controllers\SmsBroadcastController;
use App\Http\Controllers\SmsBroadcastListController;
use App\Http\Controllers\SmsCreditController;
use App\Http\Controllers\SubscriptionTypeController;
use App\Http\Controllers\Support\SystemSettingController;
use App\Http\Controllers\SystemSettingCategoryController;
use App\Http\Controllers\SystemSettingController as ControllersSystemSettingController;
use App\Http\Controllers\TransactionTypeController;
use App\Http\Controllers\TwoFactorAuthController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

/** Unauthenticated auth routes */
Route::prefix('auth')->group(function () {
    Route::post('forgot-password', ForgotPasswordController::class)->name('auth.forgot-password');
    Route::post('reset-password', ResetPasswordController::class)->name('route.reset-password');
    Route::post('register', RegisterController::class)->name('auth.register');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('verify/{token}', VerifyEmailController::class)->name('auth.verify');
    Route::post('2fa-validate', [AuthController::class, 'twoFaValidate'])->name('auth.two-factor-auth');

    /** Authenticated auth routes */
    Route::middleware(['api'])->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
        Route::post('refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
        Route::get('me', [AuthController::class, 'me'])->name('auth.me');
    });
});

// System management routes. Disabled temporarily
Route::group(['middleware' => ['api'], 'prefix' => 'system'], function () {
    Route::get('/settings', [SystemSettingController::class, 'index']);
    // Route::post('database/migrate', 'Support\SystemController@migrate');
    // Route::post('database/rollback', 'Support\SystemController@rollback');
    // Route::post('database/seed', 'Support\SystemController@seed');
    // Route::post('cache/routes', 'Support\SystemController@cacheRoutes');
    // Route::post('cache/config', 'Support\SystemController@cacheConfig');
    // Route::post('cache/clear', 'Support\SystemController@cacheClear');
});

Route::controller(OrganisationController::class)->group(function() {
    Route::get('organisations/public', 'index');
    Route::get('organisations/slugs', 'slugs');
    Route::get('organisations/recommended', 'recommended');
});

/**
 * Public organisation routes for fetching data without an authentication token
 *
 * X-Tenant-Id Header is required
 */
Route::prefix('organisations/{org_slug}')->middleware('multi-tenant-no-auth')->group(function () {
    Route::get('/', [OrganisationController::class, 'getBySlug'])->withoutMiddleware('multi-tenant-no-auth');
    Route::get('/organisation_registration_forms/{slug}', [OrganisationRegistrationFormController::class, 'getBySlug']);
    Route::post('/members', [MemberController::class, 'store']);
    Route::post('/member_accounts', [MemberAccountController::class, 'store']);
    Route::post('/organisation_members', [OrganisationMemberController::class, 'store']);
    Route::get('/organisation_members/{id}', [OrganisationMemberController::class, 'registrant']);
    Route::get('/organisation_members', [OrganisationMemberController::class, 'index']);

    Route::post('/memberships', [OrganisationMemberController::class, 'store']);
    Route::delete('/memberships/{id}', [OrganisationMemberController::class, 'destroyMembership']);
    Route::get('/memberships/{id}', [OrganisationMemberController::class, 'registrant']);
    Route::get('/memberships', [OrganisationMemberController::class, 'index']);
    Route::get('/membership_categories', [OrganisationMemberCategoryController::class, 'index']);
});

/**
 * User must be logged into application to access these routes
 */
Route::middleware(['auth:api'])->group(function () {

    Route::get('member_accounts/{id}/organisations', [MemberAccountController::class, 'organisations']);

    Route::get('members/{id}/organisations', [MemberController::class, 'organisations']);
    Route::get('members/{id}/memberships', [MemberController::class, 'memberships']);
    Route::get('members/{id}/upcoming-events', [MemberController::class, 'upcomingEvents']);
    Route::get('members/{id}/past-events', [MemberController::class, 'pastEvents']);

    Route::get('organisation_accounts/{organisation_id}/{member_account_id}', [OrganisationAccountController::class, 'userAccount']);
    Route::post('organisations/{id}/logo', [OrganisationLogoController::class, 'update']);

    Route::post('events/{event}/register', EventRegistrationController::class);

    Route::apiResource('banks', BankController::class);
    Route::apiResource('countries', CountryController::class);
    Route::apiResource('currencies', CurrencyController::class);
    Route::apiResource('members', MemberController::class);
    Route::apiResource('member_accounts', MemberAccountController::class);
    Route::apiResource('member_images', MemberImageController::class);
    Route::apiResource('member_relation_types', MemberRelationTypeController::class);
    Route::apiResource('member_relations', MemberRelationController::class);
    Route::apiResource('permissions', PermissionController::class);
    Route::apiResource('organisations', OrganisationController::class);
    Route::apiResource('organisation_types', OrganisationTypeController::class);
    Route::apiResource('payment_platforms', PaymentPlatformController::class);

    Route::apiResource('subscription_types', SubscriptionTypeController::class);
    Route::apiResource('system_settings', ControllersSystemSettingController::class);
    Route::apiResource('system_setting_category', SystemSettingCategoryController::class);
    Route::apiResource('transaction_types', TransactionTypeController::class);

    Route::controller(NotificationController::class)->group(function () {
        Route::post('notifications/{id}/mark_read', 'markRead');
        Route::post('notifications/mark_all_read', 'markAllRead');
        Route::get('notifications/unread', 'unread');
        Route::get('notifications', 'index');
    });

    Route::controller(TwoFactorAuthController::class)->group(function () {
        Route::post('2fa/send-code', 'sendCode');
        Route::post("2fa/enable", 'enable');
        Route::post("2fa/disable", 'disable');
    });

    Route::controller(ActivityLogController::class)->group(function () {
        Route::get('activity_logs/search', 'search');
        Route::get('activity_logs/log_groups', 'logGroups');
    });
});

/**
 * User must be logged in to application
 * User must belong to a valid organisation to access the following routes
 */
Route::middleware(['auth:api', 'multi-tenant'])->group(function () {
    Route::controller(OrganisationMemberController::class)->group(function () {
        Route::get('organisation_members/statistics', 'statistics');
        Route::get('organisation_members/unapproved', 'unapproved');
    });

    Route::controller(OrganisationRoleController::class)->group(function () {
        Route::get('organisation_roles/{id}/permissions', 'permissions');
        Route::post('organisation_roles/{id}/permissions', 'syncPermissions');
    });

    Route::controller(OrganisationSubscriptionController::class)->group(function () {
        Route::post('organisation_subscriptions/{id}/renew', 'renew');
        Route::post('organisation_subscriptions/{id}/upgrade', 'upgrade');
    });

    Route::controller(BirthdayController::class)->group(function () {
        Route::get('organisation_members/birthdays', 'index');
        Route::get('organisation_members/birthdays/summary', 'summary');
    });

    Route::apiResource('organisation_accounts', OrganisationAccountController::class);
    Route::apiResource('organisation_file_imports', OrganisationFileImportController::class);
    Route::apiResource('organisation_members', OrganisationMemberController::class)->names('api.organisation_members');
    Route::apiResource('organisation_member_categories', OrganisationMemberCategoryController::class);
    Route::apiResource('organisation_member_imports', OrganisationMemberImportController::class);
    Route::apiResource('organisation_invoices', OrganisationInvoiceController::class);
    Route::apiResource('organisation_invoice_items', OrganisationInvoiceItemController::class);
    Route::apiResource('organisation_invoice_payments', OrganisationInvoicePaymentController::class);
    Route::apiResource('organisation_roles', OrganisationRoleController::class);
    Route::apiResource('organisation_setting_types', OrganisationSettingTypeController::class);
    Route::apiResource('organisation_settings', OrganisationSettingController::class);
    Route::apiResource('organisation_subscriptions', OrganisationSubscriptionController::class);
    Route::apiResource('organisation_groups', OrganisationGroupController::class);
    Route::apiResource('organisation_group_types', OrganisationGroupTypeController::class);
    Route::apiResource('organisation_group_leaders', OrganisationGroupLeaderController::class);
    Route::apiResource('organisation_member_groups', OrganisationMemberGroupController::class);
    Route::apiResource('organisation_registration_forms', OrganisationRegistrationFormController::class);
    Route::apiResource('organisation_payment_platforms', OrganisationPaymentPlatformController::class);
    Route::apiResource('organisation_member_category_settings', OrganisationMemberCategorySettingController::class)->parameters([
        'organisation_member_category_settings' => 'setting'
    ]);
    Route::apiResource('organisation_anniversaries', OrganisationAnniversaryController::class);
    Route::apiResource('organisation_member_anniversaries', OrganisationMemberAnniversaryController::class);

    Route::get('events/{event}/attendees', [EventController::class, 'attendees']);
    Route::get('events/statistics', [EventController::class, 'attendanceStatistics']);
    Route::apiResource('calendars', CalendarController::class);
    Route::apiResource('events', EventController::class);
    Route::apiResource('event_attendees', EventAttendeeController::class);
    Route::apiResource('event_sessions', EventSessionController::class);
    Route::apiResource('event_reminders', EventReminderController::class);
    Route::apiResource('event_reminder_broadcasts', EventReminderBroadcastController::class);

    Route::get('sms/summary', SummaryController::class);
    Route::apiResource('sms_accounts', SmsAccountController::class);
    Route::apiResource('sms_account_messages', SmsAccountMessageController::class);
    Route::apiResource('sms_account_topups', SmsAccountTopupController::class);
    Route::apiResource('sms_credits', SmsCreditController::class);
    Route::apiResource('sms_broadcasts', SmsBroadcastController::class);

    Route::get('sms_broadcast_lists/filters', [SmsBroadcastListController::class, 'filters']);
    Route::get('sms_broadcast_lists/preview/{smsBroadcastList}', [SmsBroadcastListController::class, 'preview']);
    Route::apiResource('sms_broadcast_lists', SmsBroadcastListController::class);

    Route::get('contributions/available_years', [ContributionController::class, 'getAvailableContributionYears']);
    Route::apiResource('contribution_types', ContributionTypeController::class);
    Route::apiResource('contribution_payment_types', ContributionPaymentTypeController::class);
    Route::apiResource('contributions', ContributionController::class);

    Route::apiResource('contribution_receipts', ContributionReceiptController::class);
    Route::apiResource('contribution_receipt_settings', ContributionReceiptSettingController::class)->only(['index', 'store', 'update']);

    Route::prefix('contribution_summaries')->controller(ContributionSummaryReportController::class)->group(function() {
        Route::get('/', 'index');
        Route::get('/weekly_breakdown', 'breakdownByWeek');
        Route::get('/totals_by_category', 'totalsByCategory');
        Route::get('/category_breakdown', 'categoryBreakdown');
        Route::get('/trend_report', 'getTrendReport');
    });

    Route::prefix('finance_reporting')->group(function() {
        Route::get('/non_contributing_members', NonContributingMembersController::class);
        Route::get('/income_summary', IncomeSummaryController::class);
        Route::get('/top_contributors', TopContributorsController::class);
        Route::get('/monthly_consolidated_report', MonthlyConsolidatedReportController::class);
        Route::get('/contributors_by_type', ContributorsByTypeController::class);
    });

    Route::apiResource('/expenses', ExpenseController::class);
    Route::apiResource('/expense_types', ExpenseTypeController::class);
    Route::apiResource('/expense_accounts', ExpenseAccountController::class);
    Route::apiResource('/expense_account_balances', ExpenseAccountBalanceController::class);
    Route::apiResource('/expense_requests', ExpenseRequestController::class);
    Route::apiResource('/expense_request_items', ExpenseRequestItemController::class);
});

// Allow for SSE notifications subscription
Route::get('notifications/subscribe/{member_id}', [NotificationController::class, 'subscribe']);

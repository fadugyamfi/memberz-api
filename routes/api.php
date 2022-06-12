<?php

use App\Http\Controllers\ContributionSummaryReportController;
use App\Http\Controllers\OrganisationPaymentPlatformController;
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
    Route::post('forgot-password', 'ForgotPasswordController');
    Route::post('reset-password', 'ResetPasswordController');
    Route::post('register', 'RegisterController');
    Route::post('login', 'AuthController@login');
    Route::get('verify/{token}', 'VerifyEmailController');
    Route::post('2fa-validate', 'AuthController@twoFaValidate');
});

/** Authenticated auth routes */
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function ($router) {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
});

// System management routes. Disabled temporarily
Route::group(['middleware' => ['api'], 'prefix' => 'system'], function ($router) {
    Route::get('/settings', 'Support\SystemSettingController@index');
    // Route::post('database/migrate', 'Support\SystemController@migrate');
    // Route::post('database/rollback', 'Support\SystemController@rollback');
    // Route::post('database/seed', 'Support\SystemController@seed');
    // Route::post('cache/routes', 'Support\SystemController@cacheRoutes');
    // Route::post('cache/config', 'Support\SystemController@cacheConfig');
    // Route::post('cache/clear', 'Support\SystemController@cacheClear');
});

Route::get('organisations/slugs', 'OrganisationController@slugs');

/**
 * Public organisation routes for fetching data without an authentication token
 */
Route::prefix('organisations/{org_slug}')->middleware('multi-tenant-no-auth')->group(function() {
    Route::get('/', 'OrganisationController@getBySlug')->withoutMiddleware('multi-tenant-no-auth');
    Route::get('/organisation_registration_forms/{slug}', 'OrganisationRegistrationFormController@getBySlug');
    Route::post('/members', 'MemberController@store');
    Route::post('/member_accounts', 'MemberAccountController@store');
    Route::post('/organisation_members', 'OrganisationMemberController@store');
    Route::get('/organisation_members/{id}', 'OrganisationMemberController@registrant');
});


Route::middleware(['auth:api'])->group(function () {

    Route::get('member_accounts/{id}/organisations', 'MemberAccountController@organisations');
    Route::get('members/{id}/organisations', 'MemberController@organisations');
    Route::post('organisations/{id}/logo', 'OrganisationLogoController@update');

    Route::apiResource('banks', 'BankController');
    Route::apiResource('countries', 'CountryController');
    Route::apiResource('currencies', 'CurrencyController');
    Route::apiResource('members', 'MemberController');
    Route::apiResource('member_accounts', 'MemberAccountController');
    Route::apiResource('member_images', 'MemberImageController');
    Route::apiResource('member_relation_types', 'MemberRelationTypeController');
    Route::apiResource('member_relations', 'MemberRelationController');
    Route::apiResource('permissions', 'PermissionController');
    Route::apiResource('organisations', 'OrganisationController');
    Route::apiResource('organisation_types', 'OrganisationTypeController');
    Route::apiResource('payment_platforms', 'PaymentPlatformController');

    Route::apiResource('subscription_types', 'SubscriptionTypeController');
    Route::apiResource('system_settings', 'SystemSettingController');
    Route::apiResource('system_setting_category', 'SystemSettingCategoryController');
    Route::apiResource('transaction_types', 'TransactionTypeController');

    Route::post('notifications/{id}/mark_read', 'NotificationController@markRead');
    Route::post('notifications/mark_all_read', 'NotificationController@markAllRead');
    Route::get('notifications/unread', 'NotificationController@unread');
    Route::get('notifications', 'NotificationController@index');


    Route::post('2fa/send-code', 'TwoFactorAuthController@sendCode');
    Route::post("2fa/enable", 'TwoFactorAuthController@enable');
    Route::post("2fa/disable", 'TwoFactorAuthController@disable');

    Route::get('organisation_accounts/{organisation_id}/{member_account_id}', 'OrganisationAccountController@userAccount');

    // User must belong to a valid organisation to access the following routes
    Route::middleware('multi-tenant')->group(function () {
        Route::get('organisations/{id}/memberships/statistics', 'OrganisationMemberController@statistics');
        Route::get('organisation_members/unapproved', 'OrganisationMemberController@unapproved');
        Route::get('organisation_roles/{id}/permissions', 'OrganisationRoleController@permissions');
        Route::post('organisation_roles/{id}/permissions', 'OrganisationRoleController@syncPermissions');
        Route::post('organisation_subscriptions/{id}/renew', 'OrganisationSubscriptionController@renew');
        Route::post('organisation_subscriptions/{id}/upgrade', 'OrganisationSubscriptionController@upgrade');

        Route::apiResource('organisation_accounts', 'OrganisationAccountController');
        Route::apiResource('organisation_file_imports', 'OrganisationFileImportController');

        // Route::get('organisation_members/{uuid}', 'OrganisationMemberController@showByUuid')->whereUuid('uuid');
        Route::get('organisation_members/birthdays', 'Membership\BirthdayController@index');
        Route::get('organisation_members/birthdays/summary', 'Membership\BirthdayController@summary');
        Route::apiResource('organisation_members', 'OrganisationMemberController');

        Route::apiResource('organisation_member_categories', 'OrganisationMemberCategoryController');
        Route::apiResource('organisation_member_imports', 'OrganisationMemberImportController');
        Route::apiResource('organisation_invoices', 'OrganisationInvoiceController');
        Route::apiResource('organisation_invoice_items', 'OrganisationInvoiceItemController');
        Route::apiResource('organisation_invoice_payments', 'OrganisationInvoicePaymentController');
        Route::apiResource('organisation_roles', 'OrganisationRoleController');
        Route::apiResource('organisation_setting_types', 'OrganisationSettingTypeController');
        Route::apiResource('organisation_settings', 'OrganisationSettingController');
        Route::apiResource('organisation_subscriptions', 'OrganisationSubscriptionController');
        Route::apiResource('organisation_groups', 'OrganisationGroupController');
        Route::apiResource('organisation_group_types', 'OrganisationGroupTypeController');
        Route::apiResource('organisation_group_leaders', 'OrganisationGroupLeaderController');
        Route::apiResource('organisation_member_groups', 'OrganisationMemberGroupController');
        Route::apiResource('organisation_registration_forms', 'OrganisationRegistrationFormController');
        Route::apiResource('organisation_payment_platforms', 'OrganisationPaymentPlatformController');

        Route::get('events/{event}/attendees', 'Events\\EventController@attendees');
        Route::get('events/statistics', 'Events\\EventController@attendanceStatistics');
        Route::apiResource('calendars', 'Events\\CalendarController');
        Route::apiResource('events', 'Events\\EventController');
        Route::apiResource('event_attendees', 'Events\\EventAttendeeController');
        Route::apiResource('event_sessions', 'Events\\EventSessionController');
        Route::apiResource('event_reminders', 'Events\\EventReminderController');
        Route::apiResource('event_reminder_broadcasts', 'Events\\EventReminderBroadcastController');

        Route::get('sms/summary', 'Sms\SummaryController');
        Route::apiResource('sms_accounts', 'SmsAccountController');
        Route::apiResource('sms_account_messages', 'SmsAccountMessageController');
        Route::apiResource('sms_account_topups', 'SmsAccountTopupController');
        Route::apiResource('sms_credits', 'SmsCreditController');
        Route::apiResource('sms_broadcasts', 'SmsBroadcastController');

        Route::get('sms_broadcast_lists/filters', 'SmsBroadcastListController@filters');
        Route::get('sms_broadcast_lists/preview/{smsBroadcastList}', 'SmsBroadcastListController@preview');
        Route::apiResource('sms_broadcast_lists', 'SmsBroadcastListController');

        Route::get('contributions/available_years', 'ContributionController@getAvailableContributionYears');
        Route::apiResource('contribution_types', 'ContributionTypeController');
        Route::apiResource('contribution_payment_types', 'ContributionPaymentTypeController');
        Route::apiResource('contributions', 'ContributionController');

        Route::apiResource('contribution_receipts', 'ContributionReceiptController');
        Route::apiResource('contribution_receipt_settings', 'ContributionReceiptSettingController')->only(['index', 'store', 'update']);

        Route::get('contribution_summaries', [ContributionSummaryReportController::class, 'index']);
        Route::get('contribution_summaries/weekly_breakdown', 'ContributionSummaryReportController@breakdownByWeek');
        Route::get('contribution_summaries/totals_by_category', 'ContributionSummaryReportController@totalsByCategory');
        Route::get('contribution_summaries/category_breakdown', 'ContributionSummaryReportController@categoryBreakdown');
        Route::get('contribution_summaries/trend_report', 'ContributionSummaryReportController@getTrendReport');

        Route::apiResource('organisation_anniversaries', 'OrganisationAnniversaryController');
        Route::apiResource('organisation_member_anniversaries', 'OrganisationMemberAnniversaryController');


        Route::get('finance_reporting/non_contributing_members', 'Reporting\NonContributingMembersController');
        Route::get('finance_reporting/income_summary', 'Reporting\IncomeSummaryController');
        Route::get('finance_reporting/top_contributors', 'Reporting\TopContributorsController');
        Route::get('finance_reporting/monthly_consolidated_report', 'Reporting\MonthlyConsolidatedReportController');
    });

    Route::get('activity_logs/search', 'ActivityLogController@search');
    Route::get('activity_logs/log_groups', 'ActivityLogController@logGroups');
});

// Allow for SSE notifications subscription
Route::get('notifications/subscribe/{member_id}', 'NotificationController@subscribe');

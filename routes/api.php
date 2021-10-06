<?php

use App\Http\Controllers\MemberImageController;
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
// Route::group(['middleware' => ['api'], 'prefix' => 'system'], function ($router) {
//     Route::post('database/migrate', 'Support\SystemController@migrate');
//     Route::post('database/rollback', 'Support\SystemController@rollback');
//     Route::post('database/seed', 'Support\SystemController@seed');
//     Route::post('cache/routes', 'Support\SystemController@cacheRoutes');
//     Route::post('cache/config', 'Support\SystemController@cacheConfig');
//     Route::post('cache/clear', 'Support\SystemController@cacheClear');
// });

Route::middleware(['auth:api'])->group(function () {

    Route::get('member_accounts/{id}/organisations', 'MemberAccountController@organisations');

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

    Route::apiResource('subscription_types', 'SubscriptionTypeController');
    Route::apiResource('system_settings', 'SystemSettingController');
    Route::apiResource('system_setting_category', 'SystemSettingCategoryController');
    Route::apiResource('transaction_types', 'TransactionTypeController');


    Route::post('notifications/{id}/mark_read', 'NotificationController@markRead');
    Route::post('notifications/mark_all_read', 'NotificationController@markAllRead');
    Route::get('notifications/unread', 'NotificationController@unread');
    Route::get('notifications', 'NotificationController@index');

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

        Route::apiResource('sms_accounts', 'SmsAccountController');
        Route::apiResource('sms_account_messages', 'SmsAccountMessageController');
        Route::apiResource('sms_account_topups', 'SmsAccountTopupController');
        Route::apiResource('sms_credits', 'SmsCreditController');
        Route::apiResource('sms_broadcasts', 'SmsBroadcastController');
        Route::apiResource('sms_broadcast_lists', 'SmsBroadcastListController');

        Route::apiResource('contribution_types', 'ContributionTypeController');
        Route::apiResource('contributions', 'ContributionController');
        Route::apiResource('contribution_receipts', 'ContributionReceiptController');
        Route::apiResource('contribution_receipt_settings', 'ContributionReceiptSettingController')->only(['index', 'update']);
    });

    Route::get('activity_logs/search', 'ActivityLogController@search');
    Route::get('activity_logs/log_groups', 'ActivityLogController@logGroups');
});

// Allow for SSE notifications subscription
Route::get('notifications/subscribe/{member_id}', 'NotificationController@subscribe');

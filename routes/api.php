<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');

});

Route::middleware(['auth:api'])->group(function () {
    
    Route::apiResource('banks', 'BankController');
    Route::apiResource('countries', 'CountryController');
    Route::apiResource('currencies', 'CurrencyController');
    
    Route::get('members/search', 'MemberController@search');
    Route::apiResource('members', 'MemberController');
    
    Route::get('member_accounts/search', 'MemberAccountController@search');
    Route::get('member_accounts/{id}/organisations', 'MemberAccountController@organisations');
    Route::apiResource('member_accounts', 'MemberAccountController');

    Route::get('organisations/{id}/memberships/statistics', 'OrganisationMemberController@statistics');
    
    Route::apiResource('organisations', 'OrganisationController');
    Route::apiResource('organisation_accounts', 'OrganisationAccountController');

    Route::apiResource('organisation_file_imports', 'OrganisationFileImportController');

    Route::apiResource('organisation_members', 'OrganisationMemberController');
    Route::apiResource('organisation_member_categories', 'OrganisationMemberCategoryController');

    Route::apiResource('organisation_invoices', 'OrganisationInvoiceController');
    Route::apiResource('organisation_invoice_items', 'OrganisationInvoiceItemController');
    Route::apiResource('organisation_invoice_payments', 'OrganisationInvoicePaymentController');

    Route::apiResource('organisation_roles', 'OrganisationRoleController');
    Route::apiResource('organisation_setting_types', 'OrganisationSettingTypeController');
    Route::apiResource('organisation_settings', 'OrganisationSettingController');
    Route::apiResource('organisation_subscriptions', 'OrganisationSubscriptionController');
    Route::apiResource('organisation_types', 'OrganisationTypeController');

    
    Route::apiResource('system_settings', 'SystemSettingController');
    Route::apiResource('system_setting_category', 'SystemSettingCategoryController');
    
    Route::apiResource('subscription_types', 'SubscriptionTypeController');
    Route::apiResource('transaction_types', 'TransactionTypeController');

});

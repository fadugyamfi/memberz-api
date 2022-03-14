<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\AccountRole
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRole newQuery()
 * @method static \Illuminate\Database\Query\Builder|AccountRole onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRole whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRole whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRole whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRole whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountRole whereName($value)
 * @method static \Illuminate\Database\Query\Builder|AccountRole withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AccountRole withoutTrashed()
 */
	class AccountRole extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ActivityLog
 *
 * @property int $id
 * @property string|null $log_name
 * @property string $description
 * @property string|null $subject_type
 * @property string|null $event
 * @property int|null $subject_id
 * @property string|null $causer_type
 * @property int|null $causer_id
 * @property mixed|null $properties
 * @property string|null $batch_uuid
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property int|null $organisation_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MemberAccount|null $causer
 * @property-read \App\Models\Organisation|null $organisation
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereBatchUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereCauserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereCauserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereLogName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereSubjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityLog whereUserAgent($value)
 */
	class ActivityLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ApiModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ApiModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiModel query()
 */
	class ApiModel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AuthApp
 *
 * @property int $id
 * @property string|null $app_id
 * @property string|null $app_key
 * @property string|null $name
 * @property string|null $description
 * @property int|null $organisation_id
 * @property bool|null $all_access
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property int|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|AuthApp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthApp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthApp query()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthApp whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthApp whereAllAccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthApp whereAppId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthApp whereAppKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthApp whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthApp whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthApp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthApp whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthApp whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthApp whereOrganisationId($value)
 */
	class AuthApp extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bank
 *
 * @property int $id
 * @property int|null $country_id
 * @property string|null $name
 * @property string|null $short_code
 * @property string|null $swift_code
 * @property string|null $address
 * @property string|null $phone_numbers
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modifid
 * @property bool|null $deleted
 * @property-read \App\Models\Country|null $country
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newQuery()
 * @method static \Illuminate\Database\Query\Builder|Bank onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereModifid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank wherePhoneNumbers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereShortCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereSwiftCode($value)
 * @method static \Illuminate\Database\Query\Builder|Bank withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Bank withoutTrashed()
 */
	class Bank extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contribution
 *
 * @property int $id
 * @property int $organisation_id
 * @property int|null $organisation_member_id
 * @property int|null $module_contribution_type_id
 * @property int|null $module_contribution_receipt_id
 * @property string|null $description
 * @property int|null $week
 * @property int|null $month
 * @property int|null $year
 * @property int|null $module_contribution_payment_type_id
 * @property string|null $cheque_status
 * @property string|null $cheque_number
 * @property int|null $bank_id
 * @property float|null $amount
 * @property int|null $currency_id
 * @property int|null $organisation_file_import_id
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Bank|null $bank
 * @property-read \App\Models\ContributionPaymentType|null $contributionPaymentType
 * @property-read \App\Models\ContributionReceipt|null $contributionReceipt
 * @property-read \App\Models\ContributionType|null $contributionType
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\Organisation $organisation
 * @property-read \App\Models\OrganisationFileImport|null $organisationFileImport
 * @property-read \App\Models\OrganisationMember|null $organisationMember
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution active()
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution byCurrencyId($currency_id)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution byYear($year)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution getSummaryData(string $receipt_dt, \App\Models\Contribution $contribution)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution newQuery()
 * @method static \Illuminate\Database\Query\Builder|Contribution onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereChequeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereChequeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereModuleContributionPaymentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereModuleContributionReceiptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereModuleContributionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereOrganisationFileImportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereOrganisationMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contribution whereYear($value)
 * @method static \Illuminate\Database\Query\Builder|Contribution withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Contribution withoutTrashed()
 */
	class Contribution extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ContributionPaymentType
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $payment_platform_id
 * @property bool|null $active
 * @property-read \App\Models\PaymentPlatform|null $paymentPlatform
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionPaymentType active()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionPaymentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionPaymentType newQuery()
 * @method static \Illuminate\Database\Query\Builder|ContributionPaymentType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionPaymentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionPaymentType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionPaymentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionPaymentType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionPaymentType wherePaymentPlatformId($value)
 * @method static \Illuminate\Database\Query\Builder|ContributionPaymentType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ContributionPaymentType withoutTrashed()
 */
	class ContributionPaymentType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ContributionReceipt
 *
 * @property int $id
 * @property int|null $organisation_id
 * @property string|null $receipt_no
 * @property \Illuminate\Support\Carbon|null $receipt_dt
 * @property int|null $organisation_account_id
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Contribution[] $contributions
 * @property-read int|null $contributions_count
 * @property-read \App\Models\Organisation|null $organisation
 * @property-read \App\Models\OrganisationAccount|null $organisationAccount
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceipt active()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceipt getReceipt(int $org_id, string $receipt_dt)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceipt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceipt newQuery()
 * @method static \Illuminate\Database\Query\Builder|ContributionReceipt onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceipt query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceipt whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceipt whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceipt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceipt whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceipt whereOrganisationAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceipt whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceipt whereReceiptDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceipt whereReceiptNo($value)
 * @method static \Illuminate\Database\Query\Builder|ContributionReceipt withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ContributionReceipt withoutTrashed()
 */
	class ContributionReceipt extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ContributionReceiptSetting
 *
 * @property int $id
 * @property int|null $organisation_id
 * @property string|null $receipt_mode
 * @property string|null $receipt_prefix
 * @property string|null $receipt_postfix
 * @property int|null $receipt_counter
 * @property int|null $default_currency
 * @property bool|null $sms_notify
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\Currency|null $defaultCurrency
 * @property-read mixed $default_currency_code
 * @property-read \App\Models\Organisation|null $organisation
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting organisationReceipt(int $organisation_id)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting whereDefaultCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting whereReceiptCounter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting whereReceiptMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting whereReceiptPostfix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting whereReceiptPrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionReceiptSetting whereSmsNotify($value)
 */
	class ContributionReceiptSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ContributionSummary
 *
 * @property int $id
 * @property int|null $organisation_id
 * @property \Illuminate\Support\Carbon|null $receipt_dt
 * @property int|null $module_contribution_type_id
 * @property int|null $week
 * @property int|null $month
 * @property int|null $year
 * @property int|null $currency_id
 * @property float|null $amount
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $deleted
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\ContributionType|null $contributionType
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\Organisation|null $organisation
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary getByContributionTypeId(int $contribution_type_id)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary getByCurrencyId(int $currency_id)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary getByMonth(int $month)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary getByOrganisation(int $org_id)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary getByReceiptDt(string $receipt_dt)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary getByWeek(int $week)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary getByYear(int $year)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary getExistingSummaryRecord(string $receipt_dt, \App\Models\Contribution $contribution)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary getReportByMonthYear(int $month, int $year, ?int $contribution_type_id = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary getReportByYear(int $year, ?int $contribution_type_id = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary newQuery()
 * @method static \Illuminate\Database\Query\Builder|ContributionSummary onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary whereModuleContributionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary whereReceiptDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary whereWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionSummary whereYear($value)
 * @method static \Illuminate\Database\Query\Builder|ContributionSummary withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ContributionSummary withoutTrashed()
 */
	class ContributionSummary extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ContributionType
 *
 * @property int $id
 * @property int $organisation_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $member_required
 * @property bool|null $fix_amount_per_period
 * @property int|null $currency_id
 * @property float|null $fixed_amount
 * @property bool|null $system_generated
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Contribution[] $contribution
 * @property-read int|null $contribution_count
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\Organisation $organisation
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType active()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType newQuery()
 * @method static \Illuminate\Database\Query\Builder|ContributionType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType whereFixAmountPerPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType whereFixedAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType whereMemberRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContributionType whereSystemGenerated($value)
 * @method static \Illuminate\Database\Query\Builder|ContributionType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ContributionType withoutTrashed()
 */
	class ContributionType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name
 * @property string $capital
 * @property bool|null $active
 * @property-read \App\Models\Bank $bank
 * @property-read \App\Models\Currency $currency
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Query\Builder|Country onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCapital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Query\Builder|Country withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Country withoutTrashed()
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Currency
 *
 * @property int $id
 * @property int $country_id
 * @property string|null $currency_name
 * @property string|null $currency_code
 * @property bool|null $active
 * @property-read \App\Models\Country $country
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Query\Builder|Currency onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Query\Builder|Currency withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Currency withoutTrashed()
 */
	class Currency extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Member
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property string|null $maiden_name
 * @property string|null $gender
 * @property \Illuminate\Support\Carbon|null $dob
 * @property string|null $place_of_birth
 * @property string|null $nationality
 * @property string|null $marital_status
 * @property string|null $address
 * @property string|null $home_number
 * @property string|null $mobile_number
 * @property string|null $office_number
 * @property string|null $email
 * @property string|null $website
 * @property string|null $social_security_no
 * @property string|null $employment_status
 * @property string|null $occupation
 * @property string|null $position
 * @property string|null $profession
 * @property string|null $field_of_study
 * @property string|null $educational_bg
 * @property string|null $home_town
 * @property string|null $tribe
 * @property string|null $residential_address
 * @property string|null $residential_city
 * @property string|null $residential_region
 * @property string|null $residential_district
 * @property string|null $residential_zip_code
 * @property string|null $business_name
 * @property string|null $business_address
 * @property string|null $business_city
 * @property string|null $business_region
 * @property string|null $business_district
 * @property string|null $business_zip_code
 * @property string|null $bank
 * @property string|null $bank_acc_no
 * @property string|null $bank_branch
 * @property string|null $bank_location
 * @property int|null $is_orphan
 * @property string|null $status
 * @property int|null $source_organisation_id
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read mixed $age
 * @property-read mixed $full_name
 * @property-read mixed $full_name_with_title
 * @property-read mixed $name
 * @property-read \App\Models\MemberAccount|null $memberAccount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemberImage[] $memberImages
 * @property-read int|null $member_images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationMember[] $memberships
 * @property-read int|null $memberships_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationMember[] $organisationMember
 * @property-read int|null $organisation_member_count
 * @property-read \App\Models\MemberImage|null $profilePhoto
 * @method static \Illuminate\Database\Eloquent\Builder|Member newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member newQuery()
 * @method static \Illuminate\Database\Query\Builder|Member onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Member query()
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereBankAccNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereBankBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereBankLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereBusinessAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereBusinessCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereBusinessDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereBusinessName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereBusinessRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereBusinessZipCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereEducationalBg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereEmploymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereFieldOfStudy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereHomeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereHomeTown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereIsOrphan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereMaidenName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereOfficeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member wherePlaceOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereProfession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereResidentialAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereResidentialCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereResidentialDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereResidentialRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereResidentialZipCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereSocialSecurityNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereSourceOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereTribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|Member withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Member withoutTrashed()
 */
	class Member extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemberAccount
 *
 * @property int $id
 * @property int|null $member_id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $email_verification_token
 * @property string|null $pass_salt
 * @property string|null $timezone
 * @property string|null $last_login
 * @property string|null $account_type
 * @property int|null $reset_requested
 * @property int|null $organisation_count
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property int|null $deleted
 * @property int $email_2fa
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $actions
 * @property-read int|null $actions_count
 * @property-read \App\Models\Member|null $member
 * @property-read \App\Models\MemberAccountCode|null $memberAccountCode
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationAccount[] $organisationAccounts
 * @property-read int|null $organisation_accounts_count
 * @property-read \App\Models\OrganisationAccount|null $tenantAccount
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount active()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount newQuery()
 * @method static \Illuminate\Database\Query\Builder|MemberAccount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereEmail2fa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereEmailVerificationToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereOrganisationCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount wherePassSalt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereResetRequested($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccount whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|MemberAccount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|MemberAccount withoutTrashed()
 */
	class MemberAccount extends \Eloquent implements \LaravelApiBase\Models\ApiModelInterface, \PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject {}
}

namespace App\Models{
/**
 * App\Models\MemberAccountCode
 *
 * @property int $id
 * @property int $member_account_id
 * @property string $code
 * @property string|null $expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $actions
 * @property-read int|null $actions_count
 * @property-read \App\Models\MemberAccount|null $memberAccout
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccountCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccountCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccountCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccountCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccountCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccountCode whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccountCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccountCode whereMemberAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberAccountCode whereUpdatedAt($value)
 */
	class MemberAccountCode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemberCategorySetting
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $type
 * @property string|null $default
 * @property int|null $position
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property int|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|MemberCategorySetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberCategorySetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberCategorySetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberCategorySetting whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberCategorySetting whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberCategorySetting whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberCategorySetting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberCategorySetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberCategorySetting whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberCategorySetting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberCategorySetting wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberCategorySetting whereType($value)
 */
	class MemberCategorySetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemberImage
 *
 * @property int $id
 * @property int|null $member_id
 * @property string $file_name
 * @property string|null $file_path
 * @property string|null $thumb_path
 * @property string|null $icon_path
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read mixed $thumb_url
 * @property-read mixed $url
 * @property-read \App\Models\Member|null $member
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImage newQuery()
 * @method static \Illuminate\Database\Query\Builder|MemberImage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImage recent()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImage whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImage whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImage whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImage whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImage whereIconPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImage whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImage whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImage whereThumbPath($value)
 * @method static \Illuminate\Database\Query\Builder|MemberImage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|MemberImage withoutTrashed()
 */
	class MemberImage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemberRelation
 *
 * @property int $id
 * @property int|null $member_id
 * @property string|null $name
 * @property string|null $gender
 * @property \Illuminate\Support\Carbon|null $dob
 * @property int|null $is_alive
 * @property int|null $relation_member_id
 * @property int $member_relation_type_id
 * @property bool|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Member|null $member
 * @property-read \App\Models\MemberRelationType|null $member_relation_type
 * @property-read \App\Models\Member|null $relative
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation newQuery()
 * @method static \Illuminate\Database\Query\Builder|MemberRelation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation whereIsAlive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation whereMemberRelationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation whereRelationMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|MemberRelation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|MemberRelation withoutTrashed()
 */
	class MemberRelation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemberRelationType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemberRelation[] $member_relations
 * @property-read int|null $member_relations_count
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelationType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberRelationType whereUpdatedAt($value)
 */
	class MemberRelationType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Module
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $controller
 * @property string|null $action
 * @property string|null $arguments
 * @property string|null $icon
 * @property bool|null $default_active
 * @property bool|null $add_to_menu
 * @property int|null $menu_position
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereAddToMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereArguments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereController($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDefaultActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereMenuPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereName($value)
 */
	class Module extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ModuleMenu
 *
 * @property int $id
 * @property int|null $module_id
 * @property string|null $display_name
 * @property string|null $controller
 * @property string|null $action
 * @property string|null $arguments
 * @property string|null $icon
 * @property int|null $position
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu whereArguments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu whereController($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleMenu wherePosition($value)
 */
	class ModuleMenu extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Notification
 *
 * @property int $id
 * @property string $type
 * @property int|null $notificaiton_type_id
 * @property int|null $organisation_id
 * @property int|null $member_account_id
 * @property int|null $source_id
 * @property int|null $target_id
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property string $data
 * @property string|null $read_at
 * @property bool|null $active
 * @property int|null $sent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MemberAccount|null $member_account
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\NotificationParam[] $notification_params
 * @property-read int|null $notification_params_count
 * @property-read \App\Models\NotificationType|null $notification_type
 * @property-read \App\Models\Organisation|null $organisation
 * @method static \Illuminate\Database\Eloquent\Builder|Notification active()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Query\Builder|Notification onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification sent()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereMemberAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereNotificaitonTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereTargetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Notification withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Notification withoutTrashed()
 */
	class Notification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NotificationParam
 *
 * @property int $id
 * @property int|null $member_account_notification_id
 * @property string|null $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \App\Models\Notification|null $notification
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationParam active()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationParam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationParam newQuery()
 * @method static \Illuminate\Database\Query\Builder|NotificationParam onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationParam query()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationParam whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationParam whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationParam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationParam whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationParam whereMemberAccountNotificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationParam whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationParam whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|NotificationParam withTrashed()
 * @method static \Illuminate\Database\Query\Builder|NotificationParam withoutTrashed()
 */
	class NotificationParam extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NotificationType
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $url
 * @property string|null $template
 * @property bool|null $groupable
 * @property string|null $source_type
 * @property string|null $target_type
 * @property bool|null $org_admin_only
 * @property bool|null $send_email
 * @property string|null $email_subject
 * @property bool|null $send_push_notification
 * @property string|null $icon
 * @property bool|null $org_login_required
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType newQuery()
 * @method static \Illuminate\Database\Query\Builder|NotificationType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereEmailSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereGroupable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereOrgAdminOnly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereOrgLoginRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereSendEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereSendPushNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereSourceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereTargetType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationType whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|NotificationType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|NotificationType withoutTrashed()
 */
	class NotificationType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Organisation
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $organisation_type_id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $post_code
 * @property int|null $country_id
 * @property int|null $currency_id
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $website
 * @property string|null $logo
 * @property string|null $short_description
 * @property string|null $long_description
 * @property string|null $mission
 * @property string|null $cover_photo
 * @property int|null $member_account_id
 * @property int|null $organisation_member_count
 * @property int|null $organisation_account_count
 * @property int|null $discoverable Allow organization to found in public search
 * @property int|null $allow_public_join Allow people to join this organization through the public interface
 * @property int|null $default_public_join_category Category members will be pushed into when they join via the public interface
 * @property int|null $public_directory_enabled
 * @property int|null $locked
 * @property int|null $verified
 * @property int|null $verified_by
 * @property int|null $referred_by Member Account ID of referrer
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property int|null $trashed
 * @property-read \App\Models\OrganisationSubscription|null $activeSubscription
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationAccount[] $organisationAccounts
 * @property-read int|null $organisation_accounts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationMember[] $organisationMembers
 * @property-read int|null $organisation_members_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationSubscription[] $organisationSubscriptions
 * @property-read int|null $organisation_subscriptions_count
 * @property-read \App\Models\OrganisationType|null $organisationType
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation active()
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation newQuery()
 * @method static \Illuminate\Database\Query\Builder|Organisation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereAllowPublicJoin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereCoverPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereDefaultPublicJoinCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereDiscoverable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereLongDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereMemberAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereMission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereOrganisationAccountCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereOrganisationMemberCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereOrganisationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation wherePostCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation wherePublicDirectoryEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereReferredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereTrashed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereVerifiedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisation whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|Organisation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Organisation withoutTrashed()
 */
	class Organisation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationAccount
 *
 * @property int $id
 * @property int $organisation_id
 * @property int|null $member_account_id
 * @property int|null $organisation_role_id
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property int|null $notifications
 * @property bool|null $weekly_updates
 * @property bool|null $active
 * @property bool|null $deleted
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read mixed $membership
 * @property-read \App\Models\MemberAccount|null $memberAccount
 * @property-read \App\Models\Organisation $organisation
 * @property-read \App\Models\OrganisationRole|null $organisationRole
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount active()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationAccount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount organisationIds(int $member_account_id)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount whereMemberAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount whereNotifications($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount whereOrganisationRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAccount whereWeeklyUpdates($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationAccount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationAccount withoutTrashed()
 */
	class OrganisationAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationAnniversary
 *
 * @property int $id
 * @property int $organisation_id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $organisation_member_anniversary_count
 * @property bool|null $show_on_reg_forms
 * @property bool|null $send_anniversary_message
 * @property string|null $message
 * @property bool|null $notify_on_anniversary
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Organisation $organisation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationMemberAnniversary[] $organisationMemberAnniversaries
 * @property-read int|null $organisation_member_anniversaries_count
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary active()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationAnniversary onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary whereNotifyOnAnniversary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary whereOrganisationMemberAnniversaryCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary whereSendAnniversaryMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationAnniversary whereShowOnRegForms($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationAnniversary withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationAnniversary withoutTrashed()
 */
	class OrganisationAnniversary extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationFileImport
 *
 * @property int $id
 * @property int|null $organisation_id
 * @property int|null $member_account_id
 * @property string|null $import_type
 * @property int|null $import_to_id Organisation Member Category to import to
 * @property string|null $file_path
 * @property string|null $file_name
 * @property string|null $import_status
 * @property int|null $records_imported
 * @property int|null $records_linked
 * @property int|null $records_existing
 * @property string|null $imported_ids
 * @property string|null $linked_ids
 * @property string|null $existing_ids
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property bool|null $deleted
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\MemberAccount|null $member_account
 * @property-read \App\Models\Organisation|null $organisation
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereExistingIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereImportStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereImportToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereImportType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereImportedIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereLinkedIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereMemberAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereRecordsExisting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereRecordsImported($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationFileImport whereRecordsLinked($value)
 */
	class OrganisationFileImport extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationGroup
 *
 * @property int $id
 * @property int $organisation_id
 * @property int|null $organisation_group_type_id
 * @property string|null $name
 * @property int|null $organisation_member_group_count
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Organisation $organisation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationGroupLeader[] $organisationGroupLeaders
 * @property-read int|null $organisation_group_leaders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationMemberGroup[] $organisationGroupMembers
 * @property-read int|null $organisation_group_members_count
 * @property-read \App\Models\OrganisationGroupType|null $organisationGroupType
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroup newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationGroup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroup whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroup whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroup whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroup whereOrganisationGroupTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroup whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroup whereOrganisationMemberGroupCount($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationGroup withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationGroup withoutTrashed()
 */
	class OrganisationGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationGroupLeader
 *
 * @property int $id
 * @property int|null $organisation_id
 * @property int|null $organisation_group_id
 * @property int|null $organisation_member_id
 * @property string|null $role
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Organisation|null $organisation
 * @property-read \App\Models\OrganisationGroup|null $organisationGroup
 * @property-read \App\Models\OrganisationMember|null $organisationMember
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupLeader newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupLeader newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationGroupLeader onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupLeader query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupLeader whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupLeader whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupLeader whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupLeader whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupLeader whereOrganisationGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupLeader whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupLeader whereOrganisationMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupLeader whereRole($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationGroupLeader withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationGroupLeader withoutTrashed()
 */
	class OrganisationGroupLeader extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationGroupType
 *
 * @property int $id
 * @property int $organisation_id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $show_on_reg_forms
 * @property int|null $allow_multi_select
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Organisation $organisation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationGroup[] $organisationGroups
 * @property-read int|null $organisation_groups_count
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupType newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationGroupType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupType query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupType whereAllowMultiSelect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupType whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupType whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupType whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationGroupType whereShowOnRegForms($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationGroupType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationGroupType withoutTrashed()
 */
	class OrganisationGroupType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationInvoice
 *
 * @property int $id
 * @property int|null $organisation_id
 * @property int|null $transaction_type_id
 * @property int|null $member_account_id
 * @property string|null $invoice_no
 * @property bool|null $paid
 * @property int|null $currency_id
 * @property float|null $total_due
 * @property \Illuminate\Support\Carbon|null $due_date
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $deleted
 * @property int|null $deleted_by
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\Organisation|null $organisation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationInvoiceItem[] $organisationInvoiceItems
 * @property-read int|null $organisation_invoice_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationInvoicePayment[] $organisationInvoicePayments
 * @property-read int|null $organisation_invoice_payments_count
 * @property-read \App\Models\SmsAccountTopup|null $smsAccountTopup
 * @property-read \App\Models\TransactionType|null $transactionType
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationInvoice onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice whereInvoiceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice whereMemberAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice whereTotalDue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoice whereTransactionTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationInvoice withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationInvoice withoutTrashed()
 */
	class OrganisationInvoice extends \Eloquent implements \LaravelApiBase\Models\ApiModelInterface {}
}

namespace App\Models{
/**
 * App\Models\OrganisationInvoiceItem
 *
 * @property int $id
 * @property int|null $organisation_invoice_id
 * @property int|null $qty
 * @property string|null $product_type
 * @property int|null $product_id
 * @property string|null $description
 * @property float|null $unit_price
 * @property float|null $tax_amount
 * @property float|null $gross_total
 * @property float|null $total
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $deleted
 * @property-read \App\Models\Organisation $organisation
 * @property-read \App\Models\OrganisationInvoice|null $organisationInvoice
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationInvoiceItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem whereGrossTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem whereOrganisationInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem whereProductType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem whereTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoiceItem whereUnitPrice($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationInvoiceItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationInvoiceItem withoutTrashed()
 */
	class OrganisationInvoiceItem extends \Eloquent implements \LaravelApiBase\Models\ApiModelInterface {}
}

namespace App\Models{
/**
 * App\Models\OrganisationInvoicePayment
 *
 * @property int $id
 * @property int|null $organisation_invoice_id
 * @property int|null $payment_type_id
 * @property float|null $amount
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $payment_date
 * @property string|null $payee_name
 * @property int|null $member_account_id
 * @property string|null $transaction_id
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $deleted
 * @property-read \App\Models\OrganisationInvoice|null $organisationInvoice
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationInvoicePayment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment whereMemberAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment whereOrganisationInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment wherePayeeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment wherePaymentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationInvoicePayment whereTransactionId($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationInvoicePayment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationInvoicePayment withoutTrashed()
 */
	class OrganisationInvoicePayment extends \Eloquent implements \LaravelApiBase\Models\ApiModelInterface {}
}

namespace App\Models{
/**
 * App\Models\OrganisationMember
 *
 * @property int $id
 * @property int $organisation_id
 * @property int|null $member_id
 * @property string|null $organisation_no
 * @property int|null $organisation_member_category_id
 * @property int|null $organisation_registration_form_id
 * @property string|null $status
 * @property string|null $source
 * @property string|null $membership_start_dt
 * @property string|null $membership_end_dt
 * @property string|null $last_renewal_dt
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property int|null $approved
 * @property int|null $approved_by
 * @property array|null $custom_attributes
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Member|null $member
 * @property-read \App\Models\Organisation $organisation
 * @property-read \App\Models\OrganisationMemberCategory|null $organisationMemberCategory
 * @property-read \App\Models\OrganisationRegistrationForm|null $organisationRegistrationForm
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember active()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember approved()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember inOrganisation($organisaiton_id)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember notInMemberIds(array $memberIds)
 * @method static \Illuminate\Database\Query\Builder|OrganisationMember onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember organisationIds(int $member_id)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember registeredWith($registration_form_id = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember unapproved()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereCustomAttributes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereLastRenewalDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereMembershipEndDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereMembershipStartDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereOrganisationMemberCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereOrganisationNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereOrganisationRegistrationFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMember whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationMember withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationMember withoutTrashed()
 */
	class OrganisationMember extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationMemberAnniversary
 *
 * @property int $id
 * @property int $organisation_id
 * @property int|null $organisation_member_id
 * @property int|null $organisation_anniversary_id
 * @property \Illuminate\Support\Carbon|null $value
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \App\Models\Organisation $organisation
 * @property-read \App\Models\OrganisationAnniversary|null $organisationAnniversary
 * @property-read \App\Models\OrganisationMember|null $organisationMember
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberAnniversary active()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberAnniversary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberAnniversary newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationMemberAnniversary onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberAnniversary query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberAnniversary whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberAnniversary whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberAnniversary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberAnniversary whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberAnniversary whereOrganisationAnniversaryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberAnniversary whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberAnniversary whereOrganisationMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberAnniversary whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationMemberAnniversary withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationMemberAnniversary withoutTrashed()
 */
	class OrganisationMemberAnniversary extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationMemberCategory
 *
 * @property int $id
 * @property int $organisation_id
 * @property int|null $parent_id
 * @property int|null $lft
 * @property int|null $rght
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $description
 * @property bool|null $auto_gen_ids
 * @property string|null $id_prefix
 * @property string|null $id_suffix
 * @property int|null $id_next_increment
 * @property int|null $default
 * @property int|null $organisation_member_count
 * @property int|null $rank
 * @property bool|null $paid_membership
 * @property bool|null $payment_required Payment required before creating this membership
 * @property float|null $price
 * @property float|null $registration_fee
 * @property string|null $renewal_frequency
 * @property bool|null $publicly_joinable Members can choose to join this category from public interface
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|OrganisationMemberCategory[] $children
 * @property-read int|null $children_count
 * @property-read \App\Models\Organisation $organisation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationMember[] $organisationMembers
 * @property-read int|null $organisation_members_count
 * @property-read OrganisationMemberCategory|null $parent
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|static[] all($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory breadthFirst()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory depthFirst()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|static[] get($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory getExpressionGrammar()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory hasChildren()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory hasParent()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory isLeaf()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory isRoot()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory newModelQuery()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationMemberCategory onlyTrashed()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory query()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory tree($maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory treeOf(callable $constraint, $maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereActive($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereAutoGenIds($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereCreated($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereDefault($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereDepth($operator, $value = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereDescription($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereIdNextIncrement($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereIdPrefix($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereIdSuffix($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereLft($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereModified($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereName($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereOrganisationId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereOrganisationMemberCount($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory wherePaidMembership($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereParentId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory wherePaymentRequired($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory wherePrice($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory wherePubliclyJoinable($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereRank($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereRegistrationFee($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereRenewalFrequency($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereRght($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory whereSlug($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory withGlobalScopes(array $scopes)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|OrganisationMemberCategory withRelationshipExpression($direction, callable $constraint, $initialDepth, $from = null, $maxDepth = null)
 * @method static \Illuminate\Database\Query\Builder|OrganisationMemberCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationMemberCategory withoutTrashed()
 */
	class OrganisationMemberCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationMemberCategorySetting
 *
 * @property int $id
 * @property int $organisation_id
 * @property int|null $organisation_member_category_id
 * @property int|null $member_category_setting_id
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberCategorySetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberCategorySetting newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationMemberCategorySetting onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberCategorySetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberCategorySetting whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberCategorySetting whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberCategorySetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberCategorySetting whereMemberCategorySettingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberCategorySetting whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberCategorySetting whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberCategorySetting whereOrganisationMemberCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberCategorySetting whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationMemberCategorySetting withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationMemberCategorySetting withoutTrashed()
 */
	class OrganisationMemberCategorySetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationMemberGroup
 *
 * @property int $id
 * @property int|null $organisation_id
 * @property int|null $organisation_member_id
 * @property int|null $organisation_group_id
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Organisation|null $organisation
 * @property-read \App\Models\OrganisationGroup|null $organisationGroup
 * @property-read \App\Models\OrganisationMember|null $organisationMember
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberGroup newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationMemberGroup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberGroup whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberGroup whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberGroup whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberGroup whereOrganisationGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberGroup whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberGroup whereOrganisationMemberId($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationMemberGroup withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationMemberGroup withoutTrashed()
 */
	class OrganisationMemberGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationMemberImport
 *
 * @property int $id
 * @property int $organisation_id
 * @property int $organisation_file_import_id
 * @property int $organisation_member_id
 * @property string|null $import_type linked, imported, existing
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Organisation $organisation
 * @property-read \App\Models\OrganisationFileImport $organisationFileImport
 * @property-read \App\Models\OrganisationMember $organisationMember
 * @method static \Database\Factories\OrganisationMemberImportFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberImport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberImport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberImport query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberImport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberImport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberImport whereImportType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberImport whereOrganisationFileImportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberImport whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberImport whereOrganisationMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationMemberImport whereUpdatedAt($value)
 */
	class OrganisationMemberImport extends \Eloquent implements \LaravelApiBase\Models\ApiModelInterface {}
}

namespace App\Models{
/**
 * App\Models\OrganisationModule
 *
 * @property int $id
 * @property int|null $organisation_id
 * @property int|null $module_id
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationModule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationModule newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationModule onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationModule query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationModule whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationModule whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationModule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationModule whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationModule whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationModule whereOrganisationId($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationModule withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationModule withoutTrashed()
 */
	class OrganisationModule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationPaymentPlatform
 *
 * @property int $id
 * @property int|null $organisation_id
 * @property int|null $payment_platform_id
 * @property int|null $currency_id
 * @property int|null $country_id
 * @property array|null $config
 * @property string|null $platform_mode
 * @property string|null $member_registration_instruction
 * @property string|null $event_registration_instruction
 * @property string|null $general_instructions
 * @property bool|null $system_generated
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $deleted
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\Organisation|null $organisation
 * @property-read \App\Models\PaymentPlatform|null $paymentPlatform
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationPaymentPlatform onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform whereEventRegistrationInstruction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform whereGeneralInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform whereMemberRegistrationInstruction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform wherePaymentPlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform wherePlatformMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationPaymentPlatform whereSystemGenerated($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationPaymentPlatform withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationPaymentPlatform withoutTrashed()
 */
	class OrganisationPaymentPlatform extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationRegistrationForm
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $slug
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $expiration_dt
 * @property string|null $excluded_standard_fields
 * @property bool $form_enabled
 * @property array|null $custom_fields
 * @property int $organisation_id
 * @property int $organisation_member_category_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationMember[] $approvedRegistrants
 * @property-read int|null $approved_registrants_count
 * @property-read \App\Models\Organisation $organisation
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationMember[] $registrants
 * @property-read int|null $registrants_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationMember[] $unapprovedRegistrants
 * @property-read int|null $unapproved_registrants_count
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationRegistrationForm onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereCustomFields($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereExcludedStandardFields($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereExpirationDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereFormEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereOrganisationMemberCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRegistrationForm whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationRegistrationForm withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationRegistrationForm withoutTrashed()
 */
	class OrganisationRegistrationForm extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationRole
 *
 * @property int $id
 * @property int $organisation_id
 * @property string|null $name
 * @property string|null $guard_name
 * @property string|null $description
 * @property bool|null $admin_access
 * @property bool|null $weekly_activity_update
 * @property bool|null $birthday_updates
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\Organisation $organisation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationAccount[] $organisationAccounts
 * @property-read int|null $organisation_accounts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationRole onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole whereAdminAccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole whereBirthdayUpdates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRole whereWeeklyActivityUpdate($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationRole withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationRole withoutTrashed()
 */
	class OrganisationRole extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationRoleModule
 *
 * @property int $id
 * @property int|null $organisation_role_id
 * @property int|null $module_id
 * @property string|null $module_menu_ids Comma separated list of module_menu_id values
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRoleModule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRoleModule newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrganisationRoleModule onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRoleModule query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRoleModule whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRoleModule whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRoleModule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRoleModule whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRoleModule whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRoleModule whereModuleMenuIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRoleModule whereOrganisationRoleId($value)
 * @method static \Illuminate\Database\Query\Builder|OrganisationRoleModule withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrganisationRoleModule withoutTrashed()
 */
	class OrganisationRoleModule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationRolePermission
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemberAccount[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRolePermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRolePermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRolePermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRolePermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRolePermission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRolePermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRolePermission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationRolePermission whereUpdatedAt($value)
 */
	class OrganisationRolePermission extends \Eloquent implements \LaravelApiBase\Models\ApiModelInterface {}
}

namespace App\Models{
/**
 * App\Models\OrganisationSetting
 *
 * @property int $id
 * @property int $organisation_id
 * @property int|null $organisation_setting_type_id
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property-read \App\Models\Organisation $organisation
 * @property-read \App\Models\OrganisationSettingType|null $organisationSettingType
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSetting whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSetting whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSetting whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSetting whereOrganisationSettingTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSetting whereValue($value)
 */
	class OrganisationSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationSettingType
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $type
 * @property string|null $default
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationSetting[] $organisationSettings
 * @property-read int|null $organisation_settings_count
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSettingType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSettingType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSettingType query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSettingType whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSettingType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSettingType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSettingType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSettingType whereType($value)
 */
	class OrganisationSettingType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrganisationSubscription
 *
 * @property int $id
 * @property int $organisation_id
 * @property int|null $subscription_type_id
 * @property int|null $organisation_invoice_id
 * @property \Illuminate\Support\Carbon|null $start_dt
 * @property \Illuminate\Support\Carbon|null $end_dt
 * @property int|null $length
 * @property bool|null $current
 * @property \Illuminate\Support\Carbon|null $last_renewal_notice_dt
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property-read \App\Models\Organisation $organisation
 * @property-read \App\Models\OrganisationInvoice|null $organisationInvoice
 * @property-read \App\Models\SubscriptionType|null $subscriptionType
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription whereCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription whereEndDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription whereLastRenewalNoticeDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription whereOrganisationInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription whereStartDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationSubscription whereSubscriptionTypeId($value)
 */
	class OrganisationSubscription extends \Eloquent implements \LaravelApiBase\Models\ApiModelInterface {}
}

namespace App\Models{
/**
 * App\Models\OrganisationType
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $organisation_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Organisation[] $organisations
 * @property-read int|null $organisations_count
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrganisationType whereOrganisationCount($value)
 */
	class OrganisationType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentPlatform
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $method_name
 * @property string|null $config_keys Comma seperated list of keys for configuring the platform connection
 * @property string|null $logo
 * @property string|null $instructions
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $deleted
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPlatform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPlatform newQuery()
 * @method static \Illuminate\Database\Query\Builder|PaymentPlatform onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPlatform query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPlatform whereConfigKeys($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPlatform whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPlatform whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPlatform whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPlatform whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPlatform whereInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPlatform whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPlatform whereMethodName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPlatform whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPlatform whereName($value)
 * @method static \Illuminate\Database\Query\Builder|PaymentPlatform withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PaymentPlatform withoutTrashed()
 */
	class PaymentPlatform extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SmsAccount
 *
 * @property int $id
 * @property int|null $organisation_id
 * @property string|null $sender_id
 * @property int|null $account_balance
 * @property int|null $bonus_balance
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read mixed $available_credit
 * @property-read \App\Models\Organisation|null $organisation
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccount newQuery()
 * @method static \Illuminate\Database\Query\Builder|SmsAccount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccount whereAccountBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccount whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccount whereBonusBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccount whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccount whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccount whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccount whereSenderId($value)
 * @method static \Illuminate\Database\Query\Builder|SmsAccount withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SmsAccount withoutTrashed()
 */
	class SmsAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SmsAccountMessage
 *
 * @property int $id
 * @property int|null $module_sms_account_id
 * @property int|null $member_id
 * @property string|null $to
 * @property string|null $message
 * @property string|null $sender_id
 * @property int|null $module_sms_account_broadcast_id
 * @property bool|null $bday_msg
 * @property \Illuminate\Support\Carbon|null $sent_at
 * @property int|null $sent
 * @property int|null $sent_by
 * @property string|null $sent_status
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \App\Models\SmsBroadcast|null $broadcast
 * @property-read mixed $pages
 * @property-read \App\Models\Member|null $member
 * @property-read \App\Models\OrganisationAccount|null $sender
 * @property-read \App\Models\SmsAccount|null $smsAccount
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage latestYears()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage newQuery()
 * @method static \Illuminate\Database\Query\Builder|SmsAccountMessage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage sent()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage unsent()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereBdayMsg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereModuleSmsAccountBroadcastId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereModuleSmsAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereSentBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereSentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountMessage whereTo($value)
 * @method static \Illuminate\Database\Query\Builder|SmsAccountMessage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SmsAccountMessage withoutTrashed()
 */
	class SmsAccountMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SmsAccountTopup
 *
 * @property int $id
 * @property int|null $module_sms_account_id
 * @property int|null $organisation_invoice_id
 * @property int|null $module_sms_credit_id
 * @property int|null $credit_amount
 * @property bool|null $credited Set to 1 if the value has been assigned to the sms_account
 * @property bool|null $is_bonus
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $deleted
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\OrganisationInvoice|null $organisationInvoice
 * @property-read \App\Models\SmsAccount|null $smsAccount
 * @property-read \App\Models\SmsCredit|null $smsCredit
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountTopup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountTopup newQuery()
 * @method static \Illuminate\Database\Query\Builder|SmsAccountTopup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountTopup query()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountTopup whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountTopup whereCreditAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountTopup whereCredited($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountTopup whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountTopup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountTopup whereIsBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountTopup whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountTopup whereModuleSmsAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountTopup whereModuleSmsCreditId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsAccountTopup whereOrganisationInvoiceId($value)
 * @method static \Illuminate\Database\Query\Builder|SmsAccountTopup withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SmsAccountTopup withoutTrashed()
 */
	class SmsAccountTopup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SmsBroadcast
 *
 * @property int $id
 * @property int|null $module_sms_account_id
 * @property int|null $module_sms_broadcast_list_id
 * @property int|null $organisation_member_category_id
 * @property int|null $include_sub_categories
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $send_at
 * @property int|null $sent_offset
 * @property int|null $sent_count
 * @property int|null $sent_pages
 * @property bool|null $sent
 * @property int|null $scheduled_by
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read mixed $message_pages
 * @property-read mixed $sender_id
 * @property-read \App\Models\OrganisationMemberCategory|null $organisationMemberCategory
 * @property-read \App\Models\OrganisationAccount|null $scheduledBy
 * @property-read \App\Models\OrganisationAccount|null $scheduler
 * @property-read \App\Models\SmsAccount|null $smsAccount
 * @property-read \App\Models\SmsBroadcastList|null $smsBroadcastList
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast newQuery()
 * @method static \Illuminate\Database\Query\Builder|SmsBroadcast onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast query()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast readyToSend()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast sent()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast unsent()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereIncludeSubCategories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereModuleSmsAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereModuleSmsBroadcastListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereOrganisationMemberCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereScheduledBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereSendAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereSentCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereSentOffset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcast whereSentPages($value)
 * @method static \Illuminate\Database\Query\Builder|SmsBroadcast withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SmsBroadcast withoutTrashed()
 */
	class SmsBroadcast extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SmsBroadcastList
 *
 * @property int $id
 * @property int|null $organisation_id
 * @property int|null $module_sms_account_id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $sender_id
 * @property int|null $size
 * @property array|null $filters
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\SmsAccount|null $smsAccount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SmsBroadcast[] $smsBroadcast
 * @property-read int|null $sms_broadcast_count
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList newQuery()
 * @method static \Illuminate\Database\Query\Builder|SmsBroadcastList onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList query()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList whereFilters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList whereModuleSmsAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastList whereType($value)
 * @method static \Illuminate\Database\Query\Builder|SmsBroadcastList withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SmsBroadcastList withoutTrashed()
 */
	class SmsBroadcastList extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SmsBroadcastListContact
 *
 * @property int $id
 * @property int|null $module_sms_broadcast_list_id
 * @property int|null $member_id
 * @property string|null $name
 * @property string|null $number
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListContact newQuery()
 * @method static \Illuminate\Database\Query\Builder|SmsBroadcastListContact onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListContact whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListContact whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListContact whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListContact whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListContact whereModuleSmsBroadcastListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListContact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListContact whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|SmsBroadcastListContact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SmsBroadcastListContact withoutTrashed()
 */
	class SmsBroadcastListContact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SmsBroadcastListFilter
 *
 * @property int $id
 * @property int|null $organisation_id
 * @property int|null $module_sms_broadcast_list_id
 * @property string|null $field
 * @property string|null $condition
 * @property string|null $value
 * @property bool|null $optional
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListFilter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListFilter newQuery()
 * @method static \Illuminate\Database\Query\Builder|SmsBroadcastListFilter onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListFilter query()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListFilter whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListFilter whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListFilter whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListFilter whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListFilter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListFilter whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListFilter whereModuleSmsBroadcastListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListFilter whereOptional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListFilter whereOrganisationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsBroadcastListFilter whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|SmsBroadcastListFilter withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SmsBroadcastListFilter withoutTrashed()
 */
	class SmsBroadcastListFilter extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SmsCredit
 *
 * @property int $id
 * @property int|null $credit_amount
 * @property float|null $cost
 * @property float|null $unit_price
 * @property int|null $currency_id
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \App\Models\Currency|null $currency
 * @method static \Illuminate\Database\Eloquent\Builder|SmsCredit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsCredit newQuery()
 * @method static \Illuminate\Database\Query\Builder|SmsCredit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsCredit query()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsCredit whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsCredit whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsCredit whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsCredit whereCreditAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsCredit whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsCredit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsCredit whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsCredit whereUnitPrice($value)
 * @method static \Illuminate\Database\Query\Builder|SmsCredit withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SmsCredit withoutTrashed()
 */
	class SmsCredit extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubscriptionType
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $capacity
 * @property string|null $validity
 * @property int|null $currency_id
 * @property float|null $initial_price
 * @property float|null $renewal_price
 * @property string|null $billing_required
 * @property int|null $initial_sms_credit
 * @property int|null $monthly_sms_bonus
 * @property int|null $accounts
 * @property string|null $reporting
 * @property bool|null $revenue_tracking
 * @property bool|null $expenditure_tracking
 * @property bool|null $events
 * @property bool|null $featured
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $promotional
 * @property bool|null $active
 * @property-read \App\Models\Currency|null $currency
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationSubscription[] $organisationSubscriptions
 * @property-read int|null $organisation_subscriptions_count
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType newQuery()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereAccounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereBillingRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereEvents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereExpenditureTracking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereInitialPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereInitialSmsCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereMonthlySmsBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType wherePromotional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereRenewalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereReporting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereRevenueTracking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereValidity($value)
 * @method static \Illuminate\Database\Query\Builder|SubscriptionType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SubscriptionType withoutTrashed()
 */
	class SubscriptionType extends \Eloquent {}
}

namespace App\Models\Support{
/**
 * App\Models\Support\SmsLog
 *
 * @property int $id
 * @property string|null $sender_id
 * @property string|null $to
 * @property string|null $message
 * @property string|null $message_id
 * @property int|null $status_code
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $deleted
 * @method static \Illuminate\Database\Eloquent\Builder|SmsLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsLog newQuery()
 * @method static \Illuminate\Database\Query\Builder|SmsLog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|SmsLog whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsLog whereDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsLog whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsLog whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsLog whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsLog whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsLog whereStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsLog whereTo($value)
 * @method static \Illuminate\Database\Query\Builder|SmsLog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SmsLog withoutTrashed()
 */
	class SmsLog extends \Eloquent {}
}

namespace App\Models\Support{
/**
 * App\Models\Support\SupportModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SupportModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportModel query()
 */
	class SupportModel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SystemSetting
 *
 * @property int $id
 * @property int|null $setting_type_category_id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $description
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSetting whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSetting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSetting whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSetting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSetting whereSettingTypeCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSetting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSetting whereValue($value)
 */
	class SystemSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SystemSettingCategory
 *
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettingCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettingCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettingCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettingCategory whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettingCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettingCategory whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemSettingCategory whereName($value)
 */
	class SystemSettingCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TransactionType
 *
 * @property int $id
 * @property string|null $group
 * @property string|null $name
 * @property bool|null $member_can_cancel
 * @property \Illuminate\Support\Carbon|null $created
 * @property \Illuminate\Support\Carbon|null $modified
 * @property bool|null $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrganisationInvoice[] $organisationInvoices
 * @property-read int|null $organisation_invoices_count
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionType newQuery()
 * @method static \Illuminate\Database\Query\Builder|TransactionType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionType query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionType whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionType whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionType whereMemberCanCancel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionType whereModified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransactionType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|TransactionType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TransactionType withoutTrashed()
 */
	class TransactionType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string|null $pass_salt
 * @property string|null $email
 * @property int|null $department_id
 * @property string|null $team
 * @property int|null $user_role_id
 * @property string|null $security_question
 * @property string|null $security_answer
 * @property string|null $last_access_dt
 * @property int|null $active
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastAccessDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassSalt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSecurityAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSecurityQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}


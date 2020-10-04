<?php

namespace App\Models;

use App\Traits\SoftDeletesWithDeletedFlag;
use Torzer\Awesome\Landlord\BelongsToTenants;

class OrganisationInvoice extends ApiModel
{

    use BelongsToTenants, SoftDeletesWithDeletedFlag;

    // override default soft delete column
    const DELETED_AT = 'deleted';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_invoices';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'transaction_type_id', 'member_account_id', 'invoice_no', 'paid', 'currency_id', 'total_due', 'due_date', 'notes', 'created', 'modified', 'deleted', 'deleted_by'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = ['paid' => 'boolean', 'deleted' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['due_date', 'created', 'modified'];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }

    public function organisationInvoiceItems()
    {
        return $this->hasMany(OrganisationInvoiceItem::class);
    }

    public function organisationInvoicePayments()
    {
        return $this->hasMany(OrganisationInvoicePayment::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public static function createSubscriptionInvoice(int $organisation_id, int $subscriptionTypeId, int $subscriptionLength, string $transactionType = 'Subscription Purchase')
    {
        $transactionType = TransactionType::where('name', $transactionType)->first();
        $subscriptionType = SubscriptionType::find($subscriptionTypeId);

        $invoice = self::create([
            'organisation_id' => $organisation_id,
            'transaction_type_id' => $transactionType->id,
            'currency_id' => $subscriptionType->currency_id,
            'paid' => $subscriptionType->billing_required == 'yes' ? 0 : 1,
            'member_account_id' => auth()->user()->id,
            'due_date' => date('Y-m-d H:i:s', strtotime("+7 days")),
            'notes' => "Your new organisation will be temporarily enabled for <b>7 days</b> within which you will be required to make
                    payment for your chosen subscription via any cash, cheque or bank transfer to the indicated bank account. <br /><br />

                    Your new organisation setup will be disabled after <b>7 days</b> pending payment.",
        ]);

        if ($invoice) {
            self::saveSubscriptionInvoiceItems($invoice, $subscriptionType, $subscriptionLength);
            self::applyDiscountInvoiceItems($invoice, $subscriptionType, $subscriptionLength);
            self::applyProratedDiscountOnUpgrade($invoice, $subscriptionType, $subscriptionLength, $transactionType->name);
        }

        return $invoice;
    }

    public static function saveSubscriptionInvoiceItems(OrganisationInvoice $invoice, SubscriptionType $subscriptionType, int $subscriptionLength)
    {
        $invoice->organisation_invoice_item()->saveMany([
            new OrganisationInvoiceItem([
                'qty' => $subscriptionLength,
                'product_type' => 'subscription',
                'product_id' => $subscriptionType->id,
                'description' => $subscriptionType->description . ' Subscription ' . ($subscriptionType->billing_required ? '(1 Month)' : ''),
                'unit_price' => $subscriptionType->initial_price,
                'total' => $subscriptionLength * doubleval($subscriptionType->initial_price),
            ]),
        ]);
    }

    public static function applyDiscountInvoiceItems(OrganisationInvoice $invoice, SubscriptionType $subscriptionType, int $subscriptionLength)
    {
        $discountMonths = floor($subscriptionLength / 6);

        if ($discountMonths) {
            $invoice->organisation_invoice_item()->saveMany([
                new OrganisationInvoiceItem([
                    'qty' => $discountMonths,
                    'product_type' => 'subscription',
                    'product_id' => $subscriptionType->id,
                    'description' => $subscriptionType->description . ' Subscription Discount',
                    'unit_price' => -$subscriptionType->initial_price,
                    'total' => -intval($discountMonths) * doubleval($subscriptionType->initial_price),
                ]),
            ]);
        }
    }

    public static function applyProratedDiscountOnUpgrade(OrganisationInvoice $invoice, SubscriptionType $subscriptionType, int $subscriptionLength, string $transactionType)
    {
        if ($transactionType != 'Subscription Upgrade') {
            return;
        }

        $subscription = OrganisationSubscription::getCurrentSubscription($invoice->organisation_id);

        if ($subscription->hasProrateDiscount()) {
            $invoice->organisation_invoice_item()->saveMany([
                new OrganisationInvoiceItem([
                    'qty' => 1,
                    'product_type' => 'subscription',
                    'product_id' => $subscriptionType->id,
                    'description' => $subscriptionType->description . ' Prorate Discount',
                    'unit_price' => -$subscription->remaining_balance,
                    'total' => -$subscription->remaining_balance,
                ]),
            ]);
        }
    }

}

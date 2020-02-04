<?php

namespace App\Models;

use Carbon\Carbon;
use Torzer\Awesome\Landlord\BelongsToTenants;

class OrganisationInvoice extends ApiModel  
{

    use BelongsToTenants;

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


    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function transaction_type() {
        return $this->belongsTo(TransactionType::class);
    }

    public function organisation_invoice_item() {
        return $this->hasMany(OrganisationInvoiceItem::class);
    }

    public function organisation_invoice_payment() {
        return $this->hasMany(OrganisationInvoicePayment::class);
    }

    public function currency() {
        return $this->belongsTo(Currency::class);
    }

    public static function createSubscriptionInvoice(int $organisation_id, int $subscriptionTypeId, int $subscriptionLength, string $transactionType = 'Subscription Purchase') {
        $transactionType = TransactionType::where('name', $transactionType)->first();
        $subscriptionType = SubscriptionType::find($subscriptionTypeId);

        $invoice = self::create([
            'organisation_id' => $organisation_id,
            'transaction_type_id' => $transactionType->id,
            'currency_id' => $subscriptionType->currency_id,
            'paid' => $subscriptionType->billing_required ? 0 : 1,
            'member_account_id' => auth()->user()->id,
            'due_date' => date('Y-m-d H:i:s', strtotime("+7 days")),
            'notes' => "Your new organisation will be temporarily enabled for <b>7 days</b> within which you will be required to make
                    payment for your chosen subscription via any cash, cheque or bank transfer to the indicated bank account. <br /><br />
                    
                    Your new organisation setup will be disabled after <b>7 days</b> pending payment."
        ]);

        if( $invoice ) {
            self::saveSubscriptionInvoiceItems($invoice, $subscriptionType, $subscriptionLength);
            self::applyDiscountInvoiceItems($invoice, $subscriptionType, $subscriptionLength);
            self::applyProratedDiscountOnUpgrade($invoice, $subscriptionType, $subscriptionLength, $transactionType);
        }

        return $invoice;
    }

    public static function saveSubscriptionInvoiceItems(OrganisationInvoice $invoice, SubscriptionType $subscriptionType, int $subscriptionLength) {
        $invoice->organisation_invoice_item()->saveMany([
            new OrganisationInvoiceItem([
                'qty' => $subscriptionLength,
                'product_type' => 'subscription',
                'product_id' => $subscriptionType->id,
                'description' => $subscriptionType->description . ' Subscription ' . ($subscriptionType->billing_required ? '(1 Month)' : ''),
                'unit_price' => $subscriptionType->initial_price,
                'total' => $subscriptionLength * doubleval($subscriptionType->initial_price)
            ])
        ]);
    }

    public static function applyDiscountInvoiceItems(OrganisationInvoice $invoice, SubscriptionType $subscriptionType, int $subscriptionLength) {
        $discountMonths = floor($subscriptionLength / 6);

        if( $discountMonths ) {
            $invoice->organisation_invoice_item()->saveMany([
                new OrganisationInvoiceItem([
                    'qty' => $discountMonths,
                    'product_type' => 'subscription',
                    'product_id' => $subscriptionType->id,
                    'description' => $subscriptionType->description . ' Subscription Discount',
                    'unit_price' => -$subscriptionType->initial_price,
                    'total' => -intval($discountMonths) * doubleval($subscriptionType->initial_price)
                ])
            ]);
        }
    }

    public static function applyProratedDiscountOnUpgrade(OrganisationInvoice $invoice, SubscriptionType $subscriptionType, int $subscriptionLength, string $transactionType) {
        if( $transactionType != 'Subscription Upgrade' ) {
            return;
        }

        //$invoice->organisation->active_subscription->remaining_balance;
    }

    public function oldVersion() {
    //     $OrgInvoice = ClassRegistry::init("OrganisationInvoice");
    //     $next_invoice_id = $OrgInvoice->getNextAutoIncrement();
    //     $organisation_id = $org_subscription_data['OrganisationSubscription']['organisation_id'];
    //     $invoice_no = $organisation_id . str_pad($next_invoice_id, 5, '0', STR_PAD_LEFT);
    //     $transaction_type_id = ClassRegistry::init('TransactionType')->getTypeId( $subscription_type );
    //     $billing_required = $org_subscription_data['SubscriptionType']['billing_required'] == 'yes';
        
    //     $data = array(
    //         'OrganisationInvoice' => array(
    //             'organisation_id' => $organisation_id,
    //             'transaction_type_id' => $transaction_type_id,
    //             'invoice_no' => $invoice_no,
    //             'currency_id' => $org_subscription_data['SubscriptionType']['currency_id'],
    //             'paid' => $billing_required ? 0 : 1,
    //             'member_account_id' => $member_account_id,
    //             'due_date' => date('Y-m-d H:i:s', strtotime("+7 days")),
    //             'notes' => "Your new organisation will be temporarily enabled for <b>7 days</b> within which you will be required to make
    //                     payment for your chosen subscription via any cash, cheque or bank transfer to the indicated bank account. <br /><br />
                        
    //                     Your new organisation setup will be disabled after <b>7 days</b> pending payment."
    //         ),
    //         'OrganisationInvoiceItem' => array(
    //             array(
    //                 'qty' => $org_subscription_data['OrganisationSubscription']['length'],
    //                 'product_type' => 'subscription',
    //                 'product_id' => $org_subscription_data['OrganisationSubscription']['id'],
    //                 'description' => $org_subscription_data['SubscriptionType']['description'] . ' Subscription ' . ($billing_required ? '(1 Month)' : ''),
    //                 'unit_price' => $org_subscription_data['SubscriptionType']['initial_price'],
    //                 'total' => intval($org_subscription_data['OrganisationSubscription']['length']) * doubleval($org_subscription_data['SubscriptionType']['initial_price'])
    //             )
    //         )
    //     );
        
    //     $discount_months = floor($org_subscription_data['OrganisationSubscription']['length'] / 6);
        
    //     if( $discount_months ) {
    //         $data['OrganisationInvoiceItem'][] = array(
    //             'qty' => $discount_months,
    //             'product_type' => 'subscription',
    //             'product_id' => $org_subscription_data['OrganisationSubscription']['id'],
    //             'description' => $org_subscription_data['SubscriptionType']['description'] . ' Subscription Discount',
    //             'unit_price' => -$org_subscription_data['SubscriptionType']['initial_price'],
    //             'total' => -intval($discount_months) * doubleval($org_subscription_data['SubscriptionType']['initial_price'])
    //         );
    //     }
        
    //     // record prorated discount as invoice line item only if doing an upgrade
    //     if( $subscription_type == 'Subscription Upgrade' ) {
    //         $org = $this->Organisation->getOrganisationInfo($organisation_id);
            
    //         if( $org['OrganisationSubscription']['remaining_balance'] > 0 && $org['OrganisationSubscription']['SubscriptionType']['billing_required'] == 'yes' ) {
    //             $data['OrganisationInvoiceItem'][] = array(
    //                 'qty' => 1,
    //                 'product_type' => 'subscription',
    //                 'product_id' => $org_subscription_data['OrganisationSubscription']['id'],
    //                 'description' => $org['OrganisationSubscription']['SubscriptionType']['description'] . ' Prorate Discount',
    //                 'unit_price' => -$org['OrganisationSubscription']['remaining_balance'],
    //                 'total' => -$org['OrganisationSubscription']['remaining_balance']
    //             );
    //         }
    //     }
    //     // end prorate discount line item addition
        
    //     // calculate and set the total due for the invoice
    //     $total_due = 0;
    //     foreach($data['OrganisationInvoiceItem'] as $item) {
    //         $total_due += $item['total'];
    //     }
        
    //     $data['OrganisationInvoice']['total_due'] = $total_due;
    //     // end calculation
        
        
    //     try {
            
    //         $result = $OrgInvoice->saveAll($data);

    //         if( $result ) {
    //             $org_invoice_id = $OrgInvoice->id;
                
    //             $this->updateAll(array(
    //                 'OrganisationSubscription.organisation_invoice_id' => $org_invoice_id
    //             ), array(
    //                 'OrganisationSubscription.id' => $org_subscription_data['OrganisationSubscription']['id'],
    //             ));
                
    //             return array('status' => 'success', 'message' => 'Invoice information saved', 'organisation_invoice_id' => $org_invoice_id);
    //         }
    //     } catch(Exception $e) {
    //         return array('status' => 'failed', 'message' => 'Error saving data.', 'error' => $e->getMessage());
    //     }
    }
}

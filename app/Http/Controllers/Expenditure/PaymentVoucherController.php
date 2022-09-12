<?php

namespace App\Http\Controllers\Expenditure;

use App\Models\Expenditure\PaymentVoucher;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Expenditure - Payment Vouchers
 */
class PaymentVoucherController extends ApiController
{
    public function __construct(PaymentVoucher $paymentVoucher) {
        parent::__construct($paymentVoucher);
    }
}

<?php

namespace App\Observers;

use App\Mail\OrganisationInvoiceCreated;
use App\Mail\OrganisationInvoiceUpdated;
use App\Models\OrganisationInvoice;
use Illuminate\Support\Facades\Mail;

class OrganisationInvoiceObserver
{

    private $supportEmail = 'support@memberz.org';
    private $noReplyEmail = 'no-reply@memberz.org';

    /**
     * Handle the organisation invoice "created" event.
     *
     * @param  \App\Models\OrganisationInvoice  $organisationInvoice
     * @return void
     */
    public function created(OrganisationInvoice $organisationInvoice)
    {
        $organisationInvoice->generateInvoiceNumber();

        foreach([$this->supportEmail, $organisationInvoice->memberAccount?->username ] as $email) {
            $mail = Mail::to($email);

            if( $email == $this->supportEmail ) {
                $mail->queue( new OrganisationInvoiceCreated($organisationInvoice, $this->noReplyEmail) );
            } else {
                $mail->queue( new OrganisationInvoiceCreated($organisationInvoice) );
            }
        }
    }

    public function updated(OrganisationInvoice $organisationInvoice) {
        if( $organisationInvoice->getOriginal('paid') == 0 && $organisationInvoice->paid == 1 ) {

            foreach([$this->supportEmail, $organisationInvoice->memberAccount?->username ] as $email) {
                $mail = Mail::to($email);

                if( $email == $this->supportEmail ) {
                    $mail->queue( new OrganisationInvoiceUpdated($organisationInvoice, $this->noReplyEmail) );
                } else {
                    $mail->queue( new OrganisationInvoiceUpdated($organisationInvoice) );
                }
            }

            $organisationInvoice->smsAccountTopup?->credit();
        }
    }
}

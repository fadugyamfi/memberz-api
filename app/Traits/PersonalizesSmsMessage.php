<?php

namespace App\Traits;

use App\Models\OrganisationMember;
use App\Models\SmsAccount;

trait PersonalizesSmsMessage {

    public function personalize(OrganisationMember $membership, SmsAccount $smsAccount, string $message = null) {
        $attributes = [
            'title' => $membership->member->title,
            'first_name' => $membership->member->first_name,
            'last_name' => $membership->member->last_name,
            'full_name' => $membership->member->full_name,
            'org_name' => $smsAccount->organisation->name,
            'organisation_name' => $smsAccount->organisation->name,
            'org_slug' => $smsAccount->organisation->slug,
            'organisation_slug' => $smsAccount->organisation->slug,
            'membership_no' => $membership->organisation_no
        ];

        return $this->format($message ?? $this->message, $attributes);
    }

    public function format($message, $format_values = array()) {
        $default = array(
            '/\&nbsp;/i' => ' ',
            '/\&amp;/i' => '&',
            'title' => '',
            'first_name' => '',
            'last_name' => '',
            'full_name' => '',
            'org_slug' => '',
            'organisation_slug' => '',
            'org_name' => '',
            'organisation_name' => '',
            'anniv_date' => '',
            'anniv_year' => '',
            'years_since' => '',
            'membership_no' => ''
        );

        if( is_array($format_values) ) {
            $format_values = array_merge($default, $format_values);
        } else {
            return $message;
        }

        // re-format known values
        $format_values['title'] = ucfirst($format_values['title']);
        $format_values['first_name'] = ucfirst($format_values['first_name']);
        $format_values['last_name'] = ucfirst($format_values['last_name']);
        $format_values['full_name'] = ucwords($format_values['full_name']);

        // generate formatted message
        $results = array();
        foreach($format_values as $key => $value) {
            if( strpos($key, '/') === 0 ) { // already regex
                $results[$key] = $value;
            } else {
                $results["/\{$key\}/i"] = $value;
            }
        };

        $formatted = preg_replace( array_keys($results), array_values($results), strip_tags(html_entity_decode(trim($message))) );

        return $formatted;
    }
}

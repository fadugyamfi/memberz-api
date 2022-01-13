<?php

namespace App\Services\Sms;


class SmsPersonalizer {

    public function format($message, $format_values = array()) {
        $default = array(
            '/\&nbsp;/i' => ' ',
            '/\&amp;/i' => '&',
            'title' => '',
            'first_name' => '',
            'last_name' => '',
            'full_name' => '',
            'org_slug' => '',
            'org_name' => '',
            'anniv_date' => '',
            'anniv_year' => '',
            'years_since' => ''
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

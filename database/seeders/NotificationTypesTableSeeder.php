<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('notification_types')->delete();

        DB::table('notification_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'sms_low_credit',
                'url' => '/{org_slug}/sms/topup',
                'template' => '{org_name} SMS Account does not have enough credit. Please topup to continue.',
                'groupable' => 1,
                'source_type' => 'module_sms_account_id',
                'target_type' => 'organisation_id',
                'org_admin_only' => 1,
                'send_email' => 0,
                'email_subject' => 'SMS Credit Low',
                'send_push_notification' => 0,
                'icon' => 'fa fa-envelope text-info',
                'org_login_required' => 1,
                'created' => '2015-05-07 16:21:25',
                'modified' => '2015-05-07 16:21:29',
                'active' => 1,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'sms_broadcast_processing_complete',
                'url' => '/{org_slug}/sms/index',
                'template' => 'SMS broadcast processing complete for {broadcast_list_name} of {org_name}.',
                'groupable' => 0,
                'source_type' => 'module_sms_account_id',
                'target_type' => 'module_sms_broadcast_list_id',
                'org_admin_only' => 1,
                'send_email' => 1,
                'email_subject' => 'SMS Broadcast Processing Complete',
                'send_push_notification' => 1,
                'icon' => 'fa fa-envelope text-info',
                'org_login_required' => 1,
                'created' => '2015-05-07 16:21:43',
                'modified' => '2015-05-07 16:21:32',
                'active' => 1,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'member_registration',
                'url' => '/{org_slug}',
                'template' => '{member_name} registered with {category_name} in {org_name}.',
                'groupable' => 1,
                'source_type' => 'member_id',
                'target_type' => 'organisation_member_category_id',
                'org_admin_only' => 0,
                'send_email' => 1,
                'email_subject' => '{member_name} Registered',
                'send_push_notification' => 0,
                'icon' => 'fa fa-info-circle text-info',
                'org_login_required' => 1,
                'created' => '2015-05-07 16:21:46',
                'modified' => '2015-05-07 16:21:36',
                'active' => 1,
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'sms_broadcast_low_credit',
                'url' => '/{org_slug}/sms/topup',
                'template' => '{org_name} SMS Account does not have enough credit. Please topup to be able to broadcast messages to {broadcast_list_name}.',
                'groupable' => 1,
                'source_type' => 'module_sms_account_id',
                'target_type' => 'module_sms_broadcast_list_id',
                'org_admin_only' => 1,
                'send_email' => 1,
                'email_subject' => 'SMS Credit Low',
                'send_push_notification' => 0,
                'icon' => 'fa fa-envelope text-info',
                'org_login_required' => 1,
                'created' => '2015-05-07 16:21:50',
                'modified' => '2015-05-07 16:21:39',
                'active' => 1,
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'organisation_account_access_granted',
                'url' => '/{org_slug}/organisation/account/activate',
                'template' => '{member_name} granted you permission to manage {org_name} as an {role_name}.',
                'groupable' => 0,
                'source_type' => 'organisation_id',
                'target_type' => 'organisation_account_id',
                'org_admin_only' => 0,
                'send_email' => 0,
                'email_subject' => 'Admin Admin Activation',
                'send_push_notification' => 0,
                'icon' => 'fa fa-info-circle text-info',
                'org_login_required' => 1,
                'created' => '2015-04-30 19:45:36',
                'modified' => '2015-04-30 19:45:40',
                'active' => 1,
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'support_account_access_granted',
                'url' => '/support/users/login',
                'template' => '{member_name} granted you permission to access the support portal as a {role_name}.',
                'groupable' => 0,
                'source_type' => 'support_account_id',
                'target_type' => 'member_account_id',
                'org_admin_only' => 0,
                'send_email' => 0,
                'email_subject' => 'Support Account Activation',
                'send_push_notification' => 0,
                'icon' => 'fa fa-info-circle text-info',
                'org_login_required' => 1,
                'created' => '2015-04-30 19:37:26',
                'modified' => '2015-04-30 19:37:29',
                'active' => 1,
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'organisation_account_role_changed',
                'url' => '/{org_slug}/organisation/account/activate',
                'template' => '{member_name} changed your role in {org_name} to {role_name}.',
                'groupable' => 0,
                'source_type' => 'organisation_id',
                'target_type' => 'organisation_account_id',
                'org_admin_only' => 0,
                'send_email' => 0,
                'email_subject' => 'Admin Role Changed',
                'send_push_notification' => 0,
                'icon' => 'fa fa-info-circle text-info',
                'org_login_required' => 1,
                'created' => '2015-04-30 19:40:27',
                'modified' => '2015-04-30 19:40:30',
                'active' => 1,
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'support_account_role_changed',
                'url' => '/support/users/account/activate',
                'template' => '{member_name} changed your system support role {role_name}.',
                'groupable' => 0,
                'source_type' => 'support_account_id',
                'target_type' => 'support_account_id',
                'org_admin_only' => 0,
                'send_email' => 0,
                'email_subject' => 'Support Role Changed',
                'send_push_notification' => 0,
                'icon' => 'fa fa-info-circle text-info',
                'org_login_required' => 1,
                'created' => '2015-04-30 19:41:49',
                'modified' => '2015-04-30 19:41:52',
                'active' => 1,
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'org_account_activation',
                'url' => '/{org_slug}/settings/accounts',
                'template' => '{member_name} successfully activated their organisation account for {org_name}.',
                'groupable' => 1,
                'source_type' => 'member_account_id',
                'target_type' => 'organisation_account_id',
                'org_admin_only' => 1,
                'send_email' => 0,
                'email_subject' => 'Admin Account Activated',
                'send_push_notification' => 0,
                'icon' => 'fa fa-info-circle text-info',
                'org_login_required' => 1,
                'created' => '2015-05-01 11:57:28',
                'modified' => '2015-05-01 11:57:32',
                'active' => 1,
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'support_account_activation',
                'url' => '/support/users',
                'template' => '{member_name} successfully activated their support account.',
                'groupable' => 0,
                'source_type' => 'support_account_id',
                'target_type' => 'support_account_id',
                'org_admin_only' => 0,
                'send_email' => 0,
                'email_subject' => 'Support Account Activated',
                'send_push_notification' => 0,
                'icon' => 'fa fa-info-circle text-info',
                'org_login_required' => 1,
                'created' => '2015-05-02 23:01:52',
                'modified' => '2015-05-02 23:01:57',
                'active' => 1,
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'organisation_max_capacity_reached',
                'url' => '/{org_slug}/organisation/members',
                'template' => '{org_name} has reached its maximum member profile capacity. Please upgrade to the next tier to be able to add more members profiles.',
                'groupable' => 1,
                'source_type' => 'organisation_id',
                'target_type' => 'member_account_id',
                'org_admin_only' => 0,
                'send_email' => 1,
                'email_subject' => 'Max Capacity Reached',
                'send_push_notification' => 0,
                'icon' => 'fa fa-warning text-warning',
                'org_login_required' => 1,
                'created' => '2015-05-23 01:29:51',
                'modified' => '2015-05-23 01:29:55',
                'active' => 1,
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'organisation_max_capacity_warning',
                'url' => '/{org_slug}/organisation/members',
                'template' => '{org_name} has used {usage_percentage}% of its member profile capacity. Please consider upgrading to the next tier to be able to add more member profiles.',
                'groupable' => 1,
                'source_type' => 'organisation_id',
                'target_type' => 'member_account_id',
                'org_admin_only' => 1,
                'send_email' => 1,
                'email_subject' => 'Max Capacity Warning',
                'send_push_notification' => 0,
                'icon' => 'fa fa-warning text-warning',
                'org_login_required' => 1,
                'created' => '2015-05-23 02:02:31',
                'modified' => '2015-05-23 02:02:34',
                'active' => 1,
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'sms_credit_pending',
                'url' => '/{org_slug}/sms/home',
                'template' => '{org_name} will be credited with {sms_credit} SMS credits when current subscription billing is paid.',
                'groupable' => 0,
                'source_type' => 'organisation_id',
                'target_type' => 'module_sms_account_id',
                'org_admin_only' => 1,
                'send_email' => 1,
                'email_subject' => 'SMS Credit Pending',
                'send_push_notification' => 1,
                'icon' => 'fa fa-envelope text-info',
                'org_login_required' => 1,
                'created' => '2015-06-19 19:58:18',
                'modified' => '2015-06-19 19:58:22',
                'active' => 1,
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'sms_credited',
                'url' => '/{org_slug}/sms/home',
                'template' => '{org_name} has been credited with {sms_credit} SMS credits. ',
                'groupable' => 0,
                'source_type' => 'organisation_id',
                'target_type' => 'module_sms_account_id',
                'org_admin_only' => 0,
                'send_email' => 0,
                'email_subject' => 'SMS Credited',
                'send_push_notification' => 1,
                'icon' => 'fa fa-envelope text-info',
                'org_login_required' => 1,
                'created' => '2015-06-19 21:30:16',
                'modified' => '2015-06-19 21:30:20',
                'active' => 1,
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'bulk_member_import_status',
                'url' => '/{org_slug}/import/members',
                'template' => 'Data import of {file_name} for {org_name} {status}. {reason}',
                'groupable' => 0,
                'source_type' => 'organisation_import_file_id',
                'target_type' => 'organisation_id',
                'org_admin_only' => 1,
                'send_email' => 0,
                'email_subject' => 'Bulk Member Import Completed',
                'send_push_notification' => 1,
                'icon' => 'fa fa-cloud-upload text-info',
                'org_login_required' => 1,
                'created' => '2015-07-16 09:41:32',
                'modified' => '2015-07-16 09:41:35',
                'active' => 1,
            ),
            15 =>
            array (
                'id' => 17,
                'name' => 'bulk_contribution_import_status',
                'url' => '/{org_slug}/import/contributions',
                'template' => 'Bulk import of {file_name} for {org_name} {status}. {reason}',
                'groupable' => 0,
                'source_type' => 'organisation_import_file_id',
                'target_type' => 'organisation_id',
                'org_admin_only' => 1,
                'send_email' => 0,
                'email_subject' => 'Bulk Contribution Import Completed',
                'send_push_notification' => 0,
                'icon' => 'fa fa-cloud-upload text-info',
                'org_login_required' => 1,
                'created' => '2015-09-19 16:34:52',
                'modified' => '2015-09-19 16:34:57',
                'active' => 1,
            ),
            16 =>
            array (
                'id' => 18,
                'name' => 'registration_approval_status',
                'url' => '/member/organisations',
                'template' => 'Your request to join {org_name} - {category} has been {status}',
                'groupable' => 0,
                'source_type' => 'organisation_id',
                'target_type' => 'member_account_id',
                'org_admin_only' => 0,
                'send_email' => 1,
                'email_subject' => 'Membership Registration Updated',
                'send_push_notification' => 1,
                'icon' => 'fa fa-check text-success',
                'org_login_required' => 1,
                'created' => '2015-09-30 16:37:06',
                'modified' => '2015-09-30 16:37:10',
                'active' => 1,
            ),
            17 =>
            array (
                'id' => 19,
                'name' => 'org_invitation_accepted',
                'url' => '/{org_slug}',
                'template' => '{member_name} has accepted your invitation to join Memberz.Org to be able to connect with you.',
                'groupable' => 1,
                'source_type' => 'member_account_id',
                'target_type' => 'organisation_id',
                'org_admin_only' => 0,
                'send_email' => 0,
                'email_subject' => '{member_name} Accepted Your Invitation',
                'send_push_notification' => 0,
                'icon' => 'fa fa-info-circle text-info',
                'org_login_required' => 1,
                'created' => '2015-12-19 20:09:19',
                'modified' => '2015-12-19 20:09:23',
                'active' => 1,
            ),
            18 =>
            array (
                'id' => 20,
                'name' => 'join_request',
                'url' => '/{org_slug}',
                'template' => '{member_name} has requested to join {org_name} as a {category_name} member, pending approval.',
                'groupable' => 1,
                'source_type' => 'member_account_id',
                'target_type' => 'organisation_id',
                'org_admin_only' => 1,
                'send_email' => 0,
                'email_subject' => '{member_name} Request To Join {org_name}',
                'send_push_notification' => 1,
                'icon' => 'fa fa-info-circle text-info',
                'org_login_required' => 1,
                'created' => '2016-02-07 14:56:38',
                'modified' => '2016-02-07 14:56:41',
                'active' => 1,
            ),
            19 =>
            array (
                'id' => 22,
                'name' => 'org_join_invitation_accepted',
                'url' => '/{org_slug}',
                'template' => '{member_name} accepted your invitation and connected with {org_name}.',
                'groupable' => 1,
                'source_type' => 'member_account_id',
                'target_type' => 'organisation_id',
                'org_admin_only' => 0,
                'send_email' => 0,
                'email_subject' => '{member_name} Accepted To Join {org_name}',
                'send_push_notification' => 1,
                'icon' => 'fa fa-info-circle text-info',
                'org_login_required' => 1,
                'created' => '2016-04-12 00:25:30',
                'modified' => '2016-04-12 00:25:33',
                'active' => 1,
            ),
            20 =>
            array (
                'id' => 23,
                'name' => 'member_contribution_payment',
                'url' => '/{org_slug}/contributions/income',
                'template' => '{member_name} paid {amount} as {contribution_type} with invoice  #{invoice_no} to {org_name}',
                'groupable' => 0,
                'source_type' => 'organisation_member_id',
                'target_type' => 'organisation_id',
                'org_admin_only' => 1,
                'send_email' => 1,
                'email_subject' => '{member_name} contributed to {org_name}',
                'send_push_notification' => 1,
                'icon' => 'fa fa-credit-card text-success',
                'org_login_required' => 1,
                'created' => '2016-02-28 18:21:30',
                'modified' => '2016-02-28 18:21:36',
                'active' => 1,
            ),
            21 =>
            array (
                'id' => 25,
                'name' => 'sms_broadcast_processing_failed',
                'url' => '/{org_slug}/sms/index',
                'template' => 'SMS broadcast processing failed for {broadcast_list_name}. Reason: {reason}',
                'groupable' => 0,
                'source_type' => 'module_sms_account_id',
                'target_type' => 'module_sms_broadcast_list_id',
                'org_admin_only' => 1,
                'send_email' => 0,
                'email_subject' => 'SMS Broadcast Processing Failed',
                'send_push_notification' => 0,
                'icon' => 'fa fa-credit-card text-success',
                'org_login_required' => 1,
                'created' => '2016-05-11 13:30:13',
                'modified' => '2016-05-11 13:30:17',
                'active' => 1,
            ),
            22 =>
            array (
                'id' => 26,
                'name' => 'anniversary_today',
                'url' => '/{org_slug}',
                'template' => '{member_name} is/are celebrating their {anniv_name} today. Anniversary Message Sent Via SMS',
                'groupable' => 1,
                'source_type' => 'organisation_anniversary_id',
                'target_type' => 'organisation_member_id',
                'org_admin_only' => 1,
                'send_email' => 1,
                'email_subject' => '{member_name} is celebrating the anniversary of {anniv_name} today.',
                'send_push_notification' => 0,
                'icon' => 'fa fa-gift text-danger',
                'org_login_required' => 1,
                'created' => '2016-07-11 18:27:48',
                'modified' => '2016-07-11 18:27:55',
                'active' => 1,
            ),
            23 =>
            array (
                'id' => 27,
                'name' => 'anniversary_today_sms_sent',
                'url' => '/{org_slug}',
            'template' => '{member_name} celebrate(s) the anniversary of their {anniv_name} today in {org_name}. Congratulations were sent via SMS',
                'groupable' => 1,
                'source_type' => 'organisation_member_id',
                'target_type' => 'organisation_anniversary_id',
                'org_admin_only' => 1,
                'send_email' => 1,
                'email_subject' => '{member_name} is celebrating the anniversary of their {anniv_name} today.',
                'send_push_notification' => 0,
                'icon' => 'fa fa-gift text-danger',
                'org_login_required' => 1,
                'created' => '2016-07-11 21:23:07',
                'modified' => '2016-07-11 21:23:07',
                'active' => 1,
            ),
            24 =>
            array (
                'id' => 28,
                'name' => 'anniversary_today_no_sms',
                'url' => '/{org_slug}',
            'template' => '{member_name} celebrate(s) the anniversary of their {anniv_name} today in {org_name}. Congratulate them!',
                'groupable' => 1,
                'source_type' => 'organisation_member_id',
                'target_type' => 'organisation_anniversary_id',
                'org_admin_only' => 1,
                'send_email' => 1,
                'email_subject' => '{member_name} is celebrating the anniversary of their {anniv_name} today.',
                'send_push_notification' => 0,
                'icon' => 'fa fa-gift text-danger',
                'org_login_required' => 1,
                'created' => '2016-07-11 21:23:07',
                'modified' => '2016-07-11 21:23:07',
                'active' => 1,
            ),
            25 =>
            array (
                'id' => 29,
                'name' => 'notice_reaction',
                'url' => '/{org_slug}/notices/index/{post_id}',
                'template' => '{member_name} {verb} {org_name}\'s post "{post_summary}"',
                'groupable' => 1,
                'source_type' => 'member_account_id',
                'target_type' => 'notice_id',
                'org_admin_only' => 0,
                'send_email' => 0,
                'email_subject' => '{member_name} {verb} to your post',
                'send_push_notification' => 0,
                'icon' => 'fa fa-thumbs-up text-info',
                'org_login_required' => 0,
                'created' => '2016-08-11 12:02:40',
                'modified' => '2016-08-11 12:02:43',
                'active' => 1,
            ),
            26 =>
            array (
                'id' => 30,
                'name' => 'notice_comment_posted',
                'url' => '/{org_slug}/notices/index/{post_id}?cid={comment_id}',
                'template' => '{member_name} commented on {org_name}\'s post "{post_summary}".',
                'groupable' => 1,
                'source_type' => 'member_account_id',
                'target_type' => 'notice_id',
                'org_admin_only' => 0,
                'send_email' => 1,
                'email_subject' => '{member_name} commented on your post',
                'send_push_notification' => 1,
                'icon' => 'fa fa-comment text-success',
                'org_login_required' => 0,
                'created' => '2016-08-11 19:10:19',
                'modified' => '2016-08-11 19:10:23',
                'active' => 1,
            ),
            27 =>
            array (
                'id' => 31,
                'name' => 'comment_reaction',
                'url' => '/{org_slug}/notices/index/{post_id}?cid={comment_id}',
                'template' => '{member_name} {verb} your comment "{post_summary}" on {org_name}\'s post.',
                'groupable' => 1,
                'source_type' => 'member_account_id',
                'target_type' => 'comment_id',
                'org_admin_only' => 0,
                'send_email' => 0,
                'email_subject' => '{member_name} {verb} your comment',
                'send_push_notification' => 0,
                'icon' => 'fa fa-thumbs-up text-info',
                'org_login_required' => 0,
                'created' => '2016-08-16 16:50:48',
                'modified' => '2016-08-16 16:50:54',
                'active' => 1,
            ),
            28 =>
            array (
                'id' => 32,
                'name' => 'pledge_reminders_sent',
                'url' => '/{org_slug}/pledges/index',
                'template' => '{reminder_frequency} SMS Reminders sent out for {pledge_type_name} pledges of {org_name}. Total amount outstanding is {total_remaining}',
                'groupable' => 0,
                'source_type' => 'module_pledge_type_id',
                'target_type' => 'organisation_id',
                'org_admin_only' => 1,
                'send_email' => 1,
                'email_subject' => 'SMS Reminders sent out for {pledge_type_name}',
                'send_push_notification' => 1,
                'icon' => 'fa fa-envelope text-info',
                'org_login_required' => 1,
                'created' => '2017-04-04 15:55:15',
                'modified' => '2017-04-04 15:55:19',
                'active' => 1,
            ),
            29 =>
            array (
                'id' => 33,
                'name' => 'member_post_comment',
                'url' => '/{org_slug}/notices/index/{post_id}?cid={comment_id}',
                'template' => '{member_name} commented on your post "{post_summary}" to {org_name}.',
                'groupable' => 1,
                'source_type' => 'member_account_id',
                'target_type' => 'notice_id',
                'org_admin_only' => 0,
                'send_email' => 1,
                'email_subject' => '{member_name} commented on your post.',
                'send_push_notification' => 1,
                'icon' => 'fa fa-comment text-success',
                'org_login_required' => 0,
                'created' => '2017-05-26 01:35:00',
                'modified' => '2017-05-26 01:35:06',
                'active' => 1,
            ),
            30 =>
            array (
                'id' => 34,
                'name' => 'member_post_reaction',
                'url' => '/{org_slug}/notices/index/{post_id}',
                'template' => '{member_name} {verb} your post "{post_summary}" to {org_name}.',
                'groupable' => 1,
                'source_type' => 'member_account_id',
                'target_type' => 'notice_id',
                'org_admin_only' => 0,
                'send_email' => 0,
                'email_subject' => '{member_name} {verb} to your post',
                'send_push_notification' => 0,
                'icon' => 'fa fa-thumbs-up text-info',
                'org_login_required' => 0,
                'created' => '2017-05-26 01:41:12',
                'modified' => '2017-05-26 01:41:19',
                'active' => 1,
            ),
            31 =>
            array (
                'id' => 35,
                'name' => 'member_post_comment_reaction',
                'url' => '/{org_slug}/notices/index/{post_id}?cid={comment_id}',
                'template' => '{member_name} {verb} your comment "{post_summary}".',
                'groupable' => 1,
                'source_type' => 'member_account_id',
                'target_type' => 'notice_id',
                'org_admin_only' => 0,
                'send_email' => 0,
                'email_subject' => '{member_name} {verb} your comment',
                'send_push_notification' => 0,
                'icon' => 'fa fa-thumbs-up text-info',
                'org_login_required' => 0,
                'created' => '2017-05-26 01:48:11',
                'modified' => '2017-05-26 01:48:15',
                'active' => 1,
            ),
        ));


    }
}

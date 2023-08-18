<?php

/**
 * The Mailer.
 *
 * Prepares and sends mails with i18n support. 
 *
 * @since      1.0.0
 * @package    Subscription_Renewal_Reminder
 * @subpackage Subscription_Renewal_Reminder/includes
 */
class Subscription_Renewal_Reminder_Mailer
{
    /**
     *  Composes an email
     */
    public function compose($user_mail_address, $translation_provider)
    {

        $user_info = $this->get_user_info($user_mail_address);

        $user_name = $user_info["user_name"];

        $user_language_preference = $user_info["user_language_preference"];

        $days = 5; // Hardcoded for now

        $subject = $translation_provider->translate("subscription-renewal-reminder-mail-subject", $user_language_preference);

        $salutation = sprintf($translation_provider->translate("Hey, %s!", $user_language_preference), $user_name);

        $text = sprintf($translation_provider->translate("Your subscription will be renewed in %s days.", $user_language_preference), $days);

        return [$subject, $salutation, $text];
    }

    /**
     * Sends one email
     */
    public function send_reminder($user_mail_address, $translation_provider)
    {
        if ($user_mail_address == null) return null;

        $data = $this->compose($user_mail_address, $translation_provider);

        $subject = $data[0];

        $contents = $data[1] . "\n" . $data[2];

        //TODO: Send email here (eg. $mailer->send($user_mail_address, $subject, $contents))
    }

    /**
     * Get metadata for a certain user
     */
    private function get_user_info($user_email)
    {
        //TODO: Find user info

        return [
            "user_name" => "User#1",
            "user_language_preference" => "es_ES"
        ];
    }

    /**
     * Batch emails
     */
    public function send_emails_to_suscribers()
    {
        $users = []; //Fetch subscribers from storage

        $translation_provider = new Subscription_Renewal_Reminder_i18n();

        foreach ($users as $user) {
            $this->send_reminder($user, $translation_provider);
        }
    }
}

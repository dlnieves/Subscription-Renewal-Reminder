<?php

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files. 
 *
 * @since      1.0.0
 * @package    Subscription_Renewal_Reminder
 * @subpackage Subscription_Renewal_Reminder/includes
 */
class Subscription_Renewal_Reminder_i18n {


	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'subscription-renewal-reminder',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}

}

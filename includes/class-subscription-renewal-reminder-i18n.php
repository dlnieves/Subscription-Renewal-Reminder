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
class Subscription_Renewal_Reminder_i18n
{

	/**
	 * __() and stuff
	 */
	public function load_plugin_textdomain()
	{

		load_plugin_textdomain(
			'subscription-renewal-reminder',
			false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);
	}

	/**
	 * Finds the proper translation from storage (file, database, etc.).
	 * Note that this is different from Wordpress "__()" because we need to find a specific translation for a specific language, not from page language
	 */
	public function translate($text, $language)
	{
		//TODO: Find text from stored data eg. $translation_storage->get($text, $language)

		$translated = $text; //For now

		return $translated;
	}
}

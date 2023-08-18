<?php


/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Subscription_Renewal_Reminder
 * @subpackage Subscription_Renewal_Reminder/admin
 */
class Subscription_Renewal_Reminder_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * The stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/subscription-renewal-reminder-admin.css', array(), $this->version, 'all');
	}

	/**
	 * The JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/subscription-renewal-reminder-admin.js', array('jquery'), $this->version, false);
	}

	/**
	 * Add menu entries
	 * 
	 */
	public function prepare_ui()
	{

		add_menu_page(
			__("Settings"),      		 		// Page title
			__("subscription-renewal-reminder-settings-menu-title", $this->plugin_name),      		// Menu title
			"manage_options", 				// Capability required to access the page
			'subscription-renewal-reminder', // Menu slug
			'display_admin_page' 			//TODO: Callback function to display the admin page
		);
	}

	/**
	 * Gets executed when the action "subscription-renewal-reminder-send-emails" is fired.
	 * 
	 */
	public function send_emails()
	{
		$mailer = new Subscription_Renewal_Reminder_Mailer();
		$mailer->send_emails_to_suscribers();
	}
}

<?php

/**
 * The core plugin class
 * 
 * @package    Subscription_Renewal_Reminder
 * @subpackage Subscription_Renewal_Reminder/includes
 */
class Subscription_Renewal_Reminder {

	/**
	 * @access   protected
	 * @var      Subscription_Renewal_Reminder_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	public function __construct() {
		if ( defined( 'SUBSCRIPTION_RENEWAL_REMINDER_VERSION' ) ) { //defined in the activator
			$this->version = SUBSCRIPTION_RENEWAL_REMINDER_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'subscription-renewal-reminder';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies 
	 * @access   private
	 */
	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-subscription-renewal-reminder-loader.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-subscription-renewal-reminder-i18n.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-subscription-renewal-reminder-admin.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-subscription-renewal-reminder-public.php';

		$this->loader = new Subscription_Renewal_Reminder_Loader();

	}

	/**
	 * Internationalization.
	 * 
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Subscription_Renewal_Reminder_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Subscription_Renewal_Reminder_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Hooks related to the public-facing functionality
	 * 
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Subscription_Renewal_Reminder_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the loader.
	 *
	 * @since     1.0.0
	 * @return    Subscription_Renewal_Reminder_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * The version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}

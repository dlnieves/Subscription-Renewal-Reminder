<?php

/**
 * @link              not-defined
 * @since             1.0.0
 * @package           Subscription-Renewal-Reminder
 *
 * @wordpress-plugin
 * Plugin Name:       Subscription Renewal Reminder
 * Plugin URI:        not_defined
 * Description:       This plugin sends emails to remind subscribers that their subscription will be renewed in X days.
 * Version:           1.0.0
 * Author:            David L. Nieves
 * Author URI:        https://www.linkedin.com/in/david-leonardo-nieves-naranjo
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       subscription-renewal-reminder
 * Domain Path:       /languages
 */


if (!defined('WPINC')) {
	die;
}

define('SUBSCRIPTION_RENEWAL_REMINDER_VERSION', '1.0.0');

function activate_subscription_renewal_reminder()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-subscription-renewal-reminder-activator.php';
	Subscription_Renewal_Reminder_Activator::activate();
}

function deactivate_subscription_renewal_reminder()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-subscription-renewal-reminder-deactivator.php';
	Subscription_Renewal_Reminder_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_subscription_renewal_reminder');
register_deactivation_hook(__FILE__, 'deactivate_subscription_renewal_reminder');

/**
 * The core
 */
require plugin_dir_path(__FILE__) . 'includes/class-subscription-renewal-reminder.php';

/**
 * Old classic executor
 */
function run_subscription_renewal_reminder()
{
	$plugin = new Subscription_Renewal_Reminder();
	$plugin->run();
}
run_subscription_renewal_reminder();

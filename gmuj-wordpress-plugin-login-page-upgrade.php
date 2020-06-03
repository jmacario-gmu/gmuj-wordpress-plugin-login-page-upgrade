<?php

/**
 * Summary: Main plugin file for the Mason WordPress: Login Page Upgrade plugin
 * Last modified: 2020-06-03
 * Modified by: Jan Macario
 */

/**
 * Plugin Name:       Mason WordPress: Login Page Upgrade
 * Author:            Jan Macario
 * Plugin URI:        https://github.com/jmacario-gmu/gmuj-wordpress-plugin-login-page-upgrade
 * Description:       Mason WordPress plugin which implements modifications to the WordPress login page.
 * Version:           0.0.1
 */


// Exit if this file is not called directly.
	if (!defined('WPINC')) {
		die;
	}


// Implement style modifications

/**
 * Summary: Load custom stylesheet on Wordpress login page.
 * Description: 
 * Last modified: 2020-06-03
 * Modified by: Jan Macario
 */
add_action('login_enqueue_scripts', 'gmuj_login_stylesheet' );
function gmuj_login_stylesheet() {

	// Enqueue login page stylesheet
		wp_enqueue_style('gmuj-custom-login-stylesheet', plugin_dir_url( __FILE__ ) . '/gmuj-login.css');

}


// Implement content modifications

/**
 * Summary: Provides an appropriate alternate Mason URL for the login header.
 * Description:  Rather than linking to wordpress.org, the login header will link to the Mason core website. Should this link to WebDev instead?
 * Last modified: 2020-06-03
 * Modified by: Jan Macario
*/
add_filter('login_headerurl', 'mhtp_login_header_url');
function mhtp_login_header_url() {

	// Return appropriate URL for login header link
		return 'https://www2.gmu.edu';

}

/**
 * Summary: Provides a custom login message.
 * Description:  
 * Last modified: 2020-06-03
 * Modified by: Jan Macario
*/
add_filter( 'login_message', 'gmuj_custom_login_message' );
function gmuj_custom_login_message() {

	// Return appropriate login message
		return 'George Mason University WordPress';

}


// Implement functional modifications

/**
 * Summary: Modifies the default login error messages to returns a less-detailed error message for login problems.
 * Description:  
 * Last modified: 2020-06-03
 * Modified by: Jan Macario
*/
add_filter('login_errors', 'gmuj_login_error_message' );
function gmuj_login_error_message() {

	// Return appropriate login error message
  		return 'Login information incorrect.';

}

/**
 * Summary: Remove the login page shake effect.
 * Description:  
 * Last modified: 2020-06-03
 * Modified by: Jan Macario
*/
add_action('login_head','mhtp_remove_login_shake');
function mhtp_remove_login_shake(){

	// Remove the wp_shake_js script attached to the login_head action
		remove_action('login_head','wp_shake_js',12);

}
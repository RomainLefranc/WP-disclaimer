<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://sitetest.re/
 * @since      1.0.0
 *
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/admin
 * @author     Romain Lefranc <lefranc46@gmail.com>
 */
class Eu_Disclaimer_Admin {

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
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/eu-disclaimer-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script('jquery');

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/eu-disclaimer-admin.js', array(), $this->version, false );

	}
	public function ajouterAuMenu() {
		$page = 'eu-disclaimer';
		$menu = 'eu-disclaimer';
		$capability = 'edit_pages';
		$slug = 'eu-disclaimer';
		$function = 'disclaimerFonction';
		$icon = '';
		$position = 80;
		if(is_admin()){
			add_menu_page($page, $menu, $capability,$slug, $function, $icon, $position);
		}
		function disclaimerFonction(){
			require_once (plugin_dir_path(__FILE__).'partials/eu-disclaimer-admin-display.php');
		}	
	}
}

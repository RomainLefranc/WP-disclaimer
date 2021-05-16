<?php

/**
 * Fired during plugin activation
 *
 * @link       http://sitetest.re/
 * @since      1.0.0
 *
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/includes
 * @author     Romain Lefranc <lefranc46@gmail.com>
 */
class Eu_Disclaimer_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		DisclaimerGestionTable::creerTable();
	}

}

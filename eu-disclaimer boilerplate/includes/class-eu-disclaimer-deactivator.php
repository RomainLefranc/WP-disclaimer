<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://sitetest.re/
 * @since      1.0.0
 *
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Eu_Disclaimer
 * @subpackage Eu_Disclaimer/includes
 * @author     Romain Lefranc <lefranc46@gmail.com>
 */
class Eu_Disclaimer_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		DisclaimerGestionTable::supprimerTable();	
	}

}

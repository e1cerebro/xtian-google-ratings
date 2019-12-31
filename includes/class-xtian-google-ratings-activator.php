<?php

/**
 * Fired during plugin activation
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Xtian_Google_Ratings
 * @subpackage Xtian_Google_Ratings/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Xtian_Google_Ratings
 * @subpackage Xtian_Google_Ratings/includes
 * @author     Christian Uche <nwachukwu16@gmail.com>
 */
class Xtian_Google_Ratings_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
	 
		update_option('xtain_gr_enable_el', '0');

		update_option('xtain_gr_show_leave_review_el', '1');
		
		update_option('xtain_gr_rating_positioning_el', 'left');

	}

}

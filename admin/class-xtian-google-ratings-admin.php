<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Xtian_Google_Ratings
 * @subpackage Xtian_Google_Ratings/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Xtian_Google_Ratings
 * @subpackage Xtian_Google_Ratings/admin
 * @author     Christian Uche <nwachukwu16@gmail.com>
 */
class Xtian_Google_Ratings_Admin {

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

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Xtian_Google_Ratings_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Xtian_Google_Ratings_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/xtian-google-ratings-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Xtian_Google_Ratings_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Xtian_Google_Ratings_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/xtian-google-ratings-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function xtian_gr_admin_menu(){
			
		add_submenu_page( 
				'options-general.php', 
				__('Google Ratings', GR_TEXT_DOMAIN), 
				__('Google Ratings', GR_TEXT_DOMAIN), 
				'manage_options', 
				'xtian-google-ratings', 
				[ $this, 'xtian_gr_settings_page'] );
	}

	public function xtian_gr_settings_page(){
		include_once( 'partials/xtian-google-ratings-admin-display.php' );
	}

	public function xtian_gr_settings_options(){
		/* ---------------------- GENERAL SECTION ---------------------- */
			include_once( 'partials/settings-api/xtian-general-settings.php' );
			$general_settings = new GR_General_Settings($this->plugin_name);
		/* ---------------------- END GENERAL SECTION ---------------------- */
		
		/* ---------------------- DISPLAY SECTION ---------------------- */
			include_once( 'partials/settings-api/xtian-display-settings.php' );
			$display_settings = new GR_Display_Settings($this->plugin_name);
		/* ---------------------- END DISPLAY SECTION ---------------------- */

		//Add instances into an array
		$object = array($general_settings, $display_settings);

		//Dynamically create the sections and fields
		foreach ($object as $instance) {
			$instance->register_section();
			$instance->register_fields();
		}

	}

	// Cron Job
	public function xtian_gr_cron_exec(){
		if ( !wp_next_scheduled( 'xtian_gr_cron_exec' ) ) {
			wp_schedule_event( time(), '1min', 'xtian_gr_cron_exec' );
		}
	}

	public function xtian_gr_cron_cb(){
		include_once(GR_UTIL_FUNCTIONS);
		$gr_company_name = get_option('xtain_gr_company_name_key_el', '');
		GR_Helpers::update_company($gr_company_name);
	}

	public function chmg_wapu_custom_cron_schedules($schedules){
		if(!isset($schedules["1min"])){
			$schedules["1min"] = array(
				'interval' => 1*60,
				'display' => __('Once every minute'));
		}
		if(!isset($schedules["3min"])){
			$schedules["3min"] = array(
				'interval' => 3*60,
				'display' => __('Once every 3 minutes'));
		}
		if(!isset($schedules["5min"])){
			$schedules["5min"] = array(
				'interval' => 5*60,
				'display' => __('Once every 5 minutes'));
		}
		if(!isset($schedules["30min"])){
			$schedules["30min"] = array(
				'interval' => 30*60,
				'display' => __('Once every 30 minutes'));
		}
		return $schedules;
	}

	
}

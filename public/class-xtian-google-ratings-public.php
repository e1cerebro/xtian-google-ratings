<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Xtian_Google_Ratings
 * @subpackage Xtian_Google_Ratings/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Xtian_Google_Ratings
 * @subpackage Xtian_Google_Ratings/public
 * @author     Christian Uche <nwachukwu16@gmail.com>
 */
class Xtian_Google_Ratings_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/xtian-google-ratings-public.css#asyncload', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/xtian-google-ratings-public.js#asyncload', array( 'jquery' ), $this->version, false );

	}

	public function xtian_gr_rating_html() {

		include_once( 'partials/xtian-google-ratings-public-display.php' );
	 }

	 // Async load
	function xtian_gr_async_scripts($url)
	{
		if ( strpos( $url, '#asyncload') === false )
			return $url;
		else if ( is_admin() )
			return str_replace( '#asyncload', '', $url );
		else
			return str_replace( '#asyncload', '', $url )."' async='async"; 
	}
	

}

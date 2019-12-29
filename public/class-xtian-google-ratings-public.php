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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/xtian-google-ratings-public.css', array(), $this->version, 'all' );

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/xtian-google-ratings-public.js', array( 'jquery' ), $this->version, false );

	}

	public function xtian_gr_rating_html() {

		$gr_rating = trim(get_option('xtian_gr_rating'));

		if( '1' == get_option('xtain_gr_enable_el') && ( strlen(get_option('xtain_gr_company_name_key_el')) > 0 && strlen(get_option('	xtain_gr_google_api_key_el')) > 0 ) ):
		 ?> 

			<!-- Start Mobile -->
			<div class="gr-mobile-container">
					<div class="gr-left">
					<img class="gr-google-logo" src="<?php echo LOADING_IMAGE_PATH; ?>" alt="Google Logo">
						<span class="gr_rating"> <?php echo  number_format($gr_rating , 1); ?> </span> <div class="Stars" style="--rating: <?php echo get_option( 'xtian_gr_rating'); ?>;" aria-label="Rating of this product is <?php echo get_option( 'xtian_gr_rating'); ?> out of 5."></div>
					</div>
					<div class="gr-right">
						<?php if('1' == get_option( 'xtain_gr_show_leave_review_el' )): ?>
							<span class="gr-leave-review"><a target="_blank" href="https://search.google.com/local/writereview?placeid=<?php echo get_option('xtian_gr_reference_id'); ?>">&#9998; Leave A Review</a></span>
						<?php endif; ?>
					</div>
			</div>
			<!-- End Mobile -->

 			<div class="gr-container">
				<div class="gr-header">
					<?php if('1' == get_option( 'xtain_gr_show_leave_review_el' )): ?>
						<span class="gr-leave-review"><a target="_blank" href="https://search.google.com/local/writereview?placeid=<?php echo get_option('xtian_gr_reference_id'); ?>">&#9998; Leave A Review</a></span>
					<?php endif; ?>
				</div>
				<div class="gr-body">
					<div class="gr-left">
						<img class="gr-google-logo" src="<?php echo LOADING_IMAGE_PATH; ?>" alt="Google Logo">
					</div>
					<div class="gr-right">
						<div class="gr-right__top">
							<span class="gr-title">Google Rating</span>
						</div>
						<div class="gr-right__main">
							<span class="gr_rating"> <?php echo  number_format($gr_rating , 1); ?> </span> <div class="Stars" style="--rating: <?php echo get_option( 'xtian_gr_rating'); ?>;" aria-label="Rating of this product is <?php echo get_option( 'xtian_gr_rating'); ?> out of 5.">
							
							<?php if('1' == get_option( 'xtain_gr_show_leave_review_el' )): ?>
								<!-- <span class="gr-leave-review"> / <a href="https://search.google.com/local/writereview?placeid=ChIJzc7sFGsUVBMR87i2puYDn-U">Leave A Review</a></span> -->
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		  <?php
		  endif;
	 }

}

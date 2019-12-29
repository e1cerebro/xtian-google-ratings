<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Xtian_Google_Ratings
 * @subpackage Xtian_Google_Ratings/public/partials
 */

$gr_rating = esc_attr(trim(get_option('xtian_gr_rating', 0)));

$gr_rating = (float) $gr_rating;

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
	        <?php if( '1' == esc_attr(get_option('xtain_gr_enable_el')) && ( strlen(esc_attr(get_option('xtain_gr_company_name_key_el'))) > 0 && strlen(esc_attr(get_option('	xtain_gr_google_api_key_el'))) > 0 ) ): ?> 

			<!-- Start Mobile -->
			<div class="gr-mobile-container">
					<div class="gr-left">
					<img class="gr-google-logo" src="<?php echo LOADING_IMAGE_PATH; ?>" alt="Google Logo">
						<span class="gr_rating"> <?php echo  number_format($gr_rating , 1); ?> </span> <div class="Stars" style="--rating: <?php echo number_format($gr_rating , 1); ?>;" aria-label="Rating of this product is <?php echo number_format($gr_rating , 1); ?> out of 5."></div>
					</div>
					<div class="gr-right">
						<?php if('1' == get_option( 'xtain_gr_show_leave_review_el' )): ?>
							<span class="gr-leave-review"><a target="_blank" href="https://search.google.com/local/writereview?placeid=<?php echo esc_attr(get_option('xtian_gr_reference_id')); ?>">&#9998; <?php _e('Leave A Review', GR_TEXT_DOMAIN); ?></a></span>
						<?php endif; ?>
					</div>
			</div>
			<!-- End Mobile -->

 			<div class="gr-container">
				<div class="gr-header">
					<?php if('1' == get_option( 'xtain_gr_show_leave_review_el' )): ?>
						<span class="gr-leave-review"><a target="_blank" href="https://search.google.com/local/writereview?placeid=<?php echo esc_attr(get_option('xtian_gr_reference_id')); ?>">&#9998; <?php _e('Leave A Review', GR_TEXT_DOMAIN); ?></a></span>
					<?php endif; ?>
				</div>
				<div class="gr-body">
					<div class="gr-left">
						<img class="gr-google-logo" src="<?php echo LOADING_IMAGE_PATH; ?>" alt="Google Logo">
					</div>
					<div class="gr-right">

						<div class="gr-right__main">
							<span class="gr_rating"> <?php echo  number_format($gr_rating , 1); ?> </span> <div class="Stars" style="--rating: <?php echo number_format($gr_rating , 1); ?>;" aria-label="Rating of this product is <?php echo number_format($gr_rating , 1); ?> out of 5.">
						</div>
					</div>
				</div>
			</div>

			<style>

				
					@media only screen and (max-width: 600px) {
						<?php if('left' == get_option('xtain_gr_rating_positioning_el')): ?>
							.gr-mobile-container {
								left: 0px;
							}
						<?php else: ?>
							.gr-mobile-container {
								right: -310px;
							}
						<?php endif; ?>
					}
				

					@media only screen and (min-width: 600px) {
						<?php if('left' == get_option('xtain_gr_rating_positioning_el')): ?>
							.gr-container {
								left: 3px;
							}
						<?php else: ?>
							.gr-container {
								right: 3px;
							}
						<?php endif; ?>
					}
			</style>

		  <?php
		  endif;

<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Xtian_Google_Ratings
 * @subpackage Xtian_Google_Ratings/admin/partials
 */

    $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'xtian-gr-general-settings';
    if( isset( $_GET[ 'tab' ] ) ) {
        $active_tab = $_GET[ 'tab' ];
    } // end if

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    
    <h1><?php echo get_admin_page_title(); ?></h1>
    <hr/>

    <h2 class="nav-tab-wrapper">
        <a href="?page=xtian-google-ratings&tab=xtian-gr-general-settings" class="nav-tab <?php echo $active_tab == 'xtian-gr-general-settings' ? 'nav-tab-active' : ''; ?>"><?php _e('General Settings', GR_TEXT_DOMAIN); ?></a>
        <a href="?page=xtian-google-ratings&tab=xtian-gr-display-settings" class="nav-tab <?php echo $active_tab == 'xtian-gr-display-settings' ? 'nav-tab-active' : ''; ?>"><?php _e('Display Settings', GR_TEXT_DOMAIN); ?></a>
    </h2>


    <form method="post" action="options.php">
        <?php
                
                if( $active_tab == 'xtian-gr-general-settings' ) {
                    settings_fields($this->plugin_name);
                    do_settings_sections($this->plugin_name);
                    
                } else if( $active_tab == 'xtian-gr-display-settings') {
                    settings_fields($this->plugin_name."-display");
                    do_settings_sections($this->plugin_name."-display");
                } 
                submit_button(); 
        ?>
    </form>


    <?php
        $gr_rating = esc_attr(trim(get_option('xtian_gr_rating', 0)));
    ?>

    <?php if(!empty(get_option('xtain_gr_google_api_key_el')) && $gr_rating <= 0): ?>
        <div class="error notice">
            <p>Oops! We could not find the ratings for <strong><?php echo get_option('xtain_gr_company_name_key_el', ''); ?> </strong> </p>
        </div>
    <?php else: ?>
        <div class="updated notice">
            <p>Congratulations! <strong>Current Google Business Rating is <?php echo (float)$gr_rating; ?></strong></p>
        </div>
    <?php endif; ?>

</div>
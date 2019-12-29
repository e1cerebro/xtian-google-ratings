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

</div>
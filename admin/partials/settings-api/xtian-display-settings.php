<?php
class GR_Display_Settings{
    
    private $plugin_name;

    public function __construct( $plugin_name ) {
		$this->plugin_name = $plugin_name;
    }
    
    public function register_section(){
        add_settings_section(
            'xtain_gr_display_section',
            __( 'Display Settings', GR_TEXT_DOMAIN ),
            '',
            $this->plugin_name."-display"
        );
    }
    public function register_fields(){
       
        /* Enable Display */
        add_settings_field(
            'xtain_gr_enable_el',
            __( 'Enable/Disable Display', GR_TEXT_DOMAIN),
            [ $this,'xtain_gr_enable_cb'],
            $this->plugin_name."-display",
            'xtain_gr_display_section'
        );
        register_setting( $this->plugin_name."-display", 'xtain_gr_enable_el', array($this, 'xtian_gr_sanitize_callback')); /* List of products to be included */
    
         /* Enable Display */
         add_settings_field(
            'xtain_gr_show_leave_review_el',
            __( 'Show Leave Review Link', GR_TEXT_DOMAIN),
            [ $this,'xtain_gr_show_leave_review_cb'],
            $this->plugin_name."-display",
            'xtain_gr_display_section'
        );
        register_setting( $this->plugin_name."-display", 'xtain_gr_show_leave_review_el', array($this, 'xtian_gr_sanitize_callback')); /* List of products to be included */
    
    }
    
	public function xtain_gr_enable_cb(){
		$xtain_gr_enable_el =  get_option('xtain_gr_enable_el');
		?>

        <label for="xtain_gr_enable_el">
                <input name="xtain_gr_enable_el" type="checkbox" id="xtain_gr_enable_el" value="1" <?php echo '1' == $xtain_gr_enable_el ? 'checked' : ''; ?>> 
                   </label>
		<?php
    }     
    
    public function xtain_gr_show_leave_review_cb(){
		$xtain_gr_show_leave_review_el =  get_option('xtain_gr_show_leave_review_el');
		?>

        <label for="xtain_gr_show_leave_review_el">
                <input name="xtain_gr_show_leave_review_el" type="checkbox" id="xtain_gr_show_leave_review_el" value="1" <?php echo '1' == $xtain_gr_show_leave_review_el ? 'checked' : ''; ?>> 
                   </label>
		<?php
    } 

    public function xtian_gr_sanitize_callback($input){
        include_once('xtian-custom-functions.php');

        $gr_google_data = GR_Helpers::update_ratings();

        update_option( 'xtian_gr_rating', $gr_google_data[0], true );
        update_option( 'xtian_gr_reference_id', $gr_google_data[1], true );
 
        return $input;

    }
  
 }


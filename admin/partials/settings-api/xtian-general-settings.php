<?php
class GR_General_Settings{
    
    private $plugin_name;
 
    public function __construct( $plugin_name ) {
		$this->plugin_name = $plugin_name;
 
	}
    public function register_section(){
        add_settings_section(
            'xtain_gr_general_section',
            __( 'General Settings', GR_TEXT_DOMAIN ),
            '',
            $this->plugin_name
        );
    }
    public function register_fields(){
       
        /* Google API key */
        add_settings_field(
            'xtain_gr_google_api_key_el',
            __( 'Google API Key', GR_TEXT_DOMAIN),
            [ $this,'xtain_gr_google_api_key_cb'],
            $this->plugin_name,
            'xtain_gr_general_section'
        );
        register_setting( $this->plugin_name, 'xtain_gr_google_api_key_el', array($this, 'xtian_gr_sanitize_callback')); /* List of products to be included */
       
        /* Company Name */
        add_settings_field(
            'xtain_gr_company_name_key_el',
            __( 'Google Business Name', GR_TEXT_DOMAIN),
            [ $this,'xtain_gr_company_name_key_cb'],
            $this->plugin_name,
            'xtain_gr_general_section'
        );
        register_setting( $this->plugin_name, 'xtain_gr_company_name_key_el', array($this, 'xtian_gr_sanitize_company_name_callback'));
    }
    
	public function xtain_gr_google_api_key_cb(){
		$xtain_gr_google_api_key_el =  get_option('xtain_gr_google_api_key_el');
		?>
			<input name="xtain_gr_google_api_key_el" type="text" id="xtain_gr_google_api_key_el" required value="<?php echo $xtain_gr_google_api_key_el; ?>" class="regular-text">
			<p class="description"><?php _e('Enter a valid google API key in the box above', GR_TEXT_DOMAIN) ?></p>
		<?php
    } 
    
	public function xtain_gr_company_name_key_cb(){
		$xtain_gr_company_name_key_el =  get_option('xtain_gr_company_name_key_el');
		?>
			<input name="xtain_gr_company_name_key_el" type="text" id="xtain_gr_company_name_key_el" required value="<?php echo $xtain_gr_company_name_key_el; ?>" class="regular-text">
			<p class="description"><?php _e('Enter the company name just as it appears on google registeration', GR_TEXT_DOMAIN) ?></p>
		<?php
    }
    

    public function xtian_gr_sanitize_callback($input){

        return $input;
    }

    public function xtian_gr_sanitize_company_name_callback($new_company_name){

        $old_company_name = get_option('xtain_gr_company_name_key_el', '');

        if($new_company_name != $old_company_name){
            include_once(GR_UTIL_FUNCTIONS);
            GR_Helpers::update_company($new_company_name);
        }

        return $new_company_name;

    }
}


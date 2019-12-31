<?php

    class GR_Helpers {

        private static function update_ratings($new_company_name = ''){
            $buz_google_api 	= esc_attr(trim(get_option( 'xtain_gr_google_api_key_el')));
            $companyName 		= urlencode($new_company_name);
        
            $referenceObj 		= wp_remote_get('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$companyName.'&sensor=true&key='.$buz_google_api);
            $data 				= json_decode($referenceObj['body']);
            $referenceID   		= sanitize_text_field($data->results[0]->reference);
            $rating   			= sanitize_text_field($data->results[0]->rating);
            
            return array($rating, $referenceID, $companyName  );
        }

        public static function update_company($new_company_name = ''){
                $gr_google_data = self::update_ratings($new_company_name);
               
                if(!empty($gr_google_data[0]) && !empty($gr_google_data[1])){
                    update_option( 'xtian_gr_rating', $gr_google_data[0], true );
                    update_option( 'xtian_gr_reference_id', $gr_google_data[1], true );
                }else{
                    update_option( 'xtian_gr_rating', 0 , true );
                    update_option( 'xtian_gr_reference_id', '', true );
                }
        }

    }
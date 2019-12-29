<?php

    class GR_Helpers {

        public static function update_ratings(){
            $buz_google_api 	= trim(get_option( 'xtain_gr_google_api_key_el'));
            $companyName 		= urlencode(get_option('xtain_gr_company_name_key_el'));
        
            $referenceObj 		= wp_remote_get('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$companyName.'&sensor=true&key='.$buz_google_api);
            $data 				= json_decode($referenceObj['body']);
            $referenceID   		= $data->results[0]->reference;
            $rating   			= $data->results[0]->rating;
            
            return array($rating, $referenceID );
        }

    }
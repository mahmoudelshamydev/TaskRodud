<?php
if ( ! function_exists( 'sendsms' ) ) {
    /**
     * Get Total Refunded Amount order
     * @param $id
     *
     * @return  float|integer
     */
    function sendsms( $data,$code,$contant) {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://smsapi.future-club.com/fccsms.aspx?UID='.env('SMS_USER_NAME').'&p='.env('SMS_PASSWORD').'&S='.env('SMS_ID_SENDER').'&G='.$data->phone_prefix.$data->phone.'&M=your%20'.$contant.'%20'.$code.'%20code%20for%20'.env('APP_NAME').'&L=L',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // CURLOPT_POSTFIELDS =>'{
            // "username": "'.env('SMS_USRENAME').'",
            // "password": "'.env('SMS_PASSWORD').'",
            // "messagebody": "'.$msg.'",
            // "sender": "'.env('SMS_SENDER').'",
            // "number": "965'.$data->mobile_no.'"
            // }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;
    }
}

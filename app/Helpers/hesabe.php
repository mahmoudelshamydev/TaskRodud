<?php

use App\Models\UserNotifications;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM;
use App\User;

if ( ! function_exists( 'hesabe' ) ) {
    /**
     * Get Total Refunded Amount order
     * @param $id
     *
     * @return  float|integer
     */
    function hesabe( $data) {
          $data = array(
            "merchantCode" => config('app.HESABE_merchantcode'),
            "amount" => number_format(round($data['amount'], 3), 3),
            "responseUrl" => $data['responseUrl'],
            "failureUrl" => $data['failureUrl'],
            "paymentType" => $data['paymentType'],
            "orderReferenceNumber" => $data['orderId'],
            "variable1" => $data['orderId'],
            "version" => '2.0'
        );
        $requestDataJson = json_encode($data);

         // Encrypt the JSON Serialized string
        $encryptedData = \App\Http\Controllers\API\HesabeCrypt::encrypt($requestDataJson, config('app.HESABE_secretKey'), config('app.HESABE_ivKey'));
        // POST the serialized string to the checkout API and receive back the response
        $curl = curl_init();
        $apiUrl = "https://sandbox.hesabe.com/";
        if (config('app.HESABE_test') == 0) {
            $apiUrl = "https://api.hesabe.com/";
        }
        curl_setopt_array($curl, array(
            CURLOPT_URL => $apiUrl."/checkout",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('data' => $encryptedData),
            CURLOPT_HTTPHEADER => array(
                "accessCode: ".config('app.HESABE_accessCode')

            ),
        ));

        $post_response = curl_exec($curl);
        curl_close($curl);


        $decrypted_post_response = \App\Http\Controllers\API\HesabeCrypt::decrypt($post_response, config('app.HESABE_secretKey'), config('app.HESABE_ivKey'));

        $decode_response = json_decode($decrypted_post_response);
          if ($decode_response->status) {
            $payToken = $decode_response->response->data;
            $payURL = $apiUrl . '/payment?data=' . $payToken;
            //Get encrypted data response
            return ['payURL'=>$payURL];
        }
    }
}

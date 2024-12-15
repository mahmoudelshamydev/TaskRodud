<?php

use App\Models\UserNotifications;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM;
use App\User;

if ( ! function_exists( 'upayment' ) ) {
    /**
     * Get Total Refunded Amount order
     * @param $id
     *
     * @return  float|integer
     */
    function upayment( $data ) {
        $api_key =password_hash(config('app.UPAYMENT_api_key'), PASSWORD_BCRYPT) ;
        $url = "https://api.upayments.com/test-payment";
        if(config('app.UPAYMENT_test')==1)
        {
            $url = "https://api.upayments.com/test-payment";
            $api_key =config('app.UPAYMENT_api_key') ;
        }
$fields = array(
    'merchant_id' => config('app.UPAYMENT_merchantid'),
    'username' => config('app.UPAYMENT_username'),
    'password' => stripslashes(config('app.UPAYMENT_password')),
    'api_key' => $api_key, //In production mode, please pass API_KEY with BCRYPT
    'order_id' => $data['orderId'], // MIN 30 characters with strong unique function (like hashing function with time)
    'total_price' => $data['amount'],
    'CurrencyCode' => $data['CurrencyCode'],//only works in production mode
    'CstFName' => 'Test Name',
    'CstEmail' => 'test@test.com',
    'CstMobile' => '12345678',
    'success_url' =>  $data['responseUrl'],
    'error_url' =>  $data['failureUrl'],
    'test_mode' => config('app.UPAYMENT_test'), // test mode enabled
    'whitelabled' => $data['whitelabled'] , // only accept in live credentials (it will not work in test)
    'payment_gateway' => $data['payment_gateway'] ,// only works in production mode
    'ProductName' => json_encode($data['products']),
    'ProductQty' => json_encode($data['qtys']),
    'ProductPrice' => json_encode($data['prices']),
    'reference' => $data['orderId']

);
$fields_string = http_build_query($fields);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);
$server_output = json_decode($server_output, true);

if(array_key_exists('paymentURL',$server_output))
{
     return ['payURL'=> $server_output['paymentURL']];

}
        return ['errorMsg'=> $server_output['error_msg']];
    }
}

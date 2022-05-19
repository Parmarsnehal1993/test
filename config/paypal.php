<?php
// return [
//     'mode'    => 'sandbox', // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
//     'sandbox' => [
//         'username'    => env('PAYPAL_SANDBOX_API_USERNAME', ''),
//         'password'    => env('PAYPAL_SANDBOX_API_PASSWORD', ''),
//         'secret'      => env('PAYPAL_SANDBOX_API_SECRET', ''),
//         'certificate' => env('PAYPAL_SANDBOX_API_CERTIFICATE', ''),
//         'app_id'      => 'APP-80W284485P519543T', // Used for testing Adaptive Payments API in sandbox mode
//     ],
//     'live' => [
//         'username'    => env('PAYPAL_LIVE_API_USERNAME', ''),
//         'password'    => env('PAYPAL_LIVE_API_PASSWORD', ''),
//         'secret'      => env('PAYPAL_LIVE_API_SECRET', ''),
//         'certificate' => env('PAYPAL_LIVE_API_CERTIFICATE', ''),
//         'app_id'      => '', // Used for Adaptive Payments API
//     ],
//     'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
//     'currency'       => 'USD',
//     'notify_url'     => '', // Change this accordingly for your application.
//     'locale'         => '', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
//     'validate_ssl'   => true, // Validate SSL when creating api client.
// ];
/** set your paypal credential **/
// 'client_id' =>"",
// 'secret' => '',
// 'client_id' => '',
// //     'secret' => '',
/**
 * SDK configuration
 */

/** set your paypal credential **/
// return ['client_id' ='Adgp02mR3QytezW1zela79A3cC4LkPJNbxFRbwjlB-WADUwXhxr3gdvoj4z4dFMVe3d5zBNc6uU2aWau',
// 'secret' = 'EHJ4afLI8XJWiC_RjWog-cj72VkEy2a_eEbrvPQPu0X1E65fii7E6RlW26_to-ypTYYsH1pX40Q592P1',]
// /**
// * SDK configuration
// */
// 'settings' => array(
// 	/**
// 	* Available option 'sandbox' or 'live'
// 	*/
// 	'mode' => 'sandbox',
// 	/**
// 	* Specify the max request time in seconds
// 	*/
// 	'http.ConnectionTimeOut' => 1000,
// 	/**
// 	* Whether want to log to a file
// 	*/
// 	'log.LogEnabled' => true,
// 	/**
// 	* Specify the file that want to write on
// 	*/
// 	'log.FileName' => storage_path() . '/logs/paypal.log',
// 	/**
// 	* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
// 	*
// 	* Logging is most verbose in the 'FINE' level and decreases as you
// 	* proceed towards ERROR
// 	*/
// 	'log.LogLevel' => 'FINE'
// 	),
// );

// return [
//     'client_id' => env('PAYPAL_CLIENT_ID', ''),
//     'secret' => env('PAYPAL_SECRET', ''),
//     'settings' => array(
//         'mode' => env('PAYPAL_MODE', 'sandbox'),
//         'http.ConnectionTimeOut' => 30,
//         'log.LogEnabled' => true,
//         'log.FileName' => storage_path() . '/logs/paypal.log',
//         'log.LogLevel' => 'ERROR'
//     ),
// ];

return [
    'client_id' => 'Adgp02mR3QytezW1zela79A3cC4LkPJNbxFRbwjlB-WADUwXhxr3gdvoj4z4dFMVe3d5zBNc6uU2aWau',
    'secret' => 'EHJ4afLI8XJWiC_RjWog-cj72VkEy2a_eEbrvPQPu0X1E65fii7E6RlW26_to-ypTYYsH1pX40Q592P1',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];
// <?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

// return [
//     'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
//     'sandbox' => [
//         'username'    => env('PAYPAL_SANDBOX_API_USERNAME', ''),
//         'password'    => env('PAYPAL_SANDBOX_API_PASSWORD', ''),
//         'secret'      => env('PAYPAL_SANDBOX_API_SECRET', ''),
//         'certificate' => env('PAYPAL_SANDBOX_API_CERTIFICATE', ''),
//         'app_id'      => 'APP-80W284485P519543T', // Used for testing Adaptive Payments API in sandbox mode
//     ],
//     'live' => [
//         'username'    => env('PAYPAL_LIVE_API_USERNAME', ''),
//         'password'    => env('PAYPAL_LIVE_API_PASSWORD', ''),
//         'secret'      => env('PAYPAL_LIVE_API_SECRET', ''),
//         'certificate' => env('PAYPAL_LIVE_API_CERTIFICATE', ''),
//         'app_id'      => '', // Used for Adaptive Payments API
//     ],

//     'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
//     'currency'       => env('PAYPAL_CURRENCY', 'USD'),
//     'billing_type'   => 'MerchantInitiatedBilling',
//     'notify_url'     => '', // Change this accordingly for your application.
//     'locale'         => '', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
//     'validate_ssl'   => true, // Validate SSL when creating api client.
// ];

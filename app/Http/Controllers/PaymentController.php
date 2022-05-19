<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Instamojo;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.event');
    }
    public function pay(Request $request)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "X-Api-Key:test_c38ed230a339b00948e0e8e2f47",
                "X-Auth-Token:test_29fb766cc433db60a79f7ff3c01"
            )
        );
        $payload = array(
            'purpose' => 'for Donets',
            'amount' => $request->amount,
            'phone' => $request->mobile_number,
            'buyer_name' => $request->name,
            'redirect_url' => 'http://localhost:8000/payment-success',
            'send_email' => true,
            // 'webhook' => 'http://www.example.com/webhook/',
            'send_sms' => true,
            'email' => $request->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        // echo '<pre>';
        // print_r($response->payment_request->longurl);
        // echo '</pre>';
        // die();
        return redirect($response->payment_request->longurl);
        // $api = new \Instamojo\Instamojo(
        //     config('services.instamojo.api_key'),
        //     config('services.instamojo.auth_token'),
        //     config('services.instamojo.url')
        // );
        // // $api = \Instamojo\Instamojo::init([
        // //     'client_id' => '<clientId>',
        // //     'client_secret' => '<clientSecret>',
        // //     'username' => '<userName>',   // optional
        // //     'password' => '<password>',   // optional
        // //     'scope' => '<scope if any>'   // optional
        // // ], false);


        // try {
        //     $response = $api->paymentRequestCreate(array(
        //         "purpose" => "For text Php Coding Stuff",
        //         "amount" => $request->amount,
        //         "buyer_name" => "$request->name",
        //         "send_email" => true,
        //         "email" => "$request->email",
        //         "phone" => "$request->mobile_number",
        //         "redirect_url" => "test://127.0.0.1:8000/pay-success"
        //     ));

        //     header('Location: ' . $response['longurl']);
        //     exit();
        // } catch (Exception $e) {
        //     print('Error: ' . $e->getMessage());
        // }
    }

    public function success(Request $request)
    {
        $input = $request->all();

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payments/' . $request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "X-Api-Key:api_key",
                "X-Auth-Token:api_auth_token"
            )
        );

        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            \Session::put('error', 'Payment Failed, Try Again!!');
            return redirect()->route('payment');
        } else {
            $data = json_decode($response);
        }

        if ($data->success == true) {
            if ($data->payment->status == 'Credit') {

                // Here Your Database Insert Login
                $input['name'] = $data->payment->buyer_name;
                $input['email'] = $data->payment->buyer_email;
                $input['mobile'] = $data->payment->buyer_phone;
                $input['amount'] = $data->payment->amount;
                Payment::create($input);

                \Session::put('success', 'Your payment has been pay successfully, Enjoy!!');
                return redirect()->route('payment');
            } else {
                \Session::put('error', 'Payment Failed, Try Again!!');
                return redirect()->route('payment');
            }
        }
    }
}

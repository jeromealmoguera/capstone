<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SMSController extends Controller
{
    public function send(Request $request)

    {
        $ch = curl_init();
        $parameters = array(
            'apikey' => '2e7c860ea5721f9f01fb518c1b2e0a52', // Your API KEY
            'number' => $request->input('mobile_no'),
            'message' => $request->input('message'),
            'sendername' => 'SEMAPHORE'
        );
        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        // Show the server response
        echo $output;

        return view('admin.pages.personnel.send-sms');
    }
}

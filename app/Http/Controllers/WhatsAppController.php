<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }




public function send(Request $request)
{


    $phone ='919566755750'; // $request->phone; // 👈 dynamic phone number

    $url = "https://graph.facebook.com/v25.0/1113912208469172/messages";

    $data = [
        "messaging_product" => "whatsapp",
        "to" => $phone,
        "type" => "template",
        "template" => [
            "name" => "hello_world",
            "language" => [
                "code" => "en_US"
            ]
        ]
    ];

    $token = env('EAAWjRiXl8hoBRANWtFi5q1RlsfZC6PKYcKC2SwySOBQk6A8LXnZBjOxmPTNB0tVS3vY9ZBriKrNffXghQrVZAkU2PymlO7VbBOhlK2SJbxPQHheZBWznsOS5QnOCbJyVAGIwaQ2YZCSnzQZCpL9EZB68IKvTdkiSfxbct0ZCvys341ZB2FTB3Aa8XHBpk4EB53xQGOyiOe67HZAHyST79ewgJ1GLBr3TXgMogwUZAI1RgsYS6v8OZCi5bIgeCMiDr4AhJpZCZAKtVFjM3W02i4MBkZBLOpV6l8gR');

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $token",
        "Content-Type: application/json"
    ]);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        return response()->json([
            'error' => curl_error($ch)
        ]);
    }

    curl_close($ch);

    return response()->json(json_decode($response, true));
}
}

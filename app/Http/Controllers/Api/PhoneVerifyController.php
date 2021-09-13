<?php

namespace App\Http\Controllers\Api;

require_once "Twilio/autoload.php";
use Twilio\Rest\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PhoneVerifyController extends Controller
{
    public function phoneVerify(Request $request){
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($sid, $token);

        $verification = $twilio->verify->v2->services($twilio_verify_sid)
        ->verifications
        ->create('+88' . $request->phone, "sms");

        return response()->json($verification->status);


    }

    public function phoneVerifyCode(Request $request){
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($sid, $token);

        $verification = $twilio->verify->v2->services($twilio_verify_sid)
        ->verificationChecks
        ->create($request->verify_code, ["to" => "+88" . $request->phone]);

        return response()->json($verification->status);


    }
}

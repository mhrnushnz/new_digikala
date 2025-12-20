<?php
namespace App\Traits;
use App\Classes\Zibal;

trait PaymentGetWay
{
    protected function zibalRequest($amount)
    {
        $zibal = new Zibal();          //ساختن شی از کلاس زیبال

        $parameters = array(
            "merchant"=> 'zibal',                //required
            "callbackUrl"=> route('client.payment.callback'),       //required
            "amount"=> $amount,                  //required
            "orderId"=> time(),                  //optional
            "mobile"=> "09120000000",            //optional for mpg
        );

        $response = $zibal->postToZibal('request', $parameters);

        var_dump($response);


        if ($response->result == 100) {
            $startGateWayUrl = "https://gateway.zibal.ir/start/".$response->trackId;
            return redirect($startGateWayUrl);
        }
        else{
            throw new \Exception('Error code: '.$response->result . '-Message:' . $response->message);       //مدیریت خطا
        }
    }
}

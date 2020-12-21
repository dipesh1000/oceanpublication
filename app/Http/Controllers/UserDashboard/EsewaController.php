<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;

class EsewaController extends Controller
{
    public function sucess(Request $request)
    {
        if($request->oid && $request->amt &&$request->refId)
        {
            // $order = Order::where('invoice_no',$request->oid)->first();
            // if($order){
            $url = "https://uat.esewa.com.np/epay/transrec";
            $data =[
            'amt'=> $request->totalPrice,
            'rid'=> $request->refId,
            'pid'=> $request->pid,
            'scd'=> 'epay_payment'
                 ];
            // }

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $response_code = $this->get_response('response_code',$response);
        if(trim($response_code) =='Success')
        {
            // $order->status= 1;
            // $order->save();
            return redirect()->route('userdashboard.order.response')->with('success_message', 'Trasaction completed.');
        }
        }
    }
    public function failure()
    {
        return redirect()->route('userdashboard.order.response')->with('failure_message', 'Failed.');
    }
    //extract value from response code of verification of payment
    public function get_response($node, $xml)
    {
        if($xml==false){
        return false;
        }
        $found = preg_match('#<'.$node.'[?:\s+>]+)?>(.*?)'.'</'.$node.'>#s',$xml, $matches);
        if($found!= false){
            return $matches[1];
        }
        return false;
    }
    public function response()
    {
        return view('response');
    }
}

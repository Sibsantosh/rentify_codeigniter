<?php

namespace App\APIS\Repositories;

use App\APIS\Api_Wrapper\GetApi;
use APP\APIS\Interfaces\IGetAuthenticationToken;
use App\APIS\Interfaces\IGetCouponsApis;
use App\Models\CouponsModelRentify;
use Exception;

class GetCouponsApis implements IGetCouponsApis
{
    private  IGetAuthenticationToken $token;
    public function __construct()
    {
        $this->token =  service('getAuthenticationTokenInstance');
    }
    function getAllCoupons()
    {
        /* $ch = curl_init();
        $auth_token =$this->token->generateAuthenticationToken();
        $url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/layouts/L_Discounts/records/" ;
        //$url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/layouts/L_Discounts/records/?_sort=[{ \"fieldName\": \"MinimumPrice\", \"sortOrder\": \"ascend\" }]" ;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                        'Authorization:Bearer '.$auth_token));
        $resp = curl_exec($ch);
        $decodedJson =null;
        //if there is an error then it will show error
        if ($e = curl_error($ch)) {
            //echo "Error:". $e;
        } else {
            //if there is no error then it decodes the json
            $decodedJson = json_decode($resp, true);
           //var_dump( $decodedJson["response"]["data"]);
        }

        curl_close($ch);
        $couponList = array();
        foreach($decodedJson["response"]["data"] as $rawCoupon){
            $couponModel = new CouponsModelRentify($rawCoupon);
            //var_dump($couponModel);
            array_push($couponList,$couponModel);
        }
        //var_dump($couponList);
        return $couponList;

        */

        $auth_token = $this->token->generateAuthenticationToken();
        if ($auth_token == null) {
            return;
        }
        $route = getenv('fetch_all_coupons');
        $ch = GetApi::GET_API($route, $auth_token);
        try {

            $resp = curl_exec($ch);
            $decodedJson = json_decode($resp, true);
            $couponList = array();
            foreach ($decodedJson["response"]["data"] as $rawCoupon) {
                $couponModel = new CouponsModelRentify($rawCoupon);

                array_push($couponList, $couponModel);
            }
            return $couponList;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}

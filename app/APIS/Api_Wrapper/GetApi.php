<?php 
namespace App\APIS\Api_Wrapper;
class GetApi{
    public static function GET_API($route,$auth_token)  {
        $ch = curl_init();
        $url = getenv('api_base_url').$route;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                        'Authorization:Bearer '.$auth_token));
        return $ch;
    }
}

?>
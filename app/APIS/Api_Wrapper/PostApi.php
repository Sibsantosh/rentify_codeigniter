<?php
namespace App\APIS\Api_Wrapper;

class PostApi{
    public static function POST_API($route, $auth_token, $data){
        $ch = curl_init();
        $url = getenv('api_base_url').$route;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            'Authorization:Bearer '.$auth_token));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        return $ch;
    }

    public static function AUTH_TOKEN_API($route){
        $ch = curl_init();
        $url = getenv('api_base_url').$route;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        return $ch;
    }
}
?> 
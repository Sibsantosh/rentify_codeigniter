<?php
namespace App\APIS\Repositories;

use App\APIS\Api_Wrapper\PostApi;
use App\APIS\Interfaces\IGetAuthenticationToken;
use Exception;
use stdClass;
class GetAuthenticationToken implements IGetAuthenticationToken{

    //this function is used for generating the authentication token
    
    public function generateAuthenticationToken(){

      
        //cheks if there exists any previous authe expiry time if it exists then checks if the time given exceeds the current time or not
        if(session()->get("auth_expiry_time")>time() ){
            $token = session()->get('auth_token');
            session()->remove('auth_expiry_time');
            session()->set('auth_expiry_time',time() + 500);
            return $token;

        }
        
        else{
        //creating new token if the token doesn't exists or the token is expired
        
        $route = getenv('auth_token_route');
        $username = getenv('auth_token_username');
        $password = getenv('auth_token_password');
        $dataArray = array("{}");
        $data = json_encode(new stdClass());
        $ch = PostApi::AUTH_TOKEN_API($route);


        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            'Authorization: Basic ' . base64_encode("$username:$password")));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        
        $resp = curl_exec($ch);
        try{

       
            $decodedJson = json_decode($resp, true);
            $token = $decodedJson["response"]["token"];
            // setcookie("auth_token", $token, time() + 9*60000,"/");
            //sets the auth expiry time and the token 
            session()->remove('auth_token');
            session()->remove('auth_expiry_time');
            session()->set('auth_token',$token);
            session()->set('auth_expiry_time',time() + 500);
            return $token;
        }
        catch(Exception $e){
           $e->getMessage();
        }
        curl_close($ch);
        return null;

        //print_r("inside function");
        }
    }

}
    


?>

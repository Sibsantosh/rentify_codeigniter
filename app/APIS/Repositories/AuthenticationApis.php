<?php

namespace App\APIS\Repositories;

use App\APIS\Api_Wrapper\PostApi;
use App\APIS\Interfaces\IAuthenticationApis;
use App\APIS\Interfaces\IGetAuthenticationToken;
use Exception;

class AuthenticationApis implements IAuthenticationApis
{

    private  IGetAuthenticationToken $token;
    public function __construct()
    {
        $this->token =  new GetAuthenticationToken();
    }

    function RegisterUser($postData)
    {


        $route = getenv('register_user_route');
        $dateParts = explode('-', $postData["dob"]);
        $formattedDate = $dateParts[0] . '+' . $dateParts[1] . '+' . $dateParts[2]; //yyyy-mm-dd
        #creates the array for uploading 
        $dataArray = array("fieldData" => array(
            "UserName" => $postData["name"],
            "Email" => $postData["email"],
            "PhoneNumber" => $postData["phone"],
            "DateOfBirth" => $formattedDate,
            "userType" => "user",
            "Password" => base64_encode($postData["password"])
        ));
        $data = json_encode($dataArray);
        $auth_token = $this->token->generateAuthenticationToken(); //GetAuthenticationToken::generateAuthenticationToken();

        if ($auth_token == null) {
            return;
        }
        $ch = PostApi::POST_API($route, $auth_token, $data);
        try {
            $resp = curl_exec($ch);
            curl_close($ch);
            return $resp;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }


    function LoginUser($postData)
    {
        $dataArray = array("query" => array(array(
            "Email" => str_replace("@", "\\@", $postData["email"]),
            "Password" => base64_encode($postData["password"])
        )));
        $data = json_encode($dataArray);
        $auth_token = $this->token->generateAuthenticationToken(); //GetAuthenticationToken::generateAuthenticationToken();
        if ($auth_token == null) {
            return;
        }
        $route = getenv('login_user_route');
        $ch = PostApi::POST_API($route, $auth_token, $data);
        try {
            $resp = curl_exec($ch);
            curl_close($ch);
            return $resp;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}

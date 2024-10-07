<?php
namespace App\APIS\Repositories;

use App\APIS\Interfaces\IAuthenticationApis;
use App\APIS\Interfaces\IGetAuthenticationToken;
class AuthenticationApis implements IAuthenticationApis {

    private  IGetAuthenticationToken $token;
    public function __construct() {
        $this->token =  new GetAuthenticationToken();
    }

    function RegisterUser($postData){

        $ch = curl_init();
        $url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/layouts/L_Users/records";

        #converts the given date tp filemaker supported dates
        $dateParts = explode('-',$postData["dob"]);
        $formattedDate = $dateParts[0].'+'.$dateParts[1].'+'.$dateParts[2];//yyyy-mm-dd
        #creates the array for uploading 
        $dataArray = array("fieldData"=>array( "UserName"=> $postData["name"],
        "Email"=>$postData["email"],
        "PhoneNumber"=>$postData["phone"],
        "DateOfBirth"=>$formattedDate,
        "Password"=> base64_encode($postData["password"])));
        $data = json_encode ($dataArray);
        $auth_token = $this->token->generateAuthenticationToken();//GetAuthenticationToken::generateAuthenticationToken();
        if ($auth_token =="") {
            curl_close($ch);
            var_dump("Some internal issues please try again ");
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            'Authorization:Bearer '.$auth_token));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $resp = curl_exec($ch);
        curl_close($ch);
        return $resp;

    }


    function LoginUser($postData){
        $ch = curl_init();
        $url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/layouts/L_Users/_find";

        //$dataArray = array("query"=>array(array("Email"=>str_replace("@","\\@",$_POST["email"]))),"Password"=>base64_encode($_POST["password"]));

        #converts the email to filemaker supported email and the password to base64encoded password
        $dataArray = array("query"=>array(array( "Email"=> str_replace("@","\\@",$postData["email"]),
        "Password"=>base64_encode($postData["password"]))));
        $data = json_encode ($dataArray);
        $auth_token = $this->token->generateAuthenticationToken();//GetAuthenticationToken::generateAuthenticationToken();
        if ($auth_token =="") {
            curl_close($ch);
            echo"Some internal issues please try again ";
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST,1);
        #sets the header for the api
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            "Authorization:Bearer $auth_token"));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $resp = curl_exec($ch);
        curl_close($ch);
        return $resp;
    }

}



?>
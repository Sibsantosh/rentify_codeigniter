<?php
namespace App\APIS\Repositories;
use App\APIS\Interfaces\IGetAuthenticationToken;
use stdClass;
class GetAuthenticationToken implements IGetAuthenticationToken{
    public function generateAuthenticationToken(){
        /*print_r(session()->get("auth_expiry_time"));
        echo "<br>";
        print_r(time());
        echo "<br>";
        print_r(session()->get('auth_token')); */
        if(session()->get("auth_expiry_time")>time() ){
            $token = session()->get('auth_token');
            session()->remove('auth_expiry_time');
            session()->set('auth_expiry_time',time() + 500);
            return $token;

        }
        else{
        $ch = curl_init();
        $url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/sessions";
        $username = 'admin';
        $password = 'Sibsantosh@2580';
        $dataArray = array("{}");
        $data = json_encode(new stdClass());
        new stdClass();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            'Authorization: Basic ' . base64_encode("$username:$password")));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $resp = curl_exec($ch);
        $token = "";
        if($e= curl_error($ch)){
            var_dump( "error". $e);
        }else{
            $decodedJson = json_decode($resp, true);
            $token = $decodedJson["response"]["token"];
            // setcookie("auth_token", $token, time() + 9*60000,"/");
            session()->remove('auth_token');
            session()->remove('auth_expiry_time');
            session()->set('auth_token',$token);
            session()->set('auth_expiry_time',time() + 500);
            
           // var_dump("". $token ."");

            
        }

        curl_close($ch);
        return $token;

        //print_r("inside function");
        }
    }

}
    


?>

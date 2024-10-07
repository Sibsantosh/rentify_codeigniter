<?php
namespace App\APIS\Repositories;

use App\APIS\Interfaces\IGetAuthenticationToken;
use App\APIS\Interfaces\IPropertiesApis;
use App\Models\PropertiesModelRentify;
class PropertiesApis implements IPropertiesApis{

    private  IGetAuthenticationToken $token;
    public function __construct() {
        $this->token =  new GetAuthenticationToken();
    }

    //this function fetch all the available properties available inside the database
    function fetchAllProperties(){
        $ch = curl_init();
        
        //$token = new GetAuthenticationToken();
        $auth_token = $this->token->generateAuthenticationToken();
        $url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/layouts/L_Properties/records";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                        'Authorization:Bearer '.$auth_token));
        $resp = curl_exec($ch);
        $decodedJson =null;
        if ($e = curl_error($ch)) {
            //echo "Error:". $e;
        } else {
            $decodedJson = json_decode($resp, true);
            //var_dump( $decodedJson["response"]["data"]);
        }

        curl_close($ch);
        $propertyList = array();
        foreach($decodedJson["response"]["data"] as $rawPropertyData){
            $propertyModel = new PropertiesModelRentify($rawPropertyData);
            array_push($propertyList,$propertyModel);
        }
        return $propertyList;
    }

    //this function is used to fetch a single property form the database
    function getSingleProperty($recordId){

        $ch = curl_init();
        $auth_token =$this->token->generateAuthenticationToken();
        $url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/layouts/L_Properties/records/$recordId";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                        'Authorization:Bearer '.$auth_token));
        $resp = curl_exec($ch);
        $decodedJson =null;
        if ($e = curl_error($ch)) {
            //echo "Error:". $e;
        } else {
            $decodedJson = json_decode($resp, true);
            //var_dump( $decodedJson["response"]["data"]);
        }

        curl_close($ch);
        $property = new PropertiesModelRentify($decodedJson["response"]["data"][0]);
        return $property;

    }

    //this function is used to check whether a given property is available for a specific  date range
    
    public function getPropertyAvailabilityForSpecificDate($checkIn,$checkOut,$propertyId){
        $ch = curl_init();
        $url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/layouts/L_BookingsSelfJoin/_find";

        $dataArray = array("query"=>array(array("PropertyId"=> "$propertyId","CheckInDate"=> "≤ $checkOut",
      "CheckOutDate"=> "≥ $checkIn"
      )));
        $data = json_encode ($dataArray);
        $auth_token = $this->token->generateAuthenticationToken();
        if ($auth_token =="") {
            curl_close($ch);
            echo"Some internal issues please try again ";
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            "Authorization:Bearer $auth_token"));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $resp = curl_exec($ch);
        curl_close($ch);
        if($e= curl_error($ch)){
            echo "error". $e;
        }else{
            $decodedJson = json_decode($resp, true);
            //print_r($decodedJson);
            return $resp;
        }

        
   
    }

}

?>
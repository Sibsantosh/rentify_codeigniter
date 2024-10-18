<?php

namespace App\APIS\Repositories;

use App\APIS\Api_Wrapper\GetApi;
use App\APIS\Api_Wrapper\PostApi;
use App\APIS\Interfaces\IGetAuthenticationToken;
use App\APIS\Interfaces\IPropertiesApis;
use App\Models\PropertiesModelRentify;
use Exception;

class PropertiesApis implements IPropertiesApis
{

    private  IGetAuthenticationToken $token;
    public function __construct()
    {
        $this->token =  new GetAuthenticationToken();
    }

    //this function fetch all the available properties available inside the database
    function fetchAllProperties()
    {
        $auth_token = $this->token->generateAuthenticationToken();
        if($auth_token == null){
            return;
        }
        $route = getenv('fetch_all_properties');
        $ch = GetApi::GET_API($route, $auth_token);
        try {
            curl_close($ch);
            $resp = curl_exec($ch);
            $propertyList = array();
            $decodedJson = json_decode($resp, true);
            foreach ($decodedJson["response"]["data"] as $rawPropertyData) {
                $propertyModel = new PropertiesModelRentify($rawPropertyData);
                array_push($propertyList, $propertyModel);
            }
            return $propertyList;
        } catch (Exception $e) {
            $e->getMessage();
        }


       
        
    }

    //this function is used to fetch a single property form the database
    function getSingleProperty($recordId)
    {
        $auth_token = $this->token->generateAuthenticationToken();
        if($auth_token == null){
            return;
        }
        $route = getenv('fetch_single_property') . $recordId;
        $ch = GetApi::GET_API($route, $auth_token);
        $resp = curl_exec($ch);
        
        try{
            curl_close($ch);
            $decodedJson = json_decode($resp, true);
            $property = new PropertiesModelRentify($decodedJson["response"]["data"][0]);
            return $property;
        }
        catch(Exception $e){
            echo $e->getMessage();
        }

       
       
    }

    //this function is used to check whether a given property is available for a specific  date range

    public function getPropertyAvailabilityForSpecificDate($checkIn, $checkOut, $propertyId)
    {
        $ch = curl_init();
        $url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/layouts/L_BookingsSelfJoin/_find";
        $route = getenv('property_available_for_specific_date_range');
        $dataArray = array("query" => array(array(
            "PropertyId" => "$propertyId",
            "CheckInDate" => "≤ $checkOut",
            "CheckOutDate" => "≥ $checkIn"
        )));
        $data = json_encode($dataArray);
        $auth_token = $this->token->generateAuthenticationToken();

        if ($auth_token == "") {
            curl_close($ch);
            echo "Some internal issues please try again ";
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            "Authorization:Bearer $auth_token"
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        //$ch = PostApi::POST_API($url,$auth_token,$data);
        $resp = curl_exec($ch);
        curl_close($ch);
        if ($e = curl_error($ch)) {
            echo "error" . $e;
        } else {
            $decodedJson = json_decode($resp, true);
            //print_r($decodedJson);
            return $resp;
        }
    }
}

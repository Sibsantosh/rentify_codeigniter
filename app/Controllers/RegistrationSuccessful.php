<?php

namespace App\Controllers;

use App\APIS\GetAuthenticationToken;
use App\Models\UserModelRentify;
use Exception;



class RegistrationSuccessful extends BaseController
{


    public function index()
    {
        $ch = curl_init();
        $auth_token =GetAuthenticationToken::generateAuthenticationToken();
        $url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/layouts/L_Users/records";
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
        $userList = array();
        foreach($decodedJson["response"]["data"] as $rawUser){
            $userModel = new UserModelRentify($rawUser);
            array_push($userList,$userModel);
        }
        //var_dump(session()->get("authenticatedUser"));
        //return view('registered',['data'=>$data]);
        return view('registered',['data'=>$userList]);
    }

    public function deleteUser($index){
        $ch = curl_init();
        $url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/layouts/L_Users/records/$index";

        $auth_token = GetAuthenticationToken::generateAuthenticationToken();
        if ($auth_token =="") {
            curl_close($ch);
            echo"Some internal issues please try again ";
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"DELETE");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            'Authorization:Bearer '.$auth_token));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $resp = curl_exec($ch);

        if($e= curl_error($ch)){
            //echo "error". $e;
        }else{
            $decodedJson = json_decode($resp, true);
            return redirect()->redirect(base_url().'registered');
        }


        curl_close($ch);
      /* $data = null;
        try{
            $data = session()->get('object');
            if($data==null){
                $data = [];
            }
            else{
                array_splice($data,$index,1);
                session()->remove('object');
                 session()->set('object',$data);
                 return redirect()->redirect(base_url().'registered');
            }

        }catch(Exception $e){
            echo $e->getMessage();
        }
        */
    }
    public function editUser($index){
       /* $data = null;
        try{
            $data = session()->get('object');
            if($data==null){
                $data = [];
            }
            else{
               // var_dump( $postData[$index]);
               $postData = $data[$index];
                 array_splice($data,$index,1);
                 session()->remove('object');
                 session()->set('object',$data);
               return view('edit',['postData'=>$postData]);
            }

        }catch(Exception $e){
            echo $e->getMessage();
        }
*/
        $ch = curl_init();
        $auth_token ="fd15bf6ff7327a8dbfd7343635bffdc65fdc381765e9a6d8fe1";
        $url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/layouts/L_Users/records/$index";
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
            //var_dump( $decodedJson["response"]["data"][0]);
        }

        curl_close($ch);
       
            $userModel = new UserModelRentify($decodedJson["response"]["data"][0]);
            //array_push($userList,$userModel);
        
        //return view('registered',['data'=>$data]);
        return view('edit',['postData'=>$userModel]);
    }

    public function updateUser(){
        if($_POST){
            $ch = curl_init();
            
            $url = "https://172.16.8.153/fmi/data/vLatest/databases/Rentify/layouts/L_Users/records/";

            $dataArray = array("fieldData"=>array("Title"=>"this is the update api"));
            $data = json_encode ($dataArray);
            curl_setopt($ch, CURLOPT_URL, $url);
            $auth_token = "d8228525374d42442f73ea8d7f5d0e5ff08fee20c0dc5f199";
            if ($auth_token =="") {
                curl_close($ch);
                echo"Some internal issues please try again ";
            }
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"PATCH");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                'Authorization:Bearer '.$auth_token));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $resp = curl_exec($ch);

            if($e= curl_error($ch)){
                echo "error". $e;
            }else{
                $decodedJson = json_decode($resp, true);
                print_r($decodedJson);
            }

            curl_close($ch);

        }
    }
}

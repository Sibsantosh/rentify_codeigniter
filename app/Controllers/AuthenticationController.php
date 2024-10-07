<?php
namespace App\Controllers;


use App\Models\UserModelRentify;
use App\APIS\Repositories\AuthenticationApis;
use App\APIS\Interfaces\IAuthenticationApis;

class AuthenticationController extends BaseController{

    private  IAuthenticationApis $authenticationApi;

    //this is the constructor used for initializing the corresponding api class
    public function __construct() {
        $this->authenticationApi =  new AuthenticationApis();
    }

    //this is used for registering the user 
    public function registrationPage(){

        if  ($_POST){
            $this->authenticationApi->RegisterUser($_POST);
            return redirect()->redirect('/dashboard'); 
           }
            
        return view('register');
    }


    //this is for making the user login to the project
    public function LoginPage(){

        if  ($_POST){
            $resp = $this->authenticationApi->LoginUser($_POST);

                $decodedJson = json_decode($resp, true);
                //print_r($decodedJson);  
                if(array_key_exists("data",$decodedJson["response"])){
                    $userModel = new UserModelRentify($decodedJson["response"]["data"][0]);
                    session()->set('authenticatedUser',$userModel);
                    return redirect()->redirect('/dashboard');
                }
                else{
                    return view('login',["error"=>"Incorrect details"]);
                   
                }                         
           }
            
        return view('login');
    }
}
?>
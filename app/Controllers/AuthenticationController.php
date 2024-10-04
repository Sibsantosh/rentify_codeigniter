<?php
namespace App\Controllers;

use App\Models\UserModelRentify;
use App\APIS\Repositories\AuthenticationApis;
use App\APIS\Interfaces\IAuthenticationApis;
use Exception;
use stdClass;
class AuthenticationController extends BaseController{

    private  IAuthenticationApis $authenticationApi;
    public function __construct() {
        $this->authenticationApi =  new AuthenticationApis();
    }
    public function registrationPage(){

        if  ($_POST){
            $this->authenticationApi->RegisterUser($_POST);
            return redirect()->redirect('/dashboard'); 
           }
            
        return view('register');
    }


    public function LoginPage(){

        if  ($_POST){
            $resp = $this->authenticationApi->LoginUser($_POST);

                $decodedJson = json_decode($resp, true);
                print_r($decodedJson);  
                if(array_key_exists("data",$decodedJson["response"])){
                    //print_r($decodedJson["response"]["data"][0]);
                    print_r("data found");
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
<?php

namespace App\Controllers;

use App\APIS\Repositories\GetAuthenticationToken;
use App\APIS\Interfaces\IGetAuthenticationToken;
use CodeIgniter\Config\Services;

class Home extends BaseController
{
    /*
    private IGetAuthenticationToken $auth;
    public function __construct() {
        $this->auth = new GetAuthenticationToken();
        var_dump($this->auth->generateAuthenticationToken());
    }
    */



    //this function just loads the index page
    public function index()
    {
        /* $token = $this->auth->generateAuthenticationToken();
        echo $token; 
        var_dump( $this->auth->generateAuthenticationToken()); */
        // self::getSpecificDate();
        return view('SplashScreen');
    }


    public function getSpecificDate()
    {
        $api = service('getPropertiesApisInstance');
        $response = $api->getPropertyAvailabilityForSpecificDate("08/15/2024", "08/19/2024", 1);
        var_dump($response);
    }
}

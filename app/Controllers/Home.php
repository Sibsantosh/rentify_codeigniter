<?php

namespace App\Controllers;

use App\APIS\Repositories\GetAuthenticationToken;
use App\APIS\Interfaces\IGetAuthenticationToken;

class Home extends BaseController
{
   /*  private IGetAuthenticationToken $auth;
    public function __construct() {
        $this->auth = new GetAuthenticationToken();
        //var_dump($this->auth->generateAuthenticationToken());
    } */
    public function index(): string
    {
        /* $token = $this->auth->generateAuthenticationToken();
        echo $token;
        var_dump( $this->auth->generateAuthenticationToken()); */
        return view('SplashScreen');
    }
}


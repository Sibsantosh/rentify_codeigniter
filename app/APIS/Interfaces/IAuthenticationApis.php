<?php
namespace App\APIS\Interfaces; 
interface IAuthenticationApis{
    public function RegisterUser($postData);
    public function LoginUser($postData);
}

?>
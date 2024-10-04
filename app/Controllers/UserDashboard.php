<?php
namespace App\Controllers;



use App\APIS\GetCouponsApis;
use App\APIS\Interfaces\IAuthenticationApis;
use App\Models\PropertiesModelRentify;
use App\APIS\Interfaces\IPropertiesApis;
use App\APIS\Repositories\PropertiesApis;

use function App\APIS\generateAuthenticationToken;

class UserDashboard extends BaseController{

    private  IPropertiesApis $propertiesApi;
    public function __construct() {
        $this->propertiesApi =  new PropertiesApis();
    }
    public function index() {

        //session()->remove('authenticatedUser');
         if(session()->get('authenticatedUser')==null){
             return redirect()->redirect(base_url().'login');
        } 
       //var_dump(session()->get('authenticatedUser')==null);
        $propertyList= $this->propertiesApi->fetchAllProperties();
        return view('userDashboard',["propertyList"=>$propertyList]);
    }

    public function checkProperty($recordId){
        
        session()->remove('selectedProperty');
        $property = $this->propertiesApi->getSingleProperty($recordId);
        //var_dump($property);
        //var_dump( $recordId);
        session()->set("selectedProperty",$property);
        return view('propertyDetails',["property"=>$property]);
    }
}

?>
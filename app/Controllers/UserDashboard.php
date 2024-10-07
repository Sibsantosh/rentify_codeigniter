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

    //this is the constructor used for loading the list of properties availabe 
    public function __construct() {
        $this->propertiesApi =  new PropertiesApis();
    }

    //this function loads the user dashboard after login if there is no saved user in the session then it will redirect to the login page
    public function index() {

        //session()->remove('authenticatedUser');
         if(session()->get('authenticatedUser')==null){
             return redirect()->redirect(base_url().'login');
        } 
       //var_dump(session()->get('authenticatedUser')==null);
        $propertyList= $this->propertiesApi->fetchAllProperties();
        return view('userDashboard',["propertyList"=>$propertyList]);
    }

    //this function loads the page for details of any property
    //this function stores the details of the property in the session 
    public function checkProperty($recordId){
        
        //remove any saved property
        session()->remove('selectedProperty');
        $property = $this->propertiesApi->getSingleProperty($recordId);
        //var_dump($property);
        //var_dump( $recordId);

        //saves the selected property
        session()->set("selectedProperty",$property);
        return view('propertyDetails',["property"=>$property]);
    }
}

?>
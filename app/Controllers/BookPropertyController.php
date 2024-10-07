<?php
namespace App\Controllers;

use App\APIS\Interfaces\IGetCouponsApis;
use App\APIS\Interfaces\IPropertiesApis;
use App\APIS\Repositories\GetCouponsApis;
use App\APIS\Repositories\PropertiesApis;

class BookPropertyController extends BaseController{

    private IGetCouponsApis $couponApis;
    private IPropertiesApis $propetryApis;
    public function __construct() {
        $this->couponApis = new GetCouponsApis();
        $this->propetryApis = new PropertiesApis();
    }
    function index(){
        $selectedProperty = session()->get('selectedProperty');
        if($selectedProperty == null){
            return redirect()->redirect(base_url().'dashboard');
        }else{
            $couponList = $this->couponApis->getAllCoupons();
            return view('bookPropertyFirstPage',["selectedProperty"=>$selectedProperty,"couponList"=>$couponList]);
        }


    }
    function checkAvailabilityForSpecificProperty($jsonData){
        $splitArr = explode("~~",$jsonData);
        $checkInDate = str_replace("~","/",$splitArr[0]);
        $checkOutDate = str_replace("~","/",$splitArr[1]);
        $propertyid = $splitArr[2];
        echo($this->propetryApis->getPropertyAvailabilityForSpecificDate($checkInDate,$checkOutDate,$propertyid));
       
    }

    
    function confirmBookPropery($data){
        $pairs = explode('~~', $data);
    
        // Initialize an associative array to hold the key-value pairs
        $formDataArray = [];
    
        // Iterate over each pair
        foreach ($pairs as $pair) {
            // Split each pair by the '~' delimiter
            list($key, $value) = explode('~', $pair, 2);
    
            // Add the key-value pair to the associative array
            $formDataArray[$key] = $value;
        }
        var_dump($formDataArray);
        
    
        //return redirect()->redirect(base_url().'dashboard');
        
    }
}

?>
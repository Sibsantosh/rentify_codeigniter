<?php
namespace App\Controllers;

use App\APIS\Interfaces\IGetCouponsApis;
use App\APIS\Interfaces\IPropertiesApis;
use App\APIS\Repositories\GetCouponsApis;
use App\APIS\Repositories\PropertiesApis;

class BookPropertyController extends BaseController{

    private IGetCouponsApis $couponApis;
    private IPropertiesApis $propetryApis;

    //this is constructor used for loading the objects for the coupons and the property apis

    public function __construct() {
        $this->couponApis = service('getCouponApiInstance');
        $this->propetryApis = service('getPropertiesApisInstance');
    }

    //this function loads the page showing the details about the selected property
    function index(){
        $selectedProperty = session()->get('selectedProperty');
        if($selectedProperty == null){
            return redirect()->redirect(base_url().'dashboard');
        }else{
            $couponList = $this->couponApis->getAllCoupons();
            return view('bookPropertyFirstPage',["selectedProperty"=>$selectedProperty,"couponList"=>$couponList]);
        }


    }
    //this function checks the availability of any property and returns the data to the view and used for checking the availability of a page
    function checkAvailabilityForSpecificProperty($jsonData){
        $splitArr = explode("~~",$jsonData);
        $checkInDate = str_replace("~","/",$splitArr[0]);
        $checkOutDate = str_replace("~","/",$splitArr[1]);
        $propertyid = $splitArr[2];
        echo($this->propetryApis->getPropertyAvailabilityForSpecificDate($checkInDate,$checkOutDate,$propertyid));
       
    }

    
    // this function is used when we are confirming any bookings i.e when we are giving all the data and creating a booking
    //this fucntion will be calling two apis one for booking and other for the payment and storing both the data
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
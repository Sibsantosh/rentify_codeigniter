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
        //echo $selectedProperty->getPropertyId();
        //session()->remove("selectedProperty");
        if($selectedProperty == null){
            return redirect()->redirect(base_url().'dashboard');
        }else{
            $couponList = $this->couponApis->getAllCoupons();
            //var_dump($this->propetryApis->getPropertyAvailabilityForSpecificDate(1));
            return view('bookPropertyFirstPage',["selectedProperty"=>$selectedProperty,"couponList"=>$couponList]);
        }


    }
    function checkAvailabilityForSpecificProperty($jsonData){
        //$decoded = json_decode($jsonData);
        //print_r($decoded);
        $splitArr = explode("~~",$jsonData);
        $checkInDate = str_replace("~","/",$splitArr[0]);
        $checkOutDate = str_replace("~","/",$splitArr[1]);
        $propertyid = $splitArr[2];
        //echo $checkInDate;
        echo($this->propetryApis->getPropertyAvailabilityForSpecificDate($checkInDate,$checkOutDate,$propertyid));
        //var_dump( $jsonData);
    }

    function confirmBookPropery(){
        
    }
}

?>
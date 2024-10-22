<?php

namespace App\Controllers;

use App\APIS\Interfaces\IGetCouponsApis;
use App\APIS\Interfaces\IPropertiesApis;
use App\APIS\Repositories\GetCouponsApis;
use App\APIS\Repositories\PropertiesApis;
use App\Helpers\BookPropertyHelpers;
use App\Models\BookingsModel;
use App\Models\PaymentModel;

class BookPropertyController extends BaseController
{

    private IGetCouponsApis $couponApis;
    private IPropertiesApis $propetryApis;

    //this is constructor used for loading the objects for the coupons and the property apis

    public function __construct()
    {
        //getting the instance of the class from services class
        $this->couponApis = service('getCouponApiInstance');
        $this->propetryApis = service('getPropertiesApisInstance');
    }

    //this function loads the page showing the details about the selected property
    function index()
    {
        $selectedProperty = session()->get('selectedProperty');
        if ($selectedProperty == null) {
            return redirect()->redirect(base_url() . 'dashboard');
        } else {
            $couponList = $this->couponApis->getAllCoupons();
            return view('bookPropertyFirstPage', ["selectedProperty" => $selectedProperty, "couponList" => $couponList]);
        }
    }
    //this function checks the availability of any property and returns the data to the view and used for checking the availability of a page
    function checkAvailabilityForSpecificProperty($jsonData)
    {
        $splitArr = explode("~~", $jsonData);
        $checkInDate = str_replace("~", "/", $splitArr[0]);
        $checkOutDate = str_replace("~", "/", $splitArr[1]);
        $propertyid = $splitArr[2];
        echo ($this->propetryApis->getPropertyAvailabilityForSpecificDate($checkInDate, $checkOutDate, $propertyid));
    }


    // this function is used when we are confirming any bookings i.e when we are giving all the data and creating a booking
    //this fucntion will be calling two apis one for booking and other for the payment and storing both the data
    function confirmBookPropery()
    {
        /*$pairs = explode('~~', $data);

        // Initialize an associative array to hold the key-value pairs
        $formDataArray = [];

        // Iterate over each pair
        foreach ($pairs as $pair) {
            // Split each pair by the '~' delimiter
            list($key, $value) = explode('~', $pair, 2);

            // Add the key-value pair to the associative array
            $formDataArray[$key] = $value;
        }
        //var_dump($formDataArray);
        $userId = session()->get('authenticatedUser')->getUserId();
        $bookingsModel = new BookingsModel(0,$userId,$formDataArray["propertyId"],$formDataArray["checkin"],$formDataArray["checkout"],$formDataArray["total-price"],$formDataArray["guest-comment"],"Requested",$formDataArray["total-rooms"]);
        var_dump($formDataArray);
        $paymentModel = new PaymentModel($formDataArray["total-price"],$formDataArray["payment-method"],"Completed","");
        if($formDataArray["payment-method"]=="credit-card" || $formDataArray["payment-method"]=="debit-card"){
            $paymentModel->setStatus("Competed");
            $paymentModel->setCardNumber($formDataArray["credit-card-number"]);
            $paymentModel->setCardExpiry($formDataArray["credit-card-expiry"]);

        }
        //$helper = new BookPropertyHelpers();
       // $helper->createBooking($bookingsModel);


        return redirect()->redirect(base_url().'dashboard');*/
        $formDataArray = json_decode(file_get_contents('php://input'), true);

        // Now you can access the posted data


        // Do something with the data (e.g., save to the database)

        // Send a response back to the client
        $userId = session()->get('authenticatedUser')->getUserId();
        $bookingsModel = new BookingsModel(0, $userId, $formDataArray["propertyId"], $formDataArray["checkin"], $formDataArray["checkout"], $formDataArray["total-price"], $formDataArray["guest-comment"], "Requested", $formDataArray["total-rooms"]);
        //var_dump($bookingsModel);
        $paymentModel = new PaymentModel($formDataArray["total-price"], $formDataArray["payment-method"], "Completed", "");
        if ($formDataArray["payment-method"] == "credit-card") {
            $paymentModel->setStatus("Competed");
            $paymentModel->setCardNumber($formDataArray["credit-card-number"]);
            $paymentModel->setCardExpiry($formDataArray["credit-card-expiry"]);
            $paymentModel->setCardCvv($formDataArray['credit-card-cvv']);
            $paymentModel->setMethod("Credit Card");
        } else if ($formDataArray["payment-method"] == "debit-card") {
            $paymentModel->setStatus("Competed");
            $paymentModel->setCardNumber($formDataArray["debit-card-number"]);
            $paymentModel->setCardExpiry($formDataArray["debit-card-expiry"]);
            $paymentModel->setCardCvv($formDataArray['debit-card-cvv']);
            $paymentModel->setMethod("Debit Card");
        } else if ($formDataArray["payment-method"] == 'upi') {
            $paymentModel->setStatus("Competed");
            $paymentModel->setUpiId($formDataArray['upiId']);
            $paymentModel->setMethod("UPI");
        } else {
            $paymentModel->setMethod("Pay Later");
            $paymentModel->setStatus("Pending");
        }


        //var_dump($paymentModel);
        $helper = new BookPropertyHelpers();
        $recordId = $helper->createBooking($bookingsModel);
        $bookingId = $helper->fetchBookingIdFromRecordId($recordId);
        $paymentModel->setBookingId($bookingId);
        $helper->CreatePaymentDetails($paymentModel);
        
        
        // Return the response as JSON
        $response = array(
            'status' => 'success',
            'message' => 'Data received successfully',
            'receivedData' => 'Property Booked Successfully'
        );

        echo json_encode($response);
    }
}

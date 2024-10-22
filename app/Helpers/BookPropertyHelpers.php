<?php 
namespace App\Helpers;
use App\APIS\Interfaces\IBookPropertyApis;
use Exception;

class BookPropertyHelpers{
    private IBookPropertyApis $bookPropertyApis; 
    public function __construct() {
        $this->bookPropertyApis = service('getBookPropertyApisInstance');
    }
    public function createBooking($bookingsModel){
        try{
        $bookingsResponse = $this->bookPropertyApis->CreateBooking($bookingsModel);
        //var_dump($bookingsResponse);
        $decodedJson = json_decode($bookingsResponse, true);
        return $decodedJson["response"]["recordId"];
        }
        catch(Exception $e){
             $e->getMessage();
        }
    return null;
    }
    public function fetchBookingIdFromRecordId($recordId){
        try{
            return $this->bookPropertyApis->FetchBookingId($recordId);
        }catch(Exception $e){
             $e->getMessage();
        }
        return null;
    }

    public function CreatePaymentDetails($paymentModel) {
        try{
            return $this->bookPropertyApis->CreatePaymentDetails($paymentModel);

        }catch(Exception $e){
            $e->getMessage();
        }
        return null;
    }
}

?>
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
        $bookingId = $decodedJson["response"]["recordId"];
        //sleep(1);
        var_dump($this->bookPropertyApis->FetchBookingId($bookingId));
        //var_dump($bookingId);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }





    }
}

?>
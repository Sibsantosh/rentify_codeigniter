<?php 
namespace App\APIS\Repositories;

use App\APIS\Api_Wrapper\GetApi;
use App\APIS\Api_Wrapper\PostApi;
use App\APIS\Interfaces\IBookPropertyApis;
use App\APIS\Interfaces\IGetAuthenticationToken;
use Exception;

class BookPropertyApis implements IBookPropertyApis{
    private IGetAuthenticationToken $token;
    public function __construct() {
        $this->token = service('getAuthenticationTokenInstance');
    }

    public function CreateBooking($bookingsModel){
        $route = getenv('create_new_booking');
       
        $checkinDate = explode('-', $bookingsModel->getCheckInDate());
        $formattedcheckInDate = $checkinDate[0] . '+' . $checkinDate[1] . '+' . $checkinDate[2]; //yyyy-mm-dd
        $checkOutDate = explode('-', $bookingsModel->getCheckOutDate());
        $formattedcheckOutDate = $checkOutDate[0] . '+' . $checkOutDate[1] . '+' . $checkOutDate[2]; //yyyy-mm-dd
        #creates the array for uploading 
        $dataArray = array("fieldData" => array(
            "GuestId" =>$bookingsModel->getGuestId(),
            "PropertyId"=>$bookingsModel-> getPropertyId(),
            "CheckInDate"=> $formattedcheckInDate,
            "CheckOutDate"=> $formattedcheckOutDate,
            "TotalPrice" => $bookingsModel->getTotalPrice(),
            "BookingStatus" => $bookingsModel->getBookingStatus(),
            "TotalRoomsBooked" => $bookingsModel->getTotalRoomsBooked(),
            "Comments" =>$bookingsModel->getComments()
            
        ));
        $data = json_encode($dataArray);
        $auth_token = $this->token->generateAuthenticationToken(); //GetAuthenticationToken::generateAuthenticationToken();

        if ($auth_token == null) {
            return;
        }
        $ch = PostApi::POST_API($route, $auth_token, $data);
        try {
            $resp = curl_exec($ch);
            curl_close($ch);
            return $resp;
        } catch (Exception $e) {
            $e->getMessage();
        }
        return null;
    }
    public function FetchBookingId($recordId){

        $auth_token = $this->token->generateAuthenticationToken();
        if ($auth_token == null) {
            return;
        }
        $route = getenv('fetch_booking_id').$recordId;
        $ch = GetApi::GET_API($route, $auth_token);
        try {
            $resp = curl_exec($ch);
            $decodedJson = json_decode($resp, true);
            return $decodedJson ["response"]["data"][0]["fieldData"]["BookingId"];
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
    public function CreatePaymentDetails(){

    }
}

?>
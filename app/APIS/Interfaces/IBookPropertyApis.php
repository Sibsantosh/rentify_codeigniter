<?php 
namespace App\APIS\Interfaces;

interface IBookPropertyApis{
    public function CreateBooking($bookingsModel);
    public function FetchBookingId($recordId);
    public function CreatePaymentDetails();
}

?>
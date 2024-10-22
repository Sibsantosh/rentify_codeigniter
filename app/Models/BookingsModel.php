<?php

namespace App\Models;

class BookingsModel
{

    private $BookingId;
    private $GuestId;
    private $PropertyId;
    private $checkInDate;
    private $checkOutDate;
    private $TotalPrice;
    private $Comments;
    private $BookingStatus;
    private $TotalRoomsBooked;

    public function __construct($BookingId, $GuestId, $PropertyId, $checkInDate, $checkOutDate, $TotalPrice, $Comments, $BookingStatus, $TotalRoomsBooked)
    {
        $this->BookingId = $BookingId;
        $this->GuestId = $GuestId;
        $this->PropertyId = $PropertyId;
        $this->checkInDate = $checkInDate;
        $this->checkOutDate = $checkOutDate;
        $this->TotalPrice = $TotalPrice;
        $this->Comments = $Comments;
        $this->BookingStatus = $BookingStatus;
        $this->TotalRoomsBooked = $TotalRoomsBooked;
    }

    public function getBookingId()
    {
        return $this->BookingId;
    }

    public function setBookingId($BookingId)
    {
        $this->BookingId = $BookingId;
    }

    // Getter and Setter for GuestId
    public function getGuestId()
    {
        return $this->GuestId;
    }

    public function setGuestId($GuestId)
    {
        $this->GuestId = $GuestId;
    }

    // Getter and Setter for PropertyId
    public function getPropertyId()
    {
        return $this->PropertyId;
    }

    public function setPropertyId($PropertyId)
    {
        $this->PropertyId = $PropertyId;
    }

    // Getter and Setter for checkInDate
    public function getCheckInDate()
    {
        return $this->checkInDate;
    }

    public function setCheckInDate($checkInDate)
    {
        $this->checkInDate = $checkInDate;
    }

    // Getter and Setter for checkOutDate
    public function getCheckOutDate()
    {
        return $this->checkOutDate;
    }

    public function setCheckOutDate($checkOutDate)
    {
        $this->checkOutDate = $checkOutDate;
    }

    // Getter and Setter for TotalPrice
    public function getTotalPrice()
    {
        return $this->TotalPrice;
    }

    public function setTotalPrice($TotalPrice)
    {
        $this->TotalPrice = $TotalPrice;
    }

    // Getter and Setter for Comments
    public function getComments()
    {
        return $this->Comments;
    }

    public function setComments($Comments)
    {
        $this->Comments = $Comments;
    }

    // Getter and Setter for BookingStatus
    public function getBookingStatus()
    {
        return $this->BookingStatus;
    }

    public function setBookingStatus($BookingStatus)
    {
        $this->BookingStatus = $BookingStatus;
    }

    // Getter and Setter for TotalRoomsBooked
    public function getTotalRoomsBooked()
    {
        return $this->TotalRoomsBooked;
    }

    public function setTotalRoomsBooked($TotalRoomsBooked)
    {
        $this->TotalRoomsBooked = $TotalRoomsBooked;
    }
}

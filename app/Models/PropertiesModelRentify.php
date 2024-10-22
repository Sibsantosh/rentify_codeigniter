<?php

namespace App\Models;


class PropertiesModelRentify
{
    private $propertyId;
    private $hostId;
    private $title;
    private $description;
    private $city;
    private $state;
    private $country;
    private $zipCode;
    private $address;
    private $latitude;
    private $longitude;
    private $propertyType;
    private $pricePerNight;
    private $maxGuest;
    private $noOfBedRoom;
    private $availableRooms;
    private $checkInDate;
    private $checkOutDate;
    private $rules;
    private $cancellationPolicy;
    private $status;
    private $image;
    private $addedOn;
    private $recordId;

    public function __construct($property)
    {
        $data = $property['fieldData'];
        $this->propertyId = $data['PropertyId'];
        $this->hostId = $data['HostId'];
        $this->title = $data['Title'];
        $this->description = $data['Description'];
        $this->city = $data['City'];
        $this->state = $data['State'];
        $this->country = $data['Country'];
        $this->zipCode = $data['ZipCode'];
        $this->address = $data['Address'];
        $this->latitude = $data['Latitude'];
        $this->longitude = $data['Longitude'];
        $this->propertyType = $data['PropertyType'];
        $this->pricePerNight = $data['PricePerNight'];
        $this->maxGuest = $data['MaxGuest'];
        $this->noOfBedRoom = $data['NoOfBedRoom'];
        $this->availableRooms = $data['AvailableRooms'];
        $this->checkInDate = $data['CheckInDate'];
        $this->checkOutDate = $data['CheckOutDate'];
        $this->rules = $data['Rules'];
        $this->cancellationPolicy = $data['CancellationPolicy'];
        $this->status = $data['Status'];
        $this->image = $data['Image'];
        $this->addedOn = $data['AddedOn'];
        $this->recordId = $property['recordId'];
    }

    // Getters
    public function getPropertyId()
    {
        return $this->propertyId;
    }

    public function getHostId()
    {
        return $this->hostId;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getPropertyType()
    {
        return $this->propertyType;
    }

    public function getPricePerNight()
    {
        return $this->pricePerNight;
    }

    public function getMaxGuest()
    {
        return $this->maxGuest;
    }

    public function getNoOfBedRoom()
    {
        return $this->noOfBedRoom;
    }

    public function getAvailableRooms()
    {
        return $this->availableRooms;
    }

    public function getCheckInDate()
    {
        return $this->checkInDate;
    }

    public function getCheckOutDate()
    {
        return $this->checkOutDate;
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function getCancellationPolicy()
    {
        return $this->cancellationPolicy;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getAddedOn()
    {
        return $this->addedOn;
    }
    public function getRecordId()
    {
        return $this->recordId;
    }
}

<?php 
namespace App\APIS\Interfaces;
interface IPropertiesApis{

    public function fetchAllProperties();
    public function getSingleProperty($recordId);
    public function getPropertyAvailabilityForSpecificDate($checkIn,$checkOut,$propertyId);
    
}


?>
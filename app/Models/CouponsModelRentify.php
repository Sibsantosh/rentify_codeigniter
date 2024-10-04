<?php
namespace App\Models;
class CouponsModelRentify {
   

    private $discountId;
    private $discountCode;
    private $description;
    private $minimumPrice;
    private $discountPercentage;
    private $dateStart;
    private $dateEnd;
    private $recordId;

    public function __construct($coupon) {
        $data = $coupon['fieldData'];
        $this->discountId = $data['DiscountId'];
        $this->discountCode = $data['DicountCode'];
        $this->description = $data['Description'];
        $this->minimumPrice = $data['MinimumPrice'];
        $this->discountPercentage = $data['DiscountPercentage'];
        $this->dateStart = $data['DateStart'];
        $this->dateEnd = $data['DateEnd'];
        $this->recordId = $coupon['recordId'];
    }
     // Getters
    public function getDiscountId()
    {
        return $this->discountId;
    }

    public function getDiscountCode()
    {
        return $this->discountCode;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getMinimumPrice()
    {
        return $this->minimumPrice;
    }

    public function getDiscountPercentage()
    {
        return $this->discountPercentage;
    }

    public function getDateStart()
    {
        return $this->dateStart;
    }

    public function getDateEnd()
    {
        return $this->dateEnd;
    }
    public function getRecordId()
    {
        return $this->recordId;
    }




}
   

?>

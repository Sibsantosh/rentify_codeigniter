<?php

namespace App\Models;

class PaymentModel
{

    private $paymentId;
    private $bookingId;
    private $amount;
    private $method;
    private $status;
    private $discountId;
    private $cardNumber;
    private $cardHolderName;
    private $cardExpiry;
    private $cardCvv;
    private $upiId;
    public function __construct($amount,$method,$status,$discount) {
        $this->amount = $amount;
        $this->method = $method;
        $this->status = $status;
        $this->discountId = $discount;
    }

    // Getter and Setter for paymentId
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    // Getter and Setter for bookingId
    public function getBookingId()
    {
        return $this->bookingId;
    }

    public function setBookingId($bookingId)
    {
        $this->bookingId = $bookingId;
    }

    // Getter and Setter for amount
    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    // Getter and Setter for method
    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    // Getter and Setter for status
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    // Getter and Setter for discountId
    public function getDiscountId()
    {
        return $this->discountId;
    }

    public function setDiscountId($discountId)
    {
        $this->discountId = $discountId;
    }

    // Getter and Setter for cardNumber
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

    // Getter and Setter for cardHolderName
    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    public function setCardHolderName($cardHolderName)
    {
        $this->cardHolderName = $cardHolderName;
    }

    // Getter and Setter for cardExpiry
    public function getCardExpiry()
    {
        return $this->cardExpiry;
    }

    public function setCardExpiry($cardExpiry)
    {
        $this->cardExpiry = $cardExpiry;
    }

    // Getter and Setter for cardCvv
    public function getCardCvv()
    {
        return $this->cardCvv;
    }

    public function setCardCvv($cardCvv)
    {
        $this->cardCvv = $cardCvv;
    }

    // Getter and Setter for upiId
    public function getUpiId()
    {
        return $this->upiId;
    }

    public function setUpiId($upiId)
    {
        $this->upiId = $upiId;
    }
}

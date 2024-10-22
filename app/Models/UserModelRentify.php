<?php

namespace App\Models;

class UserModelRentify
{
    private $userId;
    private $userName;
    private $email;
    private $phoneNumber;
    private $dateOfBirth;
    private $userType;
    private $picture;
    private $passowrd;
    private $recordId;
    private $modId;

    public function __construct($data)
    {
        $this->userId = $data['fieldData']['UserId'];
        $this->userName = $data['fieldData']['UserName'];
        $this->email = $data['fieldData']['Email'];
        $this->phoneNumber = $data['fieldData']['PhoneNumber'];
        $this->dateOfBirth = $data['fieldData']['DateOfBirth'];
        $this->userType = $data['fieldData']['UserType'];
        $this->picture = $data['fieldData']['Picture'];
        $this->passowrd = base64_decode($data['fieldData']['Password']);
        $this->recordId = $data['recordId'];
        $this->modId = $data['modId'];
    }

    // Getters
    public function getUserId()
    {
        return $this->userId;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    public function getUserType()
    {
        return $this->userType;
    }

    public function getPicture()
    {
        return $this->picture;
    }
    public function getPassword()
    {
        return $this->passowrd;
    }

    public function getRecordId()
    {
        return $this->recordId;
    }

    public function getModId()
    {
        return $this->modId;
    }

    // Setters
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function setRecordId($recordId)
    {
        $this->recordId = $recordId;
    }

    public function setModId($modId)
    {
        $this->modId = $modId;
    }
}

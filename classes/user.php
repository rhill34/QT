<?php

class User
{
    private $_userId;
    private $_fName;
    private $_lName;
    private $_phone;
    private $_credits;
    private $_userRating;
    private $email;
    private $passwords;

    public function __construct($fname, $lname, $phone)
    {
         $this->_fName=$fname;
         $this->_lName=$lname;
         $this->_phone=$phone;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->_userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->_userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getFName()
    {
        return $this->_fName;
    }

    /**
     * @param mixed $fName
     */
    public function setFName($fName)
    {
        $this->_fName = $fName;
    }

    /**
     * @return mixed
     */
    public function getLName()
    {
        return $this->_lName;
    }

    /**
     * @param mixed $lName
     */
    public function setLName($lName)
    {
        $this->_lName = $lName;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getCredits()
    {
        return $this->_credits;
    }

    /**
     * @param mixed $credits
     */
    public function setCredits($credits)
    {
        $this->_credits = $credits;
    }

    /**
     * @return mixed
     */
    public function getUserRating()
    {
        return $this->_userRating;
    }

    /**
     * @param mixed $userRating
     */
    public function setUserRating($userRating)
    {
        $this->_userRating = $userRating;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->passwords;
    }

    /**
     * @param mixed $passwords
     */
    public function setPasswords($passwords)
    {
        $this->passwords = $passwords;
    }



}

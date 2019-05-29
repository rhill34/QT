<?php

class User
{
    private $_userId;
    private $_fName;
    private $_lName;
    private $_phone;
    private $_credits;
    private $_userRating;
    private $_email;
    private $_passwords;
    private $_interests;

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
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_passwords;
    }

    /**
     * @param mixed $passwords
     */
    public function setPasswords($passwords)
    {
        $this->_passwords = $passwords;
    }

    /**
     * @return mixed
     */
    public function getInterests()
    {
        return $this->_interests;
    }

    /**
     * @param mixed $interests
     */
    public function setInterests($interests)
    {
        $this->_interests = $interests;
    }


    public static function echoRating($rating)
    {
        if($rating==0)
        {
            echo "New User";
            return;
        }
        for($i=1; $i<6;$i++)
        {
            if($rating>=i)
            {
                echo "<span class='fa fa-star checked'></span>";
            }
            else
            {
                echo "<span class='fa fa-star'></span>";
            }

        }
    }

}

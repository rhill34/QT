<?php

/**
 * Class User
 * Creates a User Class for all general users of a website
 */
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

    /**
     * User constructor.
     * @param $fname String first name of user
     * @param $lname String last name of a user
     * @param $phone String phone number of user
     */
    public function __construct($fname, $lname, $phone)
    {
         $this->_fName=$fname;
         $this->_lName=$lname;
         $this->_phone=$phone;
    }

    /**
     * Retrieves that value assigned to userId
     * @return Int user id
     */
    public function getUserId()
    {
        return $this->_userId;
    }

    /**
     * Sets the value of userId
     * @param Int $userId
     */
    public function setUserId($userId)
    {
        $this->_userId = $userId;
    }

    /**
     * Gets the value of this users first name
     * @return String first name of user
     */
    public function getFName()
    {
        return $this->_fName;
    }

    /**
     * Sets teh value of the users first name
     * @param $fName String first name to be set
     */
    public function setFName($fName)
    {
        $this->_fName = $fName;
    }

    /**
     * Gets the last name of the user
     * @return String last name of this user
     */
    public function getLName()
    {
        return $this->_lName;
    }

    /**
     * Sets the last name of the user
     * @param String $lName last name of the user
     */
    public function setLName($lName)
    {
        $this->_lName = $lName;
    }

    /**
     * Gets the phone number of the user
     * @return String phone number of the user
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * Sets the phone number of the user
     * @param String $phone sets the phone number of this user
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * Gets the credit amount of the user
     * @return Int credits user has
     */
    public function getCredits()
    {
        return $this->_credits;
    }

    /**
     * Sets the credits of the user
     * @param Int $credits credits to assign to the user
     */
    public function setCredits($credits)
    {
        $this->_credits = $credits;
    }

    /**
     * Gets the user rating of this user
     * @return Int user rating
     */
    public function getUserRating()
    {
        return $this->_userRating;
    }

    /**
     * Sets the user rating of the user
     * @param Int $userRating The user rating of the user
     */
    public function setUserRating($userRating)
    {
        $this->_userRating = $userRating;
    }

    /**
     * Gets the email of the user
     * @return String the email of this user
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * Sets the email of this user
     * @param String $email of this user
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * Gets the password of this user
     * @return String password of this user
     */
    public function getPassword()
    {
        return $this->_passwords;
    }

    /**
     * Sets the password of this user
     * @param String $passwords sets the password of this user
     */
    public function setPasswords($passwords)
    {
        $this->_passwords = $passwords;
    }

    /**
     * Gets the interest of this user
     * @return array an array of interests of this user
     */
    public function getInterests()
    {
        return $this->_interests;
    }

    /**
     * Set the interest of the user
     * @param array $interests array of interests that user has
     */
    public function setInterests($interests)
    {
        $this->_interests = $interests;
    }


    /**
     * Takes a rating number and produces spans that echo either filled in stars with class of starred or empty stars
     * Between 0-5 stars
     * @param $rating Int the rating number of the user
     */
    public static function echoRating($rating)
    {
        $rating=intval($rating);
        //if 0 stars or less then declare as new user
        if($rating<=0)
        {
            echo "New User";
            return;
        }
        for($i=1; $i<6;$i++)
        {
            if($rating>=$i)
            {

                echo "<span class='fa fa-star starred'></span>";
            }
            else
            {
                echo "<span class='fa fa-star'></span>";
            }

        }
    }

}

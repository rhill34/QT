<?php

/**
 * This class defines a driver who is an extensino of a user with an id,rating,city,state,profilepic,carpic,carmake,
 * carmodel, caryear, and bio.
 * Class User_Driver
 */
class User_Driver extends User
{
    private $_driverId;
    private $_rating;
    private $_city;
    private $_state;
    private $_profilePic;
    private $_carPic;
    private $_carMake;
    private $_carModel;
    private $_carYear;
    private $_bio;

    /**
     * Constructs from parent user
     * @param $fname String first name of this driver
     * @param $lname String last name of this driver
     * @param $phone String phone number of this driver
     */
    public function __construct($fname, $lname, $phone)
    {
        parent::__construct($fname, $lname, $phone);
    }

    /**
     * Gets the driver id of this driver
     * @return Int driver id
     */
    public function getDriverId()
    {
        return $this->_driverId;
    }

    /**
     * Sets the driver if of this driver
     * @param Int $driverId the driver id to be set
     */
    public function setDriverId($driverId)
    {
        $this->_driverId = $driverId;
    }

    /**
     * Gets the rating of this driver
     * @return Int this drivers rating
     */
    public function getRating()
    {
        return $this->_rating;
    }

    /**
     * Set the rating of this user
     * @param Int $rating
     */
    public function setRating($rating)
    {
        $this->_rating = $rating;
    }

    /**
     * Gets the city of this driver
     * @return String city of the driver
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * Sets the city of the driver
     * @param String $city city to be set
     */
    public function setCity($city)
    {
        $this->_city = $city;
    }

    /**
     * Gets the state of the driver
     * @return String state to be retireved
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * Sets the state of the driver
     * @param String $state state to be set
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * Gets the profile pic string of this user
     * @return String file path for profile pic
     */
    public function getProfilePic()
    {
        return $this->_profilePic;
    }

    /**
     * Sets the profile pic path for this user
     * @param String $profilePic the path to image of profile pic
     */
    public function setProfilePic($profilePic)
    {
        $this->_profilePic = $profilePic;
    }

    /**
     * Gets the car pic path for this user
     * @return String The path of this users car pic
     */
    public function getCarPic()
    {
        return $this->_carPic;
    }

    /**
     * Sets the car pic path for this user
     * @param String $carPic sets the file path for the car pic
     */
    public function setCarPic($carPic)
    {
        $this->_carPic = $carPic;
    }

    /**
     * Gets teh car make of this driver
     * @return String car make of this driver
     */
    public function getCarMake()
    {
        return $this->_carMake;
    }

    /**
     * Sets the car make of this driver
     * @param String $carMake car make to be set
     */
    public function setCarMake($carMake)
    {
        $this->_carMake = $carMake;
    }

    /**
     * Gets the car model of this driver
     * @return String car model of this driver
     */
    public function getCarModel()
    {
        return $this->_carModel;
    }

    /**
     * Sets the car model of this driver
     * @param String $carModel car model to be set
     */
    public function setCarModel($carModel)
    {
        $this->_carModel = $carModel;
    }

    /**
     * Gets the car year of this driver
     * @return String car year of this driver
     */
    public function getCarYear()
    {
        return $this->_carYear;
    }

    /**
     * Sets the car year of this driver
     * @param String $carYear the car year of this driver
     */
    public function setCarYear($carYear)
    {
        $this->_carYear = $carYear;
    }

    /**
     * Gets the bio of this driver
     * @return String biography of this driver
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * Sets the bio of this driver
     * @param String $bio sets the bio of this user
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }



}


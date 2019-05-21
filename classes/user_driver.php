<?php

Class USER_DRIVER extends User
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
     * @return mixed
     */
    public function getDriverId()
    {
        return $this->_driverId;
    }

    /**
     * @param mixed $driverId
     */
    public function setDriverId($driverId)
    {
        $this->_driverId = $driverId;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->_rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->_rating = $rating;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->_city = $city;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return mixed
     */
    public function getProfilePic()
    {
        return $this->_profilePic;
    }

    /**
     * @param mixed $profilePic
     */
    public function setProfilePic($profilePic)
    {
        $this->_profilePic = $profilePic;
    }

    /**
     * @return mixed
     */
    public function getCarPic()
    {
        return $this->_carPic;
    }

    /**
     * @param mixed $carPic
     */
    public function setCarPic($carPic)
    {
        $this->_carPic = $carPic;
    }

    /**
     * @return mixed
     */
    public function getCarMake()
    {
        return $this->_carMake;
    }

    /**
     * @param mixed $carMake
     */
    public function setCarMake($carMake)
    {
        $this->_carMake = $carMake;
    }

    /**
     * @return mixed
     */
    public function getCarModel()
    {
        return $this->_carModel;
    }

    /**
     * @param mixed $carModel
     */
    public function setCarModel($carModel)
    {
        $this->_carModel = $carModel;
    }

    /**
     * @return mixed
     */
    public function getCarYear()
    {
        return $this->_carYear;
    }

    /**
     * @param mixed $carYear
     */
    public function setCarYear($carYear)
    {
        $this->_carYear = $carYear;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }



}

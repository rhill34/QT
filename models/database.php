<?php

/*CREATE TABLE users
  (
  	userId int AUTO_INCREMENT PRIMARY KEY,
  	userName varchar(50) not null,
  	passwords varchar(30) not null,
  	firstName varchar(255) not null,
  	lastName varchar(255) not null,
  	isDriver tinyint(1), not null
  	isAdmin tinyint(1) not null
  );

  CREATE TABLE travelers
  (
  	travId int AUTO_INCREMENT PRIMARY KEY,
  	userId int not null,
  	profilePic varchar(255),
  	userRating int(1) not null,
  	credits int(11) not null,
  	FOREIGN KEY (userId) REFERENCES users(userId)
  );

  CREATE TABLE driver
  (
  	driverId int AUTO_INCREMENT PRIMARY KEY,
  	userId int not null,
  	rating int(1) not null,
  	city varchar(22) not null,
  	profilePic varchar(255),
  	carPic varchar(255),
  	carMake varchar(20),
  	carModel varchar(20),
  	carYear int(4),
  	bio varchar(255),
  );

  CREATE TABLE interest
  (
      interest_id int PRIMARY KEY AUTO_INCREMENT,
      interest varchar(100) not null,
      type varchar(30) not null
  );

  CREATE TABLE userinterest
  (
      userId int,
      interest_id int,
      FOREIGN KEY (interest_id) REFERENCES inserest(interest_id),
      FOREIGN KEY (userId) REFERENCES member(userId),
      PRIMARY KEY (interest_id, userId)
  );

  CREATE TABLE appointment
  (
  	appntId int PRIMARY KEY AUTO_INCREMENT,
  	travId int not null,
  	driverId int,
  	appntInterest int,
  	dateTimeRequested dateTime,
  	dateTimeRequestedTill dateTime,
  	actualTimeStarted dateTime,
  	actualTimeCompleted dateTime,
  	completed tinyint,
  	FOREIGN KEY (travId) REFERENCES travelers(travId),
  	FOREIGN KEY (driverId) REFERENCES driver(driverId),
  	FOREIGN KEY (appntInterest) REFERENCES inserest(interest_id)

  );

    ALTER TABLE users
    ADD phone varchar(11);
    ALTER TABLE users
    ADD email varchar(255);
    ALTER TABLE driver
    ADD state char(2)
*/
require '/home2/mbrittgr/config.php';

/**
 * @author Michael Britt
 * @version 1.0
 * Date: 5/18/2019
 * Class database connects to database for dating website, inserts members, inserts interests
 */
Class database
{
    private $dbh;
    private $errormessage;

    /**
     * database constructor. Start out disconnected
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * Attempts to connect to database, saves error message if not connected
     * @return void
     */
    public function connect()
    {
        try{
            $this->dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD
            );
        } catch (PDOException $e)
        {
            $this->errormessage = $e->getMessage();
        }
    }

    /**
     * Inserts a member into database
     * @param $member A membership object
     * @return void
     */
    public function insertMember($member)
    {
        //prepare sql statement
        $sql = "INSERT INTO member(username, passwords, firstName, lastName, 
            isDriver, isAdmin, phone, email)
            VALUES (:username, :userName, :password, :firstName, :lastName, 
            :isDriver, :isAdmin, :phone, :email)";
        //save prepared statement
        $statement = $this->dbh->prepare($sql);

        //assign values
        $fname = $member->getFname();
        $lname = $member->getLname();
        $username = $member->getUserName();
        $password = $member->getPassword();
        $phone = $member->getPhone();
        $email = $member->getEmail();
        $isAdmin = 0;
        if($member instanceof  User_Driver)
        {
            $isDriver=1;
        }
        else if($member instanceof User_Traveler)
        {
            $isDriver=0;
        }

        //bind params
        $statement->bindParam(':fname',$fname, PDO::PARAM_STR);
        $statement->bindParam(':lname', $lname, PDO::PARAM_STR);
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':isDriver', $isDriver, PDO::PARAM_STR);
        $statement->bindParam(':isAdmin', $isAdmin, PDO::PARAM_INT);

        //execute insert into users
        $statement->execute();

        //grab id of insert
        $id = $this->dbh->lastInsertId();



        //check if Driver member to insert
        if($member instanceof User_Driver)
        {
            $this->insertDriverInfo($member,id);
        }
        elseif($member instanceof  User_Traveler)
        {

        }

    }

    private function insertDriverInfo($member, $lastId)
    {
        $sql="INSERT INTO driver(userId, rating, state, city, profilePic, carPic, carMake,
            carModel, carYear, bio) 
            VALUES (:userId, :rating, :state, :city, :profilePic, :carPic, :carMake,
            :carModel, :carYear, :bio)";

        $statement= $this->dbh->prepare($sql);

        $userId=$lastId;
        $rating=-1;
        $city=$member->getCity();
        $state = $member->getState();
        $profilePic=$member->getProfilePic();
        $carPic=$member->getCarPic();
        $carMake=$member->getCarMake();
        $carModel=$member->getCarModel();
        $carYear=$member->getCarYear();
        $bio=$member->getBio();

        //bind params
        $statement->bindParam(':userId',$userId, PDO::PARAM_INT);
        $statement->bindParam(':rating', $rating, PDO::PARAM_INT);
        $statement->bindParam(':city', $city, PDO::PARAM_STR);
        $statement->bindPara(':state', $state, PDO::PARAM_STR);
        $statement->bindParam(':profilePic', $profilePic, PDO::PARAM_STR);
        $statement->bindParam(':carPic', $carPic, PDO::PARAM_STR);
        $statement->bindParam(':carMake', $carMake, PDO::PARAM_STR);
        $statement->bindParam(':carModel', $carModel, PDO::PARAM_STR);
        $statement->bindParam(':carYear', $carYear, PDO::PARAM_INT);
        $statement->bindParam(':bio', $bio, PDO::PARAM_STR);

        $statement->execute();

    }

    private function inserTravelInfo($member, $lastId)
    {
        $sql="INSERT INTO driver(userId, profilePic, userRating, credits) 
            VALUES (:userId, :profilePic, :rating,, :credits)";

        $statement= $this->dbh->prepare($sql);

        $userId=$lastId;
        $rating=-1;
        $profilePic=$member->getProfilePic();
        $credits= $member->getCredits();
        $statement->bindParam(':profilePic', $profilePic, PDO::PARAM_STR);
        $statement->bindParam(':userId',$userId, PDO::PARAM_INT);
        $statement->bindParam(':rating', $rating, PDO::PARAM_INT);
        $statement->bindParam(':credits', $credits, PDO::PARAM_STR);
        $statement->execute();
    }

    /**
     * Checks db for interest and returns its id
     * @param $interest String interests name
     * @return Int interest id
     */
    private function getInterestID($interest)
    {
        $sql = "SELECT interest_id FROM interest WHERE interest = :interest";
        $statement = $this->dbh->prepare($sql);
        $statement->bindParam(':interest', $interest, PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row['interest_id'];

    }

    /**
     * Takes an array of interests and inserts them into db with member id
     * @param $array interest array
     * @param $id Int db members id
     */
    private function insertInterest($array,$id)
    {
        $sql = "INSERT INTO memberinterest(interest_id, member_id) VALUES (:interest, :member)";
        $statement = $this->dbh->prepare($sql);

        //for each indoor interest bind and execute statemnt
        foreach ($array as $value) {
            //bind interest id and member id
            $statement->bindParam(":interest", $this->getInterestID($value),
                PDO::PARAM_INT);
            $statement->bindParam(":member", $id, PDO::PARAM_INT);

            //execute
            $statement->execute();
        }
    }

    /**
     * Retrieves all members from the database
     * @return Array the result of the database retrieval
     */
    public function getUsers()
    {
        $sql = "SELECT * FROM users ORDER BY lname ASC";
        $statement = $this->dbh->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves a specific member from the database
     * @param $member_id The id of the member to be retrieved
     * @return Array The result of the sql query
     */
    public function getUser($member_id)
    {
        $sql = "SELECT * FROM member WHERE userId = :id";
        $statement = $this->dbh->prepare($sql);

        $statement->bindParam(":id", $member_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Gets the interests of a specific member of the database
     * @param $member_id The id of the member to retrieved
     * @return String Interests imploded into a string
     */
    public function getInterests($member_id)
    {
        $sql = "SELECT * FROM userinterest WHERE userId = :id";
        $statement = $this->dbh->prepare($sql);

        $statement->bindParam(":id", $member_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $intrestArray= array();
        if (isset($result)) {
            foreach ($result as $value) {
                array_push( $intrestArray, $this->getInterestString($value['interest_id']));
            }

            return $intrestArray;
        }else{
            return "";
        }
    }

    /**
     * Returns a String of the interest
     * @param $interest_id The id of an interest from the interest table
     * @return String interest name as a string
     */
    private function getInterestString($interest_id)
    {
        $sql = "SELECT * FROM interest WHERE interest_id = :id";
        $statement = $this->dbh->prepare($sql);

        $statement->bindParam(":id", $interest_id, PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['interest'];
    }
}
<?php

/*CREATE TABLE users
  (
  	userId int AUTO_INCREMENT PRIMARY KEY,
  	email varchar(255);
  	passwords varchar(30) not null,
  	firstName varchar(255) not null,
  	lastName varchar(255) not null,
  	isDriver tinyint(1), not null
  	isAdmin tinyint(1) not null
    phone varchar(11);
  	credits int(11) not null,
 	userRating int(1) not null,
  );


  CREATE TABLE driver
  (
  	driverId int AUTO_INCREMENT PRIMARY KEY,
  	userId int not null,
  	rating int(1) not null,
  	city varchar(22) not null,
    state varchar(20)
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
  	userId int not null,
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
  );CREATE TABLE users
  (
  	userId int AUTO_INCREMENT PRIMARY KEY,
  	email varchar(255),
  	passwords varchar(30) not null,
  	firstName varchar(255) not null,
  	lastName varchar(255) not null,
  	isDriver tinyint(1) not null,
  	isAdmin tinyint(1) not null,
    phone varchar(11),
  	credits int(11) not null,
 	userRating int(1) not null
  );


  CREATE TABLE driver
  (
  	driverId int AUTO_INCREMENT PRIMARY KEY,
  	userId int not null,
  	rating int(1) not null,
  	city varchar(22) not null,
    state char(2),
  	profilePic varchar(255),
  	carPic varchar(255),
  	carMake varchar(20),
  	carModel varchar(20),
  	carYear int(4),
  	bio varchar(255)
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
  	userId int not null,
  	driverId int,
  	appntInterest int,
  	dateTimeRequested dateTime,
  	dateTimeRequestedTill dateTime,
  	actualTimeStarted dateTime,
  	actualTimeCompleted dateTime,
  	completed tinyint,
  	FOREIGN KEY (userId) REFERENCES users(userId),
  	FOREIGN KEY (driverId) REFERENCES driver(driverId),
  	FOREIGN KEY (appntInterest) REFERENCES inserest(interest_id)
  );



    Insert INTO interest (interest)
    VALUES("Animal Excursion"),
    ("Local Landmarks"),
    ("Waterfront Views"),
    ("Club Scene"),
    ("Wineries"),
    ("Historical Places"),
    ("Bar Hoping"),
    ("Locations From Tv"),
    ("Local Cuisine")
*/
$user = $_SERVER['USER'];
if($user == ryanguel){
    $path = "/home/$user/config2.php";
}
else{
    $path = "/home2/$user/config2.php";
}
require_once($path);

/**
 * @author Michael Britt
 * @version 1.0
 * Date: 5/18/2019
 * Class database connects to database for dating website, inserts members, inserts interests
 */
class database
{
    private $_dbh;
    private $_errormessage;

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
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD
            );
        } catch (PDOException $e)
        {
            $this->_errormessage = $e->getMessage();
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
        $sql = "INSERT INTO users(passwords, firstName, lastName, 
            isDriver, isAdmin, phone, email, credits, userRating)
            VALUES ( :password, :firstName, :lastName, 
            :isDriver, :isAdmin, :phone, :email, :credits, :userRating)";
        //save prepared statement
        $statement = $this->_dbh->prepare($sql);

        //assign values
        $fname = $member->getFname();
        $lname = $member->getLname();
        $password = $member->getPassword();
        $phone = $member->getPhone();
        $email = $member->getEmail();
        $isAdmin = 0;
        if($member instanceof  User_Driver) {
            $isDriver=1;
        } else {
            $isDriver=0;
        }
        $credits=1;
        $userRating=-1;

        //bind params
        $statement->bindParam(':firstName',$fname, PDO::PARAM_STR);
        $statement->bindParam(':lastName', $lname, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':isDriver', $isDriver, PDO::PARAM_STR);
        $statement->bindParam(':isAdmin', $isAdmin, PDO::PARAM_INT);
        $statement->bindParam(':credits', $credits, PDO::PARAM_INT);
        $statement->bindParam(':userRating', $userRating, PDO::PARAM_INT);

        //execute insert into users
        $statement->execute();

        //grab id of insert
        $id = $this->_dbh->lastInsertId();
        $member->setUserId($id);

        $this->insertInterest($member->getInterests(),$id);


        //check if Driver member to insert
        if($member instanceof User_Driver)
        {
            $this->insertDriverInfo($member,$id);
        }
    }

    /**
     * Inserts Driver Information into the database
     * @param $member Object Member object holding information
     * @param $lastId Int id of member
     */
    private function insertDriverInfo($member, $lastId)
    {
        $sql="INSERT INTO driver(userId, rating, state, city, profilePic, carPic, carMake,
            carModel, carYear, bio) 
            VALUES (:userId, :rating, :state, :city, :profilePic, :carPic, :carMake,
            :carModel, :carYear, :bio)";

        $statement= $this->_dbh->prepare($sql);

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
        $statement->bindParam(':state', $state, PDO::PARAM_STR);
        $statement->bindParam(':profilePic', $profilePic, PDO::PARAM_STR);
        $statement->bindParam(':carPic', $carPic, PDO::PARAM_STR);
        $statement->bindParam(':carMake', $carMake, PDO::PARAM_STR);
        $statement->bindParam(':carModel', $carModel, PDO::PARAM_STR);
        $statement->bindParam(':carYear', $carYear, PDO::PARAM_INT);
        $statement->bindParam(':bio', $bio, PDO::PARAM_STR);

        $statement->execute();

    }

    /**
     * Checks db for interest and returns its id
     * @param $interest String interests name
     * @return Int interest id
     */
    public function getInterestID($interest)
    {
        $sql = "SELECT interest_id FROM interest WHERE interest = :interest";
        $statement = $this->_dbh->prepare($sql);
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
        $sql = "INSERT INTO userinterest(interest_id, userid) VALUES (:interest, :user_id)";
        $statement = $this->_dbh->prepare($sql);

        //for each interest bind and execute statemnt
        foreach ($array as $value) {
            //bind interest id and member id
            $statement->bindParam(":interest", $this->getInterestID($value),
                PDO::PARAM_INT);
            $statement->bindParam(":user_id", $id, PDO::PARAM_INT);

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
        $statement = $this->_dbh->prepare($sql);
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
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(":id", $member_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getDrivers($city, $state){
        $sql = "SELECT * FROM driver INNER JOIN users ON driver.userId = users.userId 
                WHERE driver.city = :city AND driver.state = :state";
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(":city", $city, PDO::PARAM_STR);
        $statement->bindParam(":state", $state, PDO::PARAM_STR);

        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Gets the interests of a specific member of the database
     * @param $member_id The id of the member to retrieved
     * @return String Interests imploded into a string
     */
    public function getInterests($member_id)
    {
        $sql = "SELECT * FROM userinterest WHERE userId = :id";
        $statement = $this->_dbh->prepare($sql);

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
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(":id", $interest_id, PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['interest'];
    }

    /**
     * Used to check if the email exists in the database
     * @param $email String email
     * @return A result of find this email in the user database
     */
    public function findEmail($email)
    {
        $sql = "SELECT * FROM `users` WHERE email=:email;";
        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Retrieves a member form a username and password
     * @param $email String Email provided from login
     * @param $password String password provided from login
     * @return String/Object error message if could not find/member object returned
     */
    public function getMember($email, $password)
    {
        //check if email in db error to register if not
        if(!$this->findEmail($email))
        {
            return "Email does not exist please register";
        }

        $member=0;
        $sql = "SELECT * FROM `users` WHERE email=:email and passwords=:password";
        $statement= $this->_dbh->prepare($sql);
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->bindParam(":password", $password, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        //check if result was reutrned
        if(!$result)
        {
            return "Password doest not match email";
        }
        elseif($result['isDriver']==1)
        {
            $member= new User_Driver($result['firstName'],$result['lastName'], $result['phone']);
            $driver = $this->getDriver($result['userId']);
            $member->setBio($driver['bio']);
            $member->setCarMake($driver['carMake']);
            $member->setCarModel($driver['carModel']);
            $member->setCarYear($driver['carYear']);
            $member->setCarPic($driver['carPic']);
            $member->setProfilePic($driver['profilePic']);
            $member->setState($driver['state']);
            $member->setCity($driver['city']);
            $member->setRating($driver['rating']);
        }
        else
        {
            $member= new User($result['firstName'],$result['lastName'], $result['phone']);
        }

        //assemble member object
        $member->setEmail($email);
        $member->setPasswords($password);
        $member->setUserRating($result['userRating']);
        $member->setUserId($result['userId']);
        $member->setCredits($result['credits']);
        $member->setInterests($this->getInterests($result['userId']));
        return $member;

    }

    /**
     * Retrieves driver information
     * @param $memberId userid in database
     * @return Associative Array
     */
    public function getDriver($memberId)
    {
        $sql= "SELECT * FROM driver WHERE userId=:userId";
        $statement= $this->_dbh->prepare($sql);
        $statement->bindParam(":userId", $memberId, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Updates car information within the database
     * @param $memberId represents the unique id of the member
     * @param $carmake represent the provided make of the car to be updated
     * @param $carModel represents the provide car model to be updated
     * @param $carYear represents the provided car year to be updated
     */
    public function updateCarInfo($memberId, $carmake, $carModel, $carYear)
    {
        $sql="UPDATE driver
        SET carMake = :carMake, carModel= :carModel, carYear= :carYear
        WHERE userId = :userId";

        $statement= $this->_dbh->prepare($sql);
        $statement->bindParam(":userId", $memberId, PDO::PARAM_STR);
        $statement->bindParam(":carMake", $carmake, PDO::PARAM_STR);
        $statement->bindParam(":carModel", $carModel, PDO::PARAM_STR);
        $statement->bindParam(":carYear", $carYear, PDO::PARAM_STR);
        $statement->execute();
    }

    /**
     * Updates driver information
     * @param $memberId represents the unique id of the member
     * @param $city represent the provide make of the city to be updated
     * @param $state represents the provided state to be updated
     * @param $bio represnt the provide bio to be updated
     */
    public function updateDriverInfo($memberId, $city, $state, $bio)
    {
        $sql="UPDATE driver
        SET city = :city, state= :state, bio= :bio
        WHERE userId = :userId";


        $statement= $this->_dbh->prepare($sql);
        $statement->bindParam(":userId", $memberId, PDO::PARAM_STR);
        $statement->bindParam(":city", $city, PDO::PARAM_STR);
        $statement->bindParam(":state", $state, PDO::PARAM_STR);
        $statement->bindParam(":bio", $bio, PDO::PARAM_STR);
        $statement->execute();
    }

    /**
     * Updated first and last names of user
     * @param $memberId Int users id for table reference
     * @param $firstName String first name to be updated
     * @param $lastName String last name to be updated
     */
    public function updateName($memberId, $firstName, $lastName)
    {
        $sql="UPDATE users
        SET firstName = :first, lastName= :last
        WHERE userId = :userId";
        $statement= $this->_dbh->prepare($sql);
        $statement->bindParam(":userId", $memberId, PDO::PARAM_STR);
        $statement->bindParam(":first", $firstName, PDO::PARAM_STR);
        $statement->bindParam(":last", $lastName, PDO::PARAM_STR);
        $statement->execute();
    }

    /**
     * Updates email in data bast
     * @param $memberId Int user id in db
     * @param $email String email provided by user
     */
    public function updateEmail($memberId, $email)
    {
        $sql="UPDATE users
        SET email = :email
        WHERE userId = :userId";
        $statement= $this->_dbh->prepare($sql);
        $statement->bindParam(":userId", $memberId, PDO::PARAM_STR);
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->execute();
    }

    /**
     * Check database for password and check if it exists
     * @param $memberId Int user id in db
     * @param $password provided password to be verified
     * @return Boolean returne true if found
     */
    public function findPassWord($memberId,$password)
    {
        $sql="SELECT passwords FROM users
        WHERE userId = :userId and passwords= :password";
        $statement= $this->_dbh->prepare($sql);
        $statement->bindParam(":userId", $memberId, PDO::PARAM_STR);
        $statement->bindParam(":password", $password, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if(!$result)
        {
            return false;
        }
        return true;
    }

    /**
     * Update password in db
     * @param $memberId Int user to be update
     * @param $pass
     */
    public function updatePass($memberId, $pass)
    {
        $sql="UPDATE users
        SET passwords = :passwords
        WHERE userId = :userId";
        $statement= $this->_dbh->prepare($sql);
        $statement->bindParam(":userId", $memberId, PDO::PARAM_STR);
        $statement->bindParam(":passwords", $pass, PDO::PARAM_STR);
        $statement->execute();
    }
//
//CREATE TABLE appointment
//(
//appntId int PRIMARY KEY AUTO_INCREMENT,
//userId int not null,
//driverId int,
//appntInterest int,
//dateTimeRequested dateTime,
//dateTimeRequestedTill dateTime,
//actualTimeStarted dateTime,
//actualTimeCompleted dateTime,
//completed tinyint,
//FOREIGN KEY (userId) REFERENCES users(userId),
//FOREIGN KEY (driverId) REFERENCES driver(driverId),
//FOREIGN KEY (appntInterest) REFERENCES inserest(interest_id)
//);

public function postAppointment($interest, $start, $end, $userId, $driverId)
{
    echo'test';
    //Define the query
    $sql = "INSERT INTO appointment(userId, driverId, appntInterest, dateTimeRequested, 
    dateTimeRequestedTill) 
	  VALUES (:uid, :did, :aInt, :dtr, :dtrT)";

//Prepare the statement
    $statement = $this->_dbh->prepare($sql);

//Bind the parameters
    $statement->bindParam(":uid", $userId, PDO::PARAM_STR);
    $statement->bindParam(":did", $driverId, PDO::PARAM_STR);
    $statement->bindParam(":aInt", $interest, PDO::PARAM_STR);
    $statement->bindParam(":dtr", $start, PDO::PARAM_STR);
    $statement->bindParam(":dtrT", $end, PDO::PARAM_STR);

//Execute
    $statement->execute();
    echo '<p>kangaroo added!</p>';
}


}
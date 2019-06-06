<?php
/**
 * This class will retrieve driver data refined by city and state and display the infomation as cards
 */
require_once("../../../vendor/autoload.php");
require_once("../../validation.php");

//grab starting variables
session_start();
$db = new database();
$state = $_POST['state'];
$city = $_POST['city'];

//grabbing memember for statis method that display star ratings
$member = $_SESSION['member'];

//retireve state city refinded db resulst
$results = $db->getDrivers($city, $state);

//checks if results had values
if($results) {
    //array to store driver id as session data in order
    $array =[];
    $pictureArray =[];

    //index location of specific driver in array
    $index=0;

    //go through all the results creat a card
    foreach ($results as $row){
        echo '
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
              <img class="card-img-top" src="'.$row["carPic"].' " alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Car Guru: '. $row["firstName"]. " " . $row["lastName"] .'</h5>
                <p class="card-text">Bio: '. $row['bio']. '</p>   
                <p class="card-text">Car Info: '. $row['carMake']. " ". $row['carModel']. " ," . $row['carYear']. '</p>                             
                <a value="'. $index.'" href="#" class="btn btn-primary book" data-toggle="modal"
                 data-target="#modalLoginForm">Book</a>
              </div>
              <div class="card-footer">
              <small class="text-muted">';

        //echo the span of stars based of this drivers rating
        $member->echoRating($row["rating"]);

        //finish card
        echo'
            </small>
              </div>
          </div>
        </div>';

        //add driver id to array
        $array.array_push($array,$row["driverId"]);

        //add driver pice to array
        $pictureArray.array_push($pictureArray,$row['profilePic']);
        //increase index for next loop
        $index++;
    }
    //array of driver id assigned to session variable
    $_SESSION['drivers']=$array;
    $_SESSION['driversPic']=$pictureArray;
} else{
    echo "<h3> No drivers found in the area</h3>";
}


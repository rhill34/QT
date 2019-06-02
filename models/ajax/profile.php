<?php
require_once("../../vendor/autoload.php");
require_once("../validation.php");

$db = new database();

//car make old and new
$carMake = $_POST['carmake'];

//car model old and new
$carModel = $_POST['carmodel'];

//car year old and new
$carYear = $_POST['carYear'];

//id
$id=$_POST['id'];

$carMakeErr = validString($carMake);
$carModelErr = validString($carModel);
$carYearErr = validString($carYear);


if($carMakeErr=="") {
    if($carModelErr=="") {
        if($carYearErr=="") {
            $db->updateCarInfo($id,$carMake,$carModel,$carYear);
        }
        else
        {
            echo "<p> Car Year ". $carYearErr . "</p>";
        }
    } else{
        echo "<p> Car model ". $carModelErr . "</p>";
    }
} else{
    echo "<p> Car Make ". $carMakeErr . "</p>";
}



$db = new database();
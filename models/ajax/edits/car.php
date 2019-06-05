<?php
require_once("../../../vendor/autoload.php");
require_once("../../validation.php");

session_start();
$db = new database();

//car make old and new
$carMake = $_POST['carmake'];

//car model old and new
$carModel = $_POST['carmodel'];

//car year old and new
$carYear = $_POST['carYear'];
//id
$id=$_SESSION['member']->getUserId();

$carMakeErr = validString($carMake);
$carModelErr = validString($carModel);
$carYearErr = validString($carYear);
if($_SESSION['member']->getCarmake()==$carMake && $_SESSION['member']->getCarModel()==$carModel &&
$_SESSION['member']->getCarYear()==$carYear)
{
    echo 'No changes were made';
    return;
}

if($carMakeErr=="") {
    if($carModelErr=="") {
        if($carYearErr=="") {
            $db->updateCarInfo($id,$carMake,$carModel,$carYear);
            $_SESSION['member']->setCarMake($carMake);
            $_SESSION['member']->setCarModel($carModel);
            $_SESSION['member']->setCarYear($carYear);
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
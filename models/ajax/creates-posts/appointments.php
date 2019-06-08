<?php

require_once("../../../vendor/autoload.php");
require_once("../../validation.php");

session_start();
$db = new database();

//get UI input
$interest = $_POST['interest'];
$timeIn = $_POST['timeIn'];
$timeOut = $_POST['timeOut'];
$date = $_POST['date'];
$index = $_POST['driverIndex'];

//validate UI input date and time
$timeInErr = validTime($timeIn,$timeOut);
$dateErr = validDate($date);

//id
$id = $_SESSION['member']->getUserId();
$driverId = $_SESSION['driver']['index'];
$merge = new DateTime($date->format('Y-m-d') .' ' .$timeIn->format('H:i:s'));

var_dump($merge);

if ($timeInErr == "") {
    if ($dateErr == "") {
        $db->updateCarInfo($id, $carMake, $carModel, $carYear);

        } else {
            echo "<p> Invalid Appointment date  " . $dateErr . "</p>";
        }
    } else {
        echo "<p> Invalid Check-In/Out time " . $timeInErr . "</p>";
}
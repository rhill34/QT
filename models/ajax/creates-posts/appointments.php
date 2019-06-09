<?php

require_once("../../../vendor/autoload.php");
require_once("../../validation.php");

session_start();
$db = new database();

//get UI input
$timeIn = $_POST['start'];
$timeOut = $_POST['end'];
$date = $_POST['date'];
$index = $_POST['id'];
$interest = $_POST['interest'];
//validate UI input date and time
$timeInErr = validTime($timeIn,$timeOut);
$dateErr = validDate($date);

//id
$id = $_SESSION['member']->getUserId();
$driverId = $_SESSION['drivers'][$index];

$start = date('Y-m-d H:i:s', strtotime("$date $timeIn"));
$end = date('Y-m-d H:i:s', strtotime("$date $timeOut"));

//check for errors
if ($timeInErr == "") {
    if ($dateErr == "") {

        //merge to MYSQL format
        $interest = $db->getInterestID($interest);
        //valid to post to the Appointments in DB
        $db->postAppointment($interest,$start,$end,$id, $driverId);
        } else {
            echo "<p> Invalid Appointment date  " . $dateErr . "</p>";
        }
    } else {
        echo "<p> Invalid Check-In/Out time " . $timeInErr . "</p>";
}


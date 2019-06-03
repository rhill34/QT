<?php


require_once("../../vendor/autoload.php");
require_once("../validation.php");

session_start();
$db = new database();

//
$id=$_SESSION['member']->getUserId();
$state=$_POST['state'];
$city=$_POST['city'];
$bios=$_POST['bios'];

$bioErr= validString($bios);
$stateErr =validString($state);
$cityErr =validString($city);

if($bioErr=="") {
    if($stateErr=="") {
        if($cityErr=="") {
            $db->updateDriverInfo($id,$carMake,$carModel,$carYear);
            $_SESSION['member']->setBio($bios);
            $_SESSION['member']->setCity($city);
            $_SESSION['member']->setState($state);
        }
        else
        {
            echo "<p> City ". $cityErr. "</p>";
        }
    } else{
        echo "<p> State ". $stateErr . "</p>";
    }
} else{
    echo "<p> Bio ". $bioErr . "</p>";
}
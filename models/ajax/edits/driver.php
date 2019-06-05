<?php


require_once("../../../vendor/autoload.php");
require_once("../../validation.php");

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

if($state ==$_SESSION['member']->getState() && $city == $_SESSION['member']->getCity() &&
    $_SESSION['member']->getBio()==$bios) {
    echo 'No changes made';
    return;
}

if($bioErr=="") {
    if($stateErr=="") {
        if($cityErr=="") {
            $db->updateDriverInfo($id,$city,$state,$bios);
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
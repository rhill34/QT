<?php
require_once("../../../vendor/autoload.php");
require_once("../../validation.php");

session_start();
$db = new database();


//retrive variables
$id=$_SESSION['member']->getUserId();
$confirm = $_POST['confirm'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
$passErr= validPass($pass, $pass2);

$found=$db->findPassWord($id, $confirm);

//check if original password is found

if (!$found) {
    echo "Original password incorrect";
}else{
    if($passErr=="") {
        $db->updatePass($id,$pass);
    } else{
        echo $passErr;
    }

}
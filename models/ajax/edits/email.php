<?php
require_once("../../../vendor/autoload.php");
require_once("../../validation.php");

session_start();
$db = new database();
$id=$_SESSION['member']->getUserId();

//email
$email = $_POST['email'];
$emailErr=validEmail($email);

if($email == $_SESSION['member']->getEmail()) {
    echo '<p>No changes made</p>';
}else
{
    if($db->findEmail($email)) {
        echo '<p>Email already exists please login to change its profile or select another email</p>';
    }else{
        if($emailErr=="") {
            $db->updateEmail($id,$email);
            $_SESSION['member']->setEmail($email);
        }else{
            echo 'Invalid email provided';
        }
    }
}
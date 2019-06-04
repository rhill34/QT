<?php
require_once("../../vendor/autoload.php");
session_start();
$email = $_POST['email'];
$pass = $_POST['pass'];
$db = new database();

$member =$db->getMember($email,$pass);

if($member instanceof User)
{
    $_SESSION['member']=$member;
}
else
{
    echo $member;
}
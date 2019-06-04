<?php
require_once("../../vendor/autoload.php");
require_once("../validation.php");

session_start();
$db = new database();

//car make old and new
$first = $_POST['first'];

//car model old and new
$last = $_POST['last'];

$id=$_SESSION['member']->getUserId();

if($first==$_SESSION['member']->getFname() && $last == $_SESSION['member']->getLName())
{
    echo "No changes made";
}

$fNameErr =validName($first);
$lNameErr = validName($last);

if($fNameErr=="") {
    if($lNameErr=="") {
        $db->updateName($id, $first,$last);
        $_SESSION['member']->setFName($first);
        $_SESSION['member']->setLname($last);
    }else{
        echo $lNameErr;
    }
} else {
    echo $fNameErr;
}

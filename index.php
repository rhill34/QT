<?php
//error reporting
ini_set('display_errors', 1);
ini_set('file_uploads',1);
error_reporting(E_ALL);

//required files for classes and validation
require_once("vendor/autoload.php");
require_once("models/validation.php");

//instantiate fat free and session
$f3 = Base::instance();
session_start();

//instantiate a db object
$db = new database();
$years = array();

//all years from 1900 to todays year
for ($i = date("Y"); $i >= 1900; $i--)
{
    array_push($years,$i);
}

//The following are the Routes

//default route
$f3->route('GET|POST /', function ($f3){
    //checks if member object exits
    if(isset($_SESSION['member']))
    {
        //if so access userId if it exits then still logged in redirect to profile page
        if($_SESSION['member']->getUserId()!=null)
        {
            $f3->reroute('profile');
        }
    }

    //destroy old sessions
    session_destroy();

    //Need to create the home page.
    $view = new Template();
    echo $view->render('views/landing.html');
});

//route to first form
$f3->route('GET|POST /basic-info', function ($f3)
{
    global $db;
    //check if post request
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $phone = stipPhone($_POST['phone']);
        //error array
        $arrayErr = array(
            "fnameErr" => validName($_POST['fname']),
            "lnameErr" => validName($_POST['lname']),
            "phoneErr" => validPhone($phone),
            "emailErr" => validEmail($_POST['email']),
            "passErr" => validPass($_POST['pass'], $_POST['pass1']) );

        //check if errors array is empty
        if (checkErrArray($arrayErr)) {

            //verify that the email is not registered already
            if($db->findEmail($_POST['email'])) {
                $arrayErr['emailErr']='Email already registered please login or use a new email';
            } else {
                if (isset($_POST['driver'])) {//check if the user is a driver assign user dirver if so
                    $_SESSION['member'] = new User_Driver(trimFilter($_POST['fname']), trimFilter($_POST['lname']), $phone);
                } else {//just a user
                    $_SESSION['member'] = new User(trimFilter($_POST['fname']), trimFilter($_POST['lname']), $phone);
                }
                $_SESSION['member']->setEmail(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
                $_SESSION['member']->setPasswords(trimFilter($_POST['pass']));
                $f3->reroute('/interest');
            }
        }
        $f3->set('errors', $arrayErr);
    }
    $view = new Template();
    echo $view->render('views/personal.html');
});

//interest page route
$f3->route('GET|POST /interest', function($f3){

    global $db;
    if(isset($_POST['interests'])) {
        $intrests = $_POST['interests'];

        $f3->set('interests', $intrests);

        if(sizeof($intrests) < 3){
            $error = "Need to select at least 3 interests.";
        }
        else
        {
            //check if email is duplicate or session does not exist return default if true
            $email= $db->findEmail($_SESSION['member']->getEmail());
            if(!$_SESSION || $email) {
                $f3->reroute('/');
            }
            else {
                $_SESSION['member']->setInterests($_POST['interests']);
                if($_SESSION['member'] instanceof User_Driver) {
                    $f3->reroute('/driver');
                }else{
                    $f3->reroute('/profile');
                }
            }

        }
        $f3->set('error', $error);

    }

    $view = new Template();
    echo $view->render('views/interests.html');
});


//driver form route
$f3->route('GET|POST /driver', function ($f3){
    global $years;//years from 1900-this year
    global $db;//database object

    //if method is post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //validate
        $arrayErr = array(
            "yearErr" => validateDropDown($_POST['year'],$years),
            "makeErr" => validString($_POST['make']),
            "modelErr" => validString($_POST['model']),
            "proPicErr"=> validFile($_FILES['proPic']),
            "carPicErr"=> validFile($_FILES['carPic']),
            "bioErr"=> validString($_POST['bio']),
            "stateErr"=> validString($_POST['state']),
            "cityErr"=> validString($_POST['city'])
        );

        if(checkErrArray($arrayErr)) {
            //that person did not hit back button and resubmit creating duplicate emails

            $email= $db->findEmail($_SESSION['member']->getEmail());
            if(!$_SESSION || $email) {
                $f3->reroute("/");
            }else{
                addFile($_FILES['proPic']);
                addFile($_FILES['carPic']);
                $_SESSION['member']->setProfilePic(filePlusDir($_FILES['proPic']));
                $_SESSION['member']->setCarPic(filePlusDir($_FILES['carPic']));
                $_SESSION['member']->setCarYear($_POST['year']);
                $_SESSION['member']->setCarMake($_POST['make']);
                $_SESSION['member']->setCarModel($_POST['model']);
                $_SESSION['member']->setBio($_POST['bio']);
                $_SESSION['member']->setState($_POST['state']);
                $_SESSION['member']->setCity($_POST['city']);


                //add to the data base
                $db->insertMember($_SESSION['member']);
                $f3->reroute('/profile');
            }
        }
    }
    $f3->set('years', $years);
    $f3->set('errors',$arrayErr);
    $view = new Template();
    echo $view->render('views/driverform.html');
});

//profile page route
$f3->route('GET|POST /profile', function ($f3){
    if(!isset($_SESSION)) {
        $f3->reroute('/');
    }
    //check that user has reached this location after being verified
    $valid = $_SESSION['member']->getUserId();
    //not valid reroute to home page which will destory their data
    if(!isset($valid))
    {
        $f3->reroute('/');
    }
    global $years;
    $f3->set('years', $years);
    $view = new Template();
    echo $view->render('views/profile.html');
});

//logout route destorys session then loads default route
$f3->route('GET|POST /logout', function ($f3){
    session_destroy();
    $f3->reroute('/');
});

//appointment route
if(!isset($_SESSION)) {
    $f3->reroute('/');
}
$f3->route('GET|POST /appointment', function ($f3){
    $view = new Template();
    echo $view->render('views/appointment.html');
});
//Run the framework
$f3->run();
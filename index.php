<?php
//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once("vendor/autoload.php");

$f3 = Base::instance();

$f3->route('GET|POST /', function (){
    session_destroy();
    //Need to create the home page.
    $view = new Template();
    echo $view->render('views/home2.html');
});

$f3->route('GET|POST /basic-info', function ($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //get the post information
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $f3->set('fname', $fname);
        $f3->set('lname', $lname);
        $f3->set('phone', $phone);
        $f3->set('email', $email);


        if(validatePersonal()) {


            $f3->reroute('views/form2.html');
        }
    }

    $view = new Template();
    echo $view->render('views/form1.html');
});

//Run the framework
$f3->run();
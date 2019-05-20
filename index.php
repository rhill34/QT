<?php
//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

require ("vendor/autoload.php");

$f3 = Base::instance();

$f3->route('GET|POST /', function (){



    //Need to create the home page.
    $view = new Template();
    echo $view->render('views/home.html');
});



$f3->run();
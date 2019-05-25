<?php
//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();


require_once('vendor/autoload.php');
require_once('models/validation.php');

$f3 = Base::instance();

$years = array();
//all years from 1900 to todays year
for ($i = 1900; $i <= date("Y"); $i++)
{
    array_push($years,$i);
}

//all states
$states = array
(
    'AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California','CO' => 'Colorado',
    'CT' => 'Connecticut', 'DE' => 'Delaware', 'DC' => 'District Of Columbia', 'FL' => 'Florida', 'GA' => 'Georgia',
    'HI' => 'Hawaii', 'ID' => 'Idaho', 'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas',
    'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland', 'MA' => 'Massachusetts',
    'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi', 'MO' => 'Missouri', 'MT' => 'Montana',
    'NE' => 'Nebraska', 'NV' => 'Nevada', 'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico',
    'NY' => 'New York', 'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma',
    'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota',
    'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington',
    'WV' => 'West Virginia', 'WI' => 'Wisconsin', 'WY' => 'Wyoming'
);

$f3->route('GET|POST /', function (){
    session_destroy();
    //Need to create the home page.
    $view = new Template();
    echo $view->render('views/home2.html');
});

$f3->route('GET|POST /basic-info', function ($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $phone = stipPhone($_POST['phone']);
        //error array
        $arrayErr=array(
            "fnameErr"=>validName($_POST['fname']),
            "lnameErr"=>validName($_POST['lname']),
            "phoneErr"=>validPhone($phone),
            "emailErr"=>validEmail($_POST['email']),
            "passErr"=>validPass($_POST['pass'], $_POST['pass1'])
        );


        //check if errors array is empty
        if(checkErrArray($arrayErr))
        {
            if(isset($_POST['driver'])) {
                $_SESSION['member'] = new User_Driver(trimFilter($_POST[fname]),trimFilter($_POST[lname]),$phone);
            }else{
                $_SESSION['member'] = new User(trimFilter($_POST[fname]),trimFilter($_POST[lname]),$phone);
            }
            $f3->reroute('/interest');
        }


        $f3->set('errors', $arrayErr);
        /*
        if(validatePersonal()) {


            $f3->reroute('views/form2.html');
        }
        */

    }

    $view = new Template();
    echo $view->render('views/form1.html');
});

$f3->route('GET|POST /interest', function($f3){

    $view = new Template();
    echo $view->render('views/interests.html');
});

$f3->route('GET|POST /driver', function ($f3) use ($states){
    global $years;
    $f3->set('states', $states);
    $f3->set('years', $years);
    $view = new Template();
    echo $view->render('views/driverform.html');
});
//Run the framework
$f3->run();
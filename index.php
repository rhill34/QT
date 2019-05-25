<?php
//error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();


require_once('vendor/autoload.php');

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

        //get the post information
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $f3->set('fname', $fname);
        $f3->set('lname', $lname);
        $f3->set('phone', $phone);
        $f3->set('email', $email);


        /*
        if(validatePersonal()) {


            $f3->reroute('views/form2.html');
        }
        */
    }

    $view = new Template();
    echo $view->render('views/form1.html');
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
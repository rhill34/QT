<?php

require_once("../../../vendor/autoload.php");
require_once("../../validation.php");

session_start();
$db = new database();

$state = $_POST['state'];
$city = $_POST['city'];

$results = $db->getDrivers($city, $state);

echo "<tr>
        <th>Frist Name</th>
        <th>Last Name</th>
        <th>Car Make</th>
        <th>Car Model</th>
        <th>Car Year</th>
      </tr>";
while($results as $result){
    if($result){
        echo "<tr>
                <td>".$result['firstname']."</td>
                <td>".$result['lastname']."</td>
                <td>".$result['carMake']."</td>
                <td>".$result['carModel']."</td>
                <td>".$result['carYear']."</td>
              </tr>";
       }
}
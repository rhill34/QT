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
while($results){
    if($results){
        echo "<tr>
                <td>".$results['firstname']."</td>
                <td>".$results['lastname']."</td>
                <td>".$results['carMake']."</td>
                <td>".$results['carModel']."</td>
                <td>".$results['carYear']."</td>
              </tr>";
       }
}
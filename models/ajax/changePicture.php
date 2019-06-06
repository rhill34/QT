<?php
/**
 * Uses a posted index to assign picture session data on click
 */
session_start();
$index = (int)$_POST['id'];
$_SESSION['currentPicture'] = $_SESSION['driversPic'][$index];
echo " ". $_SESSION['currentPicture'] . " ";

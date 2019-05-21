<?php

function validPersonal(){

    global $f3;
    $valid = true;

    if(!validName($f3->get('fname'), $f3->get('lname'))){

        $f3->set("errors['name']", "Not a valid name, please enter a valid name.");
        $valid = false;
    }
    if(!validEmail($f3->get('email'))){
        $f3->set("errors['errors']", "Not a valid email address, please enter a valid email address.");
    }

    return $valid;
}

function validName($fname, $lname){
    return (!empty($fname.$lname) && (ctype_alpha($fname.$lname)));
}
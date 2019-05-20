<?php

function validPersonal(){

    global $f3;
    $valid = true;

    if(!validName($f3->get('firstname'), $f3->get('lastname'))){

        $f3->set("errors['name']", "Not a valid name, please enter a valid name.");
        $valid = false;
    }

    return $valid;
}

function validName($firstname, $lastname){
    return (!empty($firstname.$lastname) && (ctype_alpha($firstname.$lastname)));
}
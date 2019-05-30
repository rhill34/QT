<?php

/**
 * Check string for alphabetical
 * @param $data Represents string form data for names
 * @return string empty string if no errors or error message
 */
function validName($data)
{
    //check if the string matches only alpha numeric
    if (ctype_alpha($data)) {
        return "";
        //return array(true=>$data);
    } else {
        return "Invalid string. Contains numbers, special characters, or is empty.";
    }
}

/**
 * Checks to see if matches phone number
 * @param $data phone number inputted
 * @return string empty string if no errors or error message
 */
function validPhone($data)
{
    //check that stripped number only 10 in length
    if (strlen($data) == 10){
        return "";
    } else {
        return "Not a valid phone number. Phone number must be 10 digits";
    }
}

/**
 * Returns a trimmed phone number only containint numbers
 * @param $data String phone number
 */
function stipPhone($data)
{
//eliminate every char except 0-9
    $justNums = preg_replace("/[^0-9]/", '', $data);
    return $justNums;
}

/**
 * Checks if email provided is a valid email
 * @param $data email provided
 * @return string empty string if no errors or error message
 */
function validEmail($data)
{
    $data = trim($data);
    if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
        return "";
    } else {
        return "Invalid email. Please enter email in format You@email.com";
    }
}

/**
 * Validates that values of checkboxes selected match original check boxes values
 * @param $data checkboxes selected values
 * @return string empty string if no errors or error message
 */
function validCheckBoxArray($data , $array)
{
    if($data!=null) {
        foreach ($data as $key=>$value) {
            if (!in_array($value, $array)) {
                return "Improper value provided. Provided value does not match checkboxes provided";
            }
        }
        return "";
    }
    return "";
}

/**
 * validates a dropdown posted value returns a value inside its array
 * @param $data posted value for dropdown
 * @param $dropDownArray array of values for dropdown
 * @return bool if value is in array
 */
function validateDropDown($data, $dropDownArray)
{
    if(in_array($data, $dropDownArray, TRUE))
    {
        return "";
    }
    return "No dropdown value selected or value is invalide";
}

function trimFilter($data)
{
    return filter_var(trim($data), FILTER_SANITIZE_STRING);
}

/**
 * Checks an error array has no set values if so no errors exist
 * @param $data error array
 * @return bool true:no errors, false:errors exist
 */
function checkErrArray($data)
{
    foreach ($data as $key => $value) {
        if($value!="") {
            return false;
        }
    }
    return true;
}
/**
 * Validate password matches regez
 * @param $data PasswordString
 * @return bool true:matches, false:does not match regex
 */
function checkPass($password)
{
    if(isset($password))
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if(!$uppercase)
        {
            return "Must contain an uppercase letter";
        }
        if(!$lowercase)
        {
            return "Must contain a lowercase letter";
        }
        if(!$number)
        {
            return "Must contain a number";
        }
        if(!$specialChars)
        {
            return "Must contain a special character";
        }
        if(strlen($password)<8)
        {
            return "Must be 8 digits long";
        }
        return "";
    }
    else
    {
        return "Password cant be empty";
    }
}

function validPass($pass, $pass2)
{
    if ($pass !== $pass2) {
        return "Passwords do not match";
    }
    $checked=checkPass($pass);
    if (isset($checked)) {
        return $checked;
    }
    else{
        return "";
    }
}

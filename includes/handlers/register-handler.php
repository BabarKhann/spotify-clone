<?php

function sanitizeFormUserName($value = null)
{
    $value = strip_tags($value);
    $value = str_replace(" ", "", $value);
    $value = trim($value);

    return $value;
}

function sanitizeFormString(String $value = null)
{
    $value = strip_tags($value);
    $value = str_replace(" ", "", $value);
    $value = trim($value);
    $value = ucfirst(strtolower($value));

    return $value;
}

function sanitizeFormPassword($value = null)
{
    $value = strip_tags($value);

    return $value;
}

// Register
if (isset($_POST['registerButton'])) :
    $username = sanitizeFormUserName($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $firstName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $email2 = sanitizeFormString($_POST['email2']);
    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);

endif;

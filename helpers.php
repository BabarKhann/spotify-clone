<?php

function dd($data)
{
    print_r($data);
    die();
}

function oldValue($name)
{
    return isset($_POST[$name]) ? $_POST[$name] : false;
}

function redirect($page_name)
{
    header("Location: {$page_name}");
}

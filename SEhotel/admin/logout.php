<?php

function __autoload($class)
{
    require_once '../classes/' . $class . '.php';
}

// start session
Sessions::startSession();

Sessions::destroySession();

Functions::reDirect('../');
?>

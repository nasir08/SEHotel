<?php
// Created By: DARMIE BLINKS

function __autoload($class)
{
    require_once '../classes/' . $class . '.php';
}

Sessions::startSession();

if(empty($_SESSION['username']))
{
    Functions::reDirect('../');
}

if(empty($_GET['id']))
{
    Functions::reDirect('viewReservation.php');
}
else
{
    $trans_id = $_GET['id'];
}

// get room type
try
{
    $conn = new MYSQLconnection();
    $q = $conn -> query("SELECT roomType_id FROM transactions WHERE trans_id = " . $trans_id);
    $r = $q -> fetch();

    $roomType_id = $r[0];

    // get the initial qty of room
    $q = $conn -> query("SELECT qty FROM reserved WHERE roomType_id = " . $roomType_id);
    $r = $q -> fetch();

    $ini_qty = $r[0];

    $qty = $ini_qty + 1;

    // increase the qty by 1
    $query = new Queries('update', 'reserved', array('qty'), array($qty), array('roomType_id'), array($roomType_id));
    $query -> generateQuery();

    if($query -> getResult())
    {
        // delete from transaction
        $query = new Queries('delete', 'transactions', array(), array(), 'trans_id', $trans_id);
        $query -> generateQuery();

        if($query -> getResult())
        {
            Functions::reDirect('viewReservation.php');
        }
    }

    $conn -> disconnect();
}
catch (Exception $e)
{

}
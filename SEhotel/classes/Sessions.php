<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Darmie Blinks
 * Date: 6/11/12
 * Time: 3:28 PM
 * To change this template use File | Settings | File Templates.
 */
class Sessions
{
    public static function startSession()
    {
        // begin session
        session_start();
    }

    public static function storeSessionVal( $id, $value )
    {
        $_SESSION[$id] = $value;
    }

    public static function destroySession()
    {
        $_SESSION = array();

        setcookie('PHPSESSID', '');

        session_destroy();
    }
}

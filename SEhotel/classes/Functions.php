<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Darmie Blinks
 * Date: 6/19/12
 * Time: 1:41 PM
 * To change this template use File | Settings | File Templates.
 */

class Functions
{
    public static function reDirect($loc)
    {
        header("Location: " . $loc);
    }
}
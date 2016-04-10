<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Darmie Blinks
 * Date: 6/8/12
 * Time: 12:06 PM
 * To change this template use File | Settings | File Templates.
 */

    function dbConfig()
    {
        $db_name       = 'sehotel';
        $db_host       = 'localhost';
        $db_pass       = 'ade1185';
        $db_user       = 'nasir';

       return compact('db_name', 'db_host', 'db_pass', 'db_user');
    }

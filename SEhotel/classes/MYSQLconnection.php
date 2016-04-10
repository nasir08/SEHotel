<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Darmie Blinks
 * Date: 6/7/12
 * Time: 10:21 AM
 * To change this template use File | Settings | File Templates.
 */
class MYSQLconnection
{
    protected $conn;
    protected $result;
    protected $queryType;
    protected $queryStatus;
    const FETCH_BOTH = 1;
    const FETCH_ASSOC = 2;
    const FETCH_NUM = 3;

    function __construct()
    {
        require_once 'dbConfig.php';
        extract(dbConfig());

        // create connection
        $this -> conn = mysql_connect($db_host, $db_user, $db_pass);
        if(mysql_error())
        {
            throw new Exception('Unable to open connection to MYSQL Server: ' . mysql_error());
        }
        else
        {
            // select database
            $bdCheck = mysql_select_db($db_name, $this -> conn);
            if(!$bdCheck)
            {
                throw new Exception('Unable to connect to the database with the name: ' . $db_name);
            }
           /* else
            {
                echo 'PERFECT';
            }*/
        }
    }


    public function query( $sql )
    {
        $result = new MysqlResult( $sql );
        return $result;
    }

    public function disconnect()
    {
        $endDB = mysql_close($this -> conn);
        if(!$endDB)
        {
            throw new Exception('Unable to close MYSQL connection: ' . mysql_error());
        }
       /* else
        {
            echo 'DISCONNECTED SUCCESSFULLY';
        }*/
    }
}

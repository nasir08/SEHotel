<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Darmie Blinks
 * Date: 6/11/12
 * Time: 4:00 PM
 * To change this template use File | Settings | File Templates.
 */
class Authentication
{
    protected $conn;
    protected $sql;
    protected $data;
    protected $pass;
    protected $userName;
    protected $tableName;

    function __construct( $tableName, $userName, $pass )
    {
        $this -> userName = $userName;
        $this -> pass = $pass;
        $this -> tableName = $tableName;
        $this -> conn = new MYSQLconnection();
    }

    public function authenticate()
    {
        $sql = "SELECT * FROM " . $this -> tableName .
        " WHERE username = '" . $this -> userName . "' AND password = SHA1('" . $this -> pass . "')";
        $resultObj = $this -> conn -> query($sql);
        $result = $resultObj -> fetch();

        if($result)
        {
            list($id, $fname, $lname) = $result;
            $this -> data = compact('id', 'fname', 'lname');
            return array(true, $this -> data);
        }
        else
        {
            $this -> data = 'Either your username or password is incorrect';
            return array(false, $this -> data);
        }
    }
}

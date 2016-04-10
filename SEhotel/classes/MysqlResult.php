<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PROSPER
 * Date: 6/11/12
 * Time: 4:34 PM
 * To change this template use File | Settings | File Templates.
 */
class MysqlResult
{
    protected $mode;
    protected $result;
    protected $success;

    public function __construct( $sql )
    {
        $this->result = mysql_query( $sql );
        if( $this->result )
        {
            $this->success = true;
        }
        return $this -> result;
    }

    public function numberOfRows()
    {
        if($this -> success)
        {
            return mysql_num_rows($this->result);
        }
    }

    public function setFetchMode(  $mode )
    {
        $this->mode = $mode;
    }

    public function isSuccess()
    {
        return $this -> success;
    }

    public function checkMode( $classMode, $theSetMode )
    {
        if( !empty( $classMode ))
        {
            return $classMode;
        }
        else
        {
            return $theSetMode;
        }
    }

    public function fetchSuccess()
    {
        //$rows = mysql_affected_rows( $this->result );
       if(  isset ( $this->result ) && !empty( $this->result ) )
       {
            return true;
       }
       else
       {
          return false;

       }

    }
    public function fetch( $defaultMode = null )
    {
        if($this -> success)
        {
            $setMode = $this->checkMode( $this->mode , $defaultMode );
            switch( $setMode )
            {
                case 1:
                    return mysql_fetch_array( $this->result, MYSQL_BOTH );
                    break;
                case 2:
                    return mysql_fetch_array( $this->result, MYSQL_ASSOC );
                    break;
                case 3:
                    return mysql_fetch_array( $this->result, MYSQL_NUM );
                    break;
                default:
                    return mysql_fetch_array( $this->result, MYSQL_BOTH );
                    break;
            }
        }
    }


}

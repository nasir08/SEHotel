<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Darmie Blinks
 * Date: 6/11/12
 * Time: 4:30 PM
 * To change this template use File | Settings | File Templates.
 */
class Queries
{
    protected $queryType;
    protected $tableName;
    protected $inColumns;
    protected $inValues;
    protected $whereColumns;
    protected $whereValues;
    protected $limit;
    protected $sql;
    protected $sendStatus;
    protected $result;

    function __construct($queryType, $tableName, $inColumns = array(), $inValues = array(), $whereColumns = null, $whereValues = null, $limit = 1)
    {
        if(!empty($tableName))
        {
            $this -> tableName = $tableName;
        }
        else
        {
            throw new Exception('Table name cannot be null regardless of the query type');
        }

        if(is_numeric($limit))
        {
            $this -> limit = $limit;
        }
        else
        {
            throw new Exception('The limit must be numeric');
        }

        if(!empty($queryType) && !is_array($queryType))
        {
            $this -> queryType = strtolower($queryType);
        }
        else
        {
            throw new Exception('Query type cannot be null or an array');
        }

        $this -> inColumns = $inColumns;
        $this -> inValues = $inValues;
        $this -> whereColumns = $whereColumns;
        $this -> whereValues = $whereValues;
        $this -> sendStatus = false;;
    }

    public function generateQuery()
    {
        $value = array();

        switch($this -> queryType)
        {
            case 'insert':
                if(is_array($this -> inValues) && !empty($this -> inValues))
                {
                    foreach($this -> inValues as $element)
                    {
                        if($element == 'NOW()')
                        {
                            $value[] = $element;
                        }
                        else
                        {
                            $value[] = Queries::prepareVal($element);
                        }
                    }
                    $this -> inValues = $value;

                    // check if table name is in an array
                    if(is_array($this -> tableName))
                    {
                        // throw Exception
                        throw new Exception('The Table name shouldn\'t be an array');
                    }
                    else
                    {
                        $this -> result = $this -> insertQuery();
                    }
                }
                else
                {
                    throw new Exception('The inValue array must not be left empty for an insert query');
                }
                break;

            case 'delete':
                if(is_array($this -> whereColumns) && is_array($this -> whereValues))
                {
                    throw new Exception('The values expected for the "whereColumns" and "whereValues" should not be arrays');
                }

                if(!empty($this -> whereColumns) && !empty($this -> whereValues))
                {
                    if(is_string($this -> whereValues))
                    {
                        $this -> whereValues = "'" . $this -> whereValues . "'";
                    }

                    // for the delete query, table name can be an array
                    $this -> result = $this -> deleteQuery();
                }
                else
                {
                    throw new Exception('The table column and table column value are necessary to generate the where clause, therefor can\'t be left empty.');
                }
                break;

            case 'update':
                // UPDATE people SET pplDepartment = 'Bio Sciences' WHERE pplName = 'Darme' LIMIT 1

                if(!empty($this -> whereColumns) && !empty($this -> whereValues))
                {
                    if(is_string($this -> whereValues))
                    {
                        $newTableColVal = "'" . $this -> whereValues . "'";
                    }
                    else
                    {
                        $newTableColVal = $this -> whereValues;
                    }
                    $this -> whereValues = $newTableColVal;

                    if(count($this -> inColumns) != count($this -> inValues))
                    {
                        throw new Exception('The number of elements in the "inColumns" array must be equal to that in the "inValues" array');
                    }

                    if(!is_array($this -> whereValues) && !is_array($this -> whereColumns))
                    {
                        throw new Exception('The whereValues and whereColumns arguments can\'t be left empty');
                    }

                    if(count($this -> whereColumns) != count($this -> whereValues))
                    {
                        throw new Exception('The number of elements in the "whereColumns" array must be equal to that in the "whereValues" array');
                    }

                    if(!is_numeric($this -> limit))
                    {
                        throw new Exception('The limit field must be an whole number');
                    }

                    if(!empty($this -> inColumns) && is_array($this -> inColumns) && !empty($this -> inValues) && is_array($this -> inValues))
                    {
                        foreach($this -> inValues as $element)
                        {
                            $value[] = Queries::prepareVal($element);
                        }
                        $this -> inValues = $value;

                        $this -> result = $this -> updateQuery();
                    }
                    else
                    {
                        throw new Exception('The fields for the set attributes of the update query should be in array and cannot be left empty');
                    }
                }
                else
                {
                    throw new Exception('The table column and table column value are necessary to generate the where clause, therefor can\'t be left empty.');
                }
                break;

            default:
                echo 'WRONG';
        }
        $this -> sendStatus = $this -> result;
    }

    public function getResult()
    {
        // return query status

        return $this -> sendStatus;
    }

    private static function prepareVal($val)
    {
        return (is_numeric($val)) ? $val : "'" . $val . "'";
    }

    private function insertQuery()
    {
        $insertStatus = false;

        if(empty($this -> inColumns))
        {
            $this -> sql = "INSERT INTO " . $this -> tableName . " VALUES(" . join(', ', $this -> inValues) . ")";
            if(mysql_query($this -> sql))
            {
                $insertStatus = true;
            }
            else
            {
                throw new Exception('Unable to send INSERT query, check the values passed into the values array');
            }
        }
        else
        {
            if(count($this -> inColumns) == count($this -> inValues))
            {
                $this -> sql = "INSERT INTO " . $this -> tableName . "(" . join(', ', $this -> inColumns) . ") VALUES(" . join(', ', $this -> inValues) . ")";
                if(mysql_query($this -> sql))
                {
                    $insertStatus = true;
                }
                else
                {
                    throw new Exception('Unable to send query, check the values passed into the columns array and the values array');
                }
            }
            else
            {
                throw new Exception('Number of elements in columns array must be the same as the number of elements in the values array');
            }
        }
        return $insertStatus;
    }

    private function deleteQuery()
    {
        $delStatus = false;

        // check if row to delete exists in table
        $test = mysql_query("SELECT * FROM " . $this -> tableName . " WHERE " . $this -> whereColumns . " = " . $this -> whereValues);
        if($test)
        {
            switch(mysql_num_rows($test))
            {
                case 0:
                    throw new Exception('The row to delete from the table "' . strtoupper($this -> tableName) . '" is not found.');
                    break;
                case 1:
                    continue;
                    break;
                default:
                    throw new Exception('There are more than one(1) rows in table "' . strtoupper($this -> tableName) . '" that passed the check');
                    break;
            }
        }

        if(!is_array($this -> tableName))
        {
            $this -> sql = "DELETE FROM " . $this -> tableName . " WHERE " . $this -> whereColumns . " = " . $this -> whereValues . " LIMIT " . $this -> limit;
            if(mysql_query($this -> sql))
            {
                $delStatus = true;
            }
            else
            {
                throw new Exception('Unable to send DELETE from: ' . $this -> tableName);
            }
        }
        else
        {
            $successTable = array();

            foreach($this -> tableName as $table)
            {
                $this -> sql = "DELETE FROM " . $table . " WHERE " . $this -> whereColumns . " = " . $this -> whereValues . " LIMIT " . $this -> limit;
                if(mysql_query($this -> sql))
                {
                    $successTable[] = $table;
                }
            }

            $notSucTables = array_diff($this -> tableName, $successTable);

            if(empty($notSucTables))
            {
                $delStatus = true;
            }
            else
            {
                $listNotSucTables = '';
                foreach($notSucTables as $msg)
                {
                    $listNotSucTables .= $msg . ', ';
                }
                throw new Exception('The following tables were unable to be deleted: (' . $listNotSucTables . ')');
            }
        }
        return $delStatus;
    }

    private function updateQuery()
    {
        $edited = array();
        $formatted = '';
        $setParameters = '';
        $updateStatus = false;

        foreach($this -> inColumns as $col)
        {
            $key = array_keys($this -> inColumns, $col);
            $mainKey = $key[0];
            $edited[$col] = $this -> inValues[$mainKey];
        }

        foreach($edited as $key => $val)
        {
            $formatted .= $key . " = " . $val . ", ";
        }

        $real = strlen($formatted) - 2;
        $setParameters = substr($formatted, 0, $real);

        $edited = array();
        $formatted = '';
        $whereParameters = '';

        foreach($this -> whereColumns as $col)
        {
            $key = array_keys($this -> whereColumns, $col);
            $mainKey = $key[0];
            $edited[$col] = $this -> whereValues[$mainKey];
        }

        foreach($edited as $key => $val)
        {
            $formatted .= $key . " = " . "'" . $val . "' AND ";
        }

        $real = strlen($formatted) - 4;
        $whereParameters = substr($formatted, 0, $real);

        // prepare update query
        $this -> sql = "UPDATE " . $this -> tableName . " SET " . $setParameters . " WHERE " . $whereParameters . " LIMIT " . $this -> limit;
        if(mysql_query($this -> sql))
        {
            $updateStatus = true;
        }
        else
        {
            throw new Exception('Unable to send query, check the values passed into the columns array and the values array');
        }
        return $updateStatus;
    }
}

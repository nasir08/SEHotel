<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="title" content="" />
    <meta name="description" content="" />
    <title>Hotel Classica</title>
    <link rel="shortcut icon" href="../images/favicon.ico" />
    <link rel="stylesheet" rev="stylesheet" type="text/css" href="../styles/admin.css" />
</head>

<body>
<div class="content">
    <div id="logo">
        <a href="#"><img src="../images/logo.gif" alt="" /></a>
    </div><!-- #logo -->

    <?php
    function __autoload($class)
    {
        require_once '../classes/' . $class . '.php';
    }

    ?>

    <div class="container_admin">

    <?php
        try
        {
            $missing = array();

            if(filter_has_var(INPUT_POST, 'submit'))
            {
                $conn = new MYSQLconnection();

                // validate input
                $validator = new Validator(array('search'));
                $validator -> useEntities('search');
                $validator -> validateInput();
                $error = $validator -> getErrors();
                $missing = $validator -> getMissing();
                $filtered = $validator -> getFiltered();

                if(empty($error) && empty($missing))
                {
                    $search = $conn -> query("SELECT * FROM transactions WHERE receipt_num = '" . $filtered['search'] . "'");

                    if($search -> numberOfRows() == 0)
                    {
                        echo '<div class="error">No Result Found</div>';
                    }
                    else
                    {
                        $counter = 1;

                        echo '<table>
                            <tbody>
                                <tr>
                                    <th>S/N</th>
                                    <th>Room Type</th>
                                    <th>Check in Date</th>
                                    <th>Check out Date</th>
                                    <th>Number of Days</th>
                                    <th>Amount Paid(N)</th>
                                    <th>View Receipt Number</th>
                                </tr>';

                        while($list = $search -> fetch())
                        {
                            if($list[5] == 1)
                            {
                                $roomType = 'Modern Room';
                            }
                            elseif($list[5] == 2)
                            {
                                $roomType = 'Garden Room';
                            }
                            elseif($list[5] == 3)
                            {
                                $roomType = 'Deluxe Beach Room';
                            }
                            else
                            {
                                $roomType = 'Family Room';
                            }

                            echo '<tr>
                              <td>' . $counter . '</td>
                              <td>' . $roomType . '</td>
                              <td>' . $list[2] . '</td>
                              <td>' . $list[3] . '</td>
                              <td>' . $list[4] . '</td>
                              <td>' . $list[6] . '</td>
                              <td><img src="../images/receipt.png" onclick="alert(' . $list[7] . ')" style="cursor:pointer;" /></td></tr>';

                            $counter++;
                        }
                        echo '</tbody></table>';
                    }
                }

                $conn -> disconnect();
            }
        }
        catch(Exception $e)
        {

        }
    ?>
        <div class="container">

        <h2>Search Reservation Via Receipt Number</h2>

        <form action="" method="post">
            <table>
                <tr>
                    <td>Receipt Number:</td>
                    <td><input type="search" name="search"
                        <?php if(in_array('search', $missing)){ echo 'style="background: #900;"'; } ?> /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="search" /></td>
                </tr>
            </table>
        </form>
            <a href="logout.php">LOGOUT</a>
        </div>
    </div>

</div>

</body>
</html>
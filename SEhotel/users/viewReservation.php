<?php

function __autoload($class)
{
    require_once '../classes/' . $class . '.php';
}

Sessions::startSession();

if(empty($_SESSION['username']))
{
    Functions::reDirect('../');
}

$type = 'view';

// include header
include 'inc/header.php';

// include menu
include 'inc/menu.php';

echo '</div>';

echo '</div><!-- .container --></div><!-- #top-wrapper -->';

?>
<link href="../styles/inner.css" rel="stylesheet" type="text/css" />

<div id="header-container">
    <img src="../images/content/pic-inner5.jpg" alt="" />
</div><!-- #header-container -->
<div class="clear"></div>

<div id="content-wrapper" class="inner">
    <div class="container">
        <div id="content-container">
            <div id="frame-content-t">
                <div id="frame-content-b">

                    <div class="center">
                        <div id="main-content" class="full">

                            <!--  Tables -->
                            <span id="elements7"></span>

                            <h3>View all reservations made</h3>
                            <table>
                                <tbody>
                                <tr>
                                    <th>S/N</th>
                                    <th>Room Type</th>
                                    <th>Check in Date</th>
                                    <th>Check out Date</th>
                                    <th>Number of Days</th>
                                    <th>Amount Paid(N)</th>
                                    <th>View Receipt Number</th>
                                    <th>Cancel Booking</th>
                                </tr>
                                <?php
                                // get all reservations
                                try
                                {
                                    $conn = new MYSQLconnection();

                                    // get user_id
                                    $uid = $conn -> query("SELECT user_id FROM users WHERE username = '" . $_SESSION['username'] . "'");
                                    $user_id = $uid -> fetch();

                                    $query = $conn -> query("SELECT * FROM transactions WHERE user_id = " . $user_id[0]);
                                    $counter = 1;

                                    while($list = $query -> fetch())
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
                                                  <td><img src="../images/receipt.png" onclick="alert(' . $list[7] . ')" style="cursor:pointer;" /></td>
                                                  <td>';

                                        $current_date = date("Y-m-d");
                                        if($list[2] > $current_date)
                                        {
                                            echo '<a href="delete.php?id=' . $list[0] . '"><img src="../images/error.png" /></a>';
                                        }

                                        echo '</td>
                                              </tr>';

                                        $counter++;
                                    }

                                    $conn -> disconnect();
                                }
                                catch(Exception $e)
                                {

                                }
                                ?>
                                </tbody>
                            </table>
                            <!--  end Tables -->

                        </div><!-- #main-content -->

                        <div class="clear"></div>
                    </div><!-- .center -->

                    <div class="clear"></div>
                </div><!-- #frame-content-b -->
            </div><!-- #frame-content-t -->
        </div><!-- #content-container -->
    </div><!-- .container -->
</div><!-- #content-wrapper -->

<?php
// include footer
include 'inc/footer.php';
?>
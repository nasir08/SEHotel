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

$type = 'make';

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

                            <div class="contact-left">
                                <h2>Make Reservation</h2>
                                <p>Please endeavor to fill every input field.</p>
                                <?php
                                try
                                {
                                    if(filter_has_var(INPUT_POST, 'submit'))
                                    {
                                        // connect to database
                                        $conn = new MYSQLconnection();

                                        // get user_id
                                        $uid = $conn -> query("SELECT user_id FROM users WHERE username = '" . $_SESSION['username'] . "'");
                                        $user_id = $uid -> fetch();

                                        // validate form
                                        $required = array('room', 'start_date', 'end_date');
                                        $validator = new Validator($required);

                                        $validator -> useEntities('room');
                                        $validator -> useEntities('start_date');
                                        $validator -> useEntities('end_date');
                                        $validator -> validateInput();
                                        $errors = $validator -> getErrors();
                                        $missing = $validator -> getMissing();
                                        $filtered = $validator -> getFiltered();

                                        if(empty($errors) && empty($missing))
                                        {
                                            // check to make sure end date is more recent than start date
                                            if($filtered['end_date'] > $filtered['start_date'])
                                            {
                                                // check if room is still available
                                                $q = $conn -> query("SELECT qty FROM reserved WHERE roomType_id = " . $filtered['room']);
                                                $r = $q -> fetch();
                                                if($r[0] > 0)
                                                {
                                                    // calculate the amount
                                                    // amount of each room per day
                                                    if($filtered['room'] == 1)
                                                    {
                                                        $amt = 7000;
                                                    }
                                                    elseif($filtered['room'] == 2)
                                                    {
                                                        $amt = 9000;
                                                    }
                                                    elseif($filtered['room'] == 3)
                                                    {
                                                        $amt = 12000;
                                                    }
                                                    elseif($filtered['room'] == 4)
                                                    {
                                                        $amt = 15000;
                                                    }

                                                    // calculate the number of days
                                                    // get start month
                                                    $start_month = substr($filtered['start_date'], 5, 2);
                                                    // get start day
                                                    $start_day = substr($filtered['start_date'], -2);
                                                    // get end month
                                                    $end_month = substr($filtered['end_date'], 5, 2);
                                                    // get end day
                                                    $end_day = substr($filtered['end_date'], -2);

                                                    if($start_month == $end_month)
                                                    {
                                                        $nod = $end_day - $start_day;
                                                    }
                                                    else
                                                    {
                                                        $twentyNine = array(2);
                                                        $thirty = array(11, 4, 6, 9);
                                                        $thirtyOne = array(1, 3, 5, 7, 8, 10, 12);

                                                        if(in_array($start_month, $twentyNine))
                                                        {
                                                            $i = 29 - $start_day;
                                                            $nod = $i + $end_day;
                                                        }
                                                        elseif(in_array($start_month, $thirty))
                                                        {
                                                            $i = 30 - $start_day;
                                                            $nod = $i + $end_day;
                                                        }
                                                        else
                                                        {
                                                            $i = 31 - $start_day;
                                                            $nod = $i + $end_day;
                                                        }
                                                    }

                                                    // calculate total amount
                                                    $totalAmount = $amt * $nod;
                                                    $totalAmountWord = 'Total amount for ' . $nod . ' day(s) = N ' . $totalAmount;

                                                    ?>
                                                    <script type="text/javascript">
                                                        alert('<?php echo $totalAmountWord; ?>');
                                                    </script>
                                                    <?php
                                                    // generate receipt number
                                                    $receipt_num = mt_rand(1000000000, 9999999999);

                                                    // insert into transactions
                                                    $query = new Queries('insert', 'transactions', array(), array('', $user_id[0], $filtered['start_date'], $filtered['end_date'], $nod, $filtered['room'], $totalAmount, $receipt_num));
                                                    $query -> generateQuery();

                                                    if($query -> getResult())
                                                    {
                                                        // get current number of rooms available
                                                        $numOfRooms = $conn -> query("SELECT qty FROM reserved WHERE roomType_id = " . $filtered['room']);
                                                        $nor_q = $numOfRooms -> fetch();
                                                        $nor = $nor_q[0] - 1;
                                                        // update the number of rooms available
                                                        $query1 = new Queries('update', 'reserved', array('qty'), array($nor), array('roomType_id'), array($filtered['room']));
                                                        $query1 -> generateQuery();
                                                        if($query1 -> getResult())
                                                        {
                                                            echo '<div class="two_third"><div class="download-box">';
                                                            echo 'Reservation Made Successfully';
                                                            echo '</div></div>';
                                                        }
                                                    }
                                                }
                                                else
                                                {
                                                    echo '<div class="two_third"><div class="error-box">';
                                                    echo 'Selected Room not Available';
                                                    echo '</div></div>';
                                                }
                                            }
                                            else
                                            {
                                                echo '<div class="two_third"><div class="error-box">';
                                                echo 'Invalid Date Settings';
                                                echo '</div></div>';
                                            }
                                        }
                                        else
                                        {
                                            echo '<div class="two_third"><div class="error-box">';
                                            foreach($errors as $err)
                                            {
                                                echo $err . '<br />';
                                            }
                                            echo '</div></div>';
                                        }

                                        $conn -> disconnect();
                                    }
                                }
                                catch(Exception $e)
                                {
                                    echo $e -> getMessage();
                                }
                                ?>
                                <div id="contactform">
                                    <form method="post" action="">
                                        <fieldset>
                                            <label for="room" id="room_label">Room Type<span class="red">*</span></label>
                                            <select name="room" id="room" class="text-input">
                                                <?php
                                                // get room types
                                                try
                                                {
                                                    $conn = new MYSQLconnection();
                                                    $q = $conn -> query("SELECT * FROM room_types");
                                                    while($fetch = $q -> fetch())
                                                    {
                                                        echo '<option value="' . $fetch[0] . '">' . $fetch[1] . '</option>';
                                                    }

                                                    $conn -> disconnect();
                                                }
                                                catch(Exception $e)
                                                {

                                                }
                                                ?>
                                            </select>
                                            <div class="clear"></div>
                                            <label for="start_date" id="start_date_label">Check in Date <span class="red">*</span></label>
                                            <input type="date" name="start_date" id="start_date"  value="" class="text-input" />
                                            <label for="end_date" id="end_date_label">Check out Date <span class="red">*</span></label>
                                            <input type="date" name="end_date" id="end_date"  value="" class="text-input" />
                                            <input type="submit" name="submit" class="button" id="submit_btn" value="Submit"/><br />
                                        </fieldset>
                                    </form>
                                </div><!-- end #contactform -->
                            </div>
                            <div class="contact-right">
                                <h2>Our Address </h2>
                                <p>Room A1, Adeleke Hall, Babcock University, Ilishan - Remo, Ogun state.</p>
                                <br />
                                <h2>Our Contact Info:</h2>
                                <p>
                                    Email: <a href="mailto:darmieblinks@gmail.com">darmieblinks@gmail.com</a> <br />
                                    Tel: (234) 8096 285005<br />
                                    Fax: (01) 222 3323
                                </p>
                                <br />
                            </div>


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
<?php

try
{
    // connect to db
    $conn = new MYSQLconnection();
    $missing = array();

    if(filter_has_var(INPUT_POST, 'login'))
    {
        // validate
        $validator = new Validator(array('username', 'pass'));
        $validator -> useEntities('username');
        $validator -> useEntities('pass');
        $validator -> validateInput();
        $filtered = $validator -> getFiltered();
        $error = $validator -> getErrors();
        $missing = $validator -> getMissing();

        if(empty($error) && empty($missing))
        {
            // authenticate
            $authenticate = new Authentication('users', $filtered['username'], $filtered['pass']);
            list($status, $data) = $authenticate -> authenticate();

            if($status)
            {
                Functions::reDirect('users');
            }
            else
            {
                $missing[] = 'username';
                $missing[] = 'pass';
            }
        }
    }

    $conn -> disconnect();
}
catch(Exception $e)
{

}
?>

<div id="navigation">
    <ul>
        <li><a href="rooms.php">Accommodation</a></li>
        <li><a href="service.php">Activities</a></li>
    </ul>
    <form action="" method="post">
        <div id="loginform">
            <input type="text" name="username" class="inputbox" value="Username"  onblur="if(this.value=='') this.value='Username';" onfocus="if(this.value=='Username') this.value='';" <?php if(in_array('username', $missing)) { echo 'style="background:#FCC"'; } ?> />
            <input type="password" name="pass" class="inputbox" value="Password"  onblur="if(this.value=='') this.value='Password';" onfocus="if(this.value=='Password') this.value='';" <?php if(in_array('pass', $missing)) { echo 'style="background:#FCC"'; } ?> />
            <input type="submit" name="login" value="Login" class="button" />
        </div>
    </form>

    <ul>
        <li><a href="register.php">Register Now!</a></li>
    </ul>
</div>
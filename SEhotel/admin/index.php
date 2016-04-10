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

    <div class="container">
        <h2>Admin Login</h2>

    <?php
        try
        {
            $missing = array();

            if(filter_has_var(INPUT_POST, 'submit'))
            {
               $conn = new MYSQLconnection();

                // validate input
                $validator = new Validator(array('username', 'password'));
                $validator -> useEntities('username');
                $validator -> useEntities('password');
                $validator -> validateInput();
                $error = $validator -> getErrors();
                $missing = $validator -> getMissing();
                $filtered = $validator -> getFiltered();

                if(empty($error) && empty($missing))
                {
                    // check db for resemblance
                    $authenticate = new Authentication('admin', $filtered['username'], $filtered['password']);
                    list($status, $data) = $authenticate -> authenticate();

                    if($status)
                    {
                        Functions::reDirect('admin.php');
                    }
                    else
                    {
                        echo '<div class="error">Invalid Username or Password</div>';
                    }
                }

                $conn -> disconnect();
            }
        }
        catch(Exception $e)
        {

        }
    ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username"
                        <?php if(in_array('username', $missing)){ echo 'style="background: #900;"'; } ?> /></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password"
                        <?php if(in_array('password', $missing)){ echo 'style="background: #900;"'; } ?> /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="login" /></td>
                </tr>
            </table>
        </form>
    </div>

</div>

</body>
</html>
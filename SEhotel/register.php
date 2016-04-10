<?php

// include header
include 'inc/header.php';

// include menu
include 'inc/menu.php';

echo '</div>';

// include nav
include 'inc/nav.php';

echo '</div><!-- .container --></div><!-- #top-wrapper -->';

function __autoload($class)
{
    require_once 'classes/' . $class . '.php';
}

?>
<link href="styles/inner.css" rel="stylesheet" type="text/css" />

<div id="header-container">
    <img src="images/content/pic-inner5.jpg" alt="" />
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
                                <h2>Register</h2>
                                <p>Please endeavor to fill every input field.</p>
                                <?php
                                try
                                {
                                    if(filter_has_var(INPUT_POST, 'submit'))
                                    {
                                        // connect to database
                                        $conn = new MYSQLconnection();

                                        // validate form
                                        $required = array('username', 'email', 'phone', 'password');
                                        $validator = new Validator($required);

                                        $validator -> useEntities('username');
                                        $validator -> isEmail('email');
                                        $validator -> useEntities('phone');
                                        $validator -> useEntities('password');
                                        $validator -> validateInput();
                                        $errors = $validator -> getErrors();
                                        $missing = $validator -> getMissing();
                                        $filtered = $validator -> getFiltered();

                                        if(empty($errors) && empty($missing))
                                        {
                                            // check to make sure email has never been used
                                            $checkEmail = $conn -> query("SELECT * FROM users WHERE emailAdd = '" . $filtered['email'] . "'");
                                            $checkUsername = $conn -> query("SELECT * FROM users WHERE username = '" . $filtered['username'] . "'");
                                            if($checkEmail -> numberOfRows() > 0 || $checkUsername ->numberOfRows() > 0)
                                            {
                                                echo '<div class="two_third">
							                  <div class="error-box"><strong>Error:</strong> Email address or Username not available</div>
						                      </div><div class="clear"></div><!-- clear float -->';
                                            }
                                            else
                                            {
                                                $password = $filtered['password'];
                                                $phone = '234' . substr($filtered['phone'], 1);
                                                // insert into database
                                                $q = new Queries('insert', 'users', array(), array('', $filtered['username'], SHA1($password), $phone, $filtered['email']));
                                                $q -> generateQuery();

                                                if($q -> getResult())
                                                {
                                                    echo '<div class="two_third">
							                      <div class="download-box"> Account created successfully</div>
						                          </div>';
                                                }
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

                                }
                                ?>
                                <div id="contactform">
                                    <form method="post" action="register.php">
                                        <fieldset>
                                            <label for="name" id="name_label">Username <span class="red">*</span></label>
                                            <input type="text" name="username" id="name" size="50" value="" class="text-input" />
                                            <label for="email" id="email_label">E-mail <span class="red">*</span></label>
                                            <input type="text" name="email" id="email" size="50" value="" class="text-input" />
                                            <label for="phone" id="phone_label">Phone Number <span class="red">*</span></label>
                                            <input type="text" name="phone" id="phone"  value="" class="text-input" />
                                            <label for="password" id="password_label">Password <span class="red">*</span></label>
                                            <input type="password" name="password" id="password"  value="" class="text-input" />
                                            <input type="submit" name="submit" class="button" id="submit_btn" value="Register"/><br />
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
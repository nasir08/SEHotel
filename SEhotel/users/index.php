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

$type = 'index';

// include header
include 'inc/header.php';

// include menu
include 'inc/menu.php';

echo '</div>';

    echo '</div><!-- .container --></div><!-- #top-wrapper -->';

// include slider
include 'inc/slider.php';

?>

    <div class="clear"></div>

    <div id="content-wrapper">
        <div class="container">
            <div id="content-container">
                <div id="frame-content-t">
                    <div id="frame-content-b">
                        <?php
                        // include banner
                        include 'inc/banner.php';
                        ?>

                        <div class="clear"></div>
                        <div class="line"></div><br />
                        <div class="clear"></div>

                        <div class="center">
                            <div class="three-column-r">
                                <div class="three-column-t">
                                    <div class="three-column-b">

                                        <div id="side-left">
                                            <ul class="sidebar">
                                                <li class="widget-container textwidget home">
                                                    <h2 class="widget-title">Every Room Has:</h2>
                                                    <p>Putting our customers first in all the decisions that we make has really helped in the provision of all necessary equipment in the room. Some are listed below:</p>
                                                    <ul>
                                                        <li>Telephone with Direct Line</li>
                                                        <li>Radio</li>
                                                        <li>Colour Television</li>
                                                        <li>A Mini Bar</li>
                                                        <li>Adjustable air-conditioning</li>
                                                        <li>Refrigerator</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div><!-- #side-left -->

                                        <div id="main-content">
                                            <h2>Welcome to Our Hotel</h2>
                                            <img src="../images/content/pic1.jpg" alt="" class="alignleft"/><p>With much confidence in our services rendered, we are proud to say we are one of the best hotels in this locality, state and country at large. All thanks goes to the customers who participated in our survey and improvement programs.</p>
                                            <p>Without over emphasising our capabilities, quality services, and our global popularity, we want to welcome you all to HOTEL CLASSICA, please do feel free to navigate this site, and check out all we have to offer you. Make your reservations and come spend some classical time with your loved ones.</p>
                                            <p>Your satisfaction, our priority.</p>
                                        </div><!-- #main-content -->

                                        <div id="side-right">
                                            <ul class="sidebar">
                                                <li class="widget-container newswidget">
                                                    <h2 class="widget-title">News</h2>
                                                    <ul>
                                                        <li><span class="smalldate">October 3, 2012</span>A moment of with the vice president of Nigeria in person of Chief Nnamadi Sambo.</li>
                                                        <li><span class="smalldate">August 29, 2012</span>Hotel Classica won the award of the best hotel in Nigeria.</li>
                                                        <li><span class="smalldate">July 20, 2012</span>Memories still lingering as Microsoft lodged their staffs for a week.</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div><!-- #side-right -->
                                        <div class="clear"></div>
                                    </div><!-- .three-column-b -->
                                </div><!-- .three-column-t -->
                            </div><!-- .three-column-r -->
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
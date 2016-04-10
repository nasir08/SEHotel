<?php

function __autoload($class)
{
    require_once 'classes/' . $class . '.php';
}

$type = 'service';

// include header
include 'inc/header.php';

// include menu
include 'inc/menu.php';

echo '</div>';

// include nav
include 'inc/nav.php';

    echo '</div><!-- .container --></div><!-- #top-wrapper -->';

?>

<div id="header-container">
    <img src="images/content/pic-inner3.jpg" alt="" />
</div><!-- #header-container -->
<div class="clear"></div>

<div id="content-wrapper" class="inner">
    <div class="container">
        <div id="content-container">
            <div id="frame-content-t">
                <div id="frame-content-b">

                    <div class="center">
                        <div class="two-column-right-r">
                            <div class="two-column-right-t">
                                <div class="two-column-right-b">

                                    <div id="main-content">
                                        <h2>Our Services / Activities</h2>
                                        <div class="clear"></div>
                                        <hr />
                                        <h4>Swimming Pool</h4>
                                        <img src="images/content/img-act2.jpg" alt="" class="alignleft" />
                                        <p>Well treated pool with floaters and pool balls with a maximum height of 10.5 feets. Lifeguards are always available.</p>
                                        <div class="clear"></div>
                                        <hr />
                                        <h4>Sporting Track</h4>
                                        <img src="images/content/img-act3.jpg" alt="" class="alignleft" />
                                        <p>A very key event is exercise, so we made sure we took proper care of that by providing filed tracks and other outdoor sporting activities.</p>
                                        <div class="clear"></div>
                                        <hr />
                                        <h4>Luxury Meal</h4>
                                        <img src="images/content/img-act5.jpg" alt="" class="alignleft" />
                                        <p>Hmmmmmm... All sort of dishes are served, international, traditional, deserts, appetizers and many more.</p>
                                        <div class="clear"></div>
                                    </div><!-- #main-content -->

                                    <div id="side-right">
                                        <ul class="sidebar">
                                            <li class="widget-container rec-comment">
                                                <h2 class="widget-title">Recent News</h2>
                                                <ul>
                                                    <li><span class="smalldate">October 3, 2012</span>A moment of with the vice president of Nigeria in person of Chief Nnamadi Sambo.</li>
                                                    <li><span class="smalldate">August 29, 2012</span>Hotel Classica won the award of the best hotel in Nigeria.</li>
                                                    <li><span class="smalldate">July 20, 2012</span>Memories still lingering as Microsoft lodged their staffs for a week.</li>
                                                </ul>
                                            </li>
                                            <li class="widget-container widget-tag">
                                                <h2 class="widget-title">Most Used Links</h2>
                                                <ul>
                                                    <li><a href="index.php">Homepage</a></li>
                                                    <li><a href="register.php">Registration</a></li>
                                                    <li><a href="rooms.php">Accommodation</a></li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </div><!-- #side-right -->
                                    <div class="clear"></div>
                                </div><!-- .two-column-right-b -->
                            </div><!-- .two-column-right-t -->
                        </div><!-- .two-column-right-r -->
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
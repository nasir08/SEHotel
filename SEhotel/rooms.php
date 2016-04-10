<?php

function __autoload($class)
{
    require_once 'classes/' . $class . '.php';
}

$type = 'rooms';

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
                                        <h2>Our Room</h2>
                                        <img src="images/content/pic3.jpg" alt="" class="aligncenter"/>
                                        <h3>Modern Comforts, Timeless Style</h3>
                                        <p>The comfortability of our rooms cannot be compared to any other, except perhaps the American white house. Fully air conditioned, comfortable comforters, classic lighting, well furnished.</p>
                                        <div class="clear"></div><strong>N 7,000</strong>
                                        <hr />
                                        <h4>Garden View</h4>
                                        <img src="images/content/img-room1.jpg" alt="" class="alignleft" />
                                        <p>A cooling outdoor feeling / sensation it sends to the body and mind ...<a href="rooms-detail.php" class="more">read more</a></p>
                                        <div class="clear"></div><strong>N 9,000</strong>
                                        <hr />
                                        <h4>Deluxe Beach Front</h4>
                                        <img src="images/content/img-room2.jpg" alt="" class="alignleft" />
                                        <p>There is no other beach-like feeling that can be compared to that which hotel classica generates ...<a href="rooms-detail.php" class="more">read more</a></p>
                                        <div class="clear"></div><strong>N 12,000</strong>
                                        <hr />
                                        <h4>Family Room</h4>
                                        <img src="images/content/img-room3.jpg" alt="" class="alignleft" />
                                        <p>Searching for a very comfortable environment for you and your family, somewhere other than home? I tell you our family suite will blow your imaginations ...<a href="rooms-detail.php" class="more">read more</a></p>
                                        <div class="clear"></div><strong>N 15,000</strong>
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
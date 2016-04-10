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

<link href="styles/inner.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>

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
<h2>Room Details</h2>
<div id="container-slider">
    <ul id="slideshow_detail">
        <li>
            <h3>Title1</h3>
            <span>images/slider-detail/large/slider1.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb1.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title2</h3>
            <span>images/slider-detail/large/slider2.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb2.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title3</h3>
            <span>images/slider-detail/large/slider3.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb3.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title4</h3>
            <span>images/slider-detail/large/slider4.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb4.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title5</h3>
            <span>images/slider-detail/large/slider5.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb5.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title6</h3>
            <span>images/slider-detail/large/slider6.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb6.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title7</h3>
            <span>images/slider-detail/large/slider7.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb7.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title8</h3>
            <span>images/slider-detail/large/slider8.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb8.jpg" alt="thumb" />
        </li>

        <li>
            <h3>Title1</h3>
            <span>images/slider-detail/large/slider1.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb1.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title2</h3>
            <span>images/slider-detail/large/slider2.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb2.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title3</h3>
            <span>images/slider-detail/large/slider3.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb3.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title4</h3>
            <span>images/slider-detail/large/slider4.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb4.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title5</h3>
            <span>images/slider-detail/large/slider5.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb5.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title6</h3>
            <span>images/slider-detail/large/slider6.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb6.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title7</h3>
            <span>images/slider-detail/large/slider7.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb7.jpg" alt="thumb" />
        </li>
        <li>
            <h3>Title8</h3>
            <span>images/slider-detail/large/slider8.jpg</span>
            <p></p>
            <img src="images/slider-detail/thumb/thumb8.jpg" alt="thumb" />
        </li>

    </ul>
    <div id="wrapper">
        <div id="fullsize">
            <div id="imgprev" class="imgnav" title="Previous Image"></div>
            <div id="imglink"></div>
            <div id="imgnext" class="imgnav" title="Next Image"></div>
            <div id="image"></div>
            <div id="information">
                <h3></h3>
                <p></p>
            </div>
        </div>
        <div id="thumbnails">
            <div id="slideleft" title="Slide Left"></div>
            <div id="slidearea">
                <div id="slider"></div>
            </div>
            <div id="slideright" title="Slide Right"></div>
        </div>
    </div>
    <script type="text/javascript" src="js/compressed.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript">
        <!--

        $('slideshow_detail').style.display='none';
        $('wrapper').style.display='block';
        var slideshow_detail=new TINY.slideshow_detail("slideshow_detail");
        window.onload=function()
        {
            slideshow_detail.auto=true;
            slideshow_detail.speed=5;
            slideshow_detail.link="linkhover";
            slideshow_detail.info="information";
            slideshow_detail.thumbs="slider";
            slideshow_detail.left="slideleft";
            slideshow_detail.right="slideright";
            slideshow_detail.scrollSpeed=4;
            slideshow_detail.spacing=25;
            slideshow_detail.active="#fff";
            slideshow_detail.init("slideshow_detail","image","imgprev","imgnext","imglink");
        }
        //-->
    </script>
</div><!-- end content-slider -->

<div class="clear"></div>
<hr />
<h4>Room Overview</h4>
<div class="one_half left">
    <strong>Room Feature</strong>
    <ul class="bullet-default">
        <li>54aqm/454sqty</li>
        <li>Air Conditioned</li>
        <li>This room is non smoking</li>
        <li>Connection rooms are not available</li>
        <li>Windows, floor to ceilin</li>
        <li>Ceilings, high</li>
    </ul>
</div>
<div class="one_half last">
    <strong>Accessible Room Features</strong>
    <ul class="bullet-default">
        <li>Grab bars in bathroom</li>
        <li>This room type offers accessible rooms</li>
    </ul><br />

    <strong>Hospitality Services</strong>
    <ul class="bullet-default">
        <li>Newspaper delivered to room on request</li>
        <li>Evening turndown service</li>
    </ul>
</div>
<div class="clear"></div>
<hr />

<h4>Room Amenities</h4>
<div class="one_half left">
    <strong>Furniture and Furnishings</strong>
    <ul class="bullet-default">
        <li>Chair</li>
        <li>Safe, in room</li>
        <li>Iron and ironing board</li>
        <li>Desk, writing/work, electrical</li>
        <li>Alarm Clock</li>
    </ul>
    <br />
    <strong>Beds and Bedding</strong>
    <ul class="bullet-default">
        <li>Featherbed and Duvet</li>
        <li>Maximum cribs/rollaway beds perrmited: 2</li>
        <li>1 King or 2 Double</li>
        <li>Maximun Occupancy: 3</li>
        <li>Cribs permiited: 1</li>
    </ul>
</div>
<div class="one_half last">
    <strong>Food &amp; Beverages</strong>
    <ul class="bullet-default">
        <li>Mini-bar</li>
        <li>Bottled water, complimentary</li>
        <li>Coffe maker / tea service</li>
        <li>Room service, 24h</li>
        <li>Instant hot water</li>
    </ul>
    <br />
    <strong>Bath and Bathroom Features</strong>
    <ul class="bullet-default">
        <li>Slippers</li>
        <li>Bidet</li>
        <li>Bathub nad shower separate</li>
        <li>Marble bathroom</li>
        <li>Hair dryer</li>
        <li>Robes: 2</li>
    </ul>
</div>
<div class="clear"></div>
<hr />

<h4>In Room Media</h4>
<div class="one_half left">
    <strong>Entertainment</strong>
    <ul class="bullet-default">
        <li>TV features: remote and LCD screen</li>
        <li>Cable channels: CNN, ESPN, HBO</li>
        <li>Radio</li>
        <li>Video games</li>
        <li>Premium movie channels</li>
        <li>Cable/satellite</li>
    </ul>
</div>
<div class="one_half last">
    <strong>Phones and Internet</strong>
    <ul class="bullet-default">
        <li>Wired internet, for a free</li>
        <li>High speed internet, for a fee</li>
        <li>Phone features: voicemail and speaker phone</li>
        <li>Phones Line</li>
        <li>3 Phones</li>
    </ul>
</div>

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
        <li class="widget-container textwidget">
            <h2 class="widget-title">Our Branches</h2>
            We are proud to inform you that we have branches in about 12 other different countries
            <ul>
                <li><strong>Ghana</strong> <br />Accra</li>
                <li><strong>South Africa</strong> <br />Capetown</li>
                <li><strong>Cameroon</strong> <br />Yoko</li>
                <li><strong>Russia</strong> <br />Moscow</li>
                <li><strong>United kingdom</strong> <br />London</li>
                <li><strong>France</strong> <br />Paris</li>
                <li><strong>Canada</strong> <br />Edmonton</li>
                <li><strong>Spain</strong> <br />Madrid</li>
                <li><strong>U.S.A</strong> <br />Philadelphia</li>
                <li><strong>Saudi Arabia</strong> <br />Mecca</li>
                <li><strong>Egypt</strong> <br />Cairo</li>
                <li><strong>Germany</strong> <br />Berlin</li>
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
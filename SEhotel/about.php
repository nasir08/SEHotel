<?php

function __autoload($class)
{
    require_once 'classes/' . $class . '.php';
}

$type = 'about';

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
    <img src="images/content/pic-inner.jpg" alt="" />
</div><!-- #header-container -->
<div class="clear"></div>

<div id="content-wrapper" class="inner">
    <div class="container">
        <div id="content-container">
            <div id="frame-content-t">
                <div id="frame-content-b">

                    <div class="center">
                        <div class="two-column-left-r">
                            <div class="two-column-left-t">
                                <div class="two-column-left-b">

                                    <div id="side-left">
                                        <ul class="sidebar">
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
                                    </div><!-- #side-left -->

                                    <div id="main-content">
                                        <h2>More About Us</h2>
                                        <p>HOTEL CLASSICA is an organisation set aside to satisfy and meet the needs of people of different categories, financial status, tribal or cultural background, skin colors, and all.</p>

                                        <p>HOTEL CLASSICA is equipped with all that will grant you 110% comfortability in all or lets say almost all aspects of living such as mental, emotional, physical, spiritual (provision of worship centers) and many more.</p>

                                        <div class="one_third">
                                            <img src="images/icon/i-about1.png" alt="" class="alignleft" /><h3 class="title-about">Elegant Hotel</h3>
                                            <p>In appearance, both structural and material wise, HOTEL CLASSICA is fully mouthed.</p>
                                            <ul class="bullet-check about">
                                                <li>Sophisticated Building</li>
                                                <li>Grand Entry</li>
                                                <li>Large Car Park</li>
                                                <li>Flourishing Gardens</li>
                                                <li>Well Furnished</li>
                                            </ul>
                                        </div>
                                        <div class="one_third">
                                            <img src="images/icon/i-about2.png" alt="" class="alignleft" /><h3 class="title-about">Best Service</h3>
                                            <p>Our staffs are all educated and passed through a week training and thereby were fully furnished to attend to our customers properly.</p>
                                            <ul class="bullet-check about">
                                                <li>Patient Staffs</li>
                                                <li>Approved Drivers</li>
                                                <li>Well Principled Waiters</li>
                                                <li>Great Chefs</li>
                                            </ul>
                                        </div>
                                        <div class="one_third last">
                                            <img src="images/icon/i-about3.png" alt="" class="alignleft" /><h3 class="title-about">The Loyalty</h3>
                                            <p>We are strictly confidential with our accommodations and reservations. Our loyalty is unquestionable.</p>
                                            <ul class="bullet-check about">
                                                <li>Fully Secured Environment</li>
                                                <li>Spy Free Softwares</li>
                                                <li>Secured Accountancy</li>
                                                <li>Skilled Staffs</li>
                                            </ul>
                                        </div>
                                    </div><!-- #main-content -->

                                    <div class="clear"></div>
                                </div><!-- .two-column-left-b -->
                            </div><!-- .two-column-left-t -->
                        </div><!-- .two-column-left-r -->
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
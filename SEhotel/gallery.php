<?php

function __autoload($class)
{
    require_once 'classes/' . $class . '.php';
}

$type = 'gallery';

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
<link href="styles/prettyPhoto.css" rel="stylesheet"  type="text/css" media="screen" title="prettyPhoto main stylesheet" />
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="js/fade.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        /* portfolio gallery */
        jQuery("a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'facebook',slideshow:2000});
    });
</script>

<div id="header-container">
    <img src="images/content/pic-inner4.jpg" alt="" />
</div><!-- #header-container -->
<div class="clear"></div>

<div id="content-wrapper" class="inner">
    <div class="container">
        <div id="content-container">
            <div id="frame-content-t">
                <div id="frame-content-b">

                    <div class="center">
                        <div id="main-content" class="full">
                            <h2>Our Gallery</h2>
                            <div id="ts-display-portfolio">
                                <ul class="ts-display-pf-col-3">
                                    <li>
                                        <div class="ts-display-pf-img">
                                            <a class="image" href="images/content/pf/pf3_1.jpg" rel="prettyPhoto[mixed]" >
                                                <span class="rollover"></span>
                                                <img src="images/content/pf/pf3_1.jpg" alt="" class="imgborder"/></a>
                                        </div>
                                        <div class="ts-display-clear"></div>
                                    </li>
                                    <li>
                                        <div class="ts-display-pf-img">
                                            <a class="image" href="images/content/pf/pf3_2.jpg" rel="prettyPhoto[mixed]" >
                                                <span class="rollover"></span>
                                                <img src="images/content/pf/pf3_2.jpg" alt="" class="imgborder"/></a>
                                        </div>
                                        <div class="ts-display-clear"></div>
                                    </li>
                                    <li class="nomargin">
                                        <div class="ts-display-pf-img">
                                            <a class="image" href="images/content/pf/pf3_3.jpg" rel="prettyPhoto[mixed]" >
                                                <span class="rollover"></span>
                                                <img src="images/content/pf/pf3_3.jpg" alt="" class="imgborder"/></a>
                                        </div>
                                        <div class="ts-display-clear"></div>
                                    </li>
                                    <li>
                                        <div class="ts-display-pf-img">
                                            <a class="image" href="images/content/pf/pf3_4.jpg" rel="prettyPhoto[mixed]" >
                                                <span class="rollover"></span>
                                                <img src="images/content/pf/pf3_4.jpg" alt="" class="imgborder"/></a>
                                        </div>
                                        <div class="ts-display-clear"></div>
                                    </li>
                                    <li>
                                        <div class="ts-display-pf-img">
                                            <a class="image" href="images/content/pf/pf3_5.jpg" rel="prettyPhoto[mixed]" >
                                                <span class="rollover"></span>
                                                <img src="images/content/pf/pf3_5.jpg" alt="" class="imgborder"/></a>
                                        </div>
                                        <div class="ts-display-clear"></div>
                                    </li>
                                    <li class="nomargin">
                                        <div class="ts-display-pf-img">
                                            <a class="image" href="images/content/pf/pf3_6.jpg" rel="prettyPhoto[mixed]" >
                                                <span class="rollover"></span>
                                                <img src="images/content/pf/pf3_6.jpg" alt="" class="imgborder"/></a>
                                        </div>
                                        <div class="ts-display-clear"></div>
                                    </li>
                                    <li>
                                        <div class="ts-display-pf-img">
                                            <a class="image" href="images/content/pf/pf3_7.jpg" rel="prettyPhoto[mixed]" >
                                                <span class="rollover"></span>
                                                <img src="images/content/pf/pf3_7.jpg" alt="" class="imgborder"/></a>
                                        </div>
                                        <div class="ts-display-clear"></div>
                                    </li>
                                    <li>
                                        <div class="ts-display-pf-img">
                                            <a class="image" href="images/content/pf/pf3_8.jpg" rel="prettyPhoto[mixed]" >
                                                <span class="rollover"></span>
                                                <img src="images/content/pf/pf3_8.jpg" alt="" class="imgborder"/></a>
                                        </div>
                                        <div class="ts-display-clear"></div>
                                    </li>
                                    <li class="nomargin">
                                        <div class="ts-display-pf-img">
                                            <a class="image" href="images/content/pf/pf3_9.jpg" rel="prettyPhoto[mixed]" >
                                                <span class="rollover"></span>
                                                <img src="images/content/pf/pf3_9.jpg" alt="" class="imgborder"/></a>
                                        </div>
                                        <div class="ts-display-clear"></div>
                                    </li>
                                </ul>
                                <div class="pagenavi">
                                    <a href="#" class="page">1</a><span class="current">2</span><a href="#" class="nextpostslink">&gt;</a>
                                </div><!-- end pagenavi -->

                                <div class="clear"></div>
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
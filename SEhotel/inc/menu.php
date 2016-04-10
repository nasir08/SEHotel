<div id="mainmenu">
    <ul class="sn">
        <li><a href="#"><img src="images/icon/i-facebook.png" alt=""  /></a></li>
        <li><a href="#"><img src="images/icon/i-last.fm.png" alt=""  /></a></li>
        <li><a href="#"><img src="images/icon/i-myspace.png" alt=""  /></a></li>
        <li><a href="#"><img src="images/icon/i-twitter.png" alt=""  /></a></li>
        <li><a href="#"><img src="images/icon/i-youtube.png" alt=""  /></a></li>
    </ul>

    <ul id="menu">
        <li <?php if($type == 'index') { echo 'class="current"'; } ?>><a href="index.php">Home</a></li>
        <li <?php if($type == 'about') { echo 'class="current"'; } ?>><a href="about.php">About Us</a></li>
        <li <?php if($type == 'service') { echo 'class="current"'; } ?>><a href="service.php">Services</a></li>
        <li <?php if($type == 'rooms') { echo 'class="current"'; } ?>><a href="rooms.php">Rooms</a></li>
        <li <?php if($type == 'gallery') { echo 'class="current"'; } ?>><a href="gallery.php">Gallery</a></li>
    </ul>
    <div class="clear"></div>
</div><!-- #mainmenu -->
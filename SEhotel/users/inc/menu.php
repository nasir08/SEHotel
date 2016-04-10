<div id="mainmenu">
    <ul class="sn">
        <li><a href="#"><img src="../images/icon/i-facebook.png" alt=""  /></a></li>
        <li><a href="#"><img src="../images/icon/i-last.fm.png" alt=""  /></a></li>
        <li><a href="#"><img src="../images/icon/i-myspace.png" alt=""  /></a></li>
        <li><a href="#"><img src="../images/icon/i-twitter.png" alt=""  /></a></li>
        <li><a href="#"><img src="../images/icon/i-youtube.png" alt=""  /></a></li>
    </ul>

    <ul id="menu">
        <li <?php if($type == 'index') { echo 'class="current"'; } ?>><a href="index.php">Home</a></li>
        <li <?php if($type == 'view') { echo 'class="current"'; } ?>><a href="viewReservation.php">View Reservations</a></li>
        <li <?php if($type == 'make') { echo 'class="current"'; } ?>><a href="makeReservation.php">Make reservations</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <div class="clear"></div>
</div><!-- #mainmenu -->
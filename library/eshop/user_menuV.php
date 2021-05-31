<div>
    <?php print "Welcome user: " . $_SESSION['user']['Name']; ?>
    <div id="top5"><a href="javascript:window.location.href=window.location.href"
                      onclick="OpenBrWindow('<?php echo $path; ?>library/register/logout.php','logout','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no','50','50','true')"
                      class="bodylinks">Logout</a></div>
    <div id="top5"><a href="<?php echo $siteURL; ?>edit_profile" class="bodylinks">Edit Profile</a></div>
    <div id="top5"><a href="<?php echo $siteURL; ?>view_cart" class="bodylinks">View cart</a></div>
    <div id="top5"><a href="<?php echo $siteURL; ?>eshop_orders" class="bodylinks">Order History</a></div>
</div>
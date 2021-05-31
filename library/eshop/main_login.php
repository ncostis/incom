<script type="text/javascript">
function textClear(element)
{
  if ( element.value != '' ) {
      element.value = '';
  }
}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$("a#register").fancybox({
			'overlayShow'	: false,
			'titleShow'		: false,
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic'
			});
	});
</script>

<?php
require $path."library/basic/translations.php";
// IF USER EXIST
if (isset($_SESSION['user']['Customer_ID']))
{
	print "<h2>Καλώς ήρθες: ".$_SESSION['user']['Name']."</h2>";
	?>
    <div class="top5"><a href="<?php echo $rootURL; ?>library/eshop/logout.php" class="bodylinks">Αποσύνδεση</a></div>
    <div class="top5"><a id="register" href="<?php echo $rootURL; ?>library/eshop/popup.php?Page=edit_profile_popup.php&Lang=<?php echo $Lang; ?>&w=820&h=560" class="bodylinks">Επεξεργασία προφίλ</a></div>
    <div class="top5"><a id="register" href="<?php echo $rootURL; ?>library/eshop/popup.php?Page=view_cart_popup.php&Lang=<?php echo $Lang; ?>&w=820&h=560" class="bodylinks">Προβολή καλαθιού</a></div>
    <div class="top5"><a id="register" href="<?php echo $rootURL; ?>library/eshop/popup.php?Page=eshop_orders_popup.php&Lang=<?php echo $Lang; ?>&w=820&h=560" class="bodylinks">Ιστορικό παραγγελιών</a></div>    
    <div class="top5"><a href="<?php echo $siteURL; ?>checkout" class="bodylinks">Πληρωμή</a></div>
    <?php
}
else
{
	//If user attemps to login
	if (isset ($_POST['login']))
	{
	$username=getparamvalue('username');
	$password=md5(getparamvalue('password'));
	$member_sel="Select * from members where Mem_Usn = '$username' AND Mem_Psw = '$password'";
	$member_Query=q($member_sel);
	$member=f($member_Query);
	$checked=nr($member_Query);

		//Check if user name-password are correct. If so, create session to keep the login information
		if ($checked > 0)	{
			// if user is activated

				$_SESSION['user'] = array ( 'Customer_ID' => $member['Mem_ID'], 'Country' => $member['Mem_Zone'], 'Username' => $member['Mem_Usn'], 'Password' => $member['Mem_Psw'], 'Name' => $member['Mem_Name'], 'Access_Level' => $member['Mem_Level'], 'Discount' => $member['Mem_Discount']  );
				$url = $_SERVER["REQUEST_URI"];
				js_redirect($url, 0);
		} else {
			//If not, error message
			$error = 1;
		}
	}
	?>
    
    <?php if ($error == 1) print "$errorlogin"; ?>
	<form name="loginform" method="post">
    
	<div style="text-align:center; padding-bottom:5px;"><h2>Περιοχή μελών</h2></div>
    <div  class="left">
    	<div class="top3"><input name="username" type="text" size="18" class="formtext" onclick="textClear(this);" value="User Name"></div>
   		<div class="top3"><input name="password" type="password" size="18" class="formtext" onclick="textClear(this);" value="Password" ></div>
    <input type="hidden" name="login" value="ok" />
    </div>
    <div class="left" style="padding-left:20px;"><input name="Submit" type="submit" class="formsubmit" value="Είσοδος"></div>
    <div style="clear:both;"></div>
     </form>
    <div class="top5">
        <a id="register" href="<?php echo $rootURL; ?>library/register/popup.php?Page=forgot_psw.php&Lang=<?php echo $Lang; ?>&w=430&h=320" class="white10"><?php echo $textforgotpass; ?></a> /
		<a id="register" href="<?php echo $rootURL; ?>library/eshop/popup.php?Page=new_member_popup.php&Lang=<?php echo $Lang; ?>&w=880&h=480" class="white10"><?php echo $textregister; ?></a> 
        <!-- <a href="<?php echo $rootURL; ?>new_member" class="white10"><?php echo $textregister; ?></a> -->
    </div>
<?php
} // if (isset


function js_redirect($url, $seconds=5) {
echo "<script language=\"JavaScript\">\n";
echo "<!-- hide code from displaying on browsers with JS turned off\n\n";
echo "function redirect() {\n";
echo "window.location = \"" . $url . "\";\n";
echo "}\n\n";
echo "timer = setTimeout('redirect()', '" . ($seconds*1000) . "');\n\n";
echo "-->\n";
echo "</script>\n";

return true;
} 
?>

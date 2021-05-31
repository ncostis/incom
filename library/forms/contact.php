<?php
$secret_text=$_POST['secret_text'];
$user_text=$_POST['user_text'];
$captchaSet=false;
if (isset($_POST['secret_text']) && isset($_POST['user_text'])){$captchaSet=true;}
if($captchaSet==true && ($secret_text == $user_text)){
        require "contact_send.php";

}else{
    if ($secret_text <> $user_text) {
        print "<div class='top10 formerror'><strong>$securitycodeErr;</strong></div>";
    }
$Email = getparamvalue('Email');
$FullName = getparamvalue('FullName');
$Phone = getparamvalue('Phone');
$Comments = getparamvalue('Comments');
$Accept = getparamvalue('Accept');

 if ($GetRec['Rec_Field1'] <> '') {
        print "<div class=\" formtitle\">".$GetRec["Rec_Field1"]."</div>";
} ?>
<form method="post">

<!-- email -->
  <div class="formRow">
    <div class="gridFormLabel"><div class="gridFormLabelItem"><label class="formtext"><?php echo $GetRec['Rec_Field2']; ?> *:</label></div></div>
    <div class="gridFormField"><div class="gridFormFieldItem"><input class="formfields" name="Email" data-validation="email" value="<?php echo $Email; ?>"></div></div>
    <div style="clear:both;"></div>
  </div>

  <!-- full name -->
  <div class="formRow">
    <div class="gridFormLabel"><div class="gridFormLabelItem"><label class="formtext"><?php echo $GetRec['Rec_Field3']; ?>:</label></div></div>
    <div class="gridFormField"><div class="gridFormFieldItem"><input class="formfields" name="FullName" value="<?php echo $FullName; ?>" ></div></div>
    <div style="clear:both;"></div>
  </div>

  <!-- phone -->
  <div class="formRow">
    <div class="gridFormLabel"><div class="gridFormLabelItem"><label class="formtext"><?php echo $GetRec['Rec_Field4']; ?>:</label></div></div>
    <div class="gridFormField"><div class="gridFormFieldItem"><input class="formfields" name="Phone" data-validation="number" data-validation-optional="true" value="<?php echo $Phone; ?>" ></div></div>
    <div style="clear:both;"></div>
  </div>

  <!-- message -->
  <div class="formRow">
    <div class="gridFormLabel"><div class="gridFormLabelItem"><label class="formtext"><?php echo $GetRec['Rec_Field23']; ?> *:</label></div></div>
    <div class="gridFormField"><div class="gridFormFieldItem"><textarea class="formfields" name="Comments" data-validation="required"><?php echo getparamvalue('Comments'); ?></textarea></div></div>
<div style="clear:both;"></div>
  </div>

     <!-- gdpr -->
  <div class="formRow">
    <div class="gridFormLabel"><div class="gridFormLabelItem"><input class="formfields" type="checkbox" name="Accept" data-validation="required" value="<?php echo $GetRec['Rec_Field22']; ?>" ></div></div>
    <div class="gridFormField"><div class="gridFormFieldItem"><label class="formtext"><?php echo $GetRec['Rec_Field22']; ?></label></div></div>
    <div style="clear:both;"></div>
  </div>

    <!-- Security Code -->
  <div class="formRow">
   <div class="gridFormLabel"><div class="gridFormLabelItem"><label class="formtext"><?php echo $GetRec['Rec_Field24']; ?> *:
 <?php
		      	//How many letters/numbers must the code be
					$number_of_letters=5;
					$secret_text="";
			  		for ($i=0; $i<$number_of_letters; $i++){
						$ntext=rand(1,60);
					echo "<img src=".$rootURL."elements/form/$ntext.jpg width=20 height=20 style='width:20px;'>";
		 			switch ($ntext){
					 case 10: $ntext="0";	break;
					 case 11: $ntext="A";	break;
					 case 12: $ntext="B";	break;
					 case 13: $ntext="C";	break;
					 case 14: $ntext="D";	break;
					 case 15: $ntext="E";	break;
					 case 16: $ntext="F";	break;
					 case 17: $ntext="G";	break;
					 case 18: $ntext="H";	break;
					 case 19: $ntext="J";	break;
					 case 20: $ntext="K";	break;
					 case 21: $ntext="L";	break;
					 case 22: $ntext="M";	break;
					 case 23: $ntext="N";	break;
					 case 24: $ntext="O";	break;
					 case 25: $ntext="P";	break;
					 case 26: $ntext="Q";	break;
					 case 27: $ntext="R";	break;
					 case 28: $ntext="S";	break;
					 case 29: $ntext="T";	break;
					 case 30: $ntext="U";	break;
					 case 31: $ntext="V";	break;
					 case 32: $ntext="W";	break;
					 case 33: $ntext="X";	break;
					 case 34: $ntext="Y";	break;
					 case 35: $ntext="Z";	break;
					 case 36: $ntext="a";	break;
					 case 37: $ntext="b";	break;
					 case 38: $ntext="c";	break;
					 case 39: $ntext="d";	break;
					 case 40: $ntext="e";	break;
					 case 41: $ntext="f";	break;
					 case 42: $ntext="g";	break;
					 case 43: $ntext="h";	break;
					 case 44: $ntext="i";	break;
					 case 45: $ntext="j";	break;
					 case 46: $ntext="k";	break;
					 case 47: $ntext="m";	break;
					 case 48: $ntext="n";	break;
					 case 49: $ntext="o";	break;
					 case 50: $ntext="p";	break;
					 case 51: $ntext="q";	break;
					 case 52: $ntext="r";	break;
					 case 53: $ntext="s";	break;
					 case 54: $ntext="t";	break;
					 case 55: $ntext="u";	break;
					 case 56: $ntext="v";	break;
					 case 57: $ntext="w";	break;
					 case 58: $ntext="x";	break;
					 case 59: $ntext="y";	break;
					 case 60: $ntext="z";	break;
					} // end switch
				$secret_text=$secret_text.$ntext;
				}	// end for
				?>
       </label> </div></div>
       <input type="hidden" class="formfields" name="secret_text" value="<?php echo $secret_text;?>">
    <div class="gridFormField"><div class="gridFormFieldItem">
    <input name="user_text" type="text" class="formfields" id="name" required size="40">
          </div></div>
          <div style="clear:both;"></div>
  </div>

    <!-- Submit -->
  <div class="formRow top20">
    <input type="submit" class="formsubmit" value="<?php echo $GetRec['Rec_Field26']; ?>">
<!-- required info -->
	 <label class="formrequired"><?php echo $GetRec['Rec_Field28']; ?></label>
  </div>
</form>
<?php } ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
  $.validate({
 modules : 'security'
  });
</script>
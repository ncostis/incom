<?php

if(isset($GetModRec))

    $room = $GetModRec;

else

    $room = $GetRec;

?>



<?php if($room["Rec_Field3"]<>""){?>

<div class="accInfoItem accInfoPersons">

	<?=$capacity?>: <?php include($path."library/lists/acc_persons.php")?>

</div>

<?php }?>

<?php if($room["Rec_Field2"]<>""){?>

<div class="accInfoItem">
    <div class="accSize"><?=$room["Rec_Field2"]?></div>
</div>

<?php }?>


<?php if($room["Rec_Image4"]<>""){?>

<div class="accInfoItem">

	Top View:&nbsp;&nbsp;&nbsp;<a href="<?=$rootURL."uploads/images/".$room["Rec_Image4"]?>" class="fancybox"><div class="floorPlanIcon"></div></a>

</div>

<?php }?>
<?php

if($GetRec["Rec_Field28"]!=""){

	$link = $GetRec["Rec_Field28"];

	if($link[0].$link[1].$link[2].$link[3] !="http") $link = $siteURL.$link;

	echo "<a href=\"$link\" target=\"_blank\" class=\"offersbutton\">".$GetRec["Rec_Field1"]."</a>";

}

?>
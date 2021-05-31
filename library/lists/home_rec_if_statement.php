<?php
global $showHomeRecord;
$showHomeRecord = 0;

//if () {

	// SHOW RECORD
	if ($ModRecID > 0) {
		// DISPLAY REC LIST
        // ****************
        if ($ModRecID > 0) {
            $modListTemp = ""; // clear vars from other incuded module_page.php
			$modListTemp2 = "";
            $dModPageID = "";
            $ModPageID = "";
            $GetRecMod_Sel = "SELECT * FROM records,pages WHERE Rec_ID = $ModRecID AND Page_ID = Rec_Page_ID AND (Rec_GeoLocation like '%$getgeoloc%' OR Rec_GeoLocation = '') AND Rec_GeoLocation not like '%$getgeolocBlock%'";
            $GetRecMod_Query = q($GetRecMod_Sel);
            $GetRecMod = f($GetRecMod_Query);

            $RecMod_ID = $GetRecMod['Rec_ID'];
            $RecView = $GetRecMod['Rec_View'];
            $recImCat = $GetRecMod['Rec_Img_Cat_ID'];
            $numphotosH = $GetRecMod['Num_HPhotos'];
            $Page_Rec_Temp = $GetRecMod['Page_Rec_Temp'];
            $recImCatNR = $GetRecMod['Rec_NoResImg_Cat_ID'];
            $startat = $GetRec['StartAt_Photos'];
            $repeatrow = $GetRec['RepeatRow_Photos'];
            $ednum = 1; // editor number

            $pagename = $path . "views/module_page.php";
            require "$pagename";
            $flagModList = 0;
        } // if
	}

// } // if statement 
?>
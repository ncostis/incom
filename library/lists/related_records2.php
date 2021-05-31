<!-- Σχετικές Εγγραφές -->
<!-- ***************** -->
<script>
$(document).ready(function(){
$('.relatedRecsArea').bxSlider({
    controlsphotos: true,
    pager:false,
    speed:2500,
    controls: true,
    autoHover: true,
    slideWidth:800,
    minSlides: 5,
    maxSlides: 5,
    infiniteLoop: false,
    autoStart: true,
    auto:false,
    pause: 2500,
    startSlide: 0,
    slideMargin: 15
});

$('.relatedRecsAreaMobile').bxSlider({
    pager:false,
    controls: true,
    slideWidth: 480,
    minSlides: 1,
    maxSlides: 1,
    infiniteLoop: false,
    autoStart: true,
    auto:false,
    pause: 4000,
    startSlide: 0,
    slideMargin: 10
});
});
</script>
<?php
$RelRecs_Sel = "SELECT * FROM related_records WHERE Rec_Table = 2 AND Rec_ID = $Rec_ID LIMIT $StartAt,$limitRecs";
$RelRecs_Query = q($RelRecs_Sel);
if (nr($RelRecs_Query) > 0) {
		$numRec = 0;

	if ($mobileMode <> 1){
		print "<div class=\"relatedRecsArea\">";
	} else{
		print "<div class=\"relatedRecsAreaMobile\">";
	}

        while ($RelRec = f($RelRecs_Query)) {
            $GetRecMod_Sel = "SELECT * FROM pages,records WHERE Rec_ID = ".$RelRec["Related_Rec_ID"]." AND Page_ID = Rec_Page_ID";
            $GetRecMod_Query = q($GetRecMod_Sel);

			// GET MODULE LIST - SCRIPT
			$flagModList = 1;
			$num = 0;
			if ($mobileMode == 1) $numModColumns = $numModColumnsMob; // Mobile Version
			// when a module_page include another module page, hold the $modListTemp var
			$curModListTemp = $modListTemp;
			$curModListTemp2 = $modListTemp2;
			$changeTemp = 0;


			while ($GetRecMod = f($GetRecMod_Query)) {

				$numRec = $numRec + 1;
				$num = $num + 1;

				$RecMod_ID = $GetRecMod['Rec_ID'];
				$RecView = $GetRecMod['Rec_View'];
				$recImCat = $GetRecMod['Rec_Img_Cat_ID'];
				$Page_Rec_Temp = $GetRecMod['Page_Rec_Temp'];
				if ($mobileMode == 1) $Page_Rec_Temp = $GetRecMod['Page_Rec_Mob']; // If Mobile Version
				$recImCatNR = $GetRecMod['Rec_NoResImg_Cat_ID'];
				$startat = $GetRec['StartAt_Photos'];
				$repeatrow = $GetRec['RepeatRow_Photos'];
				$ednum = 1; // editor number

				// RESPONSIVE DESIGN
					if ($modListsDivClass <> "") {
						print "\n<div class=\"$modListsDivClass\">\n";
						if ($modItemDivClass <> "") print "\n<div class=\"$modItemDivClass\">\n";
					}

					if ($modListTemp <> $curModListTemp) $modListTemp = $curModListTemp;
					if (($curModListTemp2 > 0) AND ($modListTemp <> $curModListTemp)) $modListTemp2 = $curModListTemp2;

					// check if exist a second List Temp
					if (($curModListTemp2 <> $curModListTemp) AND ($curModListTemp2 > 0)) {
						if ($changeLTemp == 0) {
							$changeLTemp++;
						} else {
							$modListTemp = $curModListTemp2;
							$changeLTemp = 0;
						}
					}

					$pagename = $path . "views/module_list_page.php";
					require "$pagename";

					if ($modListsDivClass <> "") print "\n</div>\n";
					if ($modItemDivClass <> "") print "\n</div>";


				} // end of while


				$flagModList = 0;

		} // while
		print "</div>";
		print "\n<div style=\"clear:both;\"></div>\n";

} //nr ?>
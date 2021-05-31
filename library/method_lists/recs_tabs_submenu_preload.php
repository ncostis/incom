<?php
	global $groupRecNum;
	
	$ID = $pView;
	$GetRoutePage_Sel = "SELECT * FROM pages WHERE Page_View = '$ID'";
	$GetRoutePage_Query = q($GetRoutePage_Sel);
	$GetRoutePage = f($GetRoutePage_Query);
	$Page_ID = $GetRoutePage['Page_ID'];
	if ($GetRoutePage["Page_OrderBy"] == "") { $orderString = "Order by Rec_DateStart Desc"; } else { $orderString = "order by ".$GetRoutePage["Page_OrderBy"]." ".$GetRoutePage["Page_SortBy"]; }

	$GetRecsMenu_Sel = "SELECT records.* FROM pages, records WHERE Page_ID = $Page_ID AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 UNION SELECT records.* FROM pages, records, related_pages WHERE Related_Page_ID = '$Page_ID' AND Rec_ID = Related_Rec_ID AND Related_Page_ID = Page_ID AND Rec_Active = 0 GROUP BY Rec_ID $orderString";
	$GetRecsMenu_Query = q($GetRecsMenu_Sel);
	$numdivs = nr($GetRecsMenu_Query);
	$nodivRecMenu = 0;
	$groupRecLetters = "KLMNOP";
	$groupRec = substr($groupRecLetters, $groupRecNum, 1);
	$groupRecNum = $groupRecNum + 1;
?>
	<div class="width980"> 
	<?php while($GetMenu = f($GetRecsMenu_Query)) { 
		if ($nodivRecMenu == 0) { $tabButton = "tabButtonSel"; } else { $tabButton = "tabButton"; }
		if ($nodivRecMenu == 0) { $left = "left"; } else { $left = "left5"; } ?>
		<div class="<?php echo $left; ?>"><a href="javascript:showDivTabbed(<?php print "$nodivRecMenu,$numdivs,'$groupRec'";?>)" id="tabLink<?php echo $groupRec.$nodivRecMenu; ?>" class="<?php echo $tabButton; ?>"><?php echo $GetMenu['Rec_Title'];?></a></div>
	<?php $nodivRecMenu = $nodivRecMenu + 1; ?>
	<?php } // end of while ?>
	<div style="clear:both;"></div> 
    </div>
	
    <div style="padding-top:20px;">
	<?php 
	// SHOW ALL RECORDS FROM FIRST MENU TAB
	$GetRecs_Sel = "SELECT records.* FROM pages, records WHERE Page_ID = $Page_ID AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0 UNION SELECT records.* FROM pages, records, related_pages WHERE Related_Page_ID = '$Page_ID' AND Rec_ID = Related_Rec_ID AND Related_Page_ID = Page_ID AND Rec_Active = 0 GROUP BY Rec_ID $orderString";
	$GetRecs_Query = q($GetRecs_Sel);
	$nodivRecTab = 0;
	
	while($GetRec = f($GetRecs_Query)) {
	
	$Rec_ID = $GetRec['Rec_ID'];
	$RecView = $GetRec['Rec_View'];
	$recImCat = $GetRec['Rec_Img_Cat_ID'];
	$numphotosH = $GetRec['Num_HPhotos'];
	$recImCatNR = $GetRec['Rec_NoResImg_Cat_ID'];
	if ($numphotosH == "") $numphotosH = 100;
	$numphotosV = $GetRec['Num_VPhotos'];
	if ($numphotosV == "") $numphotosV = 100;
	$ednum = 1; // editor number
	?>
	<div id="divTab<?php echo $groupRec.$nodivRecTab;?>" <?php if ($nodivRecTab ==0) { print "style='display:block;'"; } else { print "style='display:none;'"; }?>>
	<?php
		// if record has a default display then choose display from category
		if ($RecView == '1') $RecTempID = $Page_Rec_Temp; else $RecTempID = $RecView;
		if ($mobileMode == '1') { // Mobile Version
			if ($GetRec['Rec_View_Mob'] == '1') $RecTempID = $GetRec['Page_Rec_Mob']; else $RecTempID = $GetRec['Rec_View_Mob'];
		}
		$pagename = $path."views/page.php";
		require "$pagename";
	?>
	</div>
	<?php 
	$nodivRecTab = $nodivRecTab + 1;
	} // end of while ?>
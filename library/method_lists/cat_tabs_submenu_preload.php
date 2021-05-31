<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
	// Build Sub Menu
	global $groupnum;
	
	$ID = $pView;
	$GetRoutePage_Sel = "SELECT * FROM pages WHERE Page_View = '$ID'";
	$GetRoutePage_Query = q($GetRoutePage_Sel);
	$GetRoutePage = f($GetRoutePage_Query);
	if ($GetRoutePage["Page_OrderBy"] == "") { $orderString = "Order by Page_Order"; } else { $orderString = "order by ".$GetRoutePage["Page_OrderBy"]." ".$GetRoutePage["Page_SortBy"]; }
	
	$GetPages_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = ".$GetRoutePage["Page_ID"]." $orderString";
	$GetPages_Query = q($GetPages_Sel);
	$numdivs = nr($GetPages_Query);
	$nodivMenu = 0;
	//Creates Group tabs in order to dislay multiple tabs from different categories
	$groupLetters = "ABCDEF";
	$group = substr($groupLetters, $groupnum, 1);
	$groupnum = $groupnum + 1;
?>
	<div style="width:<?php echo $GetVar['Rec_Field19']; ?>; margin:0 auto;" class="tabsButtons">     
	<?php while($GetMenu = f($GetPages_Query)) { 
		if ($nodivMenu == 0) { $tabButton = "tabButton tabButtonSel"; } else { $tabButton = "tabButton"; }?>
		<a href="javascript:showDivTabbed(<?php print "$nodivMenu,$numdivs,'$group'";?>)" id="tabLink<?php echo $group.$nodivMenu; ?>" class="<?php echo $tabButton; ?>"><?php echo $GetMenu['Page_Name'];?></a>
	<?php $nodivMenu = $nodivMenu + 1;
	} // end of while ?>
    <div style="clear:both;"></div> 
	</div>
	
    <div style="padding-top:20px;">
	<?php // SHOW RECORDS FROM PAGES 
	$GetPage_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = ".$GetRoutePage["Page_ID"]." $orderString";


	$GetPage_Query = q($GetPage_Sel);
	$nodivTab = 0;
	$orderString = "";
	
	while ($GetPage = f($GetPage_Query)) {
		$Page_Type = $GetPage['Page_Type'];
		if ($mobileMode == 1) $Page_Type = $GetPage['Page_Type_Mob']; // If Mobile Version
		$Page_Rec_Temp = $GetPage['Page_Rec_Temp'];
		if ($mobileMode == 1) $Page_Rec_Temp = $GetPage['Page_Rec_Mob']; // If Mobile Version
		$Page_Enable = $GetPage["Page_Enable"];
		$Page_ID = $GetPage['Page_ID'];
		$pView = $GetPage['Page_View'];
		$ID = $pView;
		$Page_List_ID = $GetPage["Page_List_ID"];
		// Page_Lists_Temp
		$Page_Lists_Temp = $GetPage["Page_Lists_Temp"];
		if ($GetPage["Page_Lists_Temp2"] > 0) $Page_Lists_Temp2 = $GetPage["Page_Lists_Temp2"]; else $Page_Lists_Temp2 = $GetPage["Page_Lists_Temp"];
	
		if ($mobileMode == 1) {
			$Page_Lists_Temp = $GetPage["Page_Lists_Mob"];
			if ($GetAllPages["Page_Lists_Mob2"] > 0) $Page_Lists_Temp2 = $GetPage["Page_Lists_Mob2"]; else $Page_Lists_Temp2 = $GetPage["Page_Lists_Mob"];
	
		}
		
		if ($GetPage["Page_OrderBy"] == "") { $orderString = "Order by Rec_DateStart Desc"; } else { $orderString = "order by ".$GetPage["Page_OrderBy"]." ".$GetPage["Page_SortBy"]; }
		
				$GetRecs_Sel = "SELECT FROM pages, records WHERE Page_ID = $GetPage[Page_ID] AND Rec_Page_ID = $GetPage[Page_ID] AND Rec_Page_Content = 0 	AND Rec_Active = 0 $orderString";



		$GetRecs_Query = q($GetRecs_Sel);
		?>
		<div id="divTab<?php echo $group.$nodivTab;?>"  class="accListRoomsCont flexBox" <?php if ($nodivTab ==0) { print ""; } else { print "style='display:none;'"; }?>>
		<?php
			//$pagename = $path."library/page.php";
            $pagename = "categories_rooms.php";
			require "$pagename";
		?>
		</div>
		<?php 
		$nodivTab = $nodivTab + 1;
	} // end of while ?>
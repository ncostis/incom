<?php 
	//Choose layout
	$Layout_Sel = "SELECT * FROM build_layout, build_layout_rows WHERE BLayout_ID = $LayoutID AND BLR_Temp_ID = BLayout_ID";
	$Layout_Query = q($Layout_Sel); 
	$Layout = f($Layout_Query);
	$numfieldsBL = $Layout['BLayout_Fields'];
	$BLR_Temp_ID = $Layout['BLR_Temp_ID'];
	
	// Choose Style in Body Level
	$Container_Sel = "SELECT * FROM styles WHERE css_ID = $Layout[BLR_Temp_Style_ID]";
	$Container_Query = q($Container_Sel); 
	$ContainerStyle = f($Container_Query);
	
	//Find out max number of ROW 
	$Rows_Sel = "SELECT max(BLR_Rows) as maxrow FROM build_layout_rows WHERE BLR_Temp_ID = $BLR_Temp_ID";
	$Rows_Query = q($Rows_Sel);
	$GetNumRows = f($Rows_Query);
	$maxrow = $GetNumRows['maxrow'];

	// GET DEFAULT FONT
	$GetFonts_Sel = "SELECT * FROM fonts WHERE Font_Langs like '%".$Lang."%' AND Default_Font = 1";
	$GetFonts_Query = q($GetFonts_Sel);
	$GetFonts = f($GetFonts_Query);
	$Font = $GetFonts['Font_Name'];
	$layoutTextSize = $GetFonts['Font_Size'];
	
	$layoutBackColor = $LayoutStyle['Back_Color'];
	$layoutFontWeight = $LayoutStyle['Body_Font_Weight'];
	$layoutBodyText = $LayoutStyle['Body_Text'];
	$layoutLineHeight = $LayoutStyle['Body_Line_Height']."px";

	// GET MOBILE DEFAULT FONT
	if ($mobileMode == 1) {
		$GetFontsMob_Sel = "SELECT * FROM fonts WHERE Font_Langs like '%".$Lang."%' AND Default_FontMob = 1";
		$GetFontsMob_Query = q($GetFontsMob_Sel);
		$GetFontsMob = f($GetFontsMob_Query);
		if (nr($GetFontsMob_Query) > 0) {
			$Font = $GetFontsMob['Font_Name'];
			$layoutTextSize = $GetFontsMob['Font_SizeMob'];
		}
		
		$layoutBackColor = $LayoutStyle['Back_ColorMob'];
		$layoutFontWeight = $LayoutStyle['Body_Font_WeightMob'];
		$layoutBodyText = $LayoutStyle['Body_TextMob'];
		$layoutLineHeight = $LayoutStyle['Body_Line_HeightMob']."px";
	}
?>
<style type="text/css"> 
body { padding:0; margin: 0; overflow-x:hidden;	<?php print "background-color:#$layoutBackColor;"; ?> <?php if ($LayoutStyle['Back_Image'] <> "") print " background-image: url($Path_Image_Layout_Styles$LayoutStyle[Back_Image]);"; ?> <?php if ($LayoutStyle['Back_Image'] <> "") print " background-repeat:$LayoutStyle[Back_Repeat];"; ?> <?php if ($LayoutStyle['Back_css_Div'] <> "") print " $LayoutStyle[Back_css_Div]"; ?> }
#ul,li { margin:0; padding-bottom:10px; border:0; outline:0; font-size:100%; vertical-align:baseline; margin-left:12px; }
<?php 
print "body,td,th,p,li,div {font-family:$Font; font-size:$layoutTextSize; line-height:$layoutLineHeight; font-weight:$layoutFontWeight; color:#$layoutBodyText;}\n"; 
?>
#mainContainer { width:<?php echo $Layout['BLR_Temp_Width']; ?>; margin:<?php echo $Layout['BLR_Temp_Margin']; ?>; padding:<?php echo $Layout['BLR_Temp_Padding']; ?>; height:auto;	text-align:left; margin:auto;	position:relative;<?php if ($ContainerStyle['css_Back_Image'] <> "") print "background-image: url($Path_Image_Styles$ContainerStyle[css_Back_Image]); "; ?><?php if ($ContainerStyle['css_Back_Repeat'] <> "") print "background-repeat: $ContainerStyle[css_Back_Repeat]; "; ?><?php if ($ContainerStyle['css_Div'] <> "") print "$ContainerStyle[css_Div]; "; ?><?php if ($Layout['BLR_Temp_Css'] <> "") print "$Layout[BLR_Temp_Css] ";?> } 
<?php // RESPONSIVE DESIGN
if ($GetVar['Rec_ShowHome'] == 1) { ?>
img { max-width: 100%; height: auto; auto\9; /* ie8 */ }
.col { display: block; float:left; }
@media only screen and (max-width: 480px) { .col { width: 100%; clear:both; } }
<?php } // if ?>
<?php 
for ($rows=1; $rows<=$maxrow; $rows++) {
	//Select Rows
	$CurRow_Sel = "SELECT * FROM build_layout_rows WHERE BLR_Temp_ID = $BLR_Temp_ID AND BLR_Rows = $rows Limit 0,1";
	$CurRow_Query = q($CurRow_Sel);
	$CurRow = f($CurRow_Query);
	$numcols = $CurRow['BLR_Cols'];
	$BLR_Row_Width = $CurRow['BLR_Row_Width'];
	$LayerRow = "LayerRow".$rows; // Create each Row at independable id
	$BLRRowActive = $CurRow['BLR_Row_Active'];

    if ($BLRRowActive == 1) { // Active Row
		
	// ******** BUILD ROWS ********
	// It means  float:left; display:inline; and creates id belong to $LayerRow
	// if ($numcols > 1) it doesnt create float
		print"#$LayerRow {display:block;position:relative;";
				if ($CurRow['BLR_Row_Width'] <> "") print "width:$CurRow[BLR_Row_Width];";
				if ($GetVar['Rec_ShowHome'] == 1) print "max-width:100%;";
				if ($CurRow['BLR_Row_PaddBottom'] <> "") print "padding-bottom:$CurRow[BLR_Row_PaddBottom];";
				if ($CurRow['BLR_Row_Css'] <> "") print "$CurRow[BLR_Row_Css]";
		print "}";
		
		for ($cell=1; $cell<=$numcols; $cell++) {
			
			//Select CELLS in each ROW
			$CurCell_Sel = "SELECT * FROM build_layout_rows WHERE BLR_Temp_ID = $BLR_Temp_ID AND BLR_Rows = $rows AND BLR_Cell = $cell";
			$CurCell_Query = q($CurCell_Sel);
			$CurCell = f($CurCell_Query);
			$LayerCell = "LR".$rows."_C".$cell;
			print " #$LayerRow #$LayerCell {display:block;";
					
					if ($CurCell['BLR_Cell_Css'] <> "") print "$CurCell[BLR_Cell_Css]  ";
					if ($numcols > 1) print "float:left; ";
					print "}\n";
			//If there is Distance Between Columns then leaves padding between them
			if ($CurRow['BLR_Row_SepDiv'] <> "") { 
				if (($cell >= 1) AND ($cell < $numcols)) {
					print "#$LayerRow #LRCSep$cell {display:block;width:$CurRow[BLR_Row_SepDiv];float:left;}\n";
				}
			}
		} // end of for $cell	
	} // Row Active
} //end of for rows ?>
</style>
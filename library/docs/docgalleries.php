<?php

/********* GET PARENT DOCS **********/

function subDoc_gallery($Rec_ID,$PDoc_ID,$cp,$bullet,$padleft,$path){
	$select_subquery = "Select * FROM docs WHERE Doc_Rec_ID = $Rec_ID AND Parent_Doc_ID = $PDoc_ID AND Doc_Enable = 1 Order by Doc_Order, binary Doc_Title";
	$subDocs_Query = q($select_subquery);
	$sdnum = nr( $subDocs_Query );
	$Path_Docs = $rootURL."uploads/docs/";
	$Path_DocsCheck = $path."uploads/docs/";
	$LibraryImages = $rootURL."library/elements";
if ($sdnum > 0) 	{
	print "<div style='padding-left: $padleft;'>";
	if ($bullet == 1){ $prbull = " "; } else { $prbull = ""; }
	print "<ul>";

	while($GetSubDocs = f( $subDocs_Query )) 	{
		$file = $Path_Docs.$GetSubDocs["Doc_Name"];
		$filePath = $Path_DocsCheck.$GetSubDocs["Doc_Name"];
		print "<li>";
		if ($GetSubDocs["Doc_Name"] <> ''){
			$fileSizePr = (int)(filesize($filePath)/1000);
			$icon = getDocIcon($GetSubDocs["Doc_Name"]);

			print "<a href=\"$file\" alt='linksdocs' target='_blank' class='bodylinks'>".$GetSubDocs["Doc_Title"]."</a>";
			if ($GetSubDocs["Doc_Desc"]<>'') { print "<div id='top3'>".$GetSubDocs["Doc_Desc"]."</div>"; }
			print "<div id='top5'><a href=\"$file\" alt='linksdocs' target='_blank'><img src=\"$LibraryImages/$icon\" id='photo' alt='' border='0'></a> ($fileSizePr KB)</div>";
		} else {
			if ($GetSubDocs["Doc_URL"] == ''){
				print "<div id='top3'>$prbull <b>".$GetSubDocs["Doc_Title"]."</b></div>";
				if ($GetSubDocs["Doc_Desc"]<>'') { print "<div id='top3'>".$GetSubDocs["Doc_Desc"]."</div>"; }
			} else {
				print "<div id='top3'>$prbull <a href=\"".$GetSubDocs["Doc_URL"]."\" alt='linksdocs' target='_blank'>".$GetSubDocs["Doc_Title"]."</a></div>";
				if ($GetSubDocs["Doc_Desc"]<>'') { print "<div id='top3'>".$GetSubDocs["Doc_Desc"]."</div>"; }
			}
		}
		print "</li>";
	}
	print "</ul>";
	print "</div>";
}//end of if num
}//end of function


function subDoc_gallery2($Rec_ID,$PDoc_ID,$cp,$bullet,$padleft,$path){
	$select_subquery = "Select * FROM docs2 WHERE Doc_Rec_ID = $Rec_ID AND Parent_Doc_ID = $PDoc_ID AND Doc_Enable = 1 Order by Doc_Order, binary Doc_Title";
	$subDocs_Query = q($select_subquery);
	$sdnum = nr( $subDocs_Query );
	$Path_Docs2 = $rootURL."uploads/docs2/";
	$Path_DocsCheck2 = $path."uploads/docs2/";
	$LibraryImages = $rootURL."library/elements";
if ($sdnum > 0)
	{
	print "<div style='padding-left: $padleft;'>";
	if ($bullet == 1){ $prbull = " "; } else { $prbull = ""; }
	print "<ul>";
	while($GetSubDocs = f( $subDocs_Query ))
	{
		$file = $Path_Docs2.$GetSubDocs["Doc_Name"];
		$filePath = $Path_DocsCheck2.$GetSubDocs["Doc_Name"];
		print "<li>";
		if ($GetSubDocs["Doc_Name"] <> ''){
			$fileSizePr = (int)(filesize($filePath)/1000);
			$icon = getDocIcon($GetSubDocs["Doc_Name"]);

			print "<div id='top5'><a href=\"$file\" alt='linksdocs' target='_blank' class='bodylinks'>".$GetSubDocs["Doc_Title"]."</a></div>";
			if ($GetSubDocs["Doc_Desc"]<>'') { print "<div id='top3'>".$GetSubDocs["Doc_Desc"]."</div>"; }
			print "<div id='top5'><a href=\"$file\" alt='linksdocs' target='_blank'><img src=\"$LibraryImages/$icon\" id='photo' alt='' border='0'></a> ($fileSizePr KB)</div>";
		} else {
			if ($GetSubDocs["Doc_URL"] == ''){
				print "<div id='top3'>$prbull <b>".$GetSubDocs["Doc_Title"]."</b></div>";
				if ($GetSubDocs["Doc_Desc"]<>'') { print "<div id='top3'>".$GetSubDocs["Doc_Desc"]."</div>"; }
			} else {
				print "<div id='top3'>$prbull <a href=\"".$GetSubDocs["Doc_URL"]."\" alt='linksdocs' target='_blank'>".$GetSubDocs["Doc_Title"]."</a></div>";
				if ($GetSubDocs["Doc_Desc"]<>'') { print "<div id='top3'>".$GetSubDocs["Doc_Desc"]."</div>"; }
			}
		}
		print "</li>";
	}
	print "</ul>";
	print "</div>";
}//end of if num
}//end of function


/********* GET DOC ICON **********/

function getDocIcon($DocName){
	$letters = strlen($DocName);
	$letPos = $letters - 3;
	$typefile = substr($DocName, $letPos, 3);
	if ($typefile == 'zip') $icon = "zip.gif";
		elseif ($typefile == 'pdf') $icon = "pdf.png";
		elseif ($typefile == 'doc') $icon = "doc.png";
		elseif ($typefile == 'ocx') $icon = "doc.png"; //docx
		elseif ($typefile == 'xls') $icon = "xls.png";
		elseif ($typefile == 'lsx') $icon = "xls.png"; //xlsx
		elseif ($typefile == 'jpg') $icon = "img.png";
		elseif ($typefile == 'gif') $icon = "img.png";
		elseif ($typefile == 'mp3') $icon = "mp3.gif";
		else $icon = "file.gif";
	return $icon;
}
?>
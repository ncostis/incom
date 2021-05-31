<?php
function getImageDimensions($CreatedImage, $imagePath=null){
    if($CreatedImage==null) return [null,null];

    if(imagesx($CreatedImage)==false && $imagePath!=null ){
        $result = getimagesize($imagePath);
        if($result!==false){ //jpeg
            return [$result[0],$result[1]];
        }
    }
    return [imagesx($CreatedImage), imagesy($CreatedImage)]; //webp
}

function generateImgForWidthnHeight($ImageType,$filepath){
    //Let's check allowed $ImageType, we use PHP SWITCH statement here
    switch (strtolower($ImageType)) {
        case 'png':
            //Create a new image from file
            $CreatedImage = imagecreatefrompng($filepath);
            break;
        case 'gif':
            $CreatedImage = imagecreatefromgif($filepath);
            break;
        case 'jpeg':
        case 'pjpeg':
        case 'jpg':
            $CreatedImage = imagecreatefromjpeg($filepath);
            break;
        case 'webp':
            $CreatedImage = imagecreatefromwebp($filepath);
        break;
        default:
            //die('Unsupported File!'); //output error and exit
    }
    return $CreatedImage;
}

/*********** GET LARGEST AVAILABLE PHOTO (GALLERY) ***********/
function getLargestPhotoAvail($file_path,$fileName)
{
    global $path;
    $dimensions=generateDimensions();
    foreach ($dimensions as $folder => $value) {
         if(file_exists($path.$file_path . $folder."/".$fileName) && !is_dir($path.$file_path . $folder."/".$fileName)){
            $imageFilePath=$file_path . $folder."/".$fileName;
            break;
        }
    }
    return $imageFilePath;
}


// This function will generate an associative array with the available image dimensions
// ***********************************************************************************
function generateDimensions()
{
    $dimensions=array();
    $re = q("SELECT * FROM img_dimensions WHERE ImgDim_Active=1 Order by ImgDim_Width DESC");
    while($GetDimensions = f($re)){
        $dimensions[$GetDimensions['ImgDim_Name']]=array("width"=>$GetDimensions['ImgDim_Width'],"height"=>$GetDimensions['ImgDim_Height'],"breakpoint"=>$GetDimensions['ImgDim_Breakpoint']);
    }
    return $dimensions;
}

/*********** EDIT PAGE ***********/

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
    $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

    switch ($theType) {
        case "text":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;
        case "long":
        case "int":
            $theValue = ($theValue != "") ? intval($theValue) : "NULL";
            break;
        case "double":
            $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
            break;
        case "date":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;
        case "defined":
            $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
            break;
    }
    return $theValue;
}


function buildHref($href,$recNameHref,$siteURL)
{
    if ((strpos($href, 'ww.') > 0) OR (strpos($href, 'ttp') > 0)) {
        if (strpos($href, 'ttp') == 0) $href = "https://" . $href;
    } elseif (strpos($href, 'Field') > 0) {
        if ((strpos($recNameHref, 'ww.') > 0) OR (strpos($recNameHref, 'ttp') > 0)) {
            $href = $recNameHref;
            if (strpos($href, 'ttp') == 0) $href = "https://" . $href;
        } else {
            $href = $recNameHref;
            if (($href <> "") AND (strpos($href, 'ttp') == 0)) $href = $siteURL . $href;
        }
    } else {
        if ($href <> "") $href = $siteURL . $href;
    }
    return $href;
}


/*********** CALCULATE WIDTH ***********/
function calculateWidth($LTR_Temp_ID, $rows, $numcols, $RowSepDist)
{
    for ($cell = 1; $cell <= $numcols; $cell++) {
        $Column_Sel = "SELECT * FROM lists_templates_rows WHERE LTR_Temp_ID = $LTR_Temp_ID AND LTR_Rows = $rows AND LTR_Cell = $cell";
        $Column_Query = q($Column_Sel);
        $GetColumn = f($Column_Query);
        $ColWidth = $GetColumn['LTR_Width'];
        if ($ColWidth <> "") $widthRow = $widthRow + $ColWidth;
    }
    $SepDist = ($RowSepDist * $numcols) - $RowSepDist;
    //$widthRow = $widthRow + $SepDist;
    return $SepDist;
}


/*********** ATTACH FILE ***********/

function attachfile($Rec_ID, $kb, $linktitle, $padding, $color)
{
    require_once $path . "_cm_admin/initvars.php";
    $Rec_Sel = "SELECT * FROM records WHERE Rec_ID=$Rec_ID";
    $Rec_Query = q($Rec_Sel);
    $GetFile = f($Rec_Query);
    if ($GetFile['Rec_File1'] <> '') {
        $file = $Path_File . $GetFile['Rec_File1'];
        $fileSizePr = (int)(filesize($file) / 1000);
        $icon = getDocIcon($GetFile["Rec_File1"]);
        print "<div style='padding-top:8px;'></div>";
        print "<table width='100%' border='0' cellspacing='0' cellpadding='$padding'>";
        print "<tr><td bgcolor='$color'>";
        if ($kb == 1) print " ($fileSizePr KB)<a href=\"$file\" alt='' target='_blank' class='bodylinks'><img src=\"$LibraryImages/$icon\" id='photo' alt='' border='0'>$linktitle</a>";
        if ($kb == 2) print " <a href=\"$file\" alt='' target='_blank' class='bodylinks'><img src=\"$LibraryImages/$icon\" id='photo' alt='($fileSizePr KB)' border='0'>$linktitle</a>";
        print "</td></tr>";
        print "</table>";
    }
} // end of function attachfile


/********** ROOT LINKS ************/

function pageparent($pageID, $siteURL)
{
    global $f_ppID, $f_pID, $finalPath, $Page_ID;
    $select_query = "SELECT * FROM pages WHERE Page_ID=$pageID";
    $gParent_result = q($select_query);
    $gparent = f($gParent_result);
    $f_ppID = $gparent['Parent_Page_ID'];
    $f_pID = $gparent['Page_ID'];
    $f_Page_View = $gparent["Page_View"];
    if ($f_pID == $Page_ID) $rootlinks = "rootlinksSel"; else $rootlinks = "rootlinks";
    $prPath = "<a href=\"$siteURL$f_Page_View\" class='$rootlinks'>" . $gparent['Page_Name'] . "</a>";
    if ($finalPath <> "") {
        $finalPath = $prPath . " &raquo; " . $finalPath;
    } else {
        $finalPath = $prPath;
    }

    $select_parent = "SELECT * FROM pages WHERE Page_ID=$f_ppID";
    $sp_result = q($select_parent);
    $sp = f($sp_result);

    $f_pID = $sp['Page_ID'];
}

function rootlinks($ipageID, $Page_ID, $siteURL)
{
    global $f_ppID, $f_pID, $finalPath, $Page_ID;
    print "<div class='left10'>";
    $gpID = $ipageID;
    pageparent($gpID, $siteURL);
    while ($f_ppID <> 0) {
        pageparent($f_pID, $siteURL);
    }
    echo $finalPath;
    print "</div>";
}//end of function rootlinks


/********** FIND MENU PATH (ALL PAGES ID) ************/

function rootmenupath($pageID)
{
    global $pIDArray, $f_ppID, $f_pID, $IDpath;
    $select_query = "SELECT * FROM pages WHERE Page_ID=$pageID";
    $gParent_result = q($select_query);
    $gparent = f($gParent_result);
    $f_ppID = $gparent['Parent_Page_ID'];
    $f_pID = $gparent['Page_ID'];
    $f_Page_View = $gparent["Page_View"];
    $pIDArray[] = "$f_pID";

    $select_parent = "SELECT * FROM pages WHERE Page_ID=$f_ppID";
    $sp_result = q($select_parent);
    $sp = f($sp_result);

    $f_pID = $sp['Page_ID'];
}

function rootmenu($ipageID)
{
    $pIDArray = array();
    global $pIDArray, $f_ppID, $f_pID, $IDpath;
    $gpID = $ipageID;
    $IDpath = "";
    rootmenupath($gpID);
    while ($f_ppID <> 0) {
        rootmenupath($f_pID);
    }
}//end of function rootmenu


/********** FIND HEADER PAGE ************/

function headerPageID($headerpageID)
{
    global $f_ppID, $f_pID, $nr, $PageHeaderFlag;
    $gpID = $headerpageID;
    parentheader($gpID);
    while (($PageHeaderFlag == 0) AND ($f_ppID <> 0)) {
        parentheader($f_pID);
    }
    return $f_pID;
}//end of function headerPageID


function parentheader($pageID)
{
    global $f_ppID, $f_pID, $nr, $PageHeaderFlag;
    $select_query = "SELECT * FROM pages WHERE Page_ID=$pageID";
    $gParent_result = q($select_query);
    $gparent = f($gParent_result);
    $f_ppID = $gparent['Parent_Page_ID'];

    $select_parent = "SELECT * FROM pages WHERE Page_ID=$f_ppID";
    $sp_result = q($select_parent);
    $sp = f($sp_result);
    $f_pID = $sp['Page_ID'];
    $f_ppID = $sp['Parent_Page_ID'];

    $PageHeaderFlag = $sp['Page_Header_Flag'];
}

function pageHeader($headerpageID)
{
    $select_query = "SELECT * FROM pages WHERE Page_ID=$headerpageID";
    $g_result = q($select_query);
    $gHeader = f($g_result);
    $headername = $gHeader['Page_Header'];
    return $headername;
}//end of function rootlinks


/**********  GET MODULE PAGE_ID (Get Content from Category) by LANG ***********/

function getModPageID($StrGetPageID, $Lang)
{
    $Mod_GetPageID = '';
    if ($StrGetPageID) {
        $pagesIDArr = explode(",", $StrGetPageID);
        $count = count($pagesIDArr);
        for ($counter = 0; $counter < $count; $counter++) {
            $pagesID = $pagesIDArr[$counter];
            $pos = strpos($pagesID, $Lang);
            if ($pos !== false) {
                $Mod_GetPageID = substr($pagesID, 2, 10);
            }
        }
        return $Mod_GetPageID;
    }
} //end of function getModPageID


/**********  GET MODULE REC ID (Get Content from Records) by LANG ***********/
function getModRecID($RecIDDList, $Lang)
{
    $recsIDArr = explode(",", $RecIDDList);
    $count = count($recsIDArr);
    for ($counter = 0; $counter < $count; $counter += 1) {
        $recID = $recsIDArr[$counter];
        $pos = strpos($recID, $Lang);
        if ($pos !== false) {
            $MRDR_RecID = substr($recID, 2, 10);
        }
    }
    return $MRDR_RecID;
}

/*********** GET CLASSDIV FROM STYLES ***********/
function getDivClass($listsDivClassID)
{
    $GetDivClass_Sel = "SELECT css_Name FROM styles WHERE css_ID = $listsDivClassID";
    if ($listsDivClassID <> 0) $GetDivClass_Query = q($GetDivClass_Sel); else $GetDivClass_Query = "";
    $GetDivClass = f($GetDivClass_Query);
    $listsDivClass = $GetDivClass['css_Name'];
    return $listsDivClass;
}

/**********   GET FLASH  ***********/
/***********************************/
function getFlash($file, $recid)
{
    $file = $Path_File . $GetFlash['Rec_File1'];
    ?>
    <div id='flasharea'></div>
    <script type="text/javascript">
        var so = new SWFObject("<?php echo $pathfile; ?>", "mymovie", '<?php echo $width; ?>', '<?php echo $height; ?>', '8', '#FFFFFF');
        so.addParam("wmode", "transparent");
        so.useExpressInstall('swf/mask.swf');
        so.write("flasharea");
    </script>
    <?php
} // end of getFlash


/********* GET FILE TYPE **********/
/***********************************/
function getfiletype($filename)
{
    global $filetype;
    $letters = strlen($filename);
    $letPos = $letters - 3;
    $filetype = substr($filename, $letPos, 3);
    return $filetype;
} // end of getfileType


/******** getStyleName *******/
/*** From headerpageID get the Page_Style_ID and then find Style_Name ***/
function getStyleName($headerpageID)
{
    $select_hp = "SELECT * FROM pages WHERE Page_ID=$headerpageID";
    $ghp_result = q($select_hp);
    $gStyleHeader = f($ghp_result);
    $headerStyleID = $gStyleHeader['Page_Style_ID'];

    $Style_Sel = "SELECT * FROM pages_styles WHERE Style_ID = $headerStyleID";
    $qStyleResults = q($Style_Sel);
    $StyleResults = f($qStyleResults);
    $styleName = $StyleResults['Style_Name'];

    return $styleName;
}//end of function getStyleName

function friendly($url)
{
    global $Lang;
    if (($Lang == "cz") || ($Lang == "CZ")) {
        $countrylang = array('a', 'A', 'á', 'Á', 'b', 'B', 'c', 'C', 'č', 'Č', 'd', 'D', 'ď', 'Ď', 'e', 'E', 'é', 'É', 'f', 'F', 'g', 'G', 'h', 'H', 'ch', 'Ch', 'i', 'I', 'í', 'Í', 'j', 'J', 'k', 'K', 'l', 'L', 'm', 'M', 'n', 'N', 'ň', 'Ň', 'o', 'O', 'ó', 'Ó', 'p', 'P', 'q', 'Q', 'r', 'R', 'ř', 'Ř', 's', 'S', 'š', 'Š','t','T','ť','Ť','t','u','U','ú','Ú','ů','Ů','v', 'V', 'w', 'W', 'x', 'X', 'y', 'Y', 'ý', 'Ý','z', 'Z', 'ž', 'Ž');
        $english = array('a', 'a', 'a', 'a', 'b', 'b', 'c', 'c', 'c', 'c', 'd', 'd', 'd', 'd', 'e', 'e', 'e', 'e', 'f', 'f', 'g', 'g', 'h', 'h', 'ch', 'ch', 'i', 'i', 'i', 'i', 'j', 'j', 'k', 'k', 'l', 'l', 'm', 'm', 'n', 'n', 'n', 'n', 'o', 'o', 'o', 'o', 'p', 'p', 'q', 'q', 'r', 'r', 'r', 'r', 's', 's', 's', 's','t','t','t','t','t','u','u','u','u','u','u','v', 'v', 'w', 'w', 'x', 'x', 'y', 'y', 'y', 'y','z', 'z', 'z', 'z');
    }

    if (($Lang == "el") || ($Lang == "gr")) {
        $countrylang = array('α', 'ά', 'Ά', 'Α', 'β', 'Β', 'γ', 'Γ', 'δ', 'Δ', 'ε', 'έ', 'Ε', 'Έ', 'ζ', 'Ζ', 'η', 'ή', 'Η', 'θ', 'Θ', 'ι', 'ί', 'ϊ', 'ΐ', 'Ι', 'Ί', 'κ', 'Κ', 'λ', 'Λ', 'μ', 'Μ', 'ν', 'Ν', 'ξ', 'Ξ', 'ο', 'ό', 'Ο', 'Ό', 'π', 'Π', 'ρ', 'Ρ', 'σ', 'ς', 'Σ', 'τ', 'Τ', 'υ', 'ύ', 'Υ', 'Ύ', 'φ', 'Φ', 'χ', 'Χ', 'ψ', 'Ψ', 'ω', 'ώ', 'Ω', 'Ώ', ' ', "'", ',', '%', '&', '$', '@', '_','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $english = array('a', 'a', 'a', 'a', 'b', 'b', 'g', 'g', 'd', 'd', 'e', 'e', 'e', 'e', 'z', 'z', 'i', 'i', 'i', 'th', 'th', 'i', 'i', 'i', 'i', 'i', 'i', 'k', 'k', 'l', 'l', 'm', 'm', 'n', 'n', 'x', 'x', 'o', 'o', 'o', 'o', 'p', 'p', 'r', 'r', 's', 's', 's', 't', 't', 'u', 'u', 'y', 'y', 'f', 'f', 'ch', 'ch', 'ps', 'ps', 'o', 'o', 'o', 'o', '-', '', '-', '-', '-', '-', '-', '-', 'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
    }

    $string = str_replace($countrylang, $english, $url);
    $string = preg_replace('/[^A-Za-z0-9\. _]/', '-', $string);
    $string = str_replace(' ', '-', $string);
	$string = str_replace('.', '', $string);
    $string = str_replace('---', '-', $string);
    $string = str_replace('--', '-', $string);
    return $string;
}

/*********** GET NUM OF WORDS ***********/
function wordTrim($str, $len)
{
    $wordCount = 0;
    $charCount = 0;

    $length = strlen(strip_tags($str));
    for ($i = 0; $i < $length; $i++) {
        if ($str[$i] == " ") {
            $wordCount++;
            $charCount++;
            if ($wordCount == $len)
                break;
        } else {
            $charCount++;
        } # end if
    } # end for loop

    $newstr = substr($str, 0, $charCount);
    return $newstr;
} # end function


/*********** Check User Access / Extranet ************/
function checkuseraccess($Page_ID)
{
    global $GetUserAccess;
    $Customer_ID = $_SESSION['user']['Customer_ID'];
    if ($_SESSION['user']['Customer_ID'] <> "") {
        $GetUserAcc_Select = "SELECT * FROM members_access WHERE MemAcc_Mem_ID = $Customer_ID AND MemAcc_Page_ID = $Page_ID";
        $GetUserAcc_Query = q($GetUserAcc_Select);
        $GetUserAccess = nr($GetUserAcc_Query);
        return $GetUserAccess;
    }
}//end of function checkuseraccess

function printClass($StyleID,$RecID,$Field)
{
    $Style_Query = q("SELECT * FROM styles WHERE css_ID = $StyleID");
    $GetStyle = f($Style_Query);
    $cssName = $GetStyle['css_Name'];
    if (Auth::isAdmin() && $_GET['le']=="1") $iec = " incom_edit_container";

    if (strlen($cssName) == 2) { // if h1
        if (Auth::isAdmin() && $_GET['le']=="1") {
            $dataString = "<div class=\"incom_edit_container\"";
            if ($RecID <> "") $dataString = $dataString." data-rec-id='$RecID'";
            if ($Field <> "") $dataString = $dataString." data-field='$Field'";
            print $dataString.">\n";
        } else {
             print "<div>";
        }
        print "<$cssName>";
    } else {
        $dataString = "<div class=\"$cssName$iec\"";
        if ($RecID <> "") $dataString = $dataString." data-rec-id='$RecID'";
        if ($Field <> "") $dataString = $dataString." data-field='$Field'";
        print $dataString.">\n";
    }
}

function printRatClass($StyleID,$RatID,$Field)
{
    $Style_Query = q("SELECT * FROM styles WHERE css_ID = $StyleID");
    $GetStyle = f($Style_Query);
    $cssName = $GetStyle['css_Name'];
    if (Auth::isAdmin() && $_GET['le']=="1") $iec = " incom_edit_container";

    if (strlen($cssName) == 2) { // if h1
        if (Auth::isAdmin() && $_GET['le']=="1") {
            $dataString = "<div class=\"incom_edit_container\"";
            if ($RatID <> "") $dataString = $dataString." data-rat-id='$RatID'";
            if ($Field <> "") $dataString = $dataString." data-field='$Field'";
            print $dataString.">\n";
        } else {
             print "<div>";
        }
        print "<$cssName>";
    } else {
        $dataString = "<div class=\"$cssName$iec\"";
        if ($RatID <> "") $dataString = $dataString." data-rat-id='$RatID'";
        if ($Field <> "") $dataString = $dataString." data-field='$Field'";
        print $dataString.">\n";
    }
}


function BuildStyle($StyleID)
{
    $Style_Sel = "SELECT * FROM styles WHERE css_ID = $StyleID";
    if ($StyleID <> 0) $Style_Query = q($Style_Sel); else $Style_Query = "";
    $GetStyle = f($Style_Query);
    $style = $GetStyle['css_Name'];
    return $style;
}

/*********** Check Image Paths for srcset ************/
function srcsetPaths($imgPath,$imgTypeFolder,$path,$rootURL,$mobileMode) {
    $dimensions=generateDimensions();
    foreach($dimensions as $folderName => $set_value) {
    if(file_exists($path . "uploads/" . $imgTypeFolder . "/" . $folderName . "/" . $imgPath)) {
            $srcsetPaths .= $rootURL . "uploads/" . $imgTypeFolder . "/" . $folderName . "/" . $imgPath . " " . $set_value['width']."w";
            if(end($dimensions) !== $set_value){$srcsetPaths .=",";}
        }
    }
    return $srcsetPaths;
}


define('SECRET_KEY_ENCRYPTION', 'XRCTFUzZTJVRUxhc2tq');
/**
 * simple method to encrypt or decrypt a plain text string
 * initialization vector(IV) has to be the same when encrypting and decrypting
 * https://gist.github.com/joashp/a1ae9cb30fa533f4ad94
 * @param string $action: can be 'encrypt' or 'decrypt'
 * @param string $string: string to encrypt or decrypt
 *
 * @return string
 */
function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = $secret_iv = SECRET_KEY_ENCRYPTION;
    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}
?>
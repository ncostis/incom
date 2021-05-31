<?php
// Check Authorized Users
if (isset($_SESSION['user']['Customer_ID'])) {
    $authString = " AND Page_Authorized < 2";
} else {
    $authString = " AND Page_Authorized = 0";
}



// GET CATEGORY CONTENT
$CatCont_Sel = "SELECT * FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 1 AND Page_Lang = '$Lang' AND Page_Content <> 0";
if ((getparamvalue('Rec_ID') == 0) AND (getparamvalue('var1') <> "")) $CatCont_Sel = "SELECT * FROM pages, records WHERE Page_View = '".$_GET["var1"]."' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 1 AND Page_Lang = '$Lang'  AND Page_Content <> 0";
$CatCont_Query = q($CatCont_Sel);
$CatCont = f($CatCont_Query);


// GET CONTENT FROM HOMEPAGE
$GetHome_Sel = "SELECT * FROM pages, records WHERE Page_ID = Rec_page_ID AND Parent_Page_ID = 0 AND Rec_Page_Content = 0 AND Page_Section = 'general' AND Page_Lang = '$Lang' Order by Page_Order Asc Limit 0,1";
$GetHome_Query = q($GetHome_Sel);
$GetHome = f($GetHome_Query);

// GET CATEGORY TITLE
$GetTitle_Sel = "SELECT * FROM pages WHERE Page_View = '$ID' AND Page_Lang = '$Lang'";
$GetTitle_Query = q($GetTitle_Sel);
$GetTitle = f($GetTitle_Query);

// GET PARENT CATEGORY TITLE
$ParentTitle_Sel = "SELECT * FROM pages WHERE Page_ID = '$Parent_Page_ID'";
$ParentTitle_Query = q($ParentTitle_Sel);
$ParentTitle = f($ParentTitle_Query);

// GET ALL RECORDS OF CATEGORY
if ($PageResults["Page_OrderBy"] == "") {
    $orderStringGL = "Order by Rec_DateStart Desc, Rec_Order";
} else {
    $orderStringGL = "order by " . $PageResults["Page_OrderBy"] . " " . $PageResults["Page_SortBy"];
}

$GetRecs_Sel = "SELECT records.* FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0  AND Rec_Active = 0 UNION SELECT records.* FROM pages, records, related_pages WHERE Related_Page_ID = '$Page_ID' AND Rec_ID = Related_Rec_ID AND Related_Page_ID = Page_ID AND Rec_Active = 0 GROUP BY Rec_ID $orderStringGL";
$GetRecs_Query = q($GetRecs_Sel);

// GET ALL SUBCATEGORIES OF CATEGORY
if ($PageResults["Page_OrderBy"] == "") {
    $orderStringGL = "Order by Page_Order";
} else {
    $orderStringGL = "order by " . $PageResults["Page_OrderBy"] . " " . $PageResults["Page_SortBy"];
}

$GetPages_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = ".$PageResults["Page_ID"]." $orderStringGL";
$GetPages_Query = q($GetPages_Sel);
$ednum = 1; // editor number
$Page_HTML = $PageResults["Page_Html"];

// START LANGUAGE
$StartLang = $GetVar['Rec_Scroll1'];
$Lang_Sel = "SELECT * FROM lang Order By Lang_Order Asc";
$Lang_Query = q($Lang_Sel);


//From HomePage according to startLang from Admin (Section Variables)
$GetLogo_Sel = "SELECT * FROM pages, records WHERE Rec_Page_ID = Page_ID AND Parent_Page_ID = 0 AND Rec_Page_Content = 0 AND Rec_Active = 0 AND Page_Section = 'general' AND Page_Lang = '$StartLang' Order by Page_Order Asc Limit 0,1";
$GetLogo_Query = q($GetLogo_Sel);
$GetLogo = f($GetLogo_Query);


// Social Media
$SocialMedia_Sel = "SELECT * FROM pages, records WHERE Page_Section = 'socialmedia' AND Rec_Page_ID = Page_ID";
$SocialMedia_Query = q($SocialMedia_Sel);
$SocialMedia = f($SocialMedia_Query);

// Newsletter
$Newsletter_Sel = "SELECT * FROM pages, records WHERE Page_View = 'newsletter_" . $Lang . "' AND Rec_Page_ID = Page_ID";
$Newsletter_Query = q($Newsletter_Sel);
$Newsletter = f($Newsletter_Query);


// GET RECORD

if (getparamvalue('Rec_ID') <> "") {
    //Get record from link of a list such as page News, Products etc
    $GetRec_Sel = "SELECT * FROM pages, records WHERE Rec_ID = ".$_GET["Rec_ID"]." AND Page_ID = Rec_Page_ID AND Rec_Active = 0";
} elseif (getparamvalue("ID") <> "") {
    //Get 1st record of category
    $GetRec_Sel = "SELECT * FROM pages, records WHERE Page_View = '$ID' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = '0' AND Rec_Active = 0 Limit 0,1";
} else {
    //Get HomePage record
    $GetRec_Sel = "SELECT * FROM pages, records WHERE Rec_Page_ID = Page_ID AND Parent_Page_ID = 0 AND Page_Section = 'general' AND Page_Lang = '$Lang' AND Rec_Page_Content = 0 AND Rec_Active = 0 Order by Page_Order Asc Limit 0,1";
}

$GetRec_Query = q($GetRec_Sel);
$GetRec = f($GetRec_Query);

$Rec_ID = $GetRec['Rec_ID'];
$RecView = $GetRec['Rec_View'];
$Page_Rec_Temp = $GetRec['Page_Rec_Temp'];
$recImCat = $GetRec['Rec_Img_Cat_ID'];
$recImCatNR = $GetRec['Rec_NoResImg_Cat_ID'];
$numphotosH = $GetRec['Num_HPhotos'];
if (($numphotosH == "") OR ($numphotosH == 0)) $numphotosH = 100;
$startat = $GetRec['StartAt_Photos'];
$repeatrow = $GetRec['RepeatRow_Photos'];
if ($RecView == '1') {
    $RecTempID = $Page_Rec_Temp;
} else {
    $RecTempID = $RecView;
}

if (isset($mobileMode) && $mobileMode == 1) {
    if ($GetRec['Rec_View_Mob'] == '1') $RecTempID = $GetRec['Page_Rec_Mob']; else $RecTempID = $GetRec['Rec_View_Mob'];
}

// GET RELATED LANG RECORD
if (($StartLang <> $Lang) AND ($GetRec['Rec_Rel_LangID'] > 0)) {
    $GetRelLangRec_Sel = "SELECT * FROM records WHERE Rec_ID = ".$GetRec["Rec_Rel_LangID"];
    $GetRelLangRec_Query = q($GetRelLangRec_Sel);
    $GetRelLangRec = f($GetRelLangRec_Query);
}
?>
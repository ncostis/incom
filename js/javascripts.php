<?php
// GET ALL
$scriptSpecialPos = " AND JS_Script_Position = '' ";
$scriptSpecialPosMob = " AND JS_Script_Position_Mobile = ''";
$activeCssArray = array();
$activeJSArray = array();
$inlineCss = "";
$inlineJS = "";
if (isset($mobileMode) && $mobileMode == 1) {
    $GetJS_Sel = "SELECT * FROM javascripts WHERE JS_Mobile_Active ='Active' $scriptSpecialPosMob Order by JS_Active,JS_Order";
} else {
    $GetJS_Sel = "SELECT * FROM javascripts WHERE JS_Active='Active' $scriptSpecialPos Order by JS_Active,JS_Order";
}
$GetJS_Query = q($GetJS_Sel);
while ($GetJS = f($GetJS_Query)) {
    if ($GetJS['JS_Src'] <> "") {
        if (preg_match('/js\//', $GetJS['JS_Src'])) $folderJS = "js/";
        if (preg_match('/library\//', $GetJS['JS_Src'])) $folderJS = "library/";

        $pathJS = "src=\"" . $rootURL . $folderJS;
        $JS_Src1 = str_replace("src=\"$folderJS", "$pathJS", $GetJS['JS_Src']);
        if (preg_match('/http/', $GetJS['JS_Src'])) $JS_Src1 = $GetJS['JS_Src'];
        $pathHref = "href=\"" . $rootURL . $folderJS;
        $JS_Src = str_replace("href=\"$folderJS", "$pathHref", $JS_Src1);
    }
    if (preg_match('/(http[s]?|\/\/)/', $GetJS['JS_Src']) || $GetJS['JS_Minify_Exclude']==1){
        print "$JS_Src";
    }else{
       if (preg_match('/<link/', $GetJS['JS_Src'])){
            preg_match_all('/href=["\'](.*?)["\']/', $GetJS['JS_Src'], $matchCss);
            if($GetOptRec['Rec_Check3'] <> '1'){
                array_push($activeCssArray, implode(",", $matchCss[1]));
            }else{
                foreach ($matchCss[0] as $key => $value) {
                    print "<link ".$value."/>";
                }
            }
        }
        if (preg_match('/<script/', $GetJS['JS_Src'])){
            preg_match_all('/src=["\'](.*?)["\']/', $GetJS['JS_Src'], $matchJS);
            if($GetOptRec['Rec_Check5'] <> '1'){
                array_push($activeJSArray, implode(",", $matchJS[1]));
            }else{
                foreach ($matchJS[0] as $key => $value) {
                    print "<script ".$value."></script>";
                }
            }
        }
    }
    if($GetJS['JS_Script']<>"" AND $GetJS['JS_Minify_Exclude']==0 ){
        if(preg_match_all('/<style(.*?)>(.*?)<\/style>/s', $GetJS['JS_Script'], $matchInlineCss)){
            if($GetOptRec['Rec_Check3'] <> '1'){
                $inlineCss.=implode("", $matchInlineCss[2]);
            }else{
                foreach ($matchInlineCss[2] as $key => $value) {
                    print"<style>".$value."</style>";
                }
            }
        }
        if(preg_match_all('/<script(.*?)>(.*?)<\/script>/s', $GetJS['JS_Script'], $matchInlineJS)){
            if($GetOptRec['Rec_Check5'] <> '1'){
                $inlineJS.=implode("", $matchInlineJS[2]);
            }else{
                foreach ($matchInlineJS[2] as $key => $value) {
                    print"<script>".$value."</script>";
                }
            }
        }
    }else{
        print $GetJS['JS_Script'];
    }
    $JS_Src = "";
}

// GET ONLY TO HOME PAGE
if (!isset($_GET['ID']) || $_GET['ID'] == "") {
    if (isset($mobileMode) && $mobileMode == 1) {
        $GetJS_Sel = "SELECT * FROM javascripts WHERE JS_Mobile_Active='HomePage' $scriptSpecialPosMob Order by JS_Active,JS_Order";
    } else {
        $GetJS_Sel = "SELECT * FROM javascripts WHERE JS_Active='HomePage' $scriptSpecialPos Order by JS_Active,JS_Order";
    }
    $GetJS_Query = q($GetJS_Sel);
    while ($GetJS = f($GetJS_Query)) {
        if ($GetJS['JS_Src'] <> "") {
            if (preg_match('/js\//', $GetJS['JS_Src'])) $folderJS = "js/";
            if (preg_match('/library\//', $GetJS['JS_Src'])) $folderJS = "library/";

            $pathJS = "src=\"" . $rootURL . $folderJS;
            $JS_Src1 = str_replace("src=\"$folderJS", "$pathJS", $GetJS['JS_Src']);
            if (preg_match('/http/', $GetJS['JS_Src'])) $JS_Src1 = $GetJS['JS_Src'];
            $pathHref = "href=\"" . $rootURL . $folderJS;
            $JS_Src = str_replace("href=\"$folderJS", "$pathHref", $JS_Src1);
        }
        if (preg_match('/(http[s]?|\/\/)/', $GetJS['JS_Src']) || $GetJS['JS_Minify_Exclude']==1){
            print "$JS_Src";
        }else{
           if (preg_match('/<link/', $GetJS['JS_Src'])){
                preg_match_all('/href=["\'](.*?)["\']/', $GetJS['JS_Src'], $matchCss);
                if($GetOptRec['Rec_Check3'] <> '1'){
                    array_push($activeCssArray, implode(",", $matchCss[1]));
                }else{
                    foreach ($matchCss[0] as $key => $value) {
                        print "<link ".$value."/>";
                    }
                }
            }
            if (preg_match('/<script/', $GetJS['JS_Src'])){
                preg_match_all('/src=["\'](.*?)["\']/', $GetJS['JS_Src'], $matchJS);
                if($GetOptRec['Rec_Check5'] <> '1'){
                    array_push($activeJSArray, implode(",", $matchJS[1]));
                }else{
                    foreach ($matchJS[0] as $key => $value) {
                        print "<script ".$value."></script>";
                    }
                }
            }
        }
        if($GetJS["JS_Script"]<>"" AND $GetJS['JS_Minify_Exclude']==0){
            if(preg_match_all('/<style(.*?)>(.*?)<\/style>/s', $GetJS["JS_Script"], $matchInlineCss)){
                 if($GetOptRec['Rec_Check3'] <> '1'){
                    $inlineCss.=implode("", $matchInlineCss[2]);
                }else{
                    foreach ($matchInlineCss[2] as $key => $value) {
                        print"<style>".$value."</style>";
                    }
                }
            }
            if(preg_match_all('/<script(.*?)>(.*?)<\/script>/s', $GetJS["JS_Script"], $matchInlineJS)){
               if($GetOptRec['Rec_Check5'] <> '1'){
                    $inlineJS.=implode("", $matchInlineJS[2]);
                }else{
                    foreach ($matchInlineJS[2] as $key => $value) {
                        print"<script>".$value."</script>";
                    }
                }
            }
        }else{
            print $GetJS["JS_Script"];
        }
        $JS_Src = "";
    }
}

// GET ONLY TO INSIDE PAGES
if (isset($_GET['ID']) && $_GET['ID'] <> "") {
    if (isset($mobileMode) && $mobileMode == 1) {
        $GetJS_Sel = "SELECT * FROM javascripts WHERE JS_Mobile_Active='InsidePage' $scriptSpecialPosMob Order by JS_Active,JS_Order";
    } else {
        $GetJS_Sel = "SELECT * FROM javascripts WHERE JS_Active='InsidePage' $scriptSpecialPos Order by JS_Active,JS_Order";
    }
    $GetJS_Query = q($GetJS_Sel);
    while ($GetJS = f($GetJS_Query)) {
        if ($GetJS['JS_Src'] <> "") {
            if (preg_match('/js\//', $GetJS['JS_Src'])) $folderJS = "js/";
            if (preg_match('/library\//', $GetJS['JS_Src'])) $folderJS = "library/";

            $pathJS = "src=\"" . $rootURL . $folderJS;
            $JS_Src1 = str_replace("src=\"$folderJS", "$pathJS", $GetJS['JS_Src']);
            if (preg_match('/http/', $GetJS['JS_Src'])) $JS_Src1 = $GetJS['JS_Src'];
            $pathHref = "href=\"" . $rootURL . $folderJS;
            $JS_Src = str_replace("href=\"$folderJS", "$pathHref", $JS_Src1);
        }
        if (preg_match('/(http[s]?|\/\/)/', $GetJS['JS_Src']) || $GetJS['JS_Minify_Exclude']==1){
            print "$JS_Src";
        }else{
           if (preg_match('/<link/', $GetJS['JS_Src'])){
                preg_match_all('/href=["\'](.*?)["\']/', $GetJS['JS_Src'], $matchCss);
                if($GetOptRec['Rec_Check3'] <> '1'){
                    array_push($activeCssArray, implode(",", $matchCss[1]));
                }else{
                     foreach ($matchCss[0] as $key => $value) {
                        print "<link ".$value."/>";
                    }
                }
            }
            if (preg_match('/<script/', $GetJS['JS_Src'])){
                preg_match_all('/src=["\'](.*?)["\']/', $GetJS['JS_Src'], $matchJS);
                if($GetOptRec['Rec_Check5'] <> '1'){
                    array_push($activeJSArray, implode(",", $matchJS[1]));
                }else{
                    foreach ($matchJS[0] as $key => $value) {
                        print "<script ".$value."></script>";
                    }
                }
            }
        }
        if($GetJS["JS_Script"]<>"" AND $GetJS['JS_Minify_Exclude']==0 ){
            if(preg_match_all('/<style(.*?)>(.*?)<\/style>/s', $GetJS["JS_Script"], $matchInlineCss)){
                if($GetOptRec['Rec_Check3'] <> '1'){
                    $inlineCss.=implode("", $matchInlineCss[2]);
                }else{
                    foreach ($matchInlineCss[2] as $key => $value) {
                        print"<style>".$value."</style>";
                    }
                }
            }
            if(preg_match_all('/<script(.*?)>(.*?)<\/script>/s', $GetJS["JS_Script"], $matchInlineJS)){
                if($GetOptRec['Rec_Check5'] <> '1'){
                    $inlineJS.=implode("", $matchInlineJS[2]);
                }else{
                   foreach ($matchInlineJS[2] as $key => $value) {
                        print"<script>".$value."</script>";
                    }
                }
            }
        }else{
            print $GetJS["JS_Script"];
        }
        $JS_Src = "";
    }
}
//PRINT THE COMBINED CSS AND JS
if($inlineCss<>""){file_put_contents("".$path.".//css/inline.css", $inlineCss);}
if ($GetOptRec['Rec_Check3'] <> '1'){ //if uncompress Css is not checked
    if ((!empty($activeCssArray)) || $inlineCss<>"") { ?>
<link type="text/css" rel="stylesheet" href="<?php echo $rootURL; ?>min/<?php if($GetVar['Rec_Title'] <> ""){echo "b=";echo substr_replace($GetVar['Rec_Title'], "", -1);echo"&amp;";}?>f=<?php for ($i=0; $i < count($activeCssArray); $i++) { if($i!=0 AND $i!=count($activeCssArray)){print ",";} print "$activeCssArray[$i]";}if($inlineCss<>"" AND (!empty($activeCssArray))){print",css/inline.css";}elseif($inlineCss<>"" AND (empty($activeCssArray))){print"css/inline.css";}?>&amp;1800" />
<?php }
}
if($inlineJS<>""){file_put_contents("".$path.".//js/inline.js", $inlineJS);}
if ($GetOptRec['Rec_Check5'] <> '1'){ //if uncompress Js is not checked
    if ((!empty($activeJSArray)) || $inlineJS<>"") { ?>
<script type="text/javascript" src="<?php echo $rootURL; ?>min/<?php if($GetVar['Rec_Title'] <> ""){echo "b=";echo substr_replace($GetVar['Rec_Title'], "", -1);echo"&amp;";}?>f=<?php for ($j=0; $j < count($activeJSArray); $j++) { if($j!=0 AND $j!=count($activeJSArray)){print ",";} print "$activeJSArray[$j]";}if($inlineJS<>""  AND (!empty($activeJSArray))){print",js/inline.js";}elseif($inlineJS<>""  AND (empty($activeJSArray))){print"js/inline.js";}?>&amp;1800" defer=""></script>
<?php }
}
?>
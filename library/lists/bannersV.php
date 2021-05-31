<?php
$Mod_Query = q($Mod_Sel);
$GetModule = f($Mod_Query);
$ModPageID = $GetModule['Mod_GetPageID'];
$ModPageID = getModPageID($ModPageID, $Lang);

if ($BanAreaTop > '0') {
    $BanPageID = "$BanAreaTop";
} else {
    $BanPageID = $ModPageID;
}

$timestamp = time();
$offset = 3 * 60 * 60;
$timestamp = $timestamp + $offset;
$currentDateTime = gmdate("YmdHi", $timestamp);

$GetBanners_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $BanPageID AND Rec_Page_Content = 0 AND Rec_Active = 0  Order by Rec_DateStart Desc, Rec_Order Asc";
$GetBanners_Query = q($GetBanners_Sel);
$numBanners = nr($GetBanners_Query);
$numban = 0;

while ($GetBanner = f($GetBanners_Query)) {
    $starttime = $GetBanner['Rec_DateStart'] . "-" . $GetBanner['Rec_Field2'];
    $endtime = $GetBanner['Rec_DateStop'] . "-" . $GetBanner['Rec_Field3'];
    if (($starttime <= "$currentDateTime") AND ($currentDateTime < "$endtime")) {
        $numban = $numban + 1;
        if ($numban < $numBanners) {
            $paddbottom = "margin-bottom:15px;";
        } else {
            $paddbottom = "";
        }
        print"<div style=\"display:block; $paddbottom\" class='footerBannerV'>";
        if ($GetBanner['Rec_TextArea2'] <> '') {
            print $GetBanner["Rec_TextArea2"];
        } else {
            if ($GetBanner['Rec_Image1'] <> '') {
                $file=getLargestPhotoAvail($path. "uploads/images/",$GetBanner['Rec_Image1']);
            } else {
                $relatedLandID = $GetBanner['Rec_Rel_LangID'];
                $GetImgEN_Sel = "SELECT * FROM records WHERE Rec_ID = $relatedLandID";
                $GetImgEN_Query = q($GetImgEN_Sel);
                $GetImgEN = f($GetImgEN_Query);
                $file=getLargestPhotoAvail($path. "uploads/images/",$GetImgEN['Rec_Image1']);
            }
            if ($GetBanner['Rec_Field1'] <> "") {
                $htmlstring = substr($GetBanner['Rec_Field1'], 0, 4);
                if ($htmlstring == "http") {
                    $GetLink = $GetBanner["Rec_Field1"];
                } else {
                    $GetLink = "" . $siteURL . $GetBanner["Rec_Field1"];
                }
                $openhref = "<a href=\"$GetLink/\" target='".$GetBanner["Rec_Scroll1"]."'>";
                $closehref = "</a>";
            } elseif ($GetBanner['Rec_Check1'] == 1) {
                ?>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("a#popupwindow<?php echo $GetBanner['Rec_Field2']; ?>").fancybox({
                            'overlayShow': false,
                            'titleShow': false,
                            'transitionIn': 'elastic',
                            'transitionOut': 'elastic'
                        });
                    });
                </script>
                <?php
                $openhref = "<a id=\"popupwindow".$GetBanner["Rec_Field2"]."\" href=\"$rootURL/library/popup.php?Rec_ID=".$GetBanner["Rec_Field2"]."&Lang=$Lang&w=".$GetBanner["Rec_Field29"]."&h=".$GetBanner["Rec_Field30"]."\">";
                $closehref = "</a>";
            } else {
                $openhref = "";
                $closehref = "";
            }
            print"$openhref<img src=\"$rootURL$file\" alt=\"".$GetBanner["Rec_Title"]."\" title=\"".$GetBanner["Rec_Title"]."\" width=\"auto\" height=\"auto\">$closehref";
        }  //end if rec_textarea2
        print"</div>";
    }  //check time
}  //while
?>
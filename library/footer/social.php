<div class="socialCont">

    <?php

    $Mod_Query = q($Mod_Sel);
    $GetModule = f($Mod_Query);
    $ModPageID = $GetModule['Mod_GetPageID'];
    $ModPageID = getModPageID($ModPageID, $Lang);
    echo getModPageID($ModPageID, $Lang);


    if($SocModStyle ==""){
        //Select Styles from Module
        $SocStyle_Sel = "SELECT * FROM styles WHERE css_ID = ".$GetModule["Mod_DivClass"];
        $SocStyle_Query = q($SocStyle_Sel);
        $GetSocStyle = f($SocStyle_Query);
        $SocModStyle = $GetSocStyle['css_Name'];
    }

    $GetSocial_Sel = "SELECT * FROM pages, records WHERE Page_View = 'social-media' AND Rec_Page_ID = Page_ID AND Rec_Page_Content = 0 AND Rec_Active = 0  Order by Rec_Order";
    $GetSocial_Query = q($GetSocial_Sel);
    $numSocial = nr($GetSocial_Query);
    $numsoc = 0;

    while ($GetSocial = f($GetSocial_Query)) {
        $socialWidth = $GetSocial['Rec_Field3'];
        $socialHeight = $GetSocial['Rec_Field4'];
        $socialTitle = $GetSocial['Rec_Field2'];
        if ($socialWidth == '') {
            $socialWidth = "auto";
        }
        if ($socialHeight == '') {
            $socialHeight = "auto";
        }
        $numsoc++;
        $wdelay = $numsoc * 0.3;
        $wdelayp = $wdelay . "s";
        $socialIcon = "";
        $link = "";
        //print "\n<div class=\"wow fadeIn $SocModStyle\" data-wow-delay=\"$wdelay\">\n";

        if ($GetSocial['Rec_TextArea1'] <> '') {
            print"<span>".$GetSocial['Rec_TextArea1']."</span>";
        } else {
            if ((getparamvalue('ID') == '') AND ($mobileMode <> 1)) {
                $socialImg = $GetSocial['Rec_Image1'];
            } else {
                $socialImg = $GetSocial['Rec_Image2'];
            }

            if ($GetSocial['Rec_Image1'] <> '') {
                $socialImg = $GetSocial['Rec_Image1'];
            }

            if (($GetSocial['Rec_Image1'] <> '') || ($GetSocial['Rec_Scroll2'] <> '')) {
                $link = $GetSocial['Rec_Field1'];
            }
            //check if record is related to other lang
            $GetRelLangRec_Sel = "SELECT * FROM records WHERE Rec_ID = ".$GetSocial["Rec_Rel_LangID"];
            $GetRelLangRec_Query = q($GetRelLangRec_Sel);
            $GetRelLangRec = f($GetRelLangRec_Query);

            if ($GetRelLangRec['Rec_ID'] <> "") {
                $socialWidth = $GetRelLangRec['Rec_Field3'];
                $socialHeight = $GetRelLangRec['Rec_Field4'];
                $socialTitle = $GetRelLangRec['Rec_Field2'];
                if ($socialWidth == '') {
                    $socialWidth = "auto";
                }
                if ($socialHeight == '') {
                    $socialHeight = "auto";
                }
                $link = $GetRelLangRec['Rec_Field1'];
                $socialImg = $GetRelLangRec['Rec_Image1'];
            }

            $socialIcon = $Path_Image . $socialImg;
            $target = $GetSocial['Rec_Scroll1'];
            ?>
            <a href="<?php echo $link; ?>" target="<?php echo $target; ?>" rel="noopener" class="wow fadeIn social socialFooter" data-wow-delay="<?=$wdelay?>">
                <?php if ($socialImg <> '') { ?>
                    <img src="<?php echo $socialIcon; ?>" title="<?php echo $socialTitle ?>" alt="<?php echo $socialTitle ?>" width="<?php echo $socialWidth; ?>" height="<?php echo $socialHeight; ?>">

                <?php } else {
                    if ($GetRelLangRec['Rec_ID'] <> "") {
                        $socialFont = $GetRelLangRec['Rec_Scroll2'];
                        $socialSize = $GetRelLangRec['Rec_Scroll3'];
                        // if ($GetRelLangRec['Rec_Field5'] <> '') {
                        //     $socialColor = "style='color:".$GetRelLangRec["Rec_Field5"].";'";
                        // }
                    } else {
                        $socialFont = $GetSocial['Rec_Scroll2'];
                        $socialSize = $GetSocial['Rec_Scroll3'];
                        // if ($GetSocial['Rec_Field5'] <> '') {
                        //     $socialColor = "style='color:".$GetSocial["Rec_Field5"].";'";
                        // }
                    } ?>
                    <i class="fa <?php echo $socialFont; ?> <?php echo $socialSize; ?>" width="<?php echo $socialWidth; ?>" height="<?php echo $socialHeight; ?>" title="<?php echo $socialTitle ?>" alt="<?php echo $socialTitle ?>"></i>
                <?php } ?>
            </a>
            <?php
        }
        //print "</div>";
    }
    ?>
    <div style="clear:both;"></div>
    <?php if($ModFieldText <> ""){print "<div class=\"followUs homeTitleSmaller\">$ModFieldText</div>";}?>
</div>
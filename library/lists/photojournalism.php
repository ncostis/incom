<?php
$muNum = 0;
$top = "top20";
$GetRatRecs_Sel = "SELECT * FROM recs_att_tables WHERE Rat_SubCat = 'List_Rat1' AND Rat_Rec_ID = $Rec_ID Order by Rat_Order,Rat_ID";
$GetRatRecs_Query = q($GetRatRecs_Sel);
if ($mobileMode <> 1) {

    while ($GetRatRec = f($GetRatRecs_Query)) {
        $Rat_ID = $GetRatRec['Rat_ID'];
        // Calculate Image Size
        if ($GetRatRec['Rat_Field29'] == "") $imageSize = "";
        if ($GetRatRec['Rat_Field29'] > 0) $imageSize = "width:100%; max-width:" . $GetRatRec['Rat_Field29'] . "px"; // Custom Image Width
        else $imageSize = "max-width:" . $imgFullWidth . "px"; // Custom Image Width
        $imgzoom1 = $Path_ImageRes_Rat . $GetRatRec['Rat_Image_Resize1'];
        $imgzoom2 = $Path_ImageRes_Rat . $GetRatRec['Rat_Image_Resize2'];

        $Style_Sel = "SELECT * FROM styles WHERE css_ID = $GetRatRec[Rat_Scroll1]";
        $Style_Query = q($Style_Sel);
        $GetStyle = f($Style_Query);
        $gridImage = $GetStyle['css_Name'];

        $Style_Sel = "SELECT * FROM styles WHERE css_ID = $GetRatRec[Rat_Scroll2]";
        $Style_Query = q($Style_Sel);
        $GetStyle = f($Style_Query);
        $gridImageItem = $GetStyle['css_Name'];

        if ($GetRatRec['Rat_Check1'] == '1') print "<div class=\"$top\"></div><h2>$GetRatRec[Rat_Title]</h2><br>";

        // Display Text Only
        // *****************
        if ($GetRatRec['Rat_Field28'] == "text") {
            getEditorRat($Rat_ID, $Path_Texts, 2, $style, $path);
        }

        // Display Image > Text & Text > Image
        // ***********************************
        if (($GetRatRec['Rat_Field28'] == "img_text") OR ($GetRatRec['Rat_Field28'] == "text_img")) {
            if ($GetRatRec['Rat_Field28'] == "text_img") {
                $FileName = $Path_Texts . $GetRatRec['Rat_Text2'] . ".htm";
                if (file_exists($FileName) & (filesize($FileName) > 0)) {
                    getEditorRat($Rat_ID, $Path_Texts, 2, $style, $path);
                    print "<div class=\"$top\"></div>";
                }
            }

            if ($GetRatRec['Rat_Check2'] == 0 && $GetRatRec['Rat_Image_Resize1']<>'') {?>
                <div class="<?php echo $gridImage; ?>">
                    <div class="<?php echo $gridImageItem; ?>">
                        <?php 
                        print "<div align=center><figure style=\"margin: auto;\"><img src=\"$imgzoom1\" style=\"$imageSize\" alt=\"$GetRatRec[Rat_Title]\"><figcaption>$GetRatRec[Rat_Field1]</figcaption></figure></div>";?>
                    </div>
                </div>
            <?php } else if($GetRatRec['Rat_Image_Resize1']<>''){
                print "<div align=center><a href=\"$imgzoom1\" class='fancybox'><figure style=\"margin: auto;\"><img src=\"$imgzoom1\" style=\"$imageSize\" border=0><figcaption>$GetRatRec[Rat_Field1]</figcaption></figure></a></div>";
            }

            if ($GetRatRec['Rat_Field28'] == "img_text") {
                $FileName = $Path_Texts . $GetRatRec['Rat_Text2'] . ".htm";
                if (file_exists($FileName) & (filesize($FileName) > 0)) {
                    print "<div class=\"$top\"></div>";
                    getEditorRat($Rat_ID, $Path_Texts, 2, $style, $path);
                }
            }
        }


        // Display Image Left > Text
        // *************************
        if (($GetRatRec['Rat_Field28'] == "img_left") OR ($GetRatRec['Rat_Field28'] == "img_right")) {
            if ($GetRatRec['Rat_Field28'] == "img_left") $align = "left";
            if ($GetRatRec['Rat_Field28'] == "img_right") $align = "right";
            ?>
            <div class="<?php echo $gridImage; ?>" style="float:<?php echo $align; ?>">
                <div class="<?php echo $gridImageItem; ?>">
                    <?php
                    if ($GetRatRec['Rat_Check2'] == 1 && $GetRatRec['Rat_Image_Resize1']<>'') {
                        if ($align == "right") $padRZ = "0px"; else $padRZ = "22px";
                        print "<div style=\"position:absolute; bottom:0; right:0; padding:0px $padRZ 22px 0px;\">";
                        print "<a href=\"$file\" target='_blank'><figure style=\"margin: auto;\"><img src=\"$LibraryImages/zoom.png\" width=22 height=22 title='' border=0 ><figcaption>$GetRatRec[Rat_Field1]</figcaption></figure></a>";
                        print "</div>";

                        print "<a href=\"$imgzoom1\" class='fancybox'><figure style=\"margin: auto;\"><img src=\"$imgzoom1\" style=\"$imageSize\" border=0><figcaption>$GetRatRec[Rat_Field1]</figcaption></figure></a>";
                    } else if($GetRatRec['Rat_Image_Resize1']<>''){
                        print "<figure style=\"margin: auto;\"><img src=\"$imgzoom1\" style=\"width:100%;\" border=0><figcaption>$GetRatRec[Rat_Field1]</figcaption></figure>";
                    }
                    if ($GetRatRec['Rat_Field1'] <> "") print "<em>$GetRatRec[Rat_Field1]</em>";
                    ?>
                </div>
            </div>
            <?php
            getEditorRat($Rat_ID, $Path_Texts, 2, $style, $path);
        } // if


        // Display Text > 2 Images below
        // *****************************
        if (($GetRatRec['Rat_Field28'] == "imgs_below") OR ($GetRatRec['Rat_Field28'] == "imgs_top")) {
            if ($GetRatRec['Rat_Field28'] == "imgs_below") {
                $FileName = $Path_Texts . $GetRatRec['Rat_Text2'] . ".htm";

                if ((file_exists($FileName) & (filesize($FileName) > 0)) & (strlen($GetRatRec['Rat_Text2']) > 0)) {
                    getEditorRat($Rat_ID, $Path_Texts, 2, $style, $path);
                    print "<div class=\"$top\"></div>";
                }
            }
            print "<div class=\"$gridImage\">";
            print "<div class=\"$gridImageItem\" style=\"float:left;\">";
            if ($GetRatRec['Rat_Check2'] == 0 && $GetRatRec['Rat_Image_Resize1']<>'') {
                print "<figure style=\"margin: auto;\"><img src=\"$imgzoom1\" style=\"100%\" alt=\"$GetRatRec[Rat_Title]\"><figcaption>$GetRatRec[Rat_Field1]</figcaption></figure>";
            } else if($GetRatRec['Rat_Image_Resize1']<>''){
                print "<a href=\"$imgzoom1\" class='fancybox'><figure style=\"margin: auto;\"><img src=\"$imgzoom1\" style=\"$imageSize\" border=0><figcaption>$GetRatRec[Rat_Field1]</figcaption></figure></a>";
            }
            print "</div>";
            print "</div>";
            print "<div class=\"$gridImage\">";
            print "<div class=\"$gridImageItem\" style=\"float:right;\">";
            if ($GetRatRec['Rat_Check2'] == 0 && $GetRatRec['Rat_Image_Resize2']<>'') {
                print "<figure style=\"margin: auto;\"><img src=\"$imgzoom2\" style=\"100%\" alt=\"$GetRatRec[Rat_Title]\"><figcaption>$GetRatRec[Rat_Field1]</figcaption></figure>";
            } else if($GetRatRec['Rat_Image_Resize2']<>''){
                print "<a href=\"$imgzoom2\" class='fancybox'><figure style=\"margin: auto;\"><img src=\"$imgzoom2\" style=\"$imageSize\" border=0><figcaption>$GetRatRec[Rat_Field1]</figcaption></figure></a>";
            }
            print "</div>";
            print "</div>";
            print "<div style=\"clear:both;\"></div>";
            if ($GetRatRec['Rat_Field28'] == "imgs_top") {
                print "<div class=\"$top\"></div>";
                getEditorRat($Rat_ID, $Path_Texts, 2, $style, $path);
            }
        }


        print "<div class=\"$top\"></div>";
    } // end of while GetRatRec
    print "<div style=\"clear:both;\"></div>";


} else { // if mobile
    while ($GetRatRec = f($GetRatRecs_Query)) {
        $Rat_ID = $GetRatRec['Rat_ID'];
        $mobimage1 = $Path_ImageRes_Rat . $GetRatRec['Rat_Image_Resize1'];
        $mobimage2 = $Path_ImageRes_Rat . $GetRatRec['Rat_Image_Resize2'];

if ($GetRatRec['Rat_Check1'] == '1') print "<div class=\"$top\"></div><h2>$GetRatRec[Rat_Title]</h2>";
        if ($GetRatRec['Rat_Image_Resize1'] <> "") print "<figure style=\"margin: auto;\"><img src=\"$mobimage1\" alt=\"\" style='width:100%; padding-top:20px;'  border=0><figcaption>$GetRatRec[Rat_Field1]</figcaption></figure></a>";
        if ($GetRatRec['Rat_Image_Resize2'] <> "") print "<figure style=\"margin: auto;\"><img src=\"$mobimage2\" alt=\"\" style='width:100%; padding-top:20px;'  border=0><figcaption>$GetRatRec[Rat_Field1]</figcaption></figure></a>";
        print "<div class=\"top10\">";
        getEditorRat($Rat_ID, $Path_Texts, 2, $style, $path);
        print "</div>";
    } // while
}
?>
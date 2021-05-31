<script>
    $(document).ready(function () {
        $('.bxcontentArea').bxSlider({
            controlsphotos: true,
            pager: false,
            controls: true,
            slideWidth: 1000,
            minSlides: 2,
            maxSlides: 2,
            infiniteLoop: true,
            autoStart: true,
            auto: true,
            pause: 4000,
            startSlide: 0,
            slideMargin: 0
        });

        $('.bxcontentAreaMobile').bxSlider({
            controlsphotos: true,
            pager: false,
            controls: true,
            slideWidth: 680,
            minSlides: 1,
            maxSlides: 1,
            infiniteLoop: true,
            autoStart: true,
            auto: true,
            pause: 4000,
            startSlide: 0,
            slideMargin: 10
        });
    });
</script>

<style>
    /* create styles to INCOM - delete the below one */
    .homeBXTextArea {
        position: absolute;
        width: 100%;
        bottom: 30px;
        margin: auto;
    }

    .homeBXText {
        text-align: center;
    }
</style>

<?php
// ΠΡΟΣΟΧΗ: χρειάζεται 100% στο width / admin template
$ModPageID = getModPageID($ModPageID, $Lang);

$maxPhotos = $initMaxPhotos;
$numphotosH = $initNumPhotos;

$GetBXContent_Sel = "Select * FROM records WHERE Rec_Page_ID = $ModPageID AND Rec_ShowHome = 1 Order by Rec_DateStart";
$GetBXContent_Query = q($GetBXContent_Sel);


if ($mobileMode <> 1) {
    print "<div class=\"bxcontentArea\">";
} else {
    print "<div class=\"bxcontentAreaMobile\">";
}
while ($GetBXContent = f($GetBXContent_Query)) {
    $image = $GetBXContent['Rec_Image1'];
    $imagepath = $Path_Image . $image;

    if ($mobileMode <> 1) {
        print"\n<div class=\"slide\">\n";
        print "<a href=\"\" target=\"_blank\"><img src=\"$imagepath\" style=\"\" alt=\"$imgTitle\"></a>\n";
        print "<div class=\"homeBXTextArea\"><div class=\"homeBXText\">".$GetBXContent["Rec_Title"]."</div></div>\n";
        print "\n</div>\n";
    } else { // if mobile
        print "<a href=\"$imgURLlink\" target=\"_blank\"><img src=\"$imgzoom\" alt=\"$imgTitle\" style='width:100%'></a>";
    }
}
print "</div>";
?>

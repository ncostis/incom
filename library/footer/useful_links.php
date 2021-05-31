
<?php
if($ModFieldText <> ""){print "<div class=\"followUs center\">".$ModFieldText."</div>";}
?>
<div class="usefulText">

	<?php if ($GetHome['Rec_Field2'] <> ''){
	    print"<a data-fancybox data-type=\"iframe\" data-src=\"".$rootURL."library/lists/weather_widget.php\" href=\"javascript:;\" data-width='190' data-height='295' class=\"usefulLinks\">".$GetHome["Rec_Field2"]."</a>";
	} ?>

	<?php if ($GetHome['Rec_Field6'] <> '') { ?>
   	    <a id="currency" data-fancybox data-type="iframe" href="javascript:;" data-src="<?php echo $rootURL; ?>library/lists/currency.php" class="usefulLinks" data-width='160' data-height='280'><?php echo $GetHome['Rec_Field6']; ?></a>
    <?php } ?>

    <?php if ($GetHome['Rec_Field4'] <> '') {
        print"<a id=\"time\" data-fancybox data-type=\"iframe\" data-src=\"".$rootURL."library/lists/time_widget.php?Lang=$Lang\" href=\"javascript:;\" data-width='360' data-height='260' class=\"usefulLinks\">".$GetHome["Rec_Field4"]."</a>";
    } ?>

</div>
<script>
$(document).ready(function(){

    $("[data-fancybox]").fancybox({
        iframe : {
            css : {
                width  : "350px",
                height : "250px"
            }
        }
    });
});
</script>

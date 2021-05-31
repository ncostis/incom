<div style="position:sticky;top:90px;">
<script type="text/javascript">
  $(document).ready(function($){
    $('.accordion-toggle').click(function(e){
      e.preventDefault();
      $(this).next().slideToggle('fast');
      $(".accordion-content").not($(this).next()).slideUp('fast');
      $('.accordion-toggle').not($(this)).removeClass("active");
      $(this).addClass("active");
    });
  });
</script>
<style>
  .accordion-toggle{cursor: pointer;}
  .accordion-content{display: none;}
  .accordion-content.default{display: block;}
</style>

<div class='mainBlogTitle'><?php echo $GetTitle['Page_Name']?></div>

<?php

$noblogAcc = 0;

    if ($noblogAcc == 0) {
        $tabButton = "blogMenu blogMenuSel";
    } else {
        $tabButton = "blogMenu";
    }
    ?>
        <a href="/#" class="accordion-toggle <?= $tabButton?>"><?= $GetMenu["Rec_Scroll1"]?></a>
    <?php

    // SHOW RECORDS
    ?>
    <div class="accordion-content"
        <?php if ((($noblogAcc == 0) AND (getparamvalue('Rec_ID') == ""))) {
        print " style='display:block;'";
    } else {
        print " style='display:block;'";
    } ?>>
        <?php
        $GetBlogRec_Sel = "SELECT * FROM records WHERE Rec_Page_ID = $Page_ID Order by Rec_DateStart Desc";
        $GetBlogRec_Query = q($GetBlogRec_Sel);
        while ($GetBlogRec = f($GetBlogRec_Query)) {
            if ($GetBlogRec['Rec_ID'] == getparamvalue('Rec_ID')) $linkBlog = "blogLinkMenuSel"; else $linkBlog = "blogLinkMenu";
            $friendlyURL = friendly($GetBlogRec['Rec_Title']);
            print "<div class=\"bottom10\" style=\"padding-left:12px;\"><a href=\"$siteURL$ID/".$GetBlogRec["Rec_ID"]."/$friendlyURL/\" class=\"$linkBlog\">".$GetBlogRec["Rec_Title"]."</a></div>";
        } ?>
    </div>

    <?php $noblogAcc++;

 ?>
</div>

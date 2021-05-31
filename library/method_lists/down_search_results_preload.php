<?php
if ($numpages > 1) {
    print"<table align=center><tr>";

    $numdivs = $numpages;
    for ($nodivMenu = 0; $nodivMenu < $numpages; $nodivMenu++) {
        if ($nodivMenu == 0) {
            $tabButton = "pagingNumSel";
        } else {
            $tabButton = "pagingNum";
        }
        ?>
        <td valign=top style="width:21px;" align="center"><a
                href="javascript:showDivPaging(<?php echo $nodivMenu; ?> + ',' + <?php echo $numdivs; ?>)"
                id="pagingNumLink<?php echo $nodivMenu; ?>"
                class="<?php echo $tabButton; ?>"><?php echo $nodivMenu + 1; ?></a>
            <?php // if ($nodivMenu < ($numdivs-1)) print "<span class='bodytext'> | </span>"; ?>
        </td>
    <?php }
    print"</tr></table>";
} ?>
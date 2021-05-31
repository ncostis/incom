<?php
if (!isset($stringSec)) $stringSec = '';
if (!isset($_GET['Page_ID'])) $_GET['Page_ID'] = '';
?>

    <!-- Welcome User -->
    <div class="admMenuPanel bgDark">
        <div class="paddingLeftMenu">
            <div class="cLight" style='padding:20px 0 15px;'>
                Hello, <?php echo trim(str_replace(["_","!","*","&", "#"], " ", Auth::userName()))?>!
            </div>
            <form action="index.php?ID=search" method="post" name="searchform">
                <div style="display:flex;padding-right:7%;">
                    <input type="text" name="findme" class="formField search bgDark cLight" placeholder="Search">
                    <input type="submit" class="publishOK bgMedium" value="GO">
                </div>
            </form>
            <div class="top20"></div>
        </div>
        <!-- Logout -->
        <a href="condb/logout.php" class="admLink btn cLight bgDark">
            <i class="fas fa-power-off"></i>
            Logout
            <span class="right">
                <span class="timeToLogout"><?php echo Auth::timeToLogout()/60?> min</span>
            </span>
        </a>
    </div>

    <!-- SECTIONS -->
    <div class="admMenuPanel admMenuPanelPadd bgDark">
        <div class="leftBackTitle cMedium">SECTIONS</div>
        <div class="paddingLeftMenu">
            <?php
            if (Auth::accessLevel() > 0) $stringSec = "AND Section_Name <> 'hidden'";
            $Sections_Sel = "SELECT * FROM sections WHERE Parent_Section_ID = 0 AND Section_Name <> 'settings' AND Section_Name <> 'optimized' $stringSec Order by Section_Order Asc LIMIT 0,6";
            $Sections_Query = q($Sections_Sel);
            while ($GetSection = f($Sections_Query)) { ?>
                <?php if ($_SESSION['AdminSection'] == $GetSection['Section_Name'] && $ID!='sections_view') $hover = "active"; else $hover = ""; ?>
                <div class="left"><a href="index.php?Section=<?php echo $GetSection['Section_Name']; ?>"
                                     class="admLink cLight <?php echo $hover; ?>"><?php echo $GetSection['Section_Title']; ?></a></div>
                <?php if (Auth::accessLevel() == 0) { ?>
                    <div class="right"><a
                            href="index.php?ID=sections_edit&Section_ID=<?php echo $GetSection['Section_ID']; ?>"
                            class="admLink cMedium"><i class="fas fa-edit"></i></a></div>
                <?php } ?>
                <div style="clear:both;"></div>
            <?php } ?>
            <?php if (Auth::accessLevel() == 0) { ?>
                <div class="top8"><a href="index.php?ID=sections_view" class="admLink cLight <?php if($ID=='sections_view') echo 'active';?>">[+] All Sections</a></div><?php } ?>
        </div>
    </div>

    <!-- STYLES CSS -->
    <?php if ((Auth::accessLevel() == 0) OR ($accAdm['Acc_CSS'] == 1)) { ?>
        <div class="admMenuPanel bgDark">
        	<a class="popUpWindow admLink btn cLight bgDark" href="core/styles_view.php?HeaderCat=1" data-width="680" data-height="94%"><i class="fas fa-paint-brush"></i>&nbsp;&nbsp;Styles</a>
            <a class="popUpWindow admLink btn cLight bgDark" href="core/links_view.php?HeaderCat=1" data-width="680" data-height="94%"><i class="fas fa-link"></i>&nbsp;&nbsp;Links</a>
            <a class="popUpWindow admLink btn cLight bgDark" href="core/fonts_edit.php" data-width="1024" data-height="94%"><i class="fas fa-font"></i>&nbsp;&nbsp;Fonts</a>
            <a class="popUpWindow admLink btn cLight bgDark" href="core/layout_styles_view.php?HeaderCat=1" data-width="1024" data-height="94%"><i class="fas fa-layer-group"></i>&nbsp;&nbsp;Layout Styles</a>
        </div>
    <?php } ?>

    <!-- Edit from Category -->
    <?php if ((Auth::accessLevel() == 0) AND ($_GET['Page_ID'] <> "") AND (!isset($_GET['Rec_ID']) || $_GET['Rec_ID'] == "")) { ?>
        <!-- <div class="admMenuPanel admMenuPanelPadd bgDark">
            <div class="leftBackTitle cMedium">EDIT</div>
            <div class="paddingLeftMenu">
                <a href="index.php?ID=record_view&Page_ID=<?php echo $_GET['Page_ID']; ?>" class="admLink cLight">Records</a>
                <a href="index.php?ID=lists_edit&List_ID=<?php echo $CurList['Page_List_ID']; ?>" class="admLink cLight">Edit Field List</a>
            </div>
        </div> -->
        <?php } ?>

        <?php if (isset($_GET['Rec_ID'])) { ?>
        <!-- Bulk Changes -->
        <div class="admMenuPanel admMenuPanelPadd bgDark">
            <div class="leftBackTitle cMedium">TOOLS</div>
            <div class="paddingLeftMenu">
                <div>
                    <span class='cMedium' style="padding:5px;display:inline-block">Lorem ipsum:</span> <a class="admLink cLight" style="display:inline;" href="javascript:;" onclick="var temp = $('<input>');$('body').append(temp);temp.val(LoremText()).select();document.execCommand('copy');temp.remove();var toolTip = $('<span class=\'tooltipText\'>✔ Copied</span>').prependTo(this).fadeOut(1800); setTimeout(function() {toolTip.remove();}, 2000); ">Text</a> <span class='cMedium'>|</span>
                    <a href="javascript:;" class="admLink cLight" style="display:inline;" onclick="var temp = $('<input>');$('body').append(temp);temp.val(LoremTitle()).select();document.execCommand('copy');temp.remove(); var toolTip = $('<span class=\'tooltipText\'>✔ Copied</span>').prependTo(this).fadeOut(1800); setTimeout(function() {toolTip.remove();}, 2000);">Title</a>
                </div>
            </div>
        </div>
        <?php } ?>

        <!-- Global Settings -->
        <?php if ((Auth::accessLevel() == 0 || $accAdm['Acc_Settings'] == 1)
                //&& $_GET['ID']=='pages_edit'
            ) { ?>
            <div class="admMenuPanel admMenuPanelPadd bgDark">
                <div class="leftBackTitle cMedium">SETTINGS</div>
                <div class="paddingLeftMenu">
                   <a class="popUpWindow admLink cLight" href="core/settings_edit.php?PS_ID=1" data-width="680" data-height="94%" title="Display Settings of category (auto resize photos, etc)">Global Settings</a>
                </div>
            </div>
        <?php } ?>
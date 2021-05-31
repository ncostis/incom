<div class="">
<nav id="nav" role="navigation">
<a href="#" onclick="return false;" title="Show navigation" class="menu_icon toggle-button">
<span></span>
<span></span>
<span></span>
<span></span>
</a>
<?php
    $isVertical = false;
    $isSlide = true;

    global $pIDArray;
    rootMenu($Page_ID); //get $IDpath
    $numitems = count($pIDArray);

    if (!isset($modShowMenu) || $modShowMenu == 0) {
        $string = "Parent_Page_ID = 0";
    }
    if (isset($modShowMenu) && $modShowMenu == 1) {
        $string = "Parent_Page_ID = $headerPageID";
    }
    if (isset($modShowMenu) && $modShowMenu == 2) {
        $ModPageID = getModPageID($ModPageID, $Lang);
        $string = "Parent_Page_ID = $ModPageID";
    }

    if ($mobileMode <> 1) {
        $stringPageEn = "Page_Enable = 1";
    } else {
        $stringPageEn = "Page_Mob_Enable = 1";
    }

    $GetMenu_Sel = "SELECT * FROM pages WHERE $string AND Page_Section = 'general' AND $stringPageEn AND Page_Lang = '$Lang' order by Page_Order";
    $GetMenu_Query = q($GetMenu_Sel);
    $nummen = nr($GetMenu_Query);
    $cnum = 0;

    print "<ul class=\"clearfix menu_ul topmenu\" id='toggle_menu'>";
    print"<div class=\"logoPaddMenu\">";
    require $path."library/basic/logo.php";
    print"</div>";
    print"<div class=\"top20\"></div>";

    while ($GetMenu = f($GetMenu_Query)) {
        $cnum = $cnum + 1;
        $pID = $GetMenu["Page_ID"];
        $PageName = $GetMenu['Page_Name'];
        if ($GetMenu['Page_No_Follow'] == 1) $rel = "rel=\"nofollow\""; else $rel = "";
        $CountWords = $GetMenu['Page_MenuLines'];
        $IDPath = $GetMenu['Page_View'];
        if (((getparamvalue('ID') == $GetMenu['Page_View']) AND (getparamvalue('ID') <> "")) OR ($GetMenu["Page_ID"] == $headerPageID) OR (($GetMenu["Page_GetFromSection"] == $Page_Section) AND ($Page_Section <> "general"))) {
            $rover = "rootMenuSel rootMenu";
        } else {
            $rover = "rootMenu";
        }
        
        if($_GET['le']==1){
            $rover.=" incom_edit_container";
            $le_attribute = "data-rec-id='$pID' data-page='page'";
        }

        print ($isVertical) ? "<li style=\"display:block\">" : "<li>";
        //if ($cnum <> '1') print "<span class='menuSep'>&nbsp;</span>";
        if ($IDPath <> "") {
            if($_GET['le']==1){$le_attribute.= "data-field='Page_View'";}
            $GetParents_Sel = "SELECT * FROM pages WHERE Parent_Page_ID = $pID AND $stringPageEn";
            $GetParents_Query = q($GetParents_Sel);
            if ((nr($GetParents_Query) > 0) AND ($GetMenu['Page_Show_SubMenu'] == 1)) {// if there are subcategories AND Method List is set to default then show Subcategories
                if ($CountWords == 0) {
                    print "<a class=\"$rover\" $le_attribute><span class='rootMenuSpan'>$GetMenu[Page_Name]</span></a>";
                } else {
                    print "<a href=\"javascript:void(0)\" class=\"$rover\">";
                    print "<span class='menusettings2L'>";
                    $strL1 = wordTrim($PageName, $CountWords);
                    print "$strL1<br></span>";
                    $parts = explode("$strL1", $PageName);
                    $aftertext = $parts[1];
                    print "<span class='menusettings2L'>$aftertext</span>";
                    print "</a>";
                }
                $ulstyle = ($isVertical) ? " position:relative;" : "";
                print "<ul class=\"ul_submenu\" style=\"display:none;$ulstyle\">";
                buildmenuHor($pID, 0, "", $CurPageView, $centralpage, $stringPageEn, $siteURL);
                print "</ul>";
            } else {
                if ($CountWords == 0) {
                    if (strpos($IDPath, '#') !== false) $slash = ""; else $slash = "/";
                    print"<a href=\"$siteURL$IDPath$slash\" class=\"$rover\" $rel $le_attribute><span class='rootMenuSpan'>$GetMenu[Page_Name]</span></a>";
                } else {
                    print "<a href=\"$siteURL$IDPath/\" class=\"$rover\" $rel $le_attribute>";
                    print "<span class='menusettings2L'>";
                    $strL1 = wordTrim($PageName, $CountWords);
                    print "$strL1</span><br>";
                    $parts = explode("$strL1", $PageName);
                    $aftertext = $parts[1];
                    print "<span class='menusettings2L'>$aftertext</span>";
                    print "</a>";
                }
            }
        } else {
            if($_GET['le']==1){$le_attribute.= "data-field='Page_Html'";}
            $htmlstring = substr($GetMenu['Page_Html'], 0, 4);
            if ($htmlstring == "http") {
                print "<a href=\"$GetMenu[Page_Html]/\" target='_blank' class=\"$rover\" $rel $le_attribute><span class='rootMenuSpan'>$GetMenu[Page_Name]</span></a>";
            } else {
                print "<a href=\"$siteURL$GetMenu[Page_Html]\" class=\"$rover\" $rel $le_attribute><span class='rootMenuSpan'>$GetMenu[Page_Name]</span></a>";
            }
        }
        print "</li>";
    } //end while

    // print"<div class=\"tableAuto\">";
    // $SocModStyle="socialPadd";//style class for each media icon
    // print"<div class=\"top50\"></div>";
    // print "<div class=\"followUs\">Follow Us</div>";
    // require $path."library/social/social_media.php";
    // print"</div>";
    print "</ul>";
    print "</nav>";


    function buildmenuHor($Pid, $spaces, $symbol, $CurPageView, $centralpage, $stringPageEn, $siteURL){
        
        global $IDpath, $GetAccessMember;
        $GetMenuItem = "SELECT * FROM pages WHERE Parent_Page_ID = $Pid  AND $stringPageEn order by Page_Order";
        $GetMenuItem_Query = q($GetMenuItem);
        $spaces = $spaces + 10;

        while ($GetMenuItem = f($GetMenuItem_Query)) {
            $Pid = $GetMenuItem['Page_ID'];
            if ($GetMenuItem['Page_No_Follow'] == 1) $rel = "rel=\"nofollow\""; else $rel = "";
            $SubPageName = $GetMenuItem['Page_Name'];
            $SubCountWords = $GetMenuItem['Page_MenuLines'];
            print "<li>";
            $IDPath = $GetMenuItem['Page_View'];
            if ((getparamvalue('ID') == $GetMenuItem['Page_View']) AND (getparamvalue('ID') <> "")) {
                $subrover = "subMenuSel";
            } else {
                $subrover = "subMenu";
            }
            
            if($_GET['le']==1){
                $subrover.=" incom_edit_container";
                $le_attribute = "data-rec-id='$Pid' data-page='page'";
            }

            if ($IDPath <> "") {
                if($_GET['le']==1){$le_attribute.= "data-field='Page_View'";}
                if ($SubCountWords == 0) {
                    print "<a href=\"$siteURL$GetMenuItem[Page_View]/\" class=\"$subrover\" $rel $le_attribute><span class='submenusettings'>$GetMenuItem[Page_Name]</span></a>";
                } else {
                    print "<a href=\"$siteURL$GetMenuItem[Page_View]/\" class=\"$subrover\" $rel $le_attribute>";
                    print "<span class='submenusettings2L'>";
                    $strL1 = wordTrim($SubPageName, $SubCountWords);
                    print "$strL1</span><br>";
                    $parts = explode("$strL1", $SubPageName);
                    $aftertext = $parts[1];
                    print "<span class='submenusettings2L'>$aftertext</span></a>";
                }

            } else {
                if($_GET['le']==1){$le_attribute.= "data-field='Page_Html'";}
                $typefile = substr($GetMenuItem['Page_Html'], 0, 4); // Checks if external link is javascript or http url
                if ($typefile == "http") {
                    print "<a href=\"$GetMenuItem[Page_Html]/\" target='_blank' class=\"$subrover\" $le_attribute><span class='submenusettings2L'>$GetMenuItem[Page_Name]</span></a>";
                } else {
                    print "<a href=\"$siteURL$GetMenuItem[Page_Html]/\" class=\"$subrover\" $le_attribute><span class='submenusettings2L'>$GetMenuItem[Page_Name]</span></a>";
                }
            }
            //buildmenuHor($Pid,$spaces,"&#8226;&nbsp;",$CurPageView,$siteURL);
            print "</li>";
        }
    }
    ?>

</div>
<?php if(!$isSlide){?>
<script>
    $(document).ready(function () {
        $("#nav .menu_icon").click(function (e) {//click menu button
            e.preventDefault();
            if ($("#nav").hasClass("open")) {
                $("#nav>ul").slideUp();
            } else {
                $("#nav>ul").slideDown();
            }
            $("#nav").toggleClass("open");
            $(this).toggleClass("open");
        });
        <?php if($mobileMode <> 1){?>
        //submenu slide
        $("#nav li:has(ul)").hover(function () {
            $(this).children("ul").slideDown(300);
        }, function () {
            $(this).children("ul").stop().slideUp(300);
        });
        <?php }?>
        $("#nav ul ul li").on('click', function (event) {
            event.stopPropagation();
        });
        $("#nav>ul>li:has(ul)").on('click', function () {
            $("#nav li ul").not($(this).children("ul")).stop().slideUp(300); //close other opened submenu
            if ($(this).children("ul").css("display") == "block")
                $(this).children("ul").stop().slideUp(300);
            else
                $(this).children("ul").stop().slideDown(300);
        });
    });
</script>

<?php }else{ //is mobile and slide?>
    
    <script async defer>
    function initSlideOut(){
        var width = 300;
        var marginMobile = 80;
        var stickyNav = $('.nav');
      var slideout = new Slideout({
        'panel': document.getElementById('container'),
        'menu': document.getElementById('toggle_menu'),
        <?php if($mobileMode){?>
            'padding': $(window).width()-marginMobile,
        <?php }else{?>
            'padding': width,
        <?php }?>
        'tolerance': 70
      });

    slideout
      .on('beforeopen', function() {
        this.panel.classList.add('panel-open');
        fix_scroll();
      })

      .on('open', function() {
        this.panel.addEventListener('click', close);
        $(window).on('scroll', fix_scroll);
      })

      .on('beforeclose', function() {
        this.panel.classList.remove('panel-open');
        this.panel.removeEventListener('click', close);
        $("#nav .menu_icon").removeClass("open");
      })

      .on('close', function() {
        $(window).off('scroll', fix_scroll);
        stickyNav.css('top','');
      })
      ;

        $(document).on('click', '.slideout-menu', function(){
            slideout.close();
        })

        $('.toggle-button').on('click', function() {
            slideout.toggle();
            $("#nav .menu_icon").addClass("open");
        });

        $("#toggle_menu").appendTo("body");
        <?php if($mobileMode){?>
            $('.slideout-menu').css('width', ($(window).width()-marginMobile)+'px');
        <?php }else{?>
            $('.slideout-menu').css('width', (width)+'px');
        <?php }?>

        function close(eve) {
          eve.preventDefault();
          slideout.close();
          $("#nav .menu_icon").removeClass("open");
        }

        function fix_scroll() {
          stickyNav.css('top', $(window).scrollTop() + 'px');
        }
    }
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/slideout/1.0.1/slideout.min.js" defer="" async defer onload='initSlideOut()'></script>
    <style>
    .panel-open{
      box-shadow:inset 0 0px 30px rgba(0,0,0,0.5);
    }
    .slideout-menu {
      position: fixed;
      top: 0;
      bottom: 0;
      width: 80vw;
      min-height: 100vh;
      overflow-y: auto;
      -webkit-overflow-scrolling: touch;
      z-index: 0;
      display: none;
    }
    .slideout-menu-left {
      left: 0;
    }

    .slideout-menu-right {
      right: 0;
    }
    .slideout-panel {
      position: relative;
      z-index: 1;
      /*will-change: transform;*/
      background-color: #fff; /* A background-color is required */
      min-height: 100vh;
    }
    .slideout-open,
    .slideout-open body,
    .slideout-open .slideout-panel {
      overflow: hidden;
    }
    .slideout-open .slideout-menu {
      display: block;
     background-color: #fff;
    }
    .slideout-panel:before {
      content: '';
      display: block;
      background-color: rgba(0,0,0,0);
      transition: background-color 0.5s ease-in-out;
    }
    .panel-open:before {
      position: absolute;
      top: 0;
      bottom: 0;
      width: 100%;
      background-color: rgba(0,0,0,.5);
      z-index: 1000;
       transition: background-color 0.5s ease-in-out;
    }
    </style>
<?php }?>
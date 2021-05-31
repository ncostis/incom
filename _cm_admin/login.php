<?php
session_start();
include "admin_routes.php";
require_once($routes["active_mysql.php"]);
$GetVar = f(q("SELECT * FROM pages, records WHERE Page_ID = Rec_page_ID AND Parent_Page_ID = 0 AND Rec_Page_Content = 0 AND Page_Section = 'settings' Order by Page_Order Asc Limit 0,1"));
$rootURL = "/" . $GetVar['Rec_Title'];

require_once $routes["initvars.php"];
require_once $routes["settingsvars.php"];
require_once $routes["langCMS_en.php"];

//Initial Settings
// require "active_mysql.php";

if (isset($_POST["userlogin"]) && !empty($_POST["userlogin"])) {
    require_once $routes["UserAuth.php"];
    Auth::processLogin();
}

?>

<!DOCTYPE HTML>
<head>
    <?php require_once "core/head_script.php"; ?>
    <script>
        if(window.self !== window.top){ //loaded inside iframe
            window.top.location = "<?php echo $rootURL?>_cm_admin/login.php";
        }
    </script>
    <style>
        html, body{width:100%;height:100%;padding:0;margin:0;min-height:591px;overflow:hidden;}
        body{background-color:#323232 !important;position:relative;overflow:hidden;font-size:14px;font-family:'Inter';color:#c0c0c0;}
        .relative{position:relative;}
        .bottom30{padding-bottom:30px;}
        .top25{padding-top:25px;}
        .background{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);z-index:0;}
        .background svg{width:90vw;height:130vh;min-height:600px;min-width:1000px;transform:rotate(-12deg);/*-webkit-filter: drop-shadow( 0 0 30px rgba(255, 255, 255, .1));filter: drop-shadow( 0 0 30px rgba(255, 255, 255, .1));*/}
        .background.red #logoBg{fill:#333 !important;opacity:1;}
        #logoBg{
            animation-duration: 4s;
            animation-iteration-count: infinite;
            -webkit-transition:all 300ms ease-in-out;
            -moz-transition:all 300ms ease-in-out;
            -o-transition:all 300ms ease-in-out;
            transition:all 300ms ease-in-out;
        }
        .loginCont{padding-bottom:30px;opacity:0;position:absolute;top:50%;left:50%;transform:translate3d(-50%,-65%, 0);z-index:1;width:100%;max-width:600px;backface-visibility: hidden;
            -webkit-transition:all 800ms cubic-bezier(0,.5,.3,1);
            -moz-transition:all 800ms cubic-bezier(0,.5,.3,1);
            -o-transition:all 800ms cubic-bezier(0,.5,.3,1);
            transition:all 800ms cubic-bezier(0,.5,.3,1);}
        .logo{max-width:228px;width:100%;image-rendering:-webkit-optimize-contrast;}
        .loginBack{background-color:rgba(0,0,0,0.3);border:1px solid rgba(0,0,0,0.2);margin-top:1px;padding:35px 13% 30px;border-radius:4px;box-shadow:0 5px 20px rgba(0,0,0,.2);}
        .loginText{color:#aaa;font-size: 13px;position:absolute;top:51%;left:35px;transform:translate3d(0,-50%,0);-webkit-transition:all 100ms ease-in-out;
            -moz-transition:all 100ms ease-in-out;
            -o-transition:all 100ms ease-in-out;
            transition:all 100ms ease-in-out;}

        input:-webkit-autofill ~ .loginText,
        input:-webkit-autofill:hover ~ .loginText,
        input:-webkit-autofill:focus ~ .loginText{top:-30%;left:0px;}
        .formLogin:focus ~ .loginText, .formLogin.filled ~ .loginText{top:-30%;left:0px;}

        .loginBack svg{position:absolute;top:8px;left:10px;color:#aaa;}

        form{padding:30px 0;}
        form .submit{background:#19a2dc;padding:7px 26px;color:#fff;border:none;outline:none;cursor:pointer;transition:all 300ms ease-in-out;margin-top:5px;font-size:12px;}
        form .submit:hover{background:#34b0e4;}
        form .formLogin{color:#c0c0c0;font-size:13px;font-family:'Inter';-webkit-appearance:none;-moz-appearance:none;appearance:none;background:transparent;border:1px solid;padding:7px 35px;width:100%;}
        form .formLogin:focus{outline:none;border:1px solid #19a2dc;}
        form .formLogin[name=userlogin]:before{content:'userlogin';}
        form .formLogin{-webkit-appearance:none;-moz-appearance:none;appearance:none;background:#333;}

        .loginVersion{position:absolute;bottom:0px;right:2px;color:#c0c0c0;font-size:11px;}

        @keyframes logo {
          0% {/*fill: #3d3d3d;*/opacity:1;}
          75% {/*fill: #363636;*/opacity:1;}
          100% {/*fill: #3d3d3d;*/opacity:1;}
        }

        .loginCopyright{position:fixed;bottom:20px;left:50%;transform:translate(-50%,0);font-size:11px;}
    </style>
    <script>
        $(document).ready(function(){
            $("#logoBg").css("fill", "#3a3a3a");
            $("#logoBg").css("animation-name", "logo");
            $(".loginCont").css("opacity", "1").css("transform", "translate3d(-50%,-70%, 0)");
            $("form").on("submit", function(){
                $("body").fadeOut(400)
            })
            $(".formLogin").on("input", function(){
                if($(this).val()!="") $(this).addClass("filled")
                    else $(this).removeClass("filled")
            })
        })
    </script>
</head>

<body>
    <div class="background <?php if (isset($_GET["er"])) echo "red"?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="378" height="211" viewBox="0 0 378 211">
          <defs>
            <style>
              .cls-1 {fill:#3a3a3a;fill-rule:evenodd;}
            </style>
          </defs>
          <path id="logoBg" data-name="Color Fill 1" class="cls-1" d="M144,56l37-23S156.079,0.957,107,1C50.783,1.049,1.723,40.827,1,106,0.322,167.115,51.516,209.257,104,210c35.768,0.507,58-17,58-17l100-63-29-30s-82.9,53.6-100,62a62.558,62.558,0,0,1-90-57c0-45.812,42.078-63,63-63S144,56,144,56Zm25,61C164.186,54.628,208.5,1,274,1c63.714,0,102.1,51.79,103,104,0.94,54.24-42.608,105.163-102,105-41.151-.113-61.687-18.546-67-23l36-26s10.133,7.084,29,7c32.8-.146,63.6-25.055,63-64-0.573-37.17-34.543-62.421-61-62-29.5.47-56.474,18.513-63,49C186.979,106.289,189.39,104.078,169,117Z"/>
        </svg>
    </div>
    <div class="loginCont">
        <div class="bottom30 center"><img src="elements/logo_login.png" alt="" class="logo"/></div>
        <div class="loginBack">
            <?php if (isset($_GET['er']) && $_GET['er'] == 1) { ?>
                <div class="bottom20 cRed center"><?php echo $introwrongdata; ?></div>
            <?php } ?>

            <form name="incomlogin" action="" method="POST">
                <div style="max-width:260px;margin:auto;">
                    <div class="relative">
                        <i class="fas fa-user"></i>
                        <input type="text" name="userlogin" class="formLogin formfield" required="required" placeholder="">
                        <div class="loginText">Username</div>
                    </div>
                    <div class="top25"></div>
                    <div class="relative">
                        <i class="fas fa-unlock-alt"></i>
                        <input type="password" name="passlogin" class="formLogin formfield" required="required" placeholder="">
                        <div class="loginText">Password</div>
                    </div>
                    <div class="top25" align="right">
                        <input type="submit" value="LOGIN" class="submit">
                    </div>
                </div>
            </form>
            <div class="loginVersion">incom sb_<?php require_once "local/version.php"; ?></div>
        </div>
    </div>
    <div class="loginCopyright">- copywrite OVERRON - since 2002 -</div>
</body>
</html>
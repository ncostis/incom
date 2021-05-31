<link rel="shortcut icon" href="elements/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="color-scheme" content="light">
<meta name="theme-color" content="#6d6e6f">
<title>INCOM CMS</title>
<?php mysqli_query($db, "SET NAMES 'UTF8'"); ?>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
<link href="<?php echo $rootPath; ?>css/styles.css" rel="stylesheet" type="text/css">
<link href="<?php echo $rootPath; ?>css/links.css" rel="stylesheet" type="text/css">
<link href="<?php echo $rootPath; ?>elements/icons/style.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

defaultTheme = localStorage.getItem('defaultTheme');
if(!defaultTheme){
  $.get( "<?php echo $rootPath; ?>css/defaultTheme.css" )
    .done(function( data, textStatus){
      localStorage.setItem("defaultTheme", data);
      initLoaderTheme();
    })
}
darkTheme = localStorage.getItem('darkTheme');
if(!darkTheme){
  $.get( "<?php echo $rootPath; ?>css/darkTheme.css" )
    .done(function( data, textStatus){
      localStorage.setItem("darkTheme", data);
      initLoaderTheme();
    })
}
lightTheme = localStorage.getItem('lightTheme');
if(!lightTheme){
  $.get( "<?php echo $rootPath; ?>css/lightTheme.css" )
    .done(function( data, textStatus){
      localStorage.setItem("lightTheme", data);
      initLoaderTheme();
    })
}

//color theme buttons
$(document).ready(function(){
  $("input[name=colorTheme]").parent("label").on("click", function(e){
    if(e.target.tagName=="INPUT") return true;
    adminTheme = localStorage.getItem('adminTheme');
    $("body").removeClass(adminTheme);
    newAdminTheme = $(this).find("input[name=colorTheme]").val();
    $("input[name=colorTheme]").parents(".themeSelector").find("label").removeClass("active")
    $(this).addClass("active");
    $("body").addClass(newAdminTheme);
    localStorage.setItem("adminTheme", newAdminTheme);
    loadColorTheme(newAdminTheme);
  })
    adminTheme = localStorage.getItem('adminTheme');

  if(typeof(CKEDITOR)!=="undefined" && localStorage.getItem('adminTheme')=="darkTheme"){
    CKEDITOR.config.skin = 'moono-dark';
    CKEDITOR.config.contentsCss = 'editor_<?php echo $RenameString?>/contents-dark.css';
  }
})

// load color theme
function initLoaderTheme(){

    adminTheme = localStorage.getItem('adminTheme');
    if(adminTheme){
        loadColorTheme(adminTheme);
    }else{
        localStorage.setItem('adminTheme', "defaultTheme");
        loadColorTheme("defaultTheme");
    }

    $(document).ready(function(){
        $("body").addClass(adminTheme);
        $("input[value="+adminTheme+"]").prop( "checked", true );
        $("input[value="+adminTheme+"]").parent("label").addClass("active");
    })
}

initLoaderTheme();

function loadColorTheme(theme){
    if($("#colorThemeCss").length>0) $("#colorThemeCss").remove();
    var s = document.createElement("style");
    s.type = "text/css";
    s.id = "colorThemeCss";
    $(s).html(localStorage.getItem(theme));
    $("head").append(s);

    if(theme=="darkTheme" && "<?php echo basename($_SERVER['REQUEST_URI'])?>"!="login.php"){
        $("meta[name='color-scheme']").attr("content", "dark");
    }else{
        $("meta[name='color-scheme']").attr("content", "light");
    }
}

</script>
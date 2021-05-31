
//SCRIPT FOR CSS TEXTAREAS
if(typeof(window.le)==="undefined") window.le = {};
window.le.cssDiv = [];

function initAce(){

    $("div[id^=ace_]").each(function(){
        id = $(this).attr("id")
        var obj = ace.edit(id);
        if(typeof(adminTheme)!=="undefined" && adminTheme == "darkTheme")
            obj.setTheme("ace/theme/tomorrow_night");
        else
            obj.setTheme("ace/theme/tomorrow");
        obj.getSession().setMode("ace/mode/scss");
        obj.clearSelection();
        obj.getSession().setOption('indentedSoftWrap', false);
        obj.getSession().setUseWrapMode(true);
        obj.renderer.setShowGutter(false);
        obj.setFontSize(13);
        obj.id = $(this).attr("id");
        obj.name = $(this).data("name");;
        obj.setAutoScrollEditorIntoView(true);

        window.le.cssDiv[window.le.cssDiv.length] = obj;

        $(this).on("mousedown", function() {
                obj.resize();
            }
        );
    })

    var hasValue;
    window.le.cssDiv.forEach(function(obj, index){
        obj.setFontSize(12);
        obj.on("change", function(e){
                $(document).trigger("editor_styles_change", [obj.getValue(), obj.id, obj.name]);
                obj.resize();
            })
        if(obj.id.indexOf("ace_css_Div") === -1){//if not Css Div
            if(obj.getValue().length>0) hasValue=true; //if one of the advanced css divs have value
        }
        if(obj.id.indexOf("ace_link_Div") === -1){//if not Css Div
            if(obj.getValue().length>0) hasValue=true; //if one of the advanced css divs have value
        }

    })
    if(hasValue){$('.ADMadvanced-toggle').next().slideToggle('fast');}
}



function initStyles(){

    if($("div[id^=ace_css_Div]").length>0 || $("div[id^=ace_link_Div]").length>0){

        initAce();

    	$('input[name=publish_rec], input[name=save_rec]').click(function() {
            css_preparation();
    	});

        //color picker
        var target = document.querySelectorAll('.ADMcolorpicker');
        var fields = document.querySelectorAll('.ADMcolorpickerfield');
        // set hooks for each target element
        for (var i = 0, len = target.length; i < len; ++i) {

            let picker = new ColorPicker(target[i], "#"+fields[i].value);
            picker.field = fields[i];
            picker.el=target[i];

            picker.el.addEventListener('colorChange', function (event) {
            // This will give you the color you selected
            if(event.detail.color.hexa!='#NaNNaNNaNNaN'){
                color = event.detail.color.hexa;
                this.style.background =  color;
                color=color.replace('#','');
                picker.field.value = color;
                if(this.id=="ADMFontColorPicker")
                    $("input.ADMgroupcheckText").prop('checked', false);
                else if(this.id=="ADMBackColorPicker")
                    $("input.ADMgroupcheckBack").prop('checked', false);
                else if(this.id=="ADMLinkColorPicker")
                    $("input.ADMgroupcheckLink").prop('checked', false);
                else if(this.id=="ADMLinkHoverColorPicker")
                    $("input.ADMgroupcheckLinkRO").prop('checked', false);
                else if(this.id=="ADMLinkBackColorPicker")
                    $("input.ADMgroupcheckLinkBack").prop('checked', false);
                else if(this.id=="ADMLinkBackHoverColorPicker")
                    $("input.ADMgroupcheckLinkROBack").prop('checked', false);
                $(document).trigger("makeLiveStylesAndSave");
            }
            });

            fields[i].addEventListener('keyup', function (event) {
                picker.el.style.background = "#"+this.value;
                if(this.value.length==6 || this.value.length==8){
                    colorChange('#'+this.value,picker.el);
                }
            });
            
        }

        //Global Text color checkboxes
        $('.ADMgroupcheckText').on('change', function() {
            $(this).siblings('input[type="checkbox"]').prop('checked', false);
            if($(this).is(':checked')){
                $("input[name='css_Font_Color']").val($(this).next('label').attr("title"));
                $("#ADMFontColorPicker").css("background","#"+($(this).next('label').attr("title")));
                colorChange("#"+($(this).next('label').attr("title")),document.getElementById("ADMFontColorPicker"));
            }
        });

        $('.ADMgroupcheckLink').on('change', function() {
            $(this).siblings('input[type="checkbox"]').prop('checked', false);
            if($(this).is(':checked')){
                $("input[name='link_Color']").val($(this).next('label').attr("title"));
                $("#ADMLinkColorPicker").css("background","#"+($(this).next('label').attr("title")));
                colorChange("#"+($(this).next('label').attr("title")),document.getElementById("ADMLinkColorPicker"));
            }
        });

        $('.ADMgroupcheckLinkRO').on('change', function() {
            $(this).siblings('input[type="checkbox"]').prop('checked', false);
            if($(this).is(':checked')){
                $("input[name='link_RColor']").val($(this).next('label').attr("title"));
                $("#ADMLinkHoverColorPicker").css("background","#"+($(this).next('label').attr("title")));
                colorChange("#"+($(this).next('label').attr("title")),document.getElementById("ADMLinkHoverColorPicker"));
            }
        });

        //Global Back color checkboxes
        $('.ADMgroupcheckBack').on('change', function() {
            $(this).siblings('input[type="checkbox"]').prop('checked', false);
            if($(this).is(':checked')){
                $("input[name='css_Back_Color']").val($(this).next('label').attr("title"));
                $("#ADMBackColorPicker").css("background","#"+($(this).next('label').attr("title")));
                colorChange("#"+($(this).next('label').attr("title")),document.getElementById("ADMBackColorPicker"));
            }
        });

        $('.ADMgroupcheckLinkBack').on('change', function() {
            $(this).siblings('input[type="checkbox"]').prop('checked', false);
            if($(this).is(':checked')){
                $("input[name='link_BackColor']").val($(this).next('label').attr("title"));
                $("#ADMLinkBackColorPicker").css("background","#"+($(this).next('label').attr("title")));
                colorChange("#"+($(this).next('label').attr("title")),document.getElementById("ADMLinkBackColorPicker"));
            }
        });

        $('.ADMgroupcheckLinkROBack').on('change', function() {
            $(this).siblings('input[type="checkbox"]').prop('checked', false);
            if($(this).is(':checked')){
                $("input[name='link_BackRColor']").val($(this).next('label').attr("title"));
                $("#ADMLinkBackHoverColorPicker").css("background","#"+($(this).next('label').attr("title")));
                colorChange("#"+($(this).next('label').attr("title")),document.getElementById("ADMLinkBackHoverColorPicker"));
            }
        });

        
        //text alignment checkboxes
        $('.ADMFontAlignCheck').on('change', function() {
            $('.ADMFontAlignWrap').find('input[type="checkbox"].ADMFontAlignCheck').not(this).prop('checked', false);
            // $(this).prop('checked', true);
        });

        //text decoration checkboxes
        $('.ADMFontStyleCont.decoration').on('change', function() {
            $('.ADMTextDecorationWrap .ADMFontStyleCont.decoration').not(this).find('input[type="checkbox"]').prop('checked', false);
        });

        // sliders
        $("input[data-slider-id]").on('input change', function(){
            val = $(this).val();
            id = $(this).data('slider-id');
            $('input[data-input-id="'+id+'"]').val(val);
        });

        $('input[data-input-id]').on('input change',function(){
            val = $(this).val();
            id = $(this).data('input-id');
            $('input[data-slider-id="'+id+'"]').val(val);
        });


        //advanced css accordion toggle
        $('.ADMadvanced-toggle').on("click", function(){
             $(this).next().slideToggle('fast');
        });

        //background image uploader accordion toggle
        $('.ADMbackgroundImage-toggle').on("click", function(){
             $(this).next().slideToggle('fast');
        });

        //cropper fancybox init
        fancyboxInit("Styles",$('#StylesUploadForm .dropzone img').attr('src'));
        fancyboxInit("Links",$('#LinksUploadForm.dropzone img').attr('src'));
        fancyboxInit("LinksRO",$('#LinksROUploadForm.dropzone img').attr('src'));

        $(document).on('fancyboxInit', function(e,sourcePage,url){
            fancyboxInit(url);
        });


    }
}


$( document ).ready(function() {
    initStyles();
})

function fancyboxInit(sourcePage,url){
    $('#'+sourcePage+'UploadForm a.fancybox').fancybox({
            type:'iframe',
            width:1366,
            height:768,
            afterClose: function() {
                // var oldsrc=$(".dropzone img").attr('src');
                $('#'+sourcePage+'UploadForm .dropzone img').attr('src',url+"?v="+Date.now());
                $(document).trigger('StylesUploadForm', url+"?v="+Date.now());
            }
         });
}

function getRGBValues(str) {
  var vals = str.substring(str.indexOf('(') +1, str.length -1).split(', ');
  return {
    'r': vals[0],
    'g': vals[1],
    'b': vals[2]
  };
}

var colourIsLight = function (r) {
  // Counting the perceptive luminance
  var a = 1 - (0.299 * r.r + 0.587 * r.g + 0.114 * r.b) / 255;
  return (a < 0.5);
}

function matchBgAndTextColours(sel){
    var textColour = colourIsLight(getRGBValues($(sel).css("background-color"))) ? 'black' : 'white';
    $(sel).css('color', textColour);
}

function css_preparation(){

    window.le.cssDiv.forEach(function(obj){
        letterSpacingVal = $("#"+obj.id).parents('form').find('input[name=css_Font_LetterSpacing]').val();
        if((letterSpacingVal)!=''){letterSpacing="letter-spacing:"+letterSpacingVal+"px;";}else{letterSpacing="";}
        underlineVal = $("#"+obj.id).parents('form').find('input[name=css_Font_Underline]').prop('checked');
        if(underlineVal){underline="text-decoration:underline;";}else{underline="";}
        strikeThroughVal = $("#"+obj.id).parents('form').find('input[name=css_Font_Strikethrough]').prop('checked');
        if(strikeThroughVal){strikethrough="text-decoration:line-through;";}else{strikethrough="";}
        alignLeftVal = $("#"+obj.id).parents('form').find('input[name=css_Font_Align_Left]').prop('checked');
        if(alignLeftVal){alignLeft="text-align:left;";}else{alignLeft="";}
        alignCenterVal = $("#"+obj.id).parents('form').find('input[name=css_Font_Align_Center]').prop('checked');
        if(alignCenterVal){alignCenter="text-align:center;";}else{alignCenter="";}
        alignRightVal = $("#"+obj.id).parents('form').find('input[name=css_Font_Align_Right]').prop('checked');
        if(alignRightVal){alignRight="text-align:right;";}else{alignRight="";}
        alignJustifyVal = $("#"+obj.id).parents('form').find('input[name=css_Font_Align_Justify]').prop('checked');
        if(alignJustifyVal){alignJustify="text-align:justify;";}else{alignJustify="";}

        
        value = obj.getValue();
        if(obj.name=="css_Div" || obj.name=="link_DIV"){
            value += letterSpacing;
            value += underline;
            value += strikethrough;
            value += alignLeft;
            value += alignCenter;
            value += alignRight;
            value += alignJustify;
        }

        $("#"+obj.id).parents('form').find('input[name='+obj.name+']').val(value);
    })
}
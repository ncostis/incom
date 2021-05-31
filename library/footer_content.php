<!--<script type="text/javascript">
	$(document).ready(function() {
		$("#sendFriend").fancybox({
			'width'				: 400,
			'height'			: 350,
			'autoScale'			: false,
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'iframe'
		});
	});
</script>-->

<div align="right" class="top20">
    <table>
        <tr>
            <td>
                <div id="toTop" style="cursor: pointer;"><a class="bodylinks" rel="nofollow">&uarr; &nbsp;Back to
                        Top</a></div>
            </td>
            <td class="left20"><a href="javascript:history.go(-1)" class="bodylinks">&laquo; <?php echo $back; ?></a>
            </td>
            <!--<td  class="left20">
	 	<a href="<?php echo $rootURL; ?>library/forms/send_to_friend.php?ID=<?php echo getparamvalue('ID'); ?>&Rec_ID=<?php echo getparamvalue('Rec_ID'); ?>" id="sendFriend" class="bottomLinks">Send to a friend</a>-->
            </td>
            <td style="padding-left:20px;">
                <div class="addthis_toolbox addthis_default_style addthis_16x16_style">
                    <a class="addthis_button_facebook"></a>
                    <a class="addthis_button_twitter"></a>
                    <a class="addthis_button_google_plusone_share"></a>
                    <a class="addthis_button_email"></a>
                    <a class="addthis_button_printfriendly"></a>
                    <a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
                </div>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar": false};</script>
                <script type="text/javascript"
                        src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53c4f76c050d122b"></script>
            </td>
        </tr>
    </table>
</div>

<!--<script>
	// scrollUp full options
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationInSpeed: 200, // Animation in speed (ms)
	        animationOutSpeed: 800, // Animation out speed (ms)
	        scrollText: '<img src=\"<?php echo $rootURL; ?>elements/backtotop.jpg\">', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required. Defaults to scrollText
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 900000 // Z-Index for the overlay
		});
	});
	// Destroy example
	$(function(){
		$('.destroy').click(function(){
			$.scrollUp.destroy();
		})
	});
</script>-->
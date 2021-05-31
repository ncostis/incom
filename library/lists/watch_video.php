	<script type="text/javascript">
		$(document).ready(function() {
					$("#video").fancybox({
						'autoSize'    : true,
						'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'type'				: 'iframe'
					});
		});
	</script>

<a href="<?php echo $GetModRec['Rec_Field28']?>" target="_self" class="moreW various" id="video"> <?= $view_video ?></a>
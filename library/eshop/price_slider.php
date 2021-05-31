
	<?php
	$pricePost = $_POST['price'];
	if ($pricePost == "") $pricePost = "4000;8000";
	$minPrice =  substr($pricePost, 0, strpos($pricePost, ";"));
	$maxPrice = explode(';', $pricePost);
	$maxPrice = $maxPrice[1];  
	?>
	Slider <span style="display: inline-block; width: 400px; padding: 0 5px;"><input id="Slider1" type="slider" onChange="jmp(this.form,4)" name="price" value="<?php echo $pricePost; ?>" /></span>
	
	<script type="text/javascript" charset="utf-8">
	  jQuery("#Slider1").slider({ from: 1000, to: 12000, step: 500, smooth: true, round: 0, dimension: "&nbsp;€", skin: "plastic" });
	</script>

<div id="blog">
	<?php foreach($photoLink as $key=>$value): ?>
	
		<div class="postWrap">
		<img src="<?php echo $value; ?>" alt="" />
		<div> <h1><?php echo $pTitle[$key]; ?></h1><p><?php echo $pDescription[$key]; ?></p></div>
		</div>
		
	<?php endforeach; ?>
</div>
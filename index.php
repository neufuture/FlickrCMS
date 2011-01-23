<?php
require_once("includes/phpFlickr.php");
include('config.php');
include('includes/getMedia.php')
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $siteTitle; ?></title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<!-- Google Hosted jQuery Core -->
	<script src="http://www.google.com/jsapi"></script>
	<script>google.load("jquery", "1.4.3");</script>
	<script>google.load("jqueryui", "1.8.6");</script>
	<script src="js/jquery.ez-bg-resize.js" type="text/javascript" charset="utf-8"></script>


	<style type="text/css">
		
		<?php if($page=="home" || $page=="blog"): ?>
		#footer{
			display: none;
		}
		<?php endif; ?>
		
	</style>
	
	<script type="text/javascript">
		
		var photos = new Array();
		var photoURL = new Array();
		<?php foreach($photoLink as $key=>$value): ?>
		photos[<?php echo $key; ?>] = "<?php echo $value; ?>";
		photoURL[<?php echo $key; ?>] = "<?php echo $photoURL[$key]; ?>";
		<?php endforeach; ?>
		
		function fwd(){
			if(now == <?php echo (count($photoLink)-1);?>) changeImage(0);
			else changeImage(now+1);
		}
		
		function back(){
			if(now == 0) changeImage(<?php echo (count($photoLink)-1);?>);
			else changeImage(now-1);
		}
			
	</script>
	
	<script src="js/script.js" type="text/javascript" charset="utf-8"></script>

	
</head>

<body >

	<?php if($page != "blog"): ?>
	<div id="bg">
			<img class="bgImg" id="imgB" src="<?php echo $photoLink[1]; ?>" alt="Bg" >
			<img class="bgImg" id="imgA" src="<?php echo $photoLink[0]; ?>" alt="Bg" >
	</div> <!-- END bg -->
	<?php endif; ?>
	
	<?php if($page == "home"): ?>
		<div id="homeLogo"><img src="img/logo.png" alt="" /></div>				
	<?php endif; ?>

	<div id="navWrap">
		<ul id="nav">
			<li><a href="<?php echo "http://" . $domain;?>" style="text-transform: uppercase; font-weight:bold;"><?php echo $siteTitle; ?></a></li>
			<li><a href="#">Work</a>
				<ul>
					<?php foreach($workId as $key => $value): ?>
						<li><a href='?page=work&setId=<?php echo $value; ?>'><?php echo $workTitle[$key]; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</li>
			<li><a href="?page=about">About</a></li>
			<li><a href="?page=blog">Blog</a></li>
			<li><a href="?page=contact">Contact</a></li>
			<li style="width: 24px" id="flickr" ><a href=""><img src="img/arrow.png" /></a></li>
		</ul>
	</div> <!-- END navWrap -->
	
	<?php if($page == "blog") include('includes/blog.php'); ?>

	<div id="footer">
		<h1><?php if($page == "work") echo "$title"; else echo $page; ?></h1>
		<div id="back" onclick="back()">&lsaquo;</div>
		
		<div id="selector">
		<?php if(count($photoLink>1)): foreach($photoLink as $key=>$value): ?>
			<div class="circle" onclick="changeImage(<?php echo $key; ?>)">&nbsp;</div>
		<?php endforeach; ?>
			
		<div id="fwd" onclick="fwd()">&rsaquo;</div>
		<?php endif; ?>
		
		</div>
		<div  id="toggle" ><button>+/-</button></div>
		<div style="clear: both; height: 1px;">&nbsp;</div>
		<div id="content">
			<?php
				if($page == "contact" ) include("includes/contact.php");
				if($page == "work" || $page == "about") echo $description;
				?>
		</div> <!-- END content -->
	</div> <!-- END footer -->
	
</body>
</html>
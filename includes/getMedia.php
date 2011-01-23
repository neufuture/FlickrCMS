<?php
$f				= new phpFlickr($apiKey);

$page			= $_GET['page'];
if($page == null) $page = 'home';
$setId			= $_GET['setId'];
if($page == "blog") $setId = $blog;
if($page == "about") $setId = $about;
$collections	= $f->collections_getTree($collectionId, $user);

if($setId):
	$photos = $f->photosets_getPhotos($setId);
	$info = $f->photosets_getInfo($setId);
	$title = $info['title'];
	$description = $info['description'];
	
	foreach ($photos['photoset']['photo'] as $photo):
		$photoURL[] = "http://www.flickr.com/photos/" . $user . "/" . $photo['id'];
		$photoLink[] = $f->buildPhotoURL($photo, 'large');
		$info =  $f->photos_getInfo($photo['id']);
		$pTitle[] = $info['title'];
		$pDescription[] = $info['description'];
	endforeach;
endif;

foreach($collections['collections']['collection'] as $collection):
	if($collection['id'] != $collectionId):			
		$workId[] = $collection['set'][0]['id'];
		$workTitle[] = $collection['title'];
		foreach($collection['set'] as $set): 
			$allSets[] = $set['id'];
			$workId[] =  $set['id'];
			$workTitle[] = "&raquo; " . $set['title'];		
		endforeach;
	endif;
endforeach;

if($page == "home" || $page == "contact"):
	foreach($allSets as $setId):
		$photos = $f->photosets_getPhotos($setId);
		$photo = $photos['photoset']['photo'][0];
		$photoURL[] = "http://www.flickr.com/photos/" . $user . "/" . $photo['id'];
		$photoLink[] = $f->buildPhotoURL($photo, 'large');
	endforeach;
endif;

?>
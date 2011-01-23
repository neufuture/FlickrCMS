var now = 0;
var t;

$(document).ready(function(){
	// activate background image
	$("#bg").ezBgResize();
	
	//make logo draggable
	$( "#homeLogo img" ).draggable();
	
	// select current image button
	$('.circle').eq(now).addClass('selected');
	
	//t=setTimeout("changeImage()",2000);

	// navigation menu bar
	$('#nav li').hover(
		function () {
			//show its submenu
			$('ul', this).slideDown(500);
	
		}, 
		function () {
			//hide its submenu
			$('ul', this).slideUp(500);			
		}
	);
	
	// Show and hide content
	$("#toggle button").click(function () {
		$("#content").toggle("slow");
	});
	
	
	// Go to flickr page from image link
	$('#flickr').click(function () { 
		window.open(photoURL[now]);
	});	
	

    				

});
		
		
/*
function changeImage(){
	$("#imgA").fadeOut( "slow", function(){
			$("#imgA").attr("src", photos[next]);
			$("#imgA").show();
			
			if(now < photos.length-1) now ++;
			else now = 0;
			if(next < photos.length-1) next ++;
			else next = 0;
			$("#imgB").attr("src", photos[next]);
			t=setTimeout("changeImage()",3000);

	});
}
*/
		
function changeImage(next){
	$('.circle').eq(next).addClass('selected');
	$('.circle').eq(now).removeClass('selected');

	$("#imgB").attr("src", photos[next]);
	$("#imgA").fadeOut( "slow", function(){
			$("#imgA").attr("src", photos[next]);
			$("#imgA").show();
	});
	now = next;
}
	
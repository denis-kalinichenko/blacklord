var contentHeight = 800;
var pageHeight = document.documentElement.clientHeight;
var scrollPosition;
function scroll(){

	scrollPosition = window.pageYOffset;
    if(scrollPosition > 800){
         $('#topnav').slideDown("fast");
	}
    else {
        $('#topnav').slideUp("fast");
    }
}
$(document).ready(function() {
  setInterval('scroll();', 250);
});
function scrolltop() {
$('body,html').animate({
				scrollTop: 0
}, 800);
}
$(document).ready(function() {
var tab = gup( 'act' );
if(tab=="") {var tab = 1;}
if(tab=="date") {var tab = 2;}
if(tab=="can") {var tab = 3;}
$(window).scroll(function() {
   	if($(window).scrollTop() == $(document).height() - $(window).height()) {
	$('div#loadMore').show();
   	$.ajax({
	url: "loadMore.php?lastPost="+ $(".post:last").attr('id') ,
	success: function(html) {
	if(html){
	$("#ajax_cont").append(html);
	$('div#loadMore').hide();
	}else{
	$('div#loadMore').replaceWith("<center><span class='end'>Показаны последние записи</span></center>");
	}
	}
	});
	}
	});
	});
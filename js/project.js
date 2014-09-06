$(function () {

	$('body').addClass('js');

	$('.email').each(function(i) {
		var e = $(this).html();
		e = e.replace(' [at] ', '@');
		e = e.replace(' [dot] ', '.');
		$(this).html(e).replaceWith('<a href=\"mailto:' + $(this).text() + '">' + $(this).text() + '</a>');
	});

	$('.slideshow').anythingSlider({
		buildNavigation:false,
		buildArrows:true,
		hashTags:false,
		mode:'fade',
		buildStartStop:false,
		autoPlay:false
	});

});

$(window).load(function() {

	//remove our spinning gif from the slideshows
	$('.slideshow').addClass('loaded');

});
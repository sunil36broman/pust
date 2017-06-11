









//accordian




jQuery(function ($) {
    var $active = $('#accordion .panel-collapse.in').prev().addClass('active');
    $active.find('a').prepend('<i class="glyphicon glyphicon-minus"></i>');
    $('#accordion .panel-heading').not($active).find('a').prepend('<i class="glyphicon glyphicon-plus"></i>');
    $('#accordion').on('show.bs.collapse', function (e) {
        $('#accordion .panel-heading.active').removeClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
        $(e.target).prev().addClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
    })
});

jQuery(function ($) {
    var $active = $('#accordion1 .panel-collapse.in').prev().addClass('active');
    $active.find('a').prepend('<i class="glyphicon glyphicon-minus"></i>');
    $('#accordion1 .panel-heading').not($active).find('a').prepend('<i class="glyphicon glyphicon-plus"></i>');
    $('#accordion1').on('show.bs.collapse', function (e) {
        $('#accordion1 .panel-heading.active').removeClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
        $(e.target).prev().addClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
    })
});








/*
************************************************************
************************************************************
***********************Dropdown Menu Fade********************
************************************************************
************************************************************
*/

(function($) {
		$(document).ready(function(){
			$('.gallery').featherlightGallery();
		});
})(jQuery);

(function($) {
$.fn.menumaker = function(options) {
    var cssmenu = $(this), settings = $.extend({
        title: "Menu",
        format: "dropdown",
        sticky: false
    }, options);
	return this.each(function() {
        cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
        $(this).find("#menu-button").on('click', function(){
            $(this).toggleClass('menu-opened');
			var mainmenu = $(this).next('ul');
            if (mainmenu.hasClass('open')) { 
                 mainmenu.hide().removeClass('open');
            }
            else {
                 mainmenu.show().addClass('open');
                 if (settings.format === "dropdown") {
                 mainmenu.find('ul').show();
                }
            }
        });
		cssmenu.find('li ul').parent().addClass('has-sub');
			multiTg = function() {
				 cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
				 cssmenu.find('.submenu-button').on('click', function() {
					 $(this).toggleClass('submenu-opened');
					 if ($(this).siblings('ul').hasClass('open')) {
					  $(this).siblings('ul').removeClass('open').hide();
					 }
					 else {
						 $(this).siblings('ul').addClass('open').show();
					 }
				});
			};
			if (settings.format === 'multitoggle') multiTg();
			else cssmenu.addClass('dropdown');
			if (settings.sticky === true) cssmenu.css('position', 'fixed');
			resizeFix = function() {
				if ($( window ).width() > 768) {
					cssmenu.find('ul').show();
				}
				if ($(window).width() <= 768) {
					cssmenu.find('ul').hide().removeClass('open');
				}
			};
        resizeFix();
        return $(window).on('resize', resizeFix);
	});
  };
})(jQuery);

(function($){
		$(document).ready(function() { 
			$("#portfolio-list").filterable({
			useHash: true,
			animationSpeed: 500,
			show: { width: 'show', opacity: 'show' },
			hide: { width: 'hide', opacity: 'hide' },
			useTags: true,
			tagSelector: '#portfolio-filter a',
			selectedTagClass: 'current',
			allTag: 'all'
			}
		);
		})
})(jQuery);

(function($){
	$(document).ready(function(){
		$("#cssmenu").menumaker({
			title: "Menu",
			format: "multitoggle"
		});
	});
})(jQuery);


(function($){
	  $(function () {
			$('#myTab a:first').tab('show')
		 })
})(jQuery);

// scrollup install
(function ($) {
   $(function () {
		  $.scrollUp({
			scrollName: 'scrollUp', // Element ID
			topDistance: '70', // Distance from top before showing element (px)
			topSpeed: 200, // Speed back to top (ms)
			animation: 'fade', // Fade, slide, none
			animationInSpeed: 200, // Animation in speed (ms)
			animationOutSpeed: 200, // Animation out speed (ms)
			scrollText: '', // Text for element
			activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
		  });
		});
})(jQuery);	
	
/*
************************************************************
************************************************************
***********************slider********************
************************************************************
************************************************************
*/	
jQuery(document).ready(function ($) {
var _SlideshowTransitions = [
	{ $Duration: 3200, $Delay: 20, $Clip: 3, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
	];
	var _CaptionTransitions = [];
	_CaptionTransitions["CLIP|LR"] = { $Duration: 2000, $Clip: 3, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };
	_CaptionTransitions["CLIP|L"] = { $Duration: 2000, $Clip: 1, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };
	
	var options = {
		$AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
		$AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
		$AutoPlayInterval: 7000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
		$PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

		$ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
		$SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
		$SlideDuration: 4000,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
		$MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
		$SlideWidth: 830,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
		$SlideHeight: 277,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
		$SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
		$DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
		$ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
		$UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
		$PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
		$DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
		
		$SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
			$Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
			$Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
			$TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
			$ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
		},
		$CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
			$Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
			$CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
			$PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
			$PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
		},
		$ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
			$Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
			$ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
			$AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
			$Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
		},
		$BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
			$Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
			$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
			$AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
			$Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
			$Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
			$SpacingX: 4,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
			$SpacingY: 4,                                   //[Optional] Vertical space between each item in pixel, default value is 0
			$Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
		}
	
	};
	
	var jssor_slider1 = new $JssorSlider$("slider1_container", options);
	//responsive code begin
	function ScaleSlider() {
		var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
		if (parentWidth)
			jssor_slider1.$ScaleWidth(Math.min(parentWidth, 830));
		else
			window.setTimeout(ScaleSlider, 30);
	}
	ScaleSlider();
	$(window).bind("load", ScaleSlider);
	$(window).bind("resize", ScaleSlider);
	$(window).bind("orientationchange", ScaleSlider);
	//responsive code end
});
		
		

	
												
												
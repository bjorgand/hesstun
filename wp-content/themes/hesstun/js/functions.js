/**
 * Makes the the images full bleed on smaller screens by adding a class 
 * that can be targeted by the use of Sass 
 *
 */

(function($){
	$('figure.wp-caption.aligncenter').removeAttr('style');
	$('img.aligncenter').wrap('<figure class="centered-image" />');
	
})(jQuery);



function onPictureChanged() {

	var twitterDiv = jQuery('.twitter');
	twitterDiv.empty();

	var fbDiv = jQuery('.facebook');

	fbDiv.empty();

}

jQuery(document).ready(function($){
	
	$( '[data-fancybox="images"]' ).fancybox({
      caption : function( instance, item ) {
          return $(this).find('figcaption').html();
      }
    });
	
/*	$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto(
		{
			theme:'pp_default',
			//slideshow: 5000,
			//autoplay_slideshow: false,
			changepicturecallback: onPictureChanged
		}
	);
*/	
});
jQuery(document).on("click", ".instagram_link",function($) {
    var link = jQuery(this).attr('instagram_link');
    window.open(link, '_blank');
});
var $osmnm4j = jQuery.noConflict();

$osmnm4j(document).ready(function() {

	$osmnm4j('#mobile-nav-toggle').click(function () {
      $osmnm4j('#mobile-nav-menu').toggleClass('open');
      event.preventDefault();
    });
    
});
/**	
Tabs feature
@author: Si Jobling (@si)
*/

var Tabs = (function Tabs() {

	var $tabs = $(".tabs"),
		$content = $('.tab'),
		debug = true;

	if($content.length > 0) {

		// Hide all but first content tabs on load
		$('li:first', $tabs).addClass('selected');
		$content.filter(':not(:first)').hide();

		// Bind click events to tabs
		$('a', $tabs).on('click', function(e){
			e.preventDefault();
			// Reset stuff
			$content.hide();
			$('li', $tabs).removeClass('selected');

			var target = $(this).attr('href');
			$(target).show();
			$(this).closest('li').addClass('selected');
		});

	}
})();
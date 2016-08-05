(function($) {
	
	$(document).ready(function() {
    var moreText = "Read More",
    lessText = "Read Less",
    moreButton = $(".btn-primary");

		moreButton.click(function () {
		    var $this = $(this);
		    $this.text($this.text() == moreText ? lessText : moreText).prev(".more").slideToggle("fast");
		});
	});
	
})( jQuery );
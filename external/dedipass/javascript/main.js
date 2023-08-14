$(function() {
	$("body").on("click", ".panel-group .panel .panel-heading", function() {
		$collapse = $(this).parent().find(".panel-collapse");
		if(!$collapse.hasClass("open")) {
			$(".panel-group .panel .panel-collapse.open").slideUp().removeClass("open");
			$collapse.slideDown().addClass("open");
		} else {
			$collapse.slideUp().removeClass("open");
		}
	});
	$(".footer .btn-group").hover(function() {
		$(this).addClass("open");
	}, function() {
		$(this).removeClass("open");
	});
	setInterval(function() {
		parent.setIframeHeight($(".container").height());
	}, 20); 
});
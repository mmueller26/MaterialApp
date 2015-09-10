$(function() {
	
	$("#container-toggle-new-itme").hide();
	
	$( "#button-toggle-new-item" ).click(function() {
		$("#container-toggle-new-itme").toggle( "blind", "easeInOutCubic", 1000, function () {
			
			if ($("#button-toggle-new-item").hasClass("toggle-open")) {
				$("#button-toggle-new-item").removeClass("toggle-open");
				$("#button-toggle-new-item i").removeClass("fa-minus");
				
				$("#button-toggle-new-item").addClass("toggle-close");
				$("#button-toggle-new-item i").addClass("fa-plus");				
			} else {
				$("#button-toggle-new-item").removeClass("toggle-close");
				$("#button-toggle-new-item i").removeClass("fa-plus");
				
				$("#button-toggle-new-item").addClass("toggle-open");
				$("#button-toggle-new-item i").addClass("fa-minus")
			}
			
		});
	});
	
});
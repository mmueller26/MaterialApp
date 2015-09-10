$(function() {
	
	function resetAutoloadValues(mCategorieClassRemove, mNameClassRemove, mThicknessClassRemove, mName, mThickness, mInfo) {
		
		if (mCategorieClassRemove == true) {
			$("#material-categorie-output ul").children().removeClass("selected-material");				
		}
		
		if (mNameClassRemove == true) {
			$("#material-name-output ul").children().removeClass("selected-material");				
		}
		
		if (mThicknessClassRemove == true) {
			$("#material-thickness-output ul").children().removeClass("selected-material");				
		}
		
		if (mName == true) {
			$("#material-name-output ul").children().remove();	
			
			$("#material-headline-output #material-headline-categorie-output").text("");
			$("#material-headline-output #material-headline-name-output").text("");
			$("#material-headline-output #material-headline-thickness-output").text("");				

		}
		
		if (mThickness == true) {
			$("#material-thickness-output ul").children().remove();	
			
			$("#material-headline-output #material-headline-name-output").text("");
			$("#material-headline-output #material-headline-thickness-output").text("");				

		}
		
		if (mInfo == true) {
			$(".cc-lasertag-input").val("");
			$(".cc-lasertag-color").css("background-color", "transparent");
			
			$("#material-filename-output").val("");
			$("#material-comment-output").val("");				
		}
		
	}
	
	//autocomplete für material-name
	$("#material-categorie-output ul").on( "click", "li", function() {
		
		resetAutoloadValues(true, true, true, true, true, true);
		
		$.ajax({
        	url: 'inc/ajax/autoload.php',
        	method: "GET",
            dataType: "html",
            data: {
            	parentName: $("#material-name-output ul").data("parentName"),
            	parentValue: $(this).text(),
            	materialThickness: ""
        	},
        	success: function(data) {
        		
        		var parsed = JSON.parse(data);
                var i = 0;

                parsed.forEach(function (entry) {
                	
                	$("#material-name-output ul").append("<li>" + entry.materialName + "</li>");
                	
                	$("#material-headline-output #material-headline-categorie-output").text(entry.materialCategorieName)
                	
                    i++;
                    
                });
                
            }
    	});
		
		$(this).addClass("selected-material");
        	
	});
	
	
	//autocomplete für material-thickness
	$("#material-name-output ul").on( "click", "li", function() {
        	
		resetAutoloadValues(false, true, true, false, true, true);
		
		$.ajax({
        	url: 'inc/ajax/autoload.php',
        	method: "GET",
            dataType: "html",
            data: {
            	parentName: $("#material-thickness-output ul").data("parentName"),
            	parentValue: $(this).text(),
            	materialThickness: ""
        	},
        	success: function(data) {
        		
        		var parsed = JSON.parse(data);
                var i = 0;

                parsed.forEach(function (entry) {
                	
                	$("#material-thickness-output ul").append("<li data-material-name='" + entry.materialName + "' data-material-thickness='" + entry.materialThickness + "'>" + entry.materialThickness + " mm</li>");
                	
                	$("#material-headline-output #material-headline-name-output").text(" / " + entry.materialName)
                	
                    i++;
                    
                });
                
            }
    	});
		
		$(this).addClass("selected-material");
        	
	});
	
	
	//autocomplete für material-thickness
	$("#material-thickness-output ul").on( "click", "li", function() {
        	
		resetAutoloadValues(false, false, true, false, false, true);;
		
		$.ajax({
        	url: 'inc/ajax/autoload.php',
        	method: "GET",
            dataType: "html",
            data: {
            	parentName: $("#material-thickness-output ul").data("parentName"),
            	parentValue: $(this).data("materialName"),
            	materialThickness: $(this).data("materialThickness")
        	},
        	success: function(data) {
        		
        		var parsed = JSON.parse(data);
                var i = 0;

                parsed.forEach(function (entry) {
                	
                	if (entry.cutSpeedNormal == "0" || entry.cutPowerNormal == "0") {
                		$("#lasertag-cut-normal").val("");
                		$("#lasertag-cut-normal-color").css("background-color", "transparent")
                	} else {
                		$("#lasertag-cut-normal").val("=pass1:" + entry.cutSpeedNormal + ":" + entry.cutPowerNormal + ":#000000=");
                		$("#lasertag-cut-normal-color").css("background-color", "#000000")
                	}
                	
                	if (entry.cutSpeedFine == "0" || entry.cutPowerFine == "0") {
                		$("#lasertag-cut-fine").val("");
                		$("#lasertag-cut-fine-color").css("background-color", "transparent")
                	} else {
                		$("#lasertag-cut-fine").val("=pass1:" + entry.cutSpeedFine + ":" + entry.cutPowerFine + ":#ff0000=");
                		$("#lasertag-cut-fine-color").css("background-color", "#ff0000")
                	}
                	
                	if (entry.cutSpeedFast == "0" || entry.cutPowerFast == "0") {
                		$("#lasertag-cut-fast").val("");
                		$("#lasertag-cut-fast-color").css("background-color", "transparent")
                	} else {
                		$("#lasertag-cut-fast").val("=pass1:" + entry.cutSpeedFast + ":" + entry.cutPowerFast + ":#ff8000=");
                		$("#lasertag-cut-fast-color").css("background-color", "#ff8000")
                	}
                	
                	if (entry.engraveSpeedLow == "0" || entry.engravePowerLow == "0") {
                		$("#lasertag-engrave-low").val("");
                		$("#lasertag-engrave-low-color").css("background-color", "transparent")
                	} else {
                		$("#lasertag-engrave-low").val("=pass1:" + entry.engraveSpeedLow + ":" + entry.engravePowerLow + ":0000ff=");
                		$("#lasertag-engrave-low-color").css("background-color", "#0000ff")
                	}
                	
                	if (entry.engraveSpeedMedium == "0" || entry.engravePowerMedium == "0") {
                		$("#lasertag-engrave-medium").val("");
                		$("#lasertag-engrave-medium-color").css("background-color", "transparent")
                	} else {
                		$("#lasertag-engrave-medium").val("=pass1:" + entry.engraveSpeedMedium + ":" + entry.engravePowerMedium + ":#0080ff=");
                		$("#lasertag-engrave-medium-color").css("background-color", "#0080ff")
                	}
                	
                	if (entry.engraveSpeedStrong == "0" || entry.engravePowerStrong == "0") {
                		$("#lasertag-engrave-strong").val("");
                		$("#lasertag-engrave-strong-color").css("background-color", "transparent")
                	} else {
                		$("#lasertag-engrave-strong").val("=pass1:" + entry.engraveSpeedStrong + ":" + entry.engravePowerStrong + ":00ffff=");
                		$("#lasertag-engrave-strong-color").css("background-color", "#00ffff")
                	}
                	
                	$("#material-headline-output #material-headline-thickness-output").text(" / " + entry.materialThickness + " mm")
                	
                	var filename = entry.materialName + "_" + entry.materialThickness + "mm";
                	var replacedFilename = filename.split(' ').join('-');
                	
                	$("#material-filename-output").val(replacedFilename);
                	$("#material-comment-output").val(entry.materialComment);
                	
                    i++;
                    
                });
                
            }
    	});
		
		$(this).addClass("selected-material");
        	
	});
	
});
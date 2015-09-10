$(function() {
	
	//autocomplete für material-categorie
	$("#material-categorie").autocomplete({
		source: function(request, response) {
        	$.ajax({
            	url: 'inc/ajax/autocomplete.php',
            	method: "GET",
                dataType: "html",
                data: {
                	term: request.term,
                	parentName: $("#material-categorie").data("parentName"),
                	parentValue: $("#material-categorie").val()
                	//3 Parameter der weitergibt ob die Felder davor ausgefühlt sind.
            	},
            	success: function(data) {
                	var parsed = JSON.parse(data);
                    var newArray = new Array(parsed.length);
                    var i = 0;

                    parsed.forEach(function (entry) {
                        var newObject = {
                            value: entry.value
                        };
                        newArray[i] = newObject;
                        i++;
                    });

                    response(newArray);
                }
        	});
        }, 
		minLength: 0,
		select : function(event, ui) {
            $(this).val(ui.item.value);
            return false; },
        focus : function(event, ui) {
        	$(this).val(ui.item.value);
        }
	});
	
	$("#material-categorie").focus(function() {
        $("#material-categorie").autocomplete("search", "");
	});
	
	$("#material-categorie").click(function() {
		$("#material-name").val("");
		
		$("#material-thickness").val("");
		
        $("#cut-speed-normal").val("");
        $("#cut-power-normal").val("");
        
        $("#cut-speed-fine").val("");
        $("#cut-power-fine").val("");
        
        $("#cut-speed-fast").val("");
        $("#cut-power-fast").val("");
        
        $("#engrave-speed-low").val("");
        $("#engrave-power-low").val("");
        
        $("#engrave-speed-medium").val("");
        $("#engrave-power-medium").val("");
        
        $("#engrave-speed-strong").val("");
        $("#engrave-power-strong").val("");
	});
	
	
	//autocomplete für material-name
	$("#material-name").autocomplete({
		source: function(request, response) {
        	$.ajax({
            	url: 'inc/ajax/autocomplete.php',
            	method: "GET",
                dataType: "html",
                data: {
                	term: request.term,
                	parentName: $("#material-name").data("parentName"),
                	parentValue: $("#material-categorie").val()
            	},
            	success: function(data) {
            		var parsed = JSON.parse(data);
                    var newArray = new Array(parsed.length);
                    var i = 0;

                    parsed.forEach(function (entry) {
                        var newObject = {
                            value: entry.value
                        };
                        newArray[i] = newObject;
                        i++;
                    });

                    response(newArray);
                }
        	});
        }, 
		minLength:0,
		select : function(event, ui) {
            $(this).val(ui.item.value);
            return false; },
        focus : function(event, ui) {
        	$(this).val(ui.item.value);
        }
	});

	
	$("#material-name").focus(function() {
		$("#material-name").autocomplete("search", "");
	});
	
	$("#material-name").click(function() {
		$("#material-thickness").val("");
		
        $("#cut-speed-normal").val("");
        $("#cut-power-normal").val("");
        
        $("#cut-speed-fine").val("");
        $("#cut-power-fine").val("");
        
        $("#cut-speed-fast").val("");
        $("#cut-power-fast").val("");
        
        $("#engrave-speed-low").val("");
        $("#engrave-power-low").val("");
        
        $("#engrave-speed-medium").val("");
        $("#engrave-power-medium").val("");
        
        $("#engrave-speed-strong").val("");
        $("#engrave-power-strong").val("");
	});
	
	
	//autocomplete für material-thickness
	$("#material-thickness").autocomplete({
		source: function(request, response) {
        	$.ajax({
            	url: 'inc/ajax/autocomplete.php',
            	method: "GET",
                dataType: "html",
                data: {
                	term: request.term,
                	parentName: $("#material-thickness").data("parentName"),
                	parentValue: $("#material-name").val()
            	},
            	success: function(data) {
            		var parsed = JSON.parse(data);
                    var newArray = new Array(parsed.length);
                    var i = 0;

                    parsed.forEach(function (entry) {
                        var newObject = {
                            value: entry.value,
                            materialComment: entry.materialComment,
                            materialPrice: entry.materialPrice,
                            cutSpeedNormal: entry.cutSpeedNormal,
                            cutPowerNormal: entry.cutPowerNormal,
                            cutSpeedFine: entry.cutSpeedFine,
                            cutPowerFine: entry.cutPowerFine,
                            cutSpeedFast: entry.cutSpeedFast,
                            cutPowerFast: entry.cutPowerFast,
                            engraveSpeedLow: entry.engraveSpeedLow,
                            engravePowerLow: entry.engravePowerLow,
                            engraveSpeedMedium: entry.engraveSpeedMedium,
                            engravePowerMedium: entry.engravePowerMedium,
                            engraveSpeedStrong: entry.engraveSpeedStrong,
                            engravePowerStrong: entry.engravePowerStrong
                        };
                        newArray[i] = newObject;
                        i++;
                    });

                    response(newArray);
                }
        	});
        }, 
		minLength:0,
		select : function(event, ui) {
            $(this).val(ui.item.value);
            
            $("#cut-speed-normal").val(ui.item.cutSpeedNormal);
            $("#cut-power-normal").val(ui.item.cutPowerNormal);
            
            $("#cut-speed-fine").val(ui.item.cutSpeedFine);
            $("#cut-power-fine").val(ui.item.cutPowerFine);
            
            $("#cut-speed-fast").val(ui.item.cutSpeedFast);
            $("#cut-power-fast").val(ui.item.cutPowerFast);
            
            $("#engrave-speed-low").val(ui.item.engraveSpeedLow);
            $("#engrave-power-low").val(ui.item.engravePowerLow);
            
            $("#engrave-speed-medium").val(ui.item.engraveSpeedMedium);
            $("#engrave-power-medium").val(ui.item.engravePowerMedium);
            
            $("#engrave-speed-strong").val(ui.item.engraveSpeedStrong);
            $("#engrave-power-strong").val(ui.item.engravePowerStrong);
            
            $("#material-price").val(ui.item.materialPrice);
            $("#material-comment").val(ui.item.materialComment);
            
            return false; },
        focus : function(event, ui) {
        	$(this).val(ui.item.value);
        }
	});

	
	$("#material-thickness").focus(function() {
		$("#material-thickness").autocomplete("search", "");
	});
	
	$("#material-thickness").click(function() {
        $("#cut-speed-normal").val();
        $("#cut-power-normal").val();
        
        $("#cut-speed-fine").val();
        $("#cut-power-fine").val();
        
        $("#cut-speed-fast").val();
        $("#cut-power-fast").val();
        
        $("#engrave-speed-low").val();
        $("#engrave-power-low").val();
        
        $("#engrave-speed-medium").val();
        $("#engrave-power-medium").val();
        
        $("#engrave-speed-strong").val();
        $("#engrave-power-strong").val();
	});
	
});
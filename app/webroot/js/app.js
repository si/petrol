// @codekit-append "/modules/bubble-menu.js"
// @codekit-append "/modules/chart.js"

$(document).ready(function() {

	function roundNumber(num, dec) {
		var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
		return result;
	}

	function updatePPL(ev) {
		var current = $(ev.currentTarget).attr('id'),
			cost = $('#ReceiptCost').val(),
			litres = $('#ReceiptLitres').val(),
			ppl = $('#ReceiptPricePerLitre').val();
		
		if((current==='ReceiptCost' || current==='ReceiptLitres') && (cost>0 && litres>0)) {
			$('#ReceiptPricePerLitre').val(roundNumber(cost/litres,3));
		} else if((current==='ReceiptCost' || current==='ReceiptPricePerLitre') && (cost>0 && ppl>0)) {
			$('#ReceiptLitres').val(roundNumber(cost/ppl,2));
		}
	}

	$('#ReceiptCost, #ReceiptLitres, #ReceiptPricePerLitre').on('keydown', updatePPL);

	var setReceiptOdometer = function() {
        var selectedOdometer = $('option:selected',this).attr('data-odometer');
        $('#ReceiptOdometer').attr('placeholder','Previously ' + selectedOdometer);
        $('#ReceiptOdometer').attr('min',selectedOdometer);
	};

    $('#ReceiptVehicleId').on('change', setReceiptOdometer);

    // Location lookup 
    var locationLookup = function() {

    	var geoAvailable = ("geolocation" in navigator);

    	console.log('Location lookup');
    	console.log('Geo available?', geoAvailable);

    	if(geoAvailable) {

		    $('.location').each(function() {
		    	console.log(this);
		    	// Place button next to INPUT
		    	$(this).append('<button class="location-lookup">Find local locations</button>');
		    });

		    $('button.location-lookup').on('click', function(e) {

		    	e.preventDefault();

		    	var button = this,
		    		input = $(this).siblings('input'),
		    		location = {
		    			latitude: null,
		    			longitude: null
		    		};

		    	$(button).addClass('loading');

				navigator.geolocation.getCurrentPosition( function(position) {
					console.log('position:', position.coords);
			    	$(button).removeClass('loading');
					location.latitude = position.coords.latitude;
					location.longitude = position.coords.longitude;
				});
				
				input.attr('data-longitude', location.longitude);
				input.attr('data-latitude', location.latitude);

		    });
    	}
    }();

    var recentLocations = function() {

    	console.log('Recent locations');

    	var input = $('#ParkingTicketLocation'),
    		locations = [],
    		links = [];

    	// Get datalist locations
    	if(input.length > 0) {
    		var locationList = $('#' + input.attr('list') + ' option');

	    	// Loop through datalist locations
	    	$.each(locationList, function(i, item) {
	    		if($(item).val()!='') {
	    			locations.push($(item).val());
	    		}
	    	});

	    	// Create text links for top 3 locations
	    	$.each(locations, function(i, name) {
	    		if(i<=2) {
		    		var link = '<a href="#" class="input-value">' + name + '</a> ';
		    		links.push(link);
		    	}
	    	});

	    	// Function to set input value to link text
	    	var setInputValue = function() {
	    		var value = $(this).text();
	    		$(input).val(value);
	    	};

	    	// Place links under INPUT
	    	$(input).after('<span class="input-values">Recently: ' + links + '</span>');

	    	// Bind function to text links
	    	$('a.input-value').on('click', setInputValue);

    	}

    }();

});

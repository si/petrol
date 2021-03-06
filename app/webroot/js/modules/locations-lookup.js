
/*
    var latitude;
    var longitude;
    var accuracy;

    function loadLocation() {

        var status = document.getElementById("status");
        if(navigator.geolocation && status !== null) {
            document.getElementById("status").innerHTML = "HTML5 Geolocation is supported in your browser.";
            document.getElementById("status").style.color = "#1ABC3C";

            if($.cookie && $.cookie("posLat")) {
                latitude = $.cookie("posLat");
                longitude = $.cookie("posLon");
                accuracy = $.cookie("posAccuracy");
                document.getElementById("status").innerHTML = "Location data retrieved from cookies. <a id=\"clear_cookies\" href=\"javascript:clear_cookies();\" style=\"cursor:pointer; margin-left: 15px;\"> clear cookies</a>";
                updateDisplay();

            } else {
                navigator.geolocation.getCurrentPosition(
                                    success_handler,
                                    error_handler,
                                    {timeout:10000});
            }
        }
    }

    function success_handler(position) {
        latitude = position.coords.latitude;
        longitude = position.coords.longitude;
        accuracy = position.coords.accuracy;

        if (!latitude || !longitude) {
            document.getElementById("status").innerHTML = "HTML5 Geolocation supported, but location data is currently unavailable.";
            return;
        }

        updateDisplay();

        $.cookie("posLat", latitude);
        $.cookie("posLon", longitude);
        $.cookie("posAccuracy", accuracy);

    }

    function updateDisplay() {

        var gmapdata = '<img src="http://maps.google.com/maps/api/staticmap?center=' + latitude + ',' + longitude + '&zoom=16&size=400x300&sensor=true" />';

        $("#placeholder").innerHTML = gmapdata;
        $("#latitude").innerHTML = latitude;
        $("#longitude").innerHTML = longitude;
        $("#accuracy").innerHTML = accuracy;

        // Let's get some local businesses.
        local_search = 'http://dev.petrolapp.me/receipts/local_search/' + latitude + '/' + longitude;

				$.ajax({
				  url: local_search,
				  dataTypeString: 'json',
				  success: function(data) {
				    // Output raw data for debugging
				  	$('#ReceiptLocation').after('<textarea id="LocationLocalRaw" style="display:none;">' + data + '</textarea>');

				  	// Parse data as JSON
				  	var locs = $.parseJSON(data);

				  	// Create array of OPTIONS from Places ID and Name
						var items = [];
						$.each(locs.results, function(key, val) {
					    items.push('<option value="' + val.name + '">' + val.name + '</option>');
					  });

					  items.push('<option value="-">Not listed...</option>');

					  // Output SELECT with OPTIONs
					  select = $('<select name="data[Receipt][location]" id="ReceiptLocationLocal">', {
				    	'class': 'local-places',
				    }).prepend(items.join(''));

				    $(document).on("change", "#ReceiptLocationLocal", function(){
              console.log($('#ReceiptLocationLocal').val());
              if($(this).val()=='-') {
        				// Hide Local Location select, change name attribute and display free text again
                $(this).attr('name','data[Receipt][location_disabled]').hide();
                $('#ReceiptLocation').attr('name','data[Receipt][location]').show();
              }
            });

				    // Hide free text Location, change name attribute and place SELECT in place
				    $('#ReceiptLocation').attr('name','data[Receipt][location_disabled]').hide().after(select);
				  },
				  error: function(jqXHR, textStatus, errorThrown) {
					  $('#placeholder').append('Error: ' + textStatus);

				  }
				});

    }


//    $('#status').hide();

    function error_handler(error) {
        var locationError = '';

        switch(error.code){
        case 0:
            locationError = "There was an error while retrieving your location: " + error.message;
            break;
        case 1:
            locationError = "The user prevented this page from retrieving a location.";
            break;
        case 2:
            locationError = "The browser was unable to determine your location: " + error.message;
            break;
        case 3:
            locationError = "The browser timed out before retrieving the location.";
            break;
        }

        document.getElementById("status").innerHTML = locationError;
        document.getElementById("status").style.color = "#D03C02";
    }

	// For clearing geo-location cookies
	function clear_cookies() {
	    $.cookie('posLat', null);
	    document.getElementById("status").innerHTML = "Cookies cleared.";
	}
	

    loadLocation();
*/
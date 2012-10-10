$(document).ready(function() {

	 function roundNumber(num, dec) {
  	 var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
  	 return result;
   }

	 function updatePPL(ev) {
	   current = $(ev.currentTarget).attr('id');
	   
	   cost = $('#FillupCost').val();
	   litres = $('#FillupLitres').val();
	   ppl = $('#FillupPricePerLitre').val();
	   
	   if((current=='FillupCost' || current=='FillupLitres') && (cost>0 && litres>0)) {
	     $('#FillupPricePerLitre').val(roundNumber(cost/litres,3));
	   } else if((current=='FillupCost' || current=='FillupPricePerLitre') && (cost>0 && ppl>0)) {
	     $('#FillupLitres').val(roundNumber(cost/ppl,2));
	   }
	 }

	 $('#FillupCost, #FillupLitres, #FillupPricePerLitre').live('keydown', updatePPL);
	 
	 /***
	 Polyfill DATALIST on non-supported browsers
	 @date: 2012-08-13 13:29
	 @author: Si
	 */
/*
	 yepnope({
      test : (!Modernizr.input.list || (parseInt($.browser.version) > 400)),
      yep : [
          '/js/jquery.relevant-dropdown.js',
          '/js/load-fallbacks.js'
      ]
   });
*/

    var latitude;
    var longitude;
    var accuracy;
    
    function loadLocation() {
    
        if(navigator.geolocation) {
            document.getElementById("status").innerHTML = "HTML5 Geolocation is supported in your browser.";
            document.getElementById("status").style.color = "#1ABC3C";
            
            if($.cookie("posLat")) {
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
                
        document.getElementById("placeholder").innerHTML = gmapdata;
        document.getElementById("latitude").innerHTML = latitude;
        document.getElementById("longitude").innerHTML = longitude;
        document.getElementById("accuracy").innerHTML = accuracy;

        // Let's get some local businesses.
        local_search = 'http://petrol.unstyled.com/fillups/local_search/' + latitude + '/' + longitude;
        
        console.log(local_search);
        
				$.ajax({
				  url: local_search,
				  dataTypeString: 'json',
				  success: function(data) {
				  	$('#placeholder').append('<label for="places_jason">Local Petrol Stations</label><textarea id="places_json" class="span6" rows="20">' + data + '</textarea>');
						var items = [];
						$.each(data.results, function(key, val) {
					    items.push('<li id="' + key + '">' + val.name + '</li>');
					  });
					  $('<ul/>', {
				    	'class': 'local-places',
				    	html: items.join('')
				    }).appendTo('#placeholder');				  	
				  },
				  error: function(jqXHR, textStatus, errorThrown) {
					  $('#placeholder').append('Error: ' + textStatus);
					  
				  }
				});

    }
    
    
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
    

    loadLocation();

});

// For clearing geo-location cookies
function clear_cookies() {
    $.cookie('posLat', null);
    document.getElementById("status").innerHTML = "Cookies cleared.";
}

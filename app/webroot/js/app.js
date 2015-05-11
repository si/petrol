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

});

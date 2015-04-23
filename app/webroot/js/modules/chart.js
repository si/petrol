
var receiptChart = (function receiptsChart() {

	var $receiptsChart = $("#receiptsChart");

	if($receiptsChart.length > 0) {

		// Configure some options
		var options = {
		    scaleShowGridLines : true,
		    scaleGridLineColor : "rgba(0,0,0,0.1)",
		    scaleGridLineWidth : 1,
		    scaleShowHorizontalLines: true,
		    scaleShowVerticalLines: false,
		    bezierCurve : true,
		    bezierCurveTension : 0.4,
		    pointDot : true,
		    pointDotRadius : 4,
		    pointDotStrokeWidth : 1,
		    pointHitDetectionRadius : 20,
		    datasetStroke : true,
		    datasetStrokeWidth : 2,
		    datasetFill : true,
		    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
		};
		
		// Establish some data points
		var $table = $('table.chart tr'),
			chart_data = {
				dates : [],
				prices : [],
				totals : []
			};
		
		// Loop through data table
		$($table).each(function(index, row) {
	
			date = $('td:first a', row);
			date_utc = date.data('short');
			if(date_utc!==null) {
			
				chart_data.dates.push(date_utc);
		
				price = $('td:nth-child(3)', row);
				price_float = convertPriceToFloat(price.text());
				if(price_float!==0) chart_data.prices.push(price_float);
		
				total = $('td:nth-child(2)', row);
				total_float = convertPriceToFloat(total.text());
				if(total_float!==0) chart_data.totals.push(total_float);
			}
		});
		
		// Reverse array values
		chart_data.dates.reverse();
		chart_data.prices.reverse();
		chart_data.totals.reverse();
		
		// Compile chart data
		var data = {
			    labels: chart_data.dates,
			    datasets: [
			        {
			            label: "Price",
			            fillColor: "rgba(220,220,220,0.2)",
			            strokeColor: "rgba(220,220,220,1)",
			            pointColor: "rgba(220,220,220,1)",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(220,220,220,1)",
			            data: chart_data.prices
			        }
	/*
			        ,
			        {
			            label: "Total",
			            fillColor: "rgba(220,255,220,0.2)",
			            strokeColor: "rgba(220,255,220,1)",
			            pointColor: "rgba(220,255,220,1)",
			            pointStrokeColor: "#cfc",
			            pointHighlightFill: "#cfc",
			            pointHighlightStroke: "rgba(220,255,220,1)",
			            data: chart_data.totals
			        }
	*/
			    ]
		};
		
		// Get context with jQuery - using jQuery's .get() method.
		var ctx = $("#receiptsChart").get(0).getContext("2d");
		// This will get the first returned node in the jQuery collection.
		var myLineChart = new Chart(ctx).Line(data, options);
	}
})();

function convertPriceToFloat(string) {
	return Number(string.replace(/[^0-9\.]+/g,""));
}

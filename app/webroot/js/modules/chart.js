/**	
Commute Chart feature
@author: Si Jobling (@si)
*/

var CommuteChart = (function CommuteChart() {

	var $commuteChart = $("canvas.chart"),
		debug = false;

	if($commuteChart.length > 0 && $commuteChart.data('chart-debug')) debug = true;

	if(debug) console.log('Setting up CommuteChart: ', $commuteChart);

	if($commuteChart.length > 0) {

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

		// Get some data from the chart data-chart-source attribute
		var source = $commuteChart.data('chart-source')!='' ? $commuteChart.data('chart-source') : {},
			source_item = $commuteChart.data('chart-item')!='' ? $commuteChart.data('chart-item') : '',
			chartXaxis = $commuteChart.data('chart-x')!='' ? $commuteChart.data('chart-x') : '',
			chartYaxis = $commuteChart.data('chart-y')!='' ? $commuteChart.data('chart-y') : '',
			chartOrder = $commuteChart.data('chart-order')!='' ? $commuteChart.data('chart-order') : '';

		// Setup chart data arrays
		var chart_data = { 
			xAxis : [], 
			yAxis : [] 
		};

		if(debug) console.log('Data source: ', source);
		if(debug) console.log('Data format: ', typeof(source));

		// Check if the data is just a string rather than JSON (object)
		if (typeof(source) === 'string') {
			
			// Check if it's a selector by querying and checking for results
			$data_dom = $(source);
			
			if($data_dom.length > 0) {

				// Got something off the page!
				if(debug) console.log('Query selector: ', $data_dom);

				// Loop through data table
				$(source_item, $data_dom).each(function(index, item) {
			
					// Get x and y data from the item
					data_x = $(chartXaxis, item);
					data_y = $(chartYaxis, item);

					// If got data for both, add to 
					if(data_x !== null && data_y !== null) {
						chart_data.xAxis.push(data_x.text());
						chart_data.yAxis.push(convertStringToFloat(data_y.text()));
					}				
				});
			}
			// TODO: AJAX query testing for URL path instead

		//	If source is already JSON, just extract necessary data
		} else {
			// Loop through data source, mapping to chart data properties
			$(source).each(function(index, row){
				chart_data.xAxis.push(row[chartXaxis]);
				chart_data.yAxis.push(row[chartYaxis]);
			});
		}

		// Reverse data if order parameter is set to reverse
		if(chartOrder === 'reverse') {
			chart_data.xAxis.reverse();
			chart_data.yAxis.reverse();
		}

		// Show processed chart data
		if(debug) console.table(chart_data);

		// Compile chart data
		var data = {
		    labels: chart_data.xAxis,
		    datasets: [
		        {
		            label: "Price",
		            fillColor: "rgba(220,220,220,0.2)",
		            strokeColor: "rgba(220,220,220,1)",
		            pointColor: "rgba(220,220,220,1)",
		            pointStrokeColor: "#fff",
		            pointHighlightFill: "#fff",
		            pointHighlightStroke: "rgba(220,220,220,1)",
		            data: chart_data.yAxis
		        }
		    ]
		};
		
		// Get context with jQuery - using jQuery's .get() method.
		var ctx = $commuteChart.get(0).getContext("2d");
		// This will get the first returned node in the jQuery collection.
		var myLineChart = new Chart(ctx).Line(data, options);
	}

})();

function convertStringToFloat(string) {
	return Number(string.replace(/[^0-9\.]+/g,""));
}

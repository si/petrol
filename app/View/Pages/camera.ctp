<h2>Input</h2>
<form>
	<input type="file" id="cameraInput" name="cameraInput" capture="camera" accept="image/*" />
</form>

<h2>Output</h2>
<canvas id="capturedPhoto" width="500" height="400"></canvas>

<style type="text/css">
	canvas {padding:5%; border:2px solid #330000; background-color:#660000; border-radius:10px;}
</style>

<script>

function log(what) {
	console.log(new Date().toLocaleTimeString() + ': ' + what);
}

(function(){

	var cameraInput = document.getElementById('cameraInput');
	cameraInput.onchange = picChange;

	function picChange(evt){ 

		log('** pic changed');

		//get files captured through input
		var fileInput = evt.target.files;

		if(fileInput.length>0) {

			//window url
			var windowURL = window.URL || window.webkitURL;
			log('** windowURL ' + windowURL);

			//picture url
			var picURL = windowURL.createObjectURL(fileInput[0]);
			log('** picURL ' + picURL);

			//get canvas
			var photoCanvas = document.getElementById("capturedPhoto");
			log('** photoCanvas ' + photoCanvas);
			var ctx = photoCanvas.getContext("2d");

			// create image
			var photo = new Image();

			photo.onload = function(){
			  //draw photo into canvas when ready
				log('** photo loaded');

			  ctx.drawImage(photo, 0, 0, 500, 400);
				log('** canvas drawn');
			};

			//load photo into canvas
			photo.src = picURL;
			log('** photo loaded into canvas');

			//release object url
			windowURL.revokeObjectURL(picURL);

		}
	}

})();
</script>
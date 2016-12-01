<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns:fb="http://ogp.me/ns/fb#">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<title>Camera</title>
	
</head>
<body>

<style>
video {
    border: 1px solid #ccc;
    display: block;
    margin: 0 0 20px;
}


input[type="submit"], button {
    font-size: inherit;
}
input[type="submit"], button, .button, .pagination a, .actions a, .green-button, #comment-form input[type="submit"] {
    background: #f9f9f9 none repeat scroll 0 0;
    border: 1px solid #eee;
    color: #07a;
    cursor: pointer;
    display: inline-block;
    margin: 0 10px 10px 0;
    padding: 6px 14px;
    text-decoration: none;
}

#canvas {
    border: 1px solid #ccc;
    display: block;
    margin-top: 20px;
}
</style>




 
 	<video id="video" width="640" height="480" autoplay></video>
	<button id="snap">Snap Photo</button>
 
 	<canvas id="canvas" width="640" height="480"></canvas>
   
   
   <script>

		// Put event listeners into place
		window.addEventListener("DOMContentLoaded", function() {
			// Grab elements, create settings, etc.
			var canvas = document.getElementById("canvas"),
				context = canvas.getContext("2d"),
				video = document.getElementById("video"),
				videoObj = { "video": true },
				errBack = function(error) {
					console.log("Video capture error: ", error.code); 
				};

			// Put video listeners into place
			if(navigator.getUserMedia) { // Standard
				navigator.getUserMedia(videoObj, function(stream) {
					video.src = stream;
					video.play();
				}, errBack);
			} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
				navigator.webkitGetUserMedia(videoObj, function(stream){
					video.src = window.webkitURL.createObjectURL(stream);
					video.play();
				}, errBack);
			} else if(navigator.mozGetUserMedia) { // WebKit-prefixed
				navigator.mozGetUserMedia(videoObj, function(stream){
					video.src = window.URL.createObjectURL(stream);
					video.play();
				}, errBack);
			}

			// Trigger photo take
			document.getElementById("snap").addEventListener("click", function() {
				context.drawImage(video, 0, 0, 640, 480);
			});
		}, false);

	</script>
		
</div>



</body>
</html>

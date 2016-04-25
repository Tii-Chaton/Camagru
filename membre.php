<?php
//session_start();
//if (!isset($_SESSION['login'])) {
	//header ('Location: index.php');
	//exit();
//}

?>
<!DOCTYPE HTML5>
<html>
<head>
<meta charset="utf-8" />
<title>Camagru</title>
<link rel="stylesheet" type="text/css" href="css/membre.css" media="all">
</head>
<body onload="init();">
<div id="insta"><img src="./img/instaa.png" width="90" height="90"/></div>
	<header>
  
  <h1>CAMaGRU</h1>

  	</header>
<a href="deconnexion.php">Déconnexion</a>
<video id="video" class="liveVideo" autoplay></video>
<button id="startbutton">Prendre une photo</button>
<canvas id="canvas"></canvas>

<script type="text/javascript">
	(function() {

  var streaming = false,
      video        = document.querySelector('#video'),
      cover        = document.querySelector('#cover'),
      canvas       = document.querySelector('#canvas'),
      photo        = document.querySelector('#photo'),
      startbutton  = document.querySelector('#startbutton'),
      width = 320,
      height = 0;

  navigator.getMedia = ( navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia);

  navigator.getMedia(
    {
      video: true,
      audio: false
    },
    function(stream) {
      if (navigator.mozGetUserMedia) {
        video.mozSrcObject = stream;
      } else {
        var vendorURL = window.URL || window.webkitURL;
        video.src = vendorURL.createObjectURL(stream);
      }
      video.play();
    },
    function(err) {
      console.log("An error occured! " + err);
    }
  );

  video.addEventListener('canplay', function(ev){
    if (!streaming) {
      height = video.videoHeight / (video.videoWidth/width);
      video.setAttribute('width', width);
      video.setAttribute('height', height);
      canvas.setAttribute('width', width);
      canvas.setAttribute('height', height);
      streaming = true;
    }
  }, false);

  function takepicture() {
    canvas.width = width;
    canvas.height = height;
    canvas.getContext('2d').drawImage(video, 0, 0, width, height);
    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
  }

  startbutton.addEventListener('click', function(ev){
      takepicture();
    ev.preventDefault();
  }, false);

})();
</script>

<a href="upload.php">Telecharger une photo</a>

</body>
</html>

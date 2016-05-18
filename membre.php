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


    <ul id="menu-demo2">
  <div id="test7">
  <li><a href="#">Mon compte</a>
    <ul>
      <li><a href="modif-compt.php">Profil</a></li>
      <li><a href="deconnexion.php">Déconnexion</a></li>
    </ul>
  </li>

  <li><a href="/client/views/galerie.php">Galerie Photo</a>
    
    <ul>
      <li><a href="/client/views/galerie.php">Mes photos</a></li>
    </ul>
  </li>
  <li><a href="upload.php">Telecharger une photo</a>

  </li>
</ul>
  </header>

<video id="video" class="liveVideo" autoplay></video>
<button id="startbutton">Prendre une photo</button>
<canvas id="canvas"></canvas>


<script src="./client/take_picture.js"></script>
<script src="/client/scripts/addclip.js"></script>

<footer>



<a href="#" id="./img/hippo" onclick="afficherImage(this.id)"><button id="startbutton">pouet</button></a>

    <div id='affichageImage'></div>


<script type="text/javascript">
  function afficherImage( id)
        {
          var divImage = document.getElementById('affichageImage');
          
          if (divImage.hasChildNodes()){
            divImage.removeChild(node);
          }
          
          var hrefImg = id +".png";
          node = document.createElement('img');
          node.id = id + "Image";
          node.src = hrefImg;
          node.alt = id;

          divImage.appendChild(node);
        }
</script>

<div id="footim"> <img src="./img/logo.png"/></div>
<div id="foot"> <p> Tii_Chaton.&copy;</p> </div>
</footer>
</body>
</html>

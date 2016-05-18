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
    <div id="test7">
    <li><a href="membre.php">Accueil</a>
  </li>
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
    </header>
    <br/>
    <br/>
<form method="post" action="reception.php" enctype="multipart/form-data">
     <label for="icone">Ma photo (JPG, PNG ou GIF | max. 15 Ko) :</label><br />
     <input type="file" name="icone" id="icone" /><br />
     <input type="submit" name="submit" value="Envoyer" />
</form>
</body>
</html>
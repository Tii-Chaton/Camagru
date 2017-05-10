<!DOCTYPE HTML5>
<html>
<head>
<meta charset="utf-8" />
<title>Inscription</title>
<link rel="stylesheet" type="text/css" href="./client/css/membre.css" media="all">
</head>
<body onload="init();">
<div id="insta"><img src="./client/images/instaa.png" width="90" height="90"/></div>
	<header>
  <h1>CAMaGRU</h1>
    <ul id="menu-demo2">
  <div id="test7">
    <li><a href="/">Accueil</a>
  </li>
  <li><a href="">Mon compte</a>
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

<div id="fondban">
<div id="idpwd" action="mon_compte.php" method="POST">
</br>
</br>
</br>
</br>
<fieldset>
<legend>Modifier mes informations personelle:</legend></br>

    <a href="client/views/resetpassword.php">Changer mdp</a><br />
    <a href="server/delete_account.php">Supprimer le compte</a><br />
    <br />
    <br />
    <input type="submit" id="valider" name="valider" value="VALIDER">

</form></fieldset>

<?php
if (isset($erreur)) echo '<br />',$erreur;
?>
</body>
<footer>
<div id="footim"> <img src="./client/images/logo.png"/></div>
<div id="foot"> <p> Tii_Chaton.&copy;</p> </div>
</footer>
</html>



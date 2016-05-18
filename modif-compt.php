<!DOCTYPE HTML5>
<html>
<head>
<meta charset="utf-8" />
<title>Inscription</title>
<link rel="stylesheet" type="text/css" href="css/membre.css" media="all">
</head>
<body onload="init();">
<div id="insta"><img src="./img/instaa.png" width="90" height="90"/></div>
	<header>
  <h1>CAMaGRU</h1>
    <ul id="menu-demo2">
  <div id="test7">
    <li><a href="membre.php">Accueil</a>
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

	Login : <input name="login" type="text" disabled="disabled" value="<?=$modif['login']?>"/><br />
    Ancien mot de passe : <input id="oldpw" size="16" name="oldpw" type="password" value=""/><br />
    Nouveau mot de passe : <input id="newpw" size="16" name="newpw" type="password" value=""/><br />
    Confirmer le mot de passe : <input id="confpw" size="16" name="confpw" type="password" value=""/><br />
    E-mail : <input name="mail" type="text" value="<?=$modif['mel']?>" size="32" /><br />
    Adresse : <input name="adresse" type="text" value="<?=$modif['adresse']?>" size="32" /><br />
    <a href="delete_account.php">Supprimer le compte</a><br />
    <br />
    <br />
    <input type="submit" id="valider" name="valider" value="VALIDER">

</form></fieldset>

<?php
if (isset($erreur)) echo '<br />',$erreur;
?>
</body>
</html>



<?php
include '../../config/database.php';
session_start();
/*if (!isset($_SESSION['login'])){

 if(isset($_GET['reset'])){
*/
 	if (isset($_SESSION['login'])|| (!isset($_SESSION['login']) && isset($_GET['reset'])))
 	{

?>
<!-- Affiche quand log lien du mail clique-->
	<!DOCTYPE HTML5>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Camagru</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/instaa.png"/>
    <link rel="stylesheet" type="text/css" href="../css/membre.css" media="all">
  </head>
<body>
<div id="insta"><img src="../images/instaa.png" width="90" height="90"/></div>
	<header>
  <h1>CAMaGRU</h1>
    <ul id="menu-demo2">
  <div id="test7">

	<li><a href="/">Accueil</a></li>

  <li><a href="#">Mon compte</a>
    <ul>
      <li><a href="../../server/deconnexion.php">Déconnexion</a></li>
    </ul>
  </li>
  <li><a href="../client/views/galerie.php">Galerie photo</a>
    <ul>
      <li><a href="../client/galerie.php">Mes photos</a></li>
    </ul>
</header>

	<body>
		  <head>
    <meta charset="utf-8" />
    <title>Camagru</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/instaa.png"/>
    <link rel="stylesheet" type="text/css" href="../css/membre.css" media="all">
  </head>
		<h2 class="PageTitle">Reset Password</h2>

		<form name="resetlast" action="../../server/resetpassword.php" method="post" accept-charset="utf-8">
			<input name="reset" value="<?php echo $_GET['reset']; ?>" hidden/>
			<div class="input">
				<label for="password">Password</label>
				<input id="normalpass" type="password" name="password" placeholder="password" onkeyup="verifpass();" required>
			</div>
			<div class="input">
				<label for="confpassword">Confirm</label>
				<input id="repeatpass" type="password" name="confpassword" placeholder="repeat password" onkeyup="verifpass();" required>
			</div>
			<button type="submit" value="Login" id="SignupButton" disabled  class="FormButton">Login</button>
		</form>

	<footer>
		<div id="footim"> <img src="../images/logo.png"/></div>
		<div id="foot"> <p> Tii_Chaton.&copy;</p> </div>
	</footer>
	<script src="../scripts/verifypass.js"></script>
	</body>
<html>

<?php
	}
	else if (!isset($_GET['login']) && !isset($_GET['reset'])){
?>
<!-- Affiche quand PAS log et lien du mail PAS clique-->
<!DOCTYPE HTML5>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Camagru</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/instaa.png"/>
    <link rel="stylesheet" type="text/css" href="../css/membre.css" media="all">
  </head>
<body>
<div id="insta"><img src="../images/instaa.png" width="90" height="90"/></div>
	<header>
  <h1>CAMaGRU</h1>
    <ul id="menu-demo2">
  <div id="test7">
  <li><a href="/">Accueil</a></li>
  <li><a href="../views/galerie.php">Galerie photo</a>
    <ul>
      <li><a href="../galerie.php">Mes photos</a></li>
    </ul>
</header>

<body>
		<h2 class="PageTitle">Reset Password</h2>

		<div class= "form">
			<form name="reset" action="../../server/resetpassword.php" method="post" accept-charset="utf-8">
				<div class="input">
					<label for="email">Email</label>
					<input name="email" type="email" placeholder="email" required autofocus>
				</div>
				<button type="Submit" class="FormButton">reset password</button>

				</form>
		</div>

	<footer>
	<div id="footim"> <img src="../images/logo.png"/></div>
	<div id="foot"> <p> Tii_Chaton.&copy;</p> </div>
	</footer>
	</body>
<html>
<?php
	}

else{
	echo 'All ready login'.PHP_EOL;
}
?>

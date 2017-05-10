<?php
session_start();
if (!isset($_SESSION['login'])){
?>
<!DOCTYPE HTML5>
<html>
<head>
<meta charset="utf-8" />
<title>Camagru Inscription</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/instaa.png" />
<link rel="stylesheet" type="text/css" href="../css/membre.css" media="all">
<body onload="init();">
<div id="insta"><img src="../images/instaa.png" width="90" height="90"/></div>
	<header>
  <h1>CAMaGRU</h1>
 </header>
<body>
<div id="fondban">
<div id="idpwd">
<fieldset>
<legend>Acivation code</legend>

		<div class= "form">
			<form name="login" action="../../server/createlog.php" method="get" accept-charset="utf-8">
				<div class="input">
					<label for="confirm">code</label>
					<input name="confirm" placeholder="code" value="<?php echo $_GET['code'];?>" required autofocus>
				</div>
				<button type="submit" class="FormButton">Active</button>
			</form>
		</div>
</fieldset>
</body>
<footer>
<div id="footim"> <img src="../images/logo.png"/></div>
<div id="foot"> <p> Tii_Chaton.&copy;</p> </div>
</footer>
</html>
<?php
}
else{
	echo 'All ready login'.PHP_EOL;
}
?>
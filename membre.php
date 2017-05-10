<!DOCTYPE HTML5>
<html>
<head>
<meta charset="utf-8" />
<title>Camagru Inscription</title>
<link rel="shortcut icon" type="image/x-icon" href="./client/images/instaa.png" />
<link rel="stylesheet" type="text/css" href="./client/css/membre.css" media="all">
<body>
<div id="insta"><img src="./client/images/instaa.png" width="90" height="90"/></div>
  <header>
  <h1>CAMaGRU</h1>
 </header>
<div id="fondban">
<div id="idpwd">
<fieldset>
<legend>Identifiez-vous</legend>
<div class= "form">
    <form name="login" action="server/login.php" method="post" accept-charset="utf-8">
      <div class="input">
        <label for="usermail">Login</label>
        <input name="login" placeholder="Login" required autofocus>
      </div>

      <div class="input">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="password" required>
      </div>

      <button type="submit" class="FormButton">Login</button>
    </form>
  </div>
<a href="./client/views/inscription.php">Pas encore inscrire</a>
</br>
<a href="./client/views/resetpassword.php">Mot de passe oublie</a>
</fieldset>
</body>
<footer>
<div id="footim"> <img src="./client/images/logo.png"/></div>
<div id="foot"> <p> Tii_Chaton.&copy;</p> </div>
</footer>
</html>


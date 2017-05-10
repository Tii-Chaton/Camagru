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

    <ul id="menu-demo2">
  <div id="test7">
  <li><a href="../../index.php">Accueil</a>
  </li>

 </header>

<fieldset>
<h3 id="inscription" class="inscription">INSCRIPTION</h3>  
         <form name="Formulaire" action="../../server/createlog.php" method="post" onSubmit="return verification()" >
 
              <table border="0" cellpadding="5" cellspacing="15">              
                 <tr>
                   <td><label for="login">Login : </label></td>
                   <td><input name="login" placeholder="login" required autofocus></td>
                 </tr>
        
                <tr>
                  <td><label for="email">Email : </label></td>
                  <td><input name="email" type="email" placeholder="exemple@camagru.fr" onkeyup="verimail();" required> </td>                
               </tr>
              
               <tr>
                 <td><label for="password">Mot de passe : </label></td>
                 <td><input id="normalpass" type="password" name="password" placeholder="password" onkeyup="verifpass();" required></td>
              </tr>
              
              <tr>
                <td><label for="confpassword">Confirmer mot de passe : </label></td>
                <td><input id="repeatpass" type="password" name="confpassword" placeholder="repeat password" onkeyup="verifpass();" required input:invalid box-shadow: 0 0 5px 1px red></td>
              </tr>
              
             <tr>                    
                <td align="center" colspan="2"><input type="submit" name="valider" id="SignupButton" class="valider" value="Valider l'inscription" style="margin-top:10px" />
               </td>
             </tr>  
       </table>
</fieldset>

<footer>



<div id="footim"> <img src="../images/logo.png"/></div>
<div id="foot"> <p> Tii_Chaton.&copy;</p> </div>
</footer>
<script src="../script/verifypass.js"></script>`
</body>
</html>

<?php
}
else{
header('Location: /');
exit;
}
?>
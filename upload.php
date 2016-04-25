<html>
<head>
<meta charset="utf-8" />
<title>Camagru</title>
<link rel="stylesheet" type="text/css" href="css/membre.css" media="all">
<body onload="init();">
<div id="insta"><img src="./img/instaa.png" width="90" height="90"/></div>
     <header>
  
  <h1>CAMaGRU</h1>

     </header>

<form method="post" action="reception.php" enctype="multipart/form-data">
     <label for="icone">Ma photo (JPG, PNG ou GIF | max. 15 Ko) :</label><br />
     <input type="file" name="icone" id="icone" /><br />
     <input type="submit" name="submit" value="Envoyer" />
</form>
</body>
</html>
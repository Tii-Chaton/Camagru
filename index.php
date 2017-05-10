<?php
include './config/database.php';
session_start();
if (!isset($_SESSION['login'])){
  header('Location: membre.php');
  exit;
}
?>

<!DOCTYPE HTML5>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Camagru</title>
    <link rel="shortcut icon" type="image/x-icon" href="./client/images/instaa.png"/>
    <link rel="stylesheet" type="text/css" href="client/css/membre.css" media="all">
  </head>
<body>
<div id="insta"><img src="./client/images/instaa.png" width="90" height="90"/></div>
	<header>
  <h1>CAMaGRU</h1>
    <ul id="menu-demo2">
  <div id="test7">
   <li><a href="/client/views/galerie.php">Galerie photo</a>
    <ul>
      <li><a href="/client/views/galerie.php">Mes photos</a></li>
    </ul>
  </li>
  <li><a href="/">Mon compte</a>
    <ul>
      <li><a href="modif-compt.php">Profil</a></li>
      <li><a href="server/deconnexion.php">Déconnexion</a></li>
    </ul>
  </li>
 
  <li><a href="upload.php">Telecharger une photo</a>
  </li>
</ul>
</header>

 <!--  <div class="tmp">
      <img src="" class="tricky" id="clipart"/>
  </div> -->

<div class="VideoRendu" >
  <form action="./server/recpicture.php" name="uploadphoto" method="post" style="display:inline-table;" enctype="multipart/from-data">
    <input name="image" id="toto" hidden/>
    <input name="login" value=" <?php echo $_SESSION['login']?>" hidden/>
    <video id="video" class="liveVideo" autoplay></video>
    <button id="startbutton">Prendre une photo </button>


    <div id="control">
      <div class="clik">
        <p>Ananas<input type="checkbox" name="ananas">
        <img src="./client/images/ananas.png" id="un" style="display:none"/></p>
      </div>

      <div class="clik">
        <p>Nuage<input type="checkbox" name="nuage">
        <img src="./client/images/nuage.png" id="deux" style="display:none"/></p>
      </div>

      <div class="clik">
        <p>Chat<input type="checkbox" name="chat">
        <img src="./client/images/chat.png" id="trois" style="display:none"/></p>
      </div>

      <div class="clik">
        <p>Sushi<input type="checkbox" name="sushi">
        <img src="./client/images/sushi.png" id="quatre" style="display:none"/></p>
      </div>
    </div>
  </form>
</div>


<canvas hidden id="canvas"></canvas>

        <div class="myphoto">
        <form name="restorephoto" action="./server/supppicture.php" method="post">
            <input name="restore" value="1" hidden/>
            <button type="submit" class="deleteButton">Suprimer la photo!</button>
        </form>

        <?php
            try{
                $DB_DSNNAME = $DB_DSN.";dbname=".$DB_NAME;
                $pdo = new PDO($DB_DSNNAME , $DB_USER, $DB_PASSWORD);
            }
            catch(PDOException $e){
                $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                die($msg);
            }
            $querry = "SELECT link, id FROM ".$DB_TABLE['pictures']." WHERE createur='".$_SESSION['login']."' and deleted=0";
            $arr = $pdo->query($querry)->fetchAll();
            if (isset($arr)){
                $max = sizeof($arr);
                for($i = 0; $i < $max; $i++){
        ?>

        <form name="deletphoto" action="./server/supppicture.php" method="post">
            <input name="photoid" value="<?php echo $arr[$i]['id']; ?>" hidden/>
            <img src="<?php echo $arr[$i]['link'];?>"/>
            <button type="submit" class="deleteButton">Delete</button>
        </form>
        <?php
                }
            }
            $pdo=NULL;
        ?>
        </div>

    
<?php
//Pdo connect
  try{
    $DB_DSNNAME = $DB_DSN.";dbname=".$DB_NAME;
    $pdo = new PDO($DB_DSNNAME , $DB_USER, $DB_PASSWORD);
  }
  catch(PDOException $e){
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
  }
//Pdo connect



//Pagination
  $countqpic = "SELECT id FROM ".$DB_TABLE['pictures'];
  $countpictures = $pdo->prepare($countqpic);
  $countpictures->execute();
  $nbElement = $countpictures->rowCount();
  $nbMaxPage = ceil($nbElement / 3);
if (isset($_GET['p']) && $_GET['p'] > 0  && $_GET['p'] <= $nbMaxPage){
  $cPage = $_GET['p'];
}
else{
  $cPage = 1;
}
//Pagination


//Get photo per page with limit sql instruction
  $querry = "SELECT link,id,createur  FROM ".$DB_TABLE['pictures']." order by creation DESC LIMIT ". (($cPage-1)*3).",3;";
  $arr = $pdo->query($querry)->fetchAll();
  if (isset($arr)){
    $max = sizeof($arr);
    for($i = 0; $i < $max; $i++){
?>

<?php
  $likequerry = "SELECT id FROM ".$DB_TABLE['likes']." where refphotoid=".$arr[$i]['id'];
  $q = $pdo->prepare($likequerry);
  $q->execute();
  if ($q->rowCount() > 0){
    ?>
    <span style="float:left;"><?php
    echo $q->rowCount(); ?> like<?php if ($q->rowCount() > 1){echo "s";}?></span><?php
  }
 ?>
 <div id="minigal">
<br/><img class="" src="<?php echo $arr[$i]['link'];?>"/>
</div>
</div>
<?php
    }
  }
  $pdo=NULL;
?>
  


<script src="./client/scripts/take_picture.js"></script>    
<script src="./client/scripts/addclip.js"></script>     
<footer>
<div class=wrapper>
  <div class=cloud>
    <div class=cloud_left></div>
    <div class=cloud_right></div>
  </div>
  <div class=rain>
    <div class=drop></div>
    <div class=drop></div>
    <div class=drop></div>
    <div class=drop></div>
    <div class=drop></div>
  </div>
  <div class=surface>
    <div class=hit></div>
    <div class=hit></div>
    <div class=hit></div>
    <div class=hit></div>
    <div class=hit></div>
  </div>
</div>
<div id="footim"> <img src="./client/images/logo.png"/></div>
<div id="foot"> <p> Tii_Chaton.&copy;</p> </div>

</footer>
 
</body>
</html>


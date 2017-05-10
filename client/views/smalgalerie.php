
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
    <span style="float:right;"><?php
    echo $q->rowCount(); ?> like<?php if ($q->rowCount() > 1){echo "s";}?></span><?php
  }
 ?>
<br/><img class="GalerieImg" src="<?php echo $arr[$i]['link'];?>"/>
</div>
<?php
    }
  }
  $pdo=NULL;
?>
<?php
include '../config/database.php';session_start();
if (isset($_SESSION['login'])){
    try{
        $DB_DSNNAME = $DB_DSN.";dbname=".$DB_NAME;
        $pdo = new PDO($DB_DSNNAME , $DB_USER, $DB_PASSWORD);
    }
    catch(PDOException $e){
        $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
        die($msg);
    }
    $login    = htmlspecialchars($_POST['login']);
    if (isset($_FILES["upload"]["name"]) && $_FILES["upload"]["size"] != 0){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["upload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["upload"]["tmp_name"]);
        if($check !== false) {
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
                $dest = imagecreatefromjpeg($target_file);
                unlink($target_file);
            }

        }
        else {
            $img = $_POST['image'];
            $img = str_replace('data:image/jpeg;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $destim = base64_decode($img);
            $dest = imagecreatefromstring($destim);
        }
    }
    else {
        $img = $_POST['image'];
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $destim = base64_decode($img);
        $dest = imagecreatefromstring($destim);
    }

    if ($_POST['ananas']) {
       $image = imagecreatefrompng("../client/images/ananas.png");
       imagecopy($dest, $image, 250, 5, 0, 0, imagesx($image), imagesy($image));
    }
    if ($_POST['nuage']) {
        $image = imagecreatefrompng("../client/images/nuage.png");
        imagecopy($dest, $image, 10, 130, 0, 0, imagesx($image), imagesy($image));
    }
    if ($_POST['chat']) {
        $image = imagecreatefrompng("../client/images/chat.png");
        imagecopy($dest, $image, 210, 165, 0, 0, imagesx($image), imagesy($image));
    }
       if ($_POST['sushi']) {
        $image = imagecreatefrompng("../client/images/sushi.png");
        imagecopy($dest, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
    }

    imagealphablending($dest, true);
    imagesavealpha($dest, true);



    ob_start();
    imagejpeg($dest);
    $image_data = ob_get_contents ();
    ob_end_clean ();
    $link = "data:image/jpeg;base64,".base64_encode($image_data);
    $stmt = $pdo->prepare("INSERT INTO ".$DB_TABLE['pictures']."(createur, link) VALUES(:login, :link)");
    $stmt->bindValue(':login', $login);
    $stmt->bindValue(':link', $link);
    $stmt->execute();
    imagedestroy($image);
    imagedestroy($dest);
    $pdo = NULL;
}
header('Location: /');
exit;
?>
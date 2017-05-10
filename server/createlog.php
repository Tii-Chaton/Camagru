<?php
$user = "root";
$pass = "root";
$status = "success";
include '../config/database.php';
if (!isset($_SESSION['login'])){
	try{
		$DB_DSNNAME = $DB_DSN.";dbname=".$POUET;
		$pdo = new PDO('mysql:host=localhost;dbname=pouet', $user, $pass);
	}
	catch(PDOException $e){
		$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
		die($msg);
	}
	if (isset($_GET['confirm'])){
		$stmt = $pdo->prepare("UPDATE `users` SET confirmed='1' where confirm=:confirm");
		$stmt->bindValue(':confirm', $_GET['confirm']);
		$stmt->execute();
		$stmt = $pdo->prepare("UPDATE `users` SET confirm=NULL where confirm=:confirm");
		$stmt->bindValue(':confirm', $_GET['confirm']);
		$stmt->execute();
		header('Location: ../membre.php');
		exit;
	}
	else {
		$login	= htmlspecialchars($_POST['login']);
		$mdp	= htmlspecialchars(hash('whirlpool', $_POST['password']."pouet"));
		$mdpconf	= htmlspecialchars($_POST['confpassword']);
		$email	=  htmlspecialchars($_POST['email']);
		$headers = 'From: Camagru<admin@camagru.42.fr>' . "\r\n" .
			'Reply-To: <admin@camagru.42.fr>' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		$salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$stryolo = "";
		for ($i=0; $i <= strlen($salt)/2; $i++){
			$stryolo .= $salt[rand() % strlen($salt)];
		}
		$yolohash = htmlspecialchars(hash('md5', $stryolo.$email));
		$link = "http://localhost:8080/client/view/codeconf.php?code=".$yolohash;
		$msg = "Please click on the below link to active your password : \n" . $link . "\n\nYour activation code is : " . $yolohash;
		mail($email, "Active your account", $msg, $headers);
		$stmt = $pdo->prepare("INSERT INTO `users`(login, email, pass, confirm)  VALUES(:login, :email, :pass, '$yolohash')");
		$stmt->bindValue(':login', $login);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':pass', $mdp);
		$stmt->execute();
	}
	$pdo = NULL;
}
header('Location: ../client/views/codeconf.php');
exit;
?>
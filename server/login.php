<?php
include '../config/database.php';
session_start();
unset($_SESSION['login']);
if (isset($_POST['login'])){
	try{
		$DB_DSNNAME = $DB_DSN.";dbname=".$DB_NAME;
		$pdo = new PDO($DB_DSNNAME , $DB_USER, $DB_PASSWORD);
	}
	catch(PDOException $e){
		$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
		die($msg);
	}
	$login	= htmlspecialchars($_POST['login']);
	$pass	= htmlspecialchars(hash('whirlpool', $_POST['password']."pouet"));
	$stmt = $pdo->prepare("SELECT pass FROM ".$DB_TABLE['users']." where login=:login and confirmed='1'");
	$stmt->bindvalue(':login', $login, PDO::PARAM_STR);
	$stmt->execute();
	$arr = $stmt->fetch();
	if ($arr["pass"] == $pass){
		$_SESSION['login']=$login;
	}
	$pdo = null;
}
header('Location: /');
exit;
?>

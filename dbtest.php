<?php
$url = "localhost:3306";
$user = "tokushima";
$pass = "tokushima";

// MySQLへ接続する

try {
	$db = new PDO ( "mysql:host=localhost;dbname=TokushimaHack", tokushima, tokushima );
	
	$stmt = $db->prepare ( "SELECT * FROM M_user" );
	$stmt->execute ();
	$users = $stmt->fetchAll ( PDO::FETCH_ASSOC );
	var_dump ( $users );
} catch ( PDOException $e ) {
	print "エラー!: " . $e->getMessage () . "<br/>";
	die ();
}
?>
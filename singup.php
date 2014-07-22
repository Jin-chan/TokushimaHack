<?php include 'php_include/top.php';

try {
	$db = new PDO ( "mysql:host=localhost;dbname=TokushimaHack", tokushima, tokushima );
} catch ( PDOException $e ) {
	print "エラー!: " . $e->getMessage () . "<br/>";
	die ();
	exit;
}

if ($_POST['singup']) {

$username = $_POST['username'];
$address = $_POST['address'];
$password = $_POST['password'];

$adduser = $db->prepare ( "INSERT INTO `M_user`(`username`, `address`, `password`) VALUES (\"$username\",\"$address\",\"$password\")" );
if($adduser->execute ()){
	header("Location: login.php");
	exit;
}else {
	echo "hg";
}
}


?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" href="form.css" />
<title>Document</title>
</head>
<body>
<div id="loginform" align="center">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
 <div class="box">
 <br>
 <br>
 <br>
 <br>
 	<form method="post" action="singup.php" name="signup">
		<input type="text" name="username" placeholder="user name" required /><br /><br>
		<input type="address" name="address" placeholder="address" required /><br /><br>
		<input type="password" name="password" placeholder="password" /><br /><br>
		<input type="password" name="passwordConfirm" placeholder="type password again" /><br /><br>
		<input type="submit" name="singup" value="登録" />
	</form>
  </div>
</div>
</body>
</html>


<?php include 'php_include/top.php';

if (isset ( $_POST ["login"] )) {
	$error_message = "";
	try {
		$db = new PDO ( "mysql:host=localhost;dbname=TokushimaHack", tokushima, tokushima );
	} catch ( PDOException $e ) {
		print "エラー!: " . $e->getMessage () . "<br/>";
		die ();
	}
	
	$user = $db->prepare ( "SELECT * FROM `M_user` WHERE `username` = \"$_POST[user_name]\" AND `password` = \"$_POST[passoword]\" " );
	
	if ($user->execute ()) {
		// ログインが成功した証をセッションに保存
		$_SESSION ["user_name"] = $_POST ["user_name"];
		
		// 管理者専用画面へリダイレクト
		$login_url = "index.php";
		header ( "Location: {$login_url}" );
		exit ();
	}
	$error_message = "ユーザ名もしくはパスワードが違っています。";
}
?>

<!doctype html>
<html lang="jp">
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" href="form.css" />
</head>
<body>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div id="loginform" align="center">

		<div class="box">
			<br> <br> <br>
<?php
if ($error_message) {
	print '<font color="red">' . $error_message . '</font>';
}
?>
        <br> <br> <br>
			<form action="login.php" method="POST">
				<font color="white">
					ユーザ名：<input type="text" name="user_name"  /><br /><br />
					パスワード：<input type="password" name="password" /><br /><br />
					<input type="submit" name="login" value="ログイン" />
				</font>
			</form>

		</div>
	</div>
</body>
</html>
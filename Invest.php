<?php include 'php_include/check_login.php';?>
<?php
	if(isset($_POST['send']) && $_POST['invest']){
		try {
			$db = new PDO ( "mysql:host=localhost;dbname=TokushimaHack", tokushima, tokushima );
		} catch ( PDOException $e ) {
			print "エラー!: " . $e->getMessage () . "<br/>";
			die ();
		}
		$now = $db->prepare("SELECT  `invest`, `budget` FROM `T_design` WHERE `uid` = \"$_GET[designID]\"");
		$now->execute();
		$money = $now->fetch(PDO::FETCH_ASSOC);

		$in = $_POST['invest'];
		$nowmoney = $money['invest'];
 		$formoney = $nowmoney +  $in * 100000;
		$for = $db->prepare("UPDATE `T_design` SET `invest`=\"$formoney\" WHERE `uid` = \"$_GET[designID]\"" );

		$for->execute();
		$Thank_url = "Invest_Thank.php";
		header ( "Location: {$Thank_url}" );
		exit ();
	}elseif (isset($_POST['send'])){
		echo "入力に誤りがあります";
	}
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Vacation in TOKUSHIMA</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="css/matsui.css" />
</head>
<body>
 <?php include 'php_include/header.php';?>
	<main>
		<p>
		ファンド額を選択してください<br>(ファンド額は10万円単位で選択できます)
		</p>
		<form method="post" action="Invest.php?designID=<?php echo $_GET['houseID']?>">
			<label for="invest">投資額を入力してください</label>
			<input type="text" id="invest" name="invest" size="3"/>00,000円<br />
			<input type="submit" name="send"/>
		</form>
	</main>
</body>
</html>

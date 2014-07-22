<?php include 'php_include/top.php';?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<link rel="stylesheet" href="style-design.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="css/matsui.css" />
</head>
<body>
		<?php include 'php_include/header.php';?>
		<main>
		<?php 
			try {
				$db = new PDO ( "mysql:host=localhost;dbname=TokushimaHack", tokushima, tokushima );
			} catch ( PDOException $e ) {
				print "エラー!: " . $e->getMessage () . "<br/>";
				die ();
			}
			
			$list = $db->prepare("SELECT * FROM `T_house`");
			$list->execute();
			
			while ($design = $list->fetch(PDO::FETCH_ASSOC)){?>
			<div class="house">
			<?php 
			echo "物件番号" . $design['uid'] . "<br />";
			echo "住所" . $design['address']. "<br />";
			echo "説明" . $design['memo']. "<br />";
			
				for($i=1;$i<=5;$i++){
					if($design["img$i"]) {?>
						<img src="<?php echo $design["img$i"] ?>" alt="家の画像" />
					<?php }} 
				echo "<br /><button onclick=\"location.href='AboutHouse.php?houseID=$design[uid]'\" >詳細</button>";
				echo "</div>";
			 } ?>
			 </div>
</body>
</html>
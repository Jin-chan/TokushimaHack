<?php include 'php_include/top.php';?>
<!DOCTYPE HTML>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>Vacation in TOKUSHIMA</title>
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
			
			$list = $db->prepare("SELECT * FROM `T_design` WHERE 1");
			$list->execute();
			$noDisign = true;
			while ($design = $list->fetch(PDO::FETCH_ASSOC)){
				$noDisign = false;
			?>
				<div class="house">
				<?php 
				echo "デザインタイトル : " . $design['title'] . "<br />";
				echo "物件番号 : " . $design['itemid']. "<br />";
				echo "予算 : ￥" . $design['budget'] . "<br />";
				echo "説明<br />" . nl2br($design['memo']) . "<br />";
				
				echo "<div>";
				for($i=1;$i<=5;$i++){
					if($design["img$i"]) {?>
						<img src="<?php echo $design["img$i"] ?>" alt="家の画像" />
					<?php }} 
					echo "</div>";
				echo "<button onclick=\"location.href='AboutDesign.php?designID=$design[uid]'\">詳細</button>";
				echo "</div>";
			}
			if ($noDisign)
					echo "登録されているデザインはありません。";
				?>
		</main>	
	</body>
</html>
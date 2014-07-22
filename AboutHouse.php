<?php include 'php_include/top.php';?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Document</title>
<!-- jQuery library (served from Google) -->
<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="js/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="jquery.bxslider.css" rel="stylesheet" />
<link rel="stylesheet" href="style-design.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/matsui.css" />
<script type="text/javascript">
			$(document).ready(function(){
			  $('.bxslider').bxSlider({
 				 pagerCustom: '#bx-pager'
				});
			});
</script>
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
	$phouse = $db->prepare ( "SELECT * FROM `T_house` WHERE `uid` = \"$_GET[houseID]\"" );

	$phouse->execute ();
	$house = $phouse->fetch ( PDO::FETCH_ASSOC );
	?>
		<div id="photo">
			<ul class="bxslider">
			<?php for($i = 1 ; $i <= 5 ;$i++ ){?>
				<li><img src="<?php echo $house["img$i"] ?>" /></li>
			<?php } ?>
			</ul>
			<div id="bx-pager">
			<?php for($i = 0 ; $i <= 5 ;$i++ ){?>
				<?php $ip = $i + 1; ?> 
				<a data-slide-index="<?php echo $i?>" href=""><img src="<?php echo $house["img$ip"] ?>" class="sum"/></a>
			<?php }?>
			</div>
		</div>
		<div id="details">
			<p><h4>物件番号</h4><?php echo $house['uid']?></p><br />
			<p><h4>住所</h4> <?php echo $house['address']?></p><br />
			<p><h5>その他</h5><?php echo $house['memo']?></p>
			<button onclick="location.href='DesignRegistration.php?houseID=<?php echo $house['uid']?>'" >デザインの応募</button>
		</div>
	</main>
</body>
</html>
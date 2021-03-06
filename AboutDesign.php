<?php
   include 'php_include/top.php';
   $designid = $_GET ['designID'];

   try {
   $db = new PDO ( "mysql:host=localhost;dbname=TokushimaHack", tokushima, tokushima );
   } catch ( PDOException $e ) {
   print "エラー!: " . $e->getMessage () . "<br/>";
die ();
}

?>
<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>徳島に住みたい</title>
    <script
       src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>

    <link href="jquery.bxslider.css" rel="stylesheet" />
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
    <?php 
       include 'php_include/header.php';

       $about = $db->prepare ( "SELECT * FROM `T_design` WHERE `uid` = $_GET[designID]" );
    $about->execute ();
    $design = $about->fetch ( PDO::FETCH_ASSOC );
    ?>
    <!-- コンテンツ -->
    <div id="main">
      <?php
	 if ($_GET [error]) {
	 echo "<h3>ログインしてください</h3>";
	 }
	 ?>
      <div id="photo">
	<ul class="bxslider">
	  <?php for($i = 1 ; $i <= 5 ;$i++ ){?>
		<li><img src="<?php echo $design["img$i"] ?>" /></li>
		<?php } ?>
	</ul>
	<div id="bx-pager">
	  <?php for($i = 0 ; $i <= 5 ;$i++ ){
				   $ip = $i + 1; ?> 
		<a data-slide-index="<?php echo $i?>" href="">
		  <img src="<?php echo $design["img$ip"] ?>" class="sum" /></a>
		<?php }?>
	</div>
      </div>
      <div id="details">
	<h4>デザインタイトル</h4> <?php echo $design['title']?>
	<h4>物件番号</h4><?php echo $design['itemid']?>
	<h4>目標金額</h4><?php echo "￥" . $design['budget']?>
	<h4>現在の投資金額</h4><?php echo "￥" . $design['invest']?>		
	<h5>その他</h5><?php echo $design['memo']?>
	<button onclick="location.href='Invest.php?houseID=<?php echo $design['uid']?>'">投資する</button>
</main>
</body>
</html>

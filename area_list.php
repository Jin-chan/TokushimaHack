<?php include 'php_include/top.php';?>
<!doctype html>
<html lang="jp">
  <head>
    <meta charset="UTF-8" />
    <title>Document</title>
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
      //SELECT * FROM `T_design` WHERE 1
      $itemID = $db->prepare("SELECT `uid` FROM `T_house` WHERE `areacode` = \"$_GET[areaID]\" ");
      $itemID->execute();
      $id = $itemID->fetch(PDO::FETCH_ASSOC);
      $designs = $db->prepare("SELECT * FROM `T_design` WHERE `itemid` = \"$id[uid]\"");
      $designs -> execute();

      $noDisign = true;
      while ($design = $designs->fetch(PDO::FETCH_ASSOC)){
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
		 echo <<< EOH
      </div>
      <button onclick=\"location.href='AboutDesign.php?designID=$design[uid]'\">詳細</button>
</div>
EOH;
		 }
		 if ($noDisign)
		 echo "<a href='area.php'><div class=\"error\">登録されているデザインはありません。</div></a>";
		 ?>
    </main>	
  </body>
</html>

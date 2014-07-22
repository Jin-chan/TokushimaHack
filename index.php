<?php include 'php_include/top.php'; ?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>Vacation in TOKUSHIMA</title>
    <link rel="stylesheet" href="css/matsui.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery library (served from Google) -->
    <script
       src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- bxSlider Javascript file -->
    <script src="js/jquery.bxslider.min.js"></script>
    <!-- bxSlider CSS file -->
    <link href="jquery.bxslider.css" rel="stylesheet" />
    <script type="text/javascript">
      $(document).ready(function(){
      $('.bxslider').bxSlider();
      });
    </script>
  </head>
  <body>
    <!-- ヘッダ -->
    <?php include 'php_include/header.php';?>
    <div id="contents">
      <!-- コンテンツ -->
      <button style="position: absolute; left: 30px; top: 200px"
	      onClick="location.href='area.php'">場所から探す</button>
      <button style="position: absolute; left: 400px; top: 200px"
	      onClick="location.href='design_list.php'">デザインから探す</button>
      <br>
      <button style="position: absolute; left: 200px; top: 320px"
	      onClick="location.href='house.php'">デザイン募集中の物件</button>
    </div>

    <div id="topMenu">
      <h1>NEW DESIGN</h1>
      <!-- コンテンツ -->
      <ul class="bxslider toppage">
	<li><img class="toppage" src="img/bukken/絵.jpg" /></li>
	<li><img class="toppage" src="img/bukken/絵2.jpg" /></li>
	<li><img class="toppage" src="img/pic3.jpg" /></li>
	<li><img class="toppage" src="img/pic4.jpg" /></li>
      </ul>
    </div>
  </body>
</html>

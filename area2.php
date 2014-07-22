<?php include 'php_include/top.php';?>
<!DOCTYPE HTML>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>徳島に別荘を？</title>
		<link rel="stylesheet" href="map.css" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
	
	<!-- ヘッダ -->
	<?php include 'php_include/header.php';?>
	

	<div id="tokushimaMap" >
	<img src="img/tokushimaAll.gif"  width="512" height="512" usemap="#tokushima">
		 
		<map  name="tokushima"  >
		 <area id="seibu" href="seibu.php" shape="poly" alt="西部" coords="256,98,30,179,14,275,146,295,278,256">
		 <area id="toubu" href="toubu.php" shape="poly" alt="東部" coords="256,98,278,256,342,278,463,206,449,55">
		 <area id="nanbu" href="nanbu.php" shape="poly" alt="南部" coords="146,295,278,256,342,278,463,206,501,290,296,444">
		 <img id="minami"  src="img/nanbu.gif">
		</map> 
		 
		
	</div>	 	
	
	</body>
</html>
<?php include 'php_include/top.php';?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>徳島に別荘を？</title>
<link rel="stylesheet" href="css/map2.css" />
</head>
<body>

	<!-- ヘッダ -->
	<?php include 'php_include/header.php';?>
	
	<div id="map">
		<!-- ●日本地図 -->
		<ul id="imagemap">
			<li id="hokkaido"><a href="area_list.php?areaID=1"><span>東部</span></a></li>
			<li id="touhoku"><a href="area_list.php?areaID=2"><span>西部</span></a></li>
			<li id="kanto"><a href="area_list.php?areaID=3"><span>北部</span></a></li>
		</ul>
		<!-- ●日本地図下の地域リスト -->
	</div>
</body>
</html>
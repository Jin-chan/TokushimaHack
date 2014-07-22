<?php include 'php_include/top.php';

if (isset( $_POST ['house'])) {
	//var_dump($_POST);
	//echo "<br />";
	//var_dump($_FILES);
	try {
		$db = new PDO ( "mysql:host=localhost;dbname=TokushimaHack", tokushima, tokushima );
	} catch ( PDOException $e ) {
		print "エラー!: " . $e->getMessage () . "<br/>";
		die ();
		exit;
	}
	
	
	
	$next = $db->prepare("SHOW TABLE STATUS LIKE 'T_house'");
	$next->execute();
	$state = $next->fetch(PDO::FETCH_ASSOC);
	$id = $state['Auto_increment'];
		
	$uploaddir = "imgHouse/$id/";
	mkdir("imgHouse/$id");
	$imgs = array();
	
	for ($i=1;$i<=5;$i++){
		$uploadfile = $uploaddir . $_FILES["photo$i"]['name'];
		if(move_uploaded_file($_FILES["photo$i"]['tmp_name'],$uploadfile))
			array_push($imgs, $uploadfile);
	}
	$name = $_POST['address'];
	$address = $_POST["address"];
	$area =  $_POST["area"];
	$budget = $_POST["budget"];
	$memo = $_POST["memo"];
	
	$house = $db->prepare("INSERT INTO `T_house`(`areacode`, `address`, `img1`, `img2`, `img3`, `img4`, `img5`, `memo`) 
			VALUES (\"$area\",\"$address\",\"$imgs[0]\",\"$imgs[1]\",\"$img[2]\",\"$imgs[3]\",\"$imgs[4]\",\"$memo\")");
	//var_dump($house);
	$house->execute();
}

 
//echo $last_id = mysql_insert_id();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	<form method="post" name="house" enctype="multipart/form-data" action="HouseRegistration.php">
		<input type="text" name="address" placeholder="住所" /><br />
				<select name="area">
			<option value="">エリア選択</option>
			<option value="1">東部</option>
			<option value="2">西部</option>
			<option value="3">南部</option>
		</select><br />
		<input type="text" name="budget" placeholder="広さ" /><br />
		物件写真<br />
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		<input type="file" name="photo1" /><br />
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		<input type="file" name="photo2" /><br />
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		<input type="file" name="photo3" /><br />
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		<input type="file" name="photo4" /><br />
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		<input type="file" name="photo5" /><br />
		<textarea name="memo" id="" cols="30" rows="10" placeholder="説明文"></textarea><br />
		<input type="submit" name="house" />
	</form>
</body>
</html>
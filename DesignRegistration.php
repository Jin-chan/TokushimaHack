<?php include 'php_include/top.php';?>
<!doctype html>
<html lang="jp">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<link rel="stylesheet" href="style.css" />
	</head>
<body>
	<?php include 'php_include/header.php';?>
	<form method="post" enctype="multipart/form-data" action="confirm.php">
	 物件番号 <?php echo $_GET['houseID']?><br /> <input type="hidden"
		name="itemid" value="<?php echo $_GET['houseID']?>" /> <input
		type="text" name="title" placeholder="デザインタイトル" /><br />
	<input type="text" name="budget" placeholder="予算" /><br /> <input
		type="hidden" name="MAX_FILE_SIZE" value="1000000" /> <input
		type="file" name="photo1" /><br /> <input type="hidden"
		name="MAX_FILE_SIZE" value="1000000" /> <input type="file"
		name="photo2" /><br /> <input type="hidden" name="MAX_FILE_SIZE"
		value="1000000" /> <input type="file" name="photo3" /><br /> <input
		type="hidden" name="MAX_FILE_SIZE" value="1000000" /> <input
		type="file" name="photo4" /><br /> <input type="hidden"
		name="MAX_FILE_SIZE" value="1000000" /> <input type="file"
		name="photo5" /><br />
	<textarea name="memo" id="" cols="30" rows="10" placeholder="説明文"></textarea>
	<br /> <input type="submit" />
</form>
</body>
</html>
<?php 
include 'php_include/top.php';
try {
	$db = new PDO ( "mysql:host=localhost;dbname=TokushimaHack", tokushima, tokushima );
} catch ( PDOException $e ) {
	print "エラー!: " . $e->getMessage () . "<br/>";
	die ();
}

$title = $_POST["title"];
$itemdid = $_POST["itemid"];
$budget = $_POST["budget"];
$memo = $_POST["memo"];
$random = rand(0,1000);
$uploaddir = "imgDesign/$_POST[itemid]/$random/";

$imgs = array();
for ($i=1;$i<=5;$i++){
	mkdir("imgDesign/$_POST[itemid]");
	mkdir("imgDesign/$_POST[itemid]/$random/");
	$uploadfile = $uploaddir . $_FILES["photo$i"]['name'];
		if(move_uploaded_file($_FILES["photo$i"]['tmp_name'],$uploadfile))
			array_push($imgs, $uploadfile);
}

$design = $db->prepare ( "INSERT INTO `T_design`(`uid`,`title`, `itemid`, `budget`, `img1`, `img2`, `img3`, `img4`, `img5`, `memo`) 
		VALUES (\"$random\",\"$title\",\"$itemdid\",\"$budget\",\"$imgs[0]\",\"$imgs[1]\",\"$img[2]\",\"$imgs[3]\",\"$imgs[4]\",\"$memo\")" );

if($design->execute())
	header("Location: index.php");
else
	echo "ng";
?>


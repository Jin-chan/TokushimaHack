<?php
session_start();
if (!$_SESSION['user_name']){
	header("Location: AboutDesign.php?designID=$_GET[houseID]&error=1");
	exit();
}
?>
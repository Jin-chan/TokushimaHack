<div id="header" Align="right">
	<p Align="right">
<!-- 		<a href="vision.php">about us</a> -->
	</p>
	<?php
	if ($_SESSION ['user_name']) {
		echo "こんにちは " . $_SESSION ['user_name'] . "さん";
		echo "( <a href=\"logout.php\">logout</a> )";
	} else {
		echo "<a href=\"login.php\">LOGIN</a>";
		echo "&nbsp&nbsp&nbsp";
		echo "<a href=\"singup.php\"> 新規登録 </a>";
	}
	?>
</div>
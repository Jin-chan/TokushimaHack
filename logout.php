<?php
include 'php_include/top.php';
session_destroy();
header("Location: index.php");
?>
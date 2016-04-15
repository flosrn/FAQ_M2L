<?php
	$dsn = 'mysql:host=localhost;dbname=m2l v2.0';
	$con = new PDO($dsn, 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
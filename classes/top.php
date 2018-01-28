<?php 
	session_start();
	include_once('../classes/cms.php');
	$objcms = new cms();
	if(empty($_SESSION['language']))
	$_SESSION['language'] = 1;
?>
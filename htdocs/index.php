<!DOCTYPE html>
<?php
	session_start();
	include("./page/connect.php");
	$page = "./page/new_products.php";
	if (isset($_GET['page']))
	{
		if (file_exists("./page/".$_GET['page'].".php"))
			$page = "./page/".$_GET['page'].".php";
		else
			$page = "./page/404.php";
	}
	if (isset($_SESSION['panier']['libelleProduit']))
		$nbArticles=count($_SESSION['panier']['libelleProduit']);
	else
		$nbArticles = 0;
	if (isset($_GET["famille"]))
		$_SESSION["savelink"]=$_GET["famille"];
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>42 - Lingerie</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
	</head>
	<body bgcolor="#FFFFFF">
		<?php include ("./page/header.php");?>
		<?php include ($page);?>
		<hr width=100%>
		<?php include ("./page/foot.php");?>
		<hr width=100%>
	<font face="monospace"><i><p align=right>© gleger - pcotasso 2014</p></i></fontface="monospace">
	</div>
	</body>
</html>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<?php
	session_start();
	include("connect.php");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
 		<title>42 - Lingerie</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body bgcolor="#FFFFFF">
	<center>
		<img src="img/logo.png" alt="logo">
		<h2><span class="error">Compte créé avec succès</span></h2>
		<h3>Vous pouvez maintenant vous logger, <?php echo $_SESSION['login'];?></h3>
		<form action="inscription.php">
			<input type="submit" value="Inscription"/>
		</form>
		<form action="signing.php">
			<input type="submit" value="Se connecter"/>
		</form>
	</center>
	<hr width=100%>
	<font face="monospace"><i><p align=right>© gleger - pcotasso 2014</p></i></fontface="monospace">
	</body>
</html>
<?php
	$_SESSION['login'] = "";
?>
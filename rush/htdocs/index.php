<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<?php
	include("connect.php");
	session_start();
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
	</center>
	<nav id="main">
		<ul>
			<li><h3>Lingerie de nuit</h3>
				<ul class="first_hidden">
					<li><a href="index.php">Nuisette</a></li>
					<li>Pyjamas</li>
					<li>Caracos</li>
					<li>Peignoirs, Déshabillés</li>
					<li>Vêtements d'Intérieur</li>
				</ul>
			</li>
			<li><h3>Lingerie</h3>
				<ul class="first_hidden">
					<li>Soutiens-Gorges</li>
					<li>Magic up</li>
					<li>Double Push up</li>
					<li>Push up</li>
					<li>Ampliformes</li>
					<li>Sans armatures</li>
					<li>Bretelles amovibles</li>
					<li>Strings</li>
					<li>Tangas</li>
					<li>Culottes</li>
					<li>Shortys, boxers</li>
					<li>Porte-jarretelles, Guêpières</li>
				</ul>
			</li>
			<li><h3>Maillot de bain</h3>
				<ul class="first_hidden">
					<li>Les Hauts</li>
					<li>Les Bas</li>
					<li>Les 1 Pièce</li>
					<li>Tenues de plage</li>
				</ul>
			</li>
			<li><h3>Collant</h3>
				<ul class="first_hidden">
					<li>Collants</li>
					<li>Leggings</li>
					<li>Bas</li>
					<li>Chaussettes</li>
				</ul>
			</li>
		</ul>
	</nav>
	<?php
		include("new_products.php");
	?>
	<center>
		<?php 
			if (isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] !== "")
			{
				echo "<form action=\"logout.php\">";
				echo "<input type=\"submit\" value=\"Se deconnecter\"/>";
				echo "</form>";
			}
			else
			{
				echo "<form action=\"inscription.php\">";
				echo "<input type=\"submit\" value=\"Inscription\"/>";
				echo "</form>";
				echo "<form action=\"signing.html\">";
				echo "<input type=\"submit\" value=\"Se connecter\"/>";
				echo "</form>";
			}	
		?>
	</center>
	<hr width=100%>
	<font face="monospace"><i><p align=right>© gleger - pcotasso 2014</p></i></fontface="monospace">
	</body>
</html>
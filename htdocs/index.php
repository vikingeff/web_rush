<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<?php
	include("connect.php");
	session_start();
    $nbArticles=count($_SESSION['panier']['libelleProduit']);
    if (isset($_GET["famille"]))
    	$_SESSION["savelink"]=$_GET["famille"];
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
					<li><a href="index.php?famille=Nuisette">Nuisette</a></li>
					<li><a href="index.php?famille=Pyjamas">Pyjamas</a></li>
					<li><a href="index.php?famille=Caracos">Caracos</a></li>
					<li><a href="index.php?famille=Peignoirs, Déshabillés">Peignoirs, Déshabillés</a></li>
					<li><a href="index.php?famille=Vêtements d'Intérieur">Vêtements d'Intérieur</a></li>
				</ul>
			</li>
			<li><h3>Lingerie</h3>
				<ul class="first_hidden">
					<li><a href="index.php?famille=Soutiens-Gorges">Soutiens-Gorges</a></li>
					<li><a href="index.php?famille=Magic up">Magic up</a></li>
					<li><a href="index.php?famille=Double Push up">Double Push up</a></li>
					<li><a href="index.php?famille=Push up">Push up</a></li>
					<li><a href="index.php?famille=Ampliformes">Ampliformes</a></li>
					<li><a href="index.php?famille=Sans armatures">Sans armatures</a></li>
					<li><a href="index.php?famille=Bretelles amovibles">Bretelles amovibles</a></li>
					<li><a href="index.php?famille=Strings">Strings</a></li>
					<li><a href="index.php?famille=Tangas">Tangas</a></li>
					<li><a href="index.php?famille=Culottes">Culottes</a></li>
					<li><a href="index.php?famille=Shortys, boxers">Shortys, boxers</a></li>
					<li><a href="index.php?famille=Porte-jarretelles, Guêpières">Porte-jarretelles, Guêpières</a></li>
				</ul>
			</li>
			<li><h3>Maillot de bain</h3>
				<ul class="first_hidden">
					<li><a href="index.php?famille=Les Hauts">Les Hauts</a></li>
					<li><a href="index.php?famille=Les Bas">Les Bas</a></li>
					<li><a href="index.php?famille=Les 1 Pièce">Les 1 Pièce</a></li>
					<li><a href="index.php?famille=Tenues de plage">Tenues de plage</a></li>
				</ul>
			</li>
			<li><h3>Collant</h3>
				<ul class="first_hidden">
					<li><a href="index.php?famille=Collants">Collants</a></li>
					<li><a href="index.php?famille=Leggings">Leggings</a></li>
					<li><a href="index.php?famille=Bas">Bas</a></li>
					<li><a href="index.php?famille=Chaussettes">Chaussettes</a></li>
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
		<form action="panier.php">
        <?php
            echo "<input type='submit' value='panier : ".$nbArticles."'/>";
        ?>
        </form>
	</center>
	<hr width=100%>
	<font face="monospace"><i><p align=right>© gleger - pcotasso 2014</p></i></fontface="monospace">
	</body>
</html>
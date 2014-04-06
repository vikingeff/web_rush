<?php
	include_once("./page/fonctions_panier.php");
	$erreur = false;
	if (isset($_POST['button']))
		$id_get = $_POST['button'];
	else
	{
		$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
		$id_get = "";
	}
	if ($id_get !== "")
	{
		include ("./page/modif.php");
		$request = "select ID_vetement, nom_vetement, prix_vetement from vetement where id_vetement = \"$id_get\"";
		$res = mysqli_query($con,$request);
		$row = mysqli_fetch_array($res);
		mysqli_close($con);
		$prix_get = $row['prix_vetement'];
		$nom_get = $row['nom_vetement'];
		$action = 'ajout';
	}
	if($action !== null)
	{
		if(!in_array($action,array('ajout', 'suppression', 'refresh')))
			$erreur=true;

		//récuperation des variables en POST ou GET
		if ($id_get == "")
		{
			$l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
			$p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
			$q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
		}
		else
		{
			$l = $nom_get;
			$q = 1;
			$p = $prix_get;
		}
		//Suppression des espaces verticaux
		$l = preg_replace('#\v#', '',$l);
		//On verifie que $p soit un float
		$p = floatval($p);

		//On traite $q qui peut etre un entier simple ou un tableau d'entier

		if (is_array($q)){
			$QteArticle = array();
			$i=0;
			foreach ($q as $contenu){
				$QteArticle[$i++] = intval($contenu);
			}
		}
		else
			$q = intval($q);
	}

	if (!$erreur){
		switch($action){
			Case "ajout":
				ajouterArticle($l,$q,$p);
			break;

			Case "suppression":
				supprimerArticle($l);
			break;

			Case "refresh" :
				for ($i = 0 ; $i < count($QteArticle) ; $i++)
				{
					modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
				}
			break;

			Default:
				break;
		}
		if ($id_get != "")
		{
			$adress = "index.php";
			if (isset($_SESSION["savelink"]))
				$adress	= $adress."?famille=".$_SESSION["savelink"];
			//echo $adress;
			header("Location: $adress");
			exit();
		}
	}
	if (creationPanier())
	{
		$nbArticles=count($_SESSION['panier']['libelleProduit']);
		if ($nbArticles <= 0)
			echo "<center><h2><span class=\"error\"<tr><td>Votre panier est vide </ td></tr></span></h2></center>";
		else
		{
			include("./page/table_panier.php");
			for ($i=0 ;$i < $nbArticles ; $i++)
			{
				echo "<tr>";
				echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
				echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
				echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
				echo "<td><a href=\"".htmlspecialchars("index.php?page=panier&action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">Delete</a></td>";
				echo "</tr>";
			}
			echo "<tr><td colspan=\"2\"> </td>";
			echo "<td colspan=\"2\">";
			echo "Total : ".MontantGlobal();
			echo "</td></tr>";
			echo "<tr><td colspan=\"4\">";
			echo "<input type=\"submit\" value=\"Rafraichir\"/>";
			echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
			echo "</td></tr>";
		}
	}
	echo "</table>";
	echo "</form>";
	echo "<center>";
	if ($nbArticles > 0)
	{
		echo "<form method=\"post\" action=\"index.php?page=envoyer_panier\">";
		echo "<input type=\"submit\" name=\"submit\" value=\"OK\"/>";
		echo "</form>";
	}
	echo "<form method=\"post\" action=\"index.php\">";
	echo "<input type=\"submit\" name=\"submit\" value=\"Retour\"/>";
	echo "</form>";
	echo "</center>";
?>
<?php
	include("fonctions_panier.php");
	if(isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] !== "")
	{
		$loop=0;
		$number = count($_SESSION['panier']['libelleProduit']);
		if (!$number)
			echo "<center><h2><span class=\"error\">Trying to send fake baskets you biatch ?</span></h2></center>";
		else
		{
			while($loop<$number)
			{
				$req = "insert into panier (article_panier, quantite_panier, utilisateur_panier) values (";
				$values="";
				$values = $values."\"".$_SESSION['panier']['libelleProduit'][$loop]."\",";
				$values = $values.$_SESSION['panier']['qteProduit'][$loop].",";
				$values = $values.$_SESSION['backupid'].")";
				//echo $_SESSION['backupid'];
				$req = $req.$values;
				include ("./page/modif.php");
				if (!mysqli_query($con,$req))
				{
					die('Error: ' . mysqli_error($con));
				}
				$loop++;
			}
			$loop=$number-1;
			while($loop>=0)
			{
				supprimerArticle($_SESSION['panier']['libelleProduit'][$loop]);
				$loop--;
			}
			echo "<center><h2>Thanks for your purchase.</h2></center>";
		}
	}
	else
	{
		echo "<center><h2><span class=\"error\">Need to be logged on to confirm your basket !</span></h2></center>";
	}		
?>
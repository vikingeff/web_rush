<?php
	echo "<center>";
	if (isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] !== "")
	{
		if ($_SESSION['is_admin'])
		{
			echo "<form action=\"./admin/admin.php\">";
			echo "<input type=\"hidden\" name=\"page\" value=\"admin\">";
			echo "<input type=\"submit\" value=\"Admin\">";
			echo "</form>";
		}		
		echo "<form action=\"index.php\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"logout\">";
		echo "<input type=\"submit\" value=\"Deconnecter ".$_SESSION['loggued_on_user']."\"/>";
		echo "</form>";
	}
	else
	{
		echo "<form action=\"index.php\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"inscription\">";
		echo "<input type=\"submit\" value=\"Inscription\"/>";
		echo "</form>";
		echo "<form action=\"index.php\">";
		echo "<input type=\"hidden\" name=\"page\" value=\"signing_entry\">";
		echo "<input type=\"submit\" value=\"Se connecter\"/>";
		echo "</form>";
	}
	echo "<form action=\"index.php\">";
	echo "<input type=\"hidden\" name=\"page\" value=\"panier\">";
	echo "<input type='submit' value='panier : ".$nbArticles."'/>";
	echo "</form>";
	echo "</center>";
?>

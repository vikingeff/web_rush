<center>
	<h2><span class="error">Compte créé avec succès</span></h2>
	<h3>Vous pouvez maintenant vous logger, <?php echo $_SESSION['login'];?></h3>
</center>
<?php
	$_SESSION['login'] = "";
?>

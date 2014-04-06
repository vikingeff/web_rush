<?php
	$fields = "id_utilisateur, nom_utilisateur, prenom_utilisateur, login_utilisateur, password_utilisateur, telephone_utilisateur, adresse_utilisateur, email_utilisateur, is_admin";
	$request = "insert into client ($fields) values (NULL, \"$nom\", \"$prenom\", \"$login\", \"$passwd\", \"$phone\", \"$adresse\", \"$email\", \"FALSE\")";
	//echo $request."\n";
	if (!mysqli_query($con,$request))
	{
		die('Error: ' . mysqli_error($con));
	}
	//echo "1 record added";
?>

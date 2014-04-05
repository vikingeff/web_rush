<?php
	$result = mysqli_query($con,"select distinct image_vetement, nom_vetement, prix_vetement from vetement");
	echo "<center>";
	$list_img="";
	$list_nom="";
	$list_prix="";
	$nb_boobs=0;
	while($row = mysqli_fetch_array($result))
	{
		$list_img[$nb_boobs]=$row['image_vetement'];
		$list_nom[$nb_boobs]=$row['nom_vetement'];
		$list_prix[$nb_boobs]=$row['prix_vetement'];
		$nb_boobs++;
	}
	$numbers = range(0, $nb_boobs-1);
	shuffle($numbers);
	$nb_boobs = 4;
	while ($nb_boobs !== 0)
	{
		echo "<img src=".$list_img[$numbers[$nb_boobs]]." width='313' height='370'></img>";
		echo $list_nom[$numbers[$nb_boobs]];
		echo $list_prix[$numbers[$nb_boobs]];
		$nb_boobs--;
	}
	echo "</center>";
	mysqli_close($con);
?>
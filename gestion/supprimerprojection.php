<html>
	<?php
		include("includes/head.php");
		include("includes/header.php");
	?>
		<!-- 
		================================================== 
			Company Description Section Start
		================================================== -->
		<section class="company-description">
			<div class="container">
				<h2>Suppression de projection</h3>
					<table>
						<tr><th>Numero</th><th>Date</th><th>Heure</th><th>Informations</th><th>Salle</th><th>Film</th><th>Supprimer</th></tr>
	<?php 
		require_once("includes/db_instance.inc.php");
		require_once("includes/db_connect.inc.php");
		// Suppression de la projection 
		if(isset($_POST["btnsup"]) && isset($_POST["noproj"]))
		{
			$db->execute("DELETE FROM reservation WHERE noproj = $_POST[noproj]");
			$db->execute("DELETE FROM projection WHERE noproj = $_POST[noproj]");
			echo("Suppression effectuée <br/>");
		}
		// Affichage de la liste de projections
		$db->execute("SELECT * FROM projection, film WHERE projection.nofilm = film.nofilm ORDER BY dateproj");
		while($db->read())
		{
			$heureproj = strtotime($db->getData("heureproj"));
			echo("<form method='POST'>");
			echo("<input type='hidden' name='noproj' value='".$db->getData("noproj")."' />");
			echo("<tr><td>".$db->getData("noproj")."</td><td>".$db->getData("dateproj")."</td><td>".strftime("%Hh%M", $heureproj)."</td><td>".$db->getData("infoproj")."</td><td>".$db->getData("nosalle")."</td><td>".$db->getData("titre")."</th><td><input type='submit' name='btnsup' value='Supprimer' /></td>");
			echo("</form>");
		}
	?>
	</table>
	<?php
		require_once("includes/db_disconnect.inc.php");
		include("includes/footer.php");
	?>
</html>


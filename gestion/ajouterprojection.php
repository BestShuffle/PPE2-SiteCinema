<html>
	<?php
		include("includes/head.php");
		include("includes/header.php");
	?>
		<!-- 
		================================================== 
			Company Description Section Start
		================================================== -->
				<h3>Ajout de projection</h3>
				<?php 
					require_once("includes/db_instance.inc.php");
					require_once("includes/db_connect.inc.php");
				?>
				<!-- Affichage des champs -->
				<form enctype="multipart/form-data" method="post" action="ajouterprojection.php">
					Date
					<br /><input type="text" name="dateproj" size="10" /><br />
					Heure
					<br /><input type="text" name="heureproj" size="10" /><br />
					Informations
					<br /><textarea name="infoproj" cols="75" rows="4" /></textarea><br />
					Salle 
					<select name="cbosalle">
					<?php
						// Chargement du cbo de salle
						$db->execute("SELECT * FROM salle");
						while($db->read())
						{
							echo ("<option value='".$db->getData("nosalle")."'>".$db->getData("nosalle")."</option>");
						}
					?>
					</select>
					Film 
					<select name="cbofilm">
					<?php
						// Chargement du cbo de film
						$db->execute("SELECT * FROM film");
						while($db->read())
						{
							echo ("<option value='".$db->getData("nofilm")."'>".$db->getData("titre")."</option>");
						}
						echo("");
					?>
					</select>
					<input type="submit" name="btnajouter" value="Ajouter la projection" />
				</form>
					<?php
					// Insertion projection d'une projection en base de données
					if (isset($_POST["btnajouter"])) { 
						$db->execute("INSERT INTO projection (dateproj, heureproj, infoproj, nosalle, nofilm) VALUES ('$_POST[dateproj]', '$_POST[heureproj]', '$_POST[infoproj]', '$_POST[cbosalle]', $_POST[cbofilm])" );
						echo("<h2>Ajout effectu&eacute;</h2><br/>");
					}
			require_once("includes/db_disconnect.inc.php");
		include("includes/footer.php");
	?>
</html>
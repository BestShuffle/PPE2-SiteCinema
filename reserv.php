<html>
<?php
	// Ajout du head
	include("includes/head.php");
?>
	<body>
		<?php
			// Ajout du header
			include("includes/header.php");
		?>
	
        <!-- 
        ================================================== 
            Page globale
        ================================================== -->
        <section class="global-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h2>Réservation</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="ion-ios-home"></i>
                                        Accueil
                                    </a>
                                </li>
                                <li class="active">Réservation</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>


	<!-- 
		================================================== 
			Company Description Section Start
		================================================== -->
		<section class="company-description">
			<div class="container">
				<form method="POST">
					Choisissez votre film <br/>
					<!-- Chargement de la liste déroulante de films -->
					<select name="cbofilm" onchange="this.form.submit()">
					
					<!-- Ajout d'une ligne blanche -->
					<option value=""></option>
					<?php
						// Récupération de l'instance et connexion à la base de données
						require_once("includes/db_instance.inc.php");
						require_once("includes/db_connect.inc.php");
						
						$db->execute("SELECT * FROM film");
						
						while($db->read()) {
							// Ajout de la ligne dans le cbo, s'il était sélectionné on le resélectionne
							if (isset($_POST["cbofilm"]) && $_POST["cbofilm"] == $db->getData("nofilm")) {
								echo("<option value='".$db->getData("nofilm")."' selected='selected'>".$db->getData("titre")."</option>");
							} else {
								echo("<option value='".$db->getData("nofilm")."'>".$db->getData("titre")."</option>");
							}
						}
					?>
					</select>
					<!-- Chargement de la liste déroulante de projections -->
					<?php
					// On vérifie qu'un film est sélectionné 
						if (isset($_POST["cbofilm"]) && $_POST["cbofilm"] != "") {
						// Récupération de l'instance db et affichage du form de projection
							require_once("includes/db_instance.inc.php");
							echo("<br /><br />Choisissez votre projection<br />");
							echo("<select name='cboproj' onchange='this.form.submit()'>");
							// Ajout d'une ligne blanche
							echo("<option value=''></option>");
							
							// Définition de la zone de temps locale et de la langue à utiliser
							date_default_timezone_set('Europe/Paris');
							setlocale(LC_TIME, 'fr_FR.utf8','fra');
							
							// Connexion à la BDD
							require_once("includes/db_connect.inc.php");
							
							// Récupération de la date actuelle
							$today = date("Y-m-d");
							$db->execute("SELECT * FROM film, projection WHERE film.nofilm = projection.nofilm AND projection.nofilm = $_POST[cbofilm] AND dateproj >= '$today'");
							$nbProj = 0;
							while($db->read()) {
								// Récupération de la date et de l'heure de la projection
								$dateProj = $db->getData("dateproj");
								$heureproj = strtotime($db->getData("heureproj"));
								// Ajout de la ligne dans le cbo avec date, heure, nom du film et salle de la projection
								if (isset($_POST["cboproj"]) && $_POST["cboproj"] == $db->getData("noproj")) {
									echo("<option value='".$db->getData("noproj")."' selected='selected'>".strftime("%d/%m %A", strtotime($dateProj))
									." ".strftime("%Hh%M", $heureproj)." - Salle ".$db->getData("nosalle")."</option>");
								} else {
									echo("<option value='".$db->getData("noproj")."'>".strftime("%d/%m %A", strtotime($dateProj))
									." ".strftime("%Hh%M", $heureproj)." - Salle ".$db->getData("nosalle")."</option>");
								}
								$nbProj++;
							}
							// S'il n'y a aucune projection on prévient l'utilisateur qu'il n'y a pas de projection programmée
							if ($nbProj == 0) {
								echo("<option value=''>Aucune projection programmée</option>");
							}
						// Fin du if
						}	
						echo("</select><br />");
					?>
				</form>
				<form action="ajoutreserv.php" method="POST">
					<?php
					// Vérification du cboproj s'il y a bien une projection de sélectionnée
						if (isset($_POST["cboproj"]) && $_POST["cboproj"] != "") {
							echo("<input type='hidden' name='cboproj' value='$_POST[cboproj]' />");
							echo("<br />Nombre de places restantes<br />");
							echo("<input type='text' name='txtplacesrest' disabled='true' value='");
							
							// Récupération de l'instance et connexion à la BDD
							require_once("includes/db_instance.inc.php");
							require_once("includes/db_connect.inc.php");
							// Récupération du nombre de places dans la salle
							$db->execute("SELECT nbplaces FROM salle, projection WHERE salle.nosalle = projection.nosalle AND noproj = $_POST[cboproj]");
							$db->read();
							$nbPlaces = $db->getData("nbplaces");
							// Récupération du nombre de places réservées
							$db->execute("SELECT SUM(nbplacesresa) nbRes FROM reservation WHERE noproj=$_POST[cboproj]");
							$db->read();
							$nbRes = $db->getData("nbRes");
							// S'il y a des places réservées on soustrait ce même nombre au total
							if ($nbRes != NULL) {
								$nbPlaces -= $nbRes;
							}
							// Affichage du nombre de places disponibles
							echo($nbPlaces);
							echo("' /><br /><br />");
							echo("Nom de la réservation<br /><input type='text' name='txtnom' value='");
							if (isset($_POST['txtnom'])) {
								echo($_POST['txtnom']);
							}
							echo("' /><br /><br />");
							// Affichage du cbo proposant le nombre de places à réserver, il y a de 1 à n places
							echo("Nombre de places à réserver<br /><select name='cboplaces'>");
							for ($i = 1; $i <= $nbPlaces; $i++) {
								echo("<option value='$i'>$i</option>");
							}
							echo("</select><br /><br />");
							echo("<input type='submit' name='btnreserver' value='Réserver' />");
						}
					?>
				</form>
			</div>
		</section>
	</body>
<?php
	// Déconnexion de la BDD
	require_once("includes/db_disconnect.inc.php");
	include("includes/footer.php");
?>
</html>
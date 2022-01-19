<html>
	<?php
		include("includes/head.php");
	?>
	<body>
		<?php
			include("includes/header.php");
		?>
		<!-- 
		================================================== 
		Page globale
		================================================== -->
		<section class="global-page-header">
		</section>

		<!-- 
		================================================== 
		Company Description Section Start
		================================================== -->
		<section class="company-description">
			<div class="container">
			<!-- Affichage du formulaire de recherche -->
				<form method="POST">
					<input type="text" name="txtRech" size="30" value="<?php if (isset($_POST["txtRech"])) echo($_POST["txtRech"]); ?>" />
					<input type="submit" name="btnRechercher" value="Rechercher" />
				</form>
				<?php	
					require_once("includes/db_instance.inc.php");
					require_once("includes/db_connect.inc.php");

					$foundFilms = array();

					// On vérifie que l'entrée utilisateur fait au moins 3 caractères
					if (isset($_POST["txtRech"]) && strlen($_POST["txtRech"]) >= 3) {
						$txtRech = $_POST["txtRech"];
						research($txtRech, $db, $foundFilms);
					} else {
						showFilms($db, $foundFilms);
					}

					// Recherche par acteur, réalisateur, titre puis genre
					function research($txt, $db, $foundFilms) {
						researchByActor($txt, $db, $foundFilms);
						researchByReal($txt, $db, $foundFilms);
						researchByTitle($txt, $db, $foundFilms);
						researchByGenre($txt, $db, $foundFilms);
					}

					// Fonction de recherche par acteur
					function researchByActor($txt, $db, $foundFilms) {				
						$db->execute("SELECT * FROM film WHERE acteurs LIKE '%$txt%'");

						while ($db->read())
						{
							showActualFilm($db, $foundFilms);
						}
					}

					// Fonction de recherche par réalisateur
					function researchByReal($txt, $db, $foundFilms) {
						$db->execute("SELECT * FROM film WHERE realisateurs LIKE '%$txt%'");

						while ($db->read())
						{
							showActualFilm($db, $foundFilms);
						}
					}

					// Fonction de recherche par titre
					function researchByTitle($txt, $db, $foundFilms) {
						$db->execute("SELECT * FROM film WHERE titre LIKE '%$txt%'");

						while ($db->read())
						{
							showActualFilm($db, $foundFilms);
						}
					}

					// Fonction de recherche par genre
					function researchByGenre($txt, $db, $foundFilms) {
						$db->execute("SELECT * FROM film, concerner, genre WHERE film.nofilm = concerner.nofilm AND concerner.nogenre = genre.nogenre AND libgenre LIKE '%$txt%'");

						while ($db->read())
						{
							showActualFilm($db, $foundFilms);
						}
					}

					// Fonction de récupération de tous les films
					function showFilms($db, $foundFilms) {
						$db->execute("SELECT * FROM film");

						while ($db->read())
						{
							showActualFilm($db, $foundFilms);
						}
					}
					
					// Fonction d'affichage du film actuel
					function showActualFilm($db, $foundFilms) {
					// Utilisation de la liste des films trouvés pour éviter d'afficher deux fois un film
						if (!in_array($db->getData("titre"), $foundFilms)) {
							// Affichage du film
							echo("<div class='row'>");
							$nofilm = $db->getData("nofilm");
								// Affichage du lien vers la page de détails avec animation d'apparition
								echo("<a href='affiche.php?film=".$nofilm."'><h2>".$db->getData("titre")."</h2></a><br/>");
								echo("<div class='col-md-2 wow fadeInLeft' data-wow-delay='.3s' >");
									echo("<img src='".$db->getData("imgaffiche")."' style='float:left; margin-right:40px;' width='200' />");
								echo("</div>");
								echo("<div class='col-md-10'>");
									echo("<div class='block'>");
										echo("<div>");
											echo("<ul class='lis2'>");
												echo("<section class='wow fadeInUp animated cd-headline' data-wow-delay='.3s'>");
													echo("<h4>Synopsis</h4><br />".$db->getData("synopsis")."<br/>");
													echo("<h4>Informations</h4><br />".$db->getData("infofilm")."<br/>");
													echo("<h4>Réalisateur</h4><br />".$db->getData("realisateurs"));
													echo("<h4>Genre(s) :</h4>");
													// Récupération des genres du film
													$reader = null;
													$req = $db->executeReq("SELECT * FROM concerner, genre WHERE concerner.nogenre = genre.nogenre AND nofilm = $nofilm");
													$reader = $req->fetch();
													while ($reader) {
														echo("<br />".$db->getDataReader("libgenre", $reader));
														$reader = $req->fetch();
													}
												echo("</section>");
											echo("</ul>");
										echo("</div>");
									echo("</div>");
								echo("</div>");
							echo("</div>");
							echo("<hr style='clear:both' />");
						}
					}

					require_once("includes/db_disconnect.inc.php");
				?>
			</div>
		</section>
	</body>
	<?php
		include("includes/footer.php");
	?>
</html>
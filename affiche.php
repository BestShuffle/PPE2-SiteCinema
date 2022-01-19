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
			<?php
				// Connexion à la BDD
				require_once("includes/db_instance.inc.php");
				require_once("includes/db_connect.inc.php");
				// Récupération du film choisi
				$db->execute("SELECT * FROM film WHERE nofilm = $_GET[film]");
				// Affichage des données
				while($db->read()) {
					echo("<h1>".$db->getData("titre")."</h1><br/>");
					echo("<img src='".$db->getData("imgaffiche")."' width='300' style='float:left; margin-right:40px;' />");
					echo("<h3><u>Synopsis</u></h3><br />".$db->getData("synopsis")."<br/>");
					echo("<h3><u>Informations</u></h3><br />".$db->getData("infofilm")."<br/>");
					echo("<h3><u>Réalisateur</u></h3><br />".$db->getData("realisateurs")."<br/>");
					echo("<br /><br /><br /><h4><u>Genre(s) :</u></h4>");
				}
				// Récupération et affichage des genres du film
				$reader = null;
				$req = $db->executeReq("SELECT * FROM concerner, genre WHERE concerner.nogenre = genre.nogenre AND nofilm = $_GET[film]");
				$reader = $req->fetch();
				while ($reader) {
					echo(" - ".$db->getDataReader("libgenre", $reader));
					$reader = $req->fetch();
				}
				require_once("includes/db_disconnect.inc.php");
			?>
			<!-- Création d'un formulaire ayant toutes les données nécessaires pour se diriger vers une réservation -->
			<form action="reserv.php" method="POST">
				<input type="hidden" name="cbofilm" value="<?php if (isset($_GET["film"])) { echo($_GET["film"]);} ?>" />
				<input type="submit" name="btnres" value="Réserver" />
			</form>
		</div>
	</section>
	</body>
<?php
	include("includes/footer.php");
?>
</html>
<html>
<?php
	// Ajout du head
	include("/includes/head.php");
?>
	<body>
		<?php
			// Ajout du header
			include("/includes/header.php");
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
					// Vérification que tous les champs sont bien présents
					if (isset($_POST["txtnom"]) && isset($_POST["cboplaces"]) && isset($_POST["cboproj"])) {
						// Récupération de l'instance et connexion à la base de données
						require_once("includes/db_instance.inc.php");
						require_once("includes/db_connect.inc.php");
						// Génération du mot de passe aléatoire
						$passwd = randomPassword();
						// Récupération de la date actuelle
						$dateresa = date('Y-m-d');
						// Récupération des données de la page précédente
						$nom = $_POST["txtnom"];
						$nbplacesresa = $_POST["cboplaces"];
						$noproj = $_POST["cboproj"];
						// Insertion en base de données et récupération du numéro de réservation
						$db->execute("INSERT INTO reservation (mdpresa, dateresa, nomclient, nbplacesresa, noproj) VALUES ('$passwd', '$dateresa', '$nom', $nbplacesresa, $noproj)");
						$db->execute("SELECT noresa FROM reservation WHERE mdpresa='$passwd'");
						$db->read();
						$noresa = $db->getData("noresa");
						
						echo("<h2>Votre réservation pour la projection n°$noproj au nom de $nom a bien été effectuée.<br/>");
						echo("Votre numéro de réservation est $noresa et votre mot de passe est : '$passwd'.<br/>");
						echo("Veillez à ne pas communiquer ces informations.</h2>");
					}
					
					function randomPassword() {
						// Définition de l'alphabet
						$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
						// Création de l'array contenant le futur mot de passe
						$pass = array();
						// Définition de la taille de l'alphabet pour la futur récupération aléatoire
						$alphaLength = strlen($alphabet) - 1;
						for ($i = 0; $i < 6; $i++) {
							// Récupération d'une lettre aléatoirement
							$n = rand(0, $alphaLength);
							$pass[] = $alphabet[$n];
						}
						// Transformation de l'array en string
						return implode($pass);
					}
				?>
			</div>
		</section>
	</body>
<?php
	// Déconnexion de la BDD
	require_once("includes/db_disconnect.inc.php");
	include("/includes/footer.php");
?>
</html>
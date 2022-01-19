<?php
	require("includes/html_table.php");
	
	$pdf=new PDF_HTML_Table('L');
	$pdf->AddPage();
	$pdf->SetFont('Arial','',12);
	
	// Définition de la zone de temps locale et de la langue à utiliser
	date_default_timezone_set('Europe/Paris');
	setlocale(LC_TIME, 'fr_FR.utf8','fra');
	// Récupération de la date du début et de la fin de la semaine
	$start_date = $_GET["start_date"];
	$end_date = $_GET["end_date"];
	// Création d'une liste de jours comprenant les dates du lundi au dimanche
	$days = [];
	for ($i = 0; $i < 7; $i++) {
		$tmp_date = new DateTime($start_date);
		// On avance de jour en jour
		$tmp_date->add(new DateInterval('P'.$i.'D'));
		array_push($days, $tmp_date);
	}
	
	// Connexion à la BDD
	require_once("includes/db_instance.inc.php");
	require_once("includes/db_connect.inc.php");
	
	// Récupération du nombre de projections le plus haut pour obtenir le nombre de lignes du tableau à générer
	$db->execute("SELECT dateproj, COUNT(*) nb
				  FROM projection
				  WHERE dateproj BETWEEN '$start_date' AND '$end_date'
				  GROUP BY dateproj
				  HAVING COUNT(*) >= ALL (SELECT COUNT(*) nb
										  FROM projection
										  WHERE dateproj BETWEEN '$start_date' AND '$end_date'
										  GROUP BY dateproj)");
				  
					
	$db->read();
	$nbRow = $db->getData("nb");
	
	// Définition des jours d'une semaine pour une utilisation ultérieur
	$week = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
	
	// Création du tableau de planning qui servira de modèle pour la génération du tableau HTML
	$planning = [];
	
	// Création des lignes dans le tableau
	for ($i = 0; $i < $nbRow; $i++) {
		array_push($planning, ["Lundi"=>"", "Mardi"=>"" , "Mercredi"=>"", "Jeudi"=>"", "Vendredi"=>"", "Samedi"=>"", "Dimanche"=>""]);
	}
	// Récupération des films pour chaque jour de la semaine, un for est plus rapide qu'un foreach dans ce cas (variable $i présente par défaut) 
	for ($day = 0; $day < count($days); $day++)
	{
		$db->execute("SELECT * FROM projection, film WHERE projection.nofilm = film.nofilm AND dateproj = '".$days[$day]->format('Y-m-d')."' ORDER BY heureproj");
		$nbProj = 0;
		while ($db->read())
		{
			// Récupération du jour actuel de la semaine avec majuscule en début du mot
			$dayLib = ucfirst(strftime("%A", $days[$day]->getTimestamp()));
			// Récupération de l'heure de la projection
			$heureproj = strtotime($db->getData("heureproj"));
			// Ecriture des données dans la cellule correspondant à la projection
			$planning[$nbProj][$dayLib] = $db->getData("titre")."\nSalle ".$db->getData("nosalle")." - ".strftime("%Hh%M", $heureproj);
			$nbProj++;
		}
	}
	$html = "";
	require_once("includes/db_disconnect.inc.php");
	if (count($planning) > 0):
		$html = $html."<table width='200'><tr><td>"
				.implode('</td><td>', array_keys(current($planning)))
				."</td></tr>";

		foreach ($planning as $row):
				array_map('htmlentities', $row);
				$html = $html."<tr><td>".implode('</td><td>', $row)."</td></tr>";
		endforeach;
		$html = $html."</table>";
	else:
		$html= "Aucune projection prevue.";
	endif;
	$pdf->WriteHTML("Planning du ".strftime("%A %d %B", strtotime($start_date))." au ".strftime("%A %d %B", strtotime($end_date))."<br>$html");
	$pdf->Output();
?>
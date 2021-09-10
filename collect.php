<?php
/*
$test='"GET http://192.168.2.6:88/account HTTP/1.1" 200 160 "HTTP" ""';
$pieces = explode(" ", $test);
echo $pieces[5];
*/
?>
<?php
//----------------------------------------- COLLECT INFO LOG ----------------------------
include('conn_pdo.php');
        // Nom du fichier à ouvrir
		$fichier = file("log20210816.txt");
		// Nombre total de ligne du fichier
		$total = count($fichier);
		$nbr_enr_log=$total;
		//echo $nbr_enr_log . "<br>";
	$tableau_id = 0;
		for($i = 1; $i < $total ; $i++) {
		// On affiche ligne par ligne le contenu du fichier
		// avec la fonction nl2br pour ajouter les sauts de lignes
		//echo nl2br($fichier[$i]);
		$text_ligne=nl2br($fichier[$i]);
		//position du repere
		$rep_1=strpos($text_ligne,"-",0);
		//echo $text_ligne . " pos:" . $rep_1 . "<br>";
		$ip=substr($text_ligne,0, $rep_1-1); //-----------------------------
		//echo $ip . "<br>";
		$rep_2=strpos($text_ligne,"[",0);
		//echo $text_ligne . " pos:" . $rep_2 . "<br>";
		$utilisateur=substr($text_ligne, $rep_1 + 2, $rep_2 - $rep_1 - 3); //-----------------------
		//echo $utilisateur . "<br>";
		$rep_3=strpos($text_ligne,'"',0);
		//echo $rep_3 . "<br>";
		$date_base=substr($text_ligne, $rep_2+1, $rep_3 - $rep_2 - 3); //-----------------------
		//echo $date_base . "<br>";
		$date_p=date_create($date_base);
		$date=date_format($date_p,"Y-m-d"); //----------------------------------
		$heure=date_format($date_p,"H:i:s"); //-----------------------------------
		//echo $date . " " . $heure . "<br>"; 
		$long_fichier=strlen($text_ligne);
		$reste=substr($text_ligne, $rep_3, $long_fichier-$rep_3);
		//echo $reste . "<br>"; //??
		$pieces = explode(" ", $reste);
		$methode=substr($pieces[0],1,strlen($pieces[0])-1) ;
		//echo $methode . "<br>"; //---------------------
		$addresse=$pieces[1];
		//echo $addresse . "<br>"; //----------------------
		$element_1=substr($pieces[2],0,strlen($pieces[2])-1) ;
		//echo $element_1 . "<br>"; //----------------------
		$element_2=$pieces[3];
		//echo $element_2 . "<br>"; //----------------------
		$element_3=$pieces[4];
		//echo $element_3 . "<br>"; //----------------------
		$protocole=substr($pieces[5],1,strlen($pieces[5])-2) ;;
		//echo $protocole . "<br>"; //----------------------
		$pieces_fin = explode('"', $reste);
		$nb=$pieces_fin[5];
		//echo $nb. "<br>"; //----------------------
		$sql = "INSERT INTO t_log (ip,utilisateur, date, heure, methode, adresse, e1, e2, e3, protocole, observation) VALUES ('" . addslashes($ip) . "','" . addslashes($utilisateur) . "','" . addslashes($date) . "','" . addslashes($heure) . "','" . addslashes($methode) . "','" . addslashes($addresse) . "','" . addslashes($element_1) . "','" . addslashes($element_2) . "','" . addslashes($element_3) . "','" . addslashes($protocole) . "','" . addslashes($nb) . "')"; 
		$dbh->exec($sql);
			
		}
echo("Ajout accompli.");

/*$date=date_create("16/Aug/2021:15:10:49 +0100");
echo date_format($date,"Y-m-d H:i:s");*/

?>


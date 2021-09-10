<h4>Date existante</h4>
<form style="margin-bottom: 8px;">
    <select name="liste_date_log" id="liste_date_log" onclick="" size="4">
        <?php 
		include_once('conn_pdo.php');
		//REINITIALISER agenda
		$sql0 = "TRUNCATE agenda"; 
		$dbh->exec($sql0);
		
		$dir="../reseau_proxy"; // DOSSIER OU IL Y A LES FICHIER A CHERCHER
	$dir = rtrim($dir, "/\\") . "/";
	// use dir() to list files
	$list = dir($dir);
	
	while(($file = $list->read()) !== false) 
	{
		if(is_file($dir . $file)) 
		{
			$pos_file=strpos($file,"og",0); 
			if ($pos_file>0) // 
			{
				$date_brute=substr($file, strpos($file,"log",0)+3,strlen($file)-strpos($file,"_",0)-7);
				$annee=substr($date_brute,0,4);
				$mois=substr($date_brute,4,2);
				$jour=substr($date_brute,6,2);

			?>
			<option>
			<?php 
			$date_pdd=$annee . "-" . $mois . "-" . $jour; 
			
			$tire="-";
			$sql = "INSERT INTO agenda (dt, lieu, event) VALUES ('" . addslashes($date_pdd) . "','" . addslashes($tire) . "','" . addslashes($tire) . "')"; 
			$dbh->exec($sql);
			
			
			?>
			</option>
			<?php 
			}
		}
	}
	$dbh=NULL;
	?>
        
    </select><br>
    <div id="type"></div>
	
</form>
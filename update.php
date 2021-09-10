<style>
.style_1 {
	padding-left:5px;
	padding-right:5px;
}
.style_2 {
	padding-left:5px;
	padding-right:5px;
	display:none;
}
</style>
<style >
.stl1 {
text-decoration: none; /* Les liens ne seront plus soulignés */
/*color: red; /* Les liens seront en rouge au lieu de bleu */
}
.stl1:hover {
background-color:#FFF; 
color: none;
cursor:pointer;
text-decoration:underline;
} 
</style>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td class="style_1">N°</td>
    <td class="style_1">IP</td>
    <td class="style_1">UTILISATEUR</td>
    <td class="style_1">DATE</td>
    <td class="style_1">HEURE</td>
    <td class="style_1">METHODE</td>
    <td class="style_1">ADRESSE</td>
    <td class="style_2" >-</td>
    <td class="style_2" >-</td>
    <td class="style_2" >-</td>
    <td class="style_1">PROTOCOLE</td>
    <td class="style_1">OBSERVATION</td>
  </tr>
<?php
// EVITER MESSAGE ERREUR
//set_time_limit(1000000);
//error_reporting(0);

$date_log_q="log" . date("Ymd") . ".txt";
include('conn_pdo.php');
$fichier = file($date_log_q);
$lignelog = count($fichier);

$sqlu="SELECT COUNT(*) AS nombre FROM t_log";
$receiv=$dbh->query($sqlu);
$lgb=$receiv->fetch();
$lignedb=$lgb['nombre'];
if($lignedb+1<=$lignelog){
    update();
};
function update(){
    global $lignelog;
    global $lignedb;
    $lg=$lignelog-1;
    $lb=$lignedb+1;
    for($i = $lb; $i <=$lg ; $i++) {
		global $fichier;
        global $dbh;
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
};
$log="SELECT * FROM t_log ORDER BY heure DESC";
$result=$dbh->query($log);
while($ligne=$result->fetch()){
    

?>
 <tr>
    <td class="style_1" valign="top"><?php echo $ligne['id_log'] ?></td>
    <td class="style_1" valign="top"><?php echo $ligne['ip'] ?></td>
    <td class="style_1" valign="top"><?php echo $ligne['utilisateur'] ?></td>
    <td class="style_1" valign="top"><?php echo $ligne['date'] ?></td>
    <td class="style_1" valign="top"><?php echo $ligne['heure'] ?></td>
    <td class="style_1" valign="top"><?php echo $ligne['methode'] ?></td>
    <td class="style_1" valign="top"><a class="stl1" href="<?php echo $ligne['adresse'] ?>" target="_new"><?php echo $ligne['adresse'] ?></a></td>
    <td class="style_2" valign="top"><?php echo $ligne['e1'] ?></td>
    <td class="style_2" valign="top"><?php echo $ligne['e2'] ?></td>
    <td class="style_2" valign="top"><?php echo $ligne['e3'] ?></td>
    <td class="style_1" valign="top"><?php echo $ligne['protocole'] ?></td>
    <td class="style_1" valign="top"><?php echo $ligne['observation'] ?></td>
  </tr>
<?php
};

?>
</table>

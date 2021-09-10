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
include('conn_pdo.php');
$q=$_REQUEST['q'];
$q1=$_REQUEST['q1'];
$requete="SELECT * FROM t_log WHERE ".$q1." LIKE '%".$q."%' ORDER BY heure DESC";
$result=$dbh->query($requete);
$resfin=$result->fetchAll();
foreach($resfin as $restab){
    //echo $restab['id_log'].' : '.$restab['ip'].' - '.$restab['utilisateur'].' - '.$restab['date'].' - '.$restab['heure'].' - '.$restab['methode'].' - '.$restab['adresse'].' - '.$restab['e1'].' - '.$restab['e2'].' - '.$restab['e3'].' - '.$restab['protocole'].' - '.$restab['observation'].'<br>';
?>
 <tr>
    <td class="style_1" valign="top"><?php echo $restab['id_log'] ?></td>
    <td class="style_1" valign="top"><?php echo $restab['ip'] ?></td>
    <td class="style_1" valign="top"><?php echo $restab['utilisateur'] ?></td>
    <td class="style_1" valign="top"><?php echo $restab['date'] ?></td>
    <td class="style_1" valign="top"><?php echo $restab['heure'] ?></td>
    <td class="style_1" valign="top"><?php echo $restab['methode'] ?></td>
     <td class="style_1" valign="top"><a class="stl1" href="<?php echo $restab['adresse'] ?>" target="_new"><?php echo $restab['adresse'] ?></a></td>
    <td class="style_2" valign="top"><?php echo $restab['e1'] ?></td>
    <td class="style_2" valign="top"><?php echo $restab['e2'] ?></td>
    <td class="style_2" valign="top"><?php echo $restab['e3'] ?></td>
    <td class="style_1" valign="top"><?php echo $restab['protocole'] ?></td>
    <td class="style_1" valign="top"><?php echo $restab['observation'] ?></td>
  </tr>
<?php
};

?>
</table>

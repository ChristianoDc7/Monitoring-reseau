<?php
$adr_base="localhost";//adresse du base
$log_base="root";//login du base
$pass_base="";//mot de passe du base
$base="reseau";// nom de la base
function connex($adr,$log,$pas,$base)
{	mysql_connect($adr,$log,$pas);
	mysql_select_db($base);
}
connex($adr_base,$log_base,$pass_base,$base);
?>
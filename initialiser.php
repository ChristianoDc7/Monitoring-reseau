<?php
include_once('conn_pdo.php');
		//REINITIALISER agenda
		$sql0 = "TRUNCATE t_log"; 
		$dbh->exec($sql0);
?>
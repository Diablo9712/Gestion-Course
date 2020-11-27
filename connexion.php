<?php
try
{
	$con = new PDO('mysql:host=localhost;dbname=basecour', 'root', '');
	// return $con;
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>

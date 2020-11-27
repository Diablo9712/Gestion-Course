<?php
try
{
$con=mysqli_connect('localhost','root','','basecour');
	 
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>

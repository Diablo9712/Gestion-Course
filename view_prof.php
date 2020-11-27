<?php 
	$cnx= new PDO("mysql:host=localhost;dbname=basecour","root","");
	$id=isset($_GET['id'])? $_GET['id'] : "";
	$stat=$cnx->prepare("SELECT * FROM module WHERE id_module=?");
	$stat->bindParam(1,$id);
	$stat->execute();
	$row=$stat->fetch();
	header('Content-Type:'.$row['libelle_mod']);
	echo $row['cours'];



	
 ?>
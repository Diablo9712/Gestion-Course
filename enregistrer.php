<?php

session_start();

//print_r($_SESSION);


$libelle_mod="";
$note_N="";
$note_R="";





$libelle_mod=$_POST["libelle_mod"];
$note_N=$_POST["note_N"];
$note_R=$_POST["note_R"];





$hostname = 'localhost';
$username = 'root'; 
$password = '';  


//try {   

//include('cnx.php');

	$con = new PDO("mysql:host=$hostname;dbname=basecour", $username, $password );     
	




   
//  $ID=$_SESSION['id_user'];

  $sqll = "INSERT INTO note VALUES ('$libelle_mod','$note_R','$note_N')"; 
 
 $con->exec($sqll);  

echo "\nPDOStatement::errorInfo():\n";
$arr = $con->errorInfo();
print_r($arr);




echo "<script>alert(\"Les données sont bien enregistrées!\")</script>"; 
include("inserer_note.php");





?>
 
<?php
//including the database connection file
require 'connexion.php';
if (isset($_GET['id_etudiant'])) {
    
//getting id of the data from url
$id = $_GET['id_etudiant'];
 
//deleting the row from table
$sql = "DELETE FROM etudiants WHERE id_etudiant=:id";
$query = $con->prepare($sql);
$query->execute(array(':id' => $id));
 
//redirecting to the display page (index.php in our case)
header("Location:Etudiant.php");}
?> 

<?php
//including the database connection file
require 'connexion.php';

 
//getting id of the data from url
$id = $_GET['id_prof'];
 
//deleting the row from table
$sql = "DELETE FROM professeur WHERE id_prof=:id";
$query = $con->prepare($sql);
$query->execute(array(':id' => $id));
 
//redirecting to the display page (index.php in our case)
header("Location:Professeur.php");
?><?php
//including the database connection file
require 'connexion.php';

  try {
    
$id = $_GET['id_labo'];
  
$sql = "DELETE FROM laboratoire WHERE id_labo=:id";
$query = $con->prepare($sql);
$query->execute(array(':id' => $id));
header("Location:laboratoire.php");
  
  } catch (Exception $e) {
    
  }
?><?php
//including the database connection file
require 'connexion.php';

  try {
    
$id = $_GET['id_filiere'];
  
$sql = "DELETE FROM filiere WHERE id_filiere=:id";
$query = $con->prepare($sql);
$query->execute(array(':id' => $id));
header("Location:filière.php");
  
  } catch (Exception $e) {
    
  }
?>
<?php
//including the database connection file
require 'connexion.php';

  try {
    
$id = $_GET['id_groupe'];
  
$sql = "DELETE FROM groupe WHERE id_groupe=:id";
$query = $con->prepare($sql);
$query->execute(array(':id' => $id));
header("Location:groupe.php");
  
  } catch (Exception $e) {
    
  }
?>

<?php
 include 'connexion.php';
 if(isset($_POST['ajouter']))
{     
    $id_cycle=$_POST['id_cycle'];

     $libelle_fil = $_POST['libelle_fil'];
     $coordinateur = $_POST['coordinateur'];
     $prerequis = $_POST['prerequis'];
     
    // $descriptif = $_POST['descriptif'];
     $descriptif = file_get_contents($_FILES['myfile']['tmp_name']);
     $objectif = file_get_contents($_FILES['myobjectif']['tmp_name']);
      
     $arr = array(":id_cycle"=>$id_cycle,":libelle_fil" => $libelle_fil ,":coordinateur"=>$coordinateur,":objectif"=>$objectif,":prerequis"=>$prerequis,":descriptif"=>$descriptif );
     $sql = "INSERT INTO filiere (id_cycle, libelle_fil,coordinateur,objectif,prerequis,descriptif  )
     VALUES (:id_cycle,:libelle_fil ,:coordinateur,:objectif,:prerequis,:descriptif)";
     $res = $con->prepare($sql);
     
$res->execute($arr);
         if ($res) {
             
              header('location:filière.php');
    // FROM categorie, projet WFERE categorie.catecode = projet.catecode

         }
 
     
  
} 
?>    


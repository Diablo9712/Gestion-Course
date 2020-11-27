
<?php  

 include 'connexion.php';

 if(isset($_POST['insert']))
{     
    
     $id_filiere = $_POST['id_filiere'];
     $id_departement = $_POST['id_departement'];
     $id_prof = $_POST['id_prof'];
       
    
     $libelle_mod = $_POST['libelle_mod'];
     $nb_heure = $_POST['nb_heure'];
     $semestre = $_POST['semestre'];
     $objectif = file_get_contents($_FILES['myobjectif']['tmp_name']);
     $nature = $_POST['nature'];
     $prerequis = $_POST['prerequis'];
     $cours = file_get_contents($_FILES['mycours']['tmp_name']);
     $TP = file_get_contents($_FILES['mytp']['tmp_name']);
     $TD = file_get_contents($_FILES['mytd']['tmp_name']);
 
     $descriptif = file_get_contents($_FILES['mydescriptif']['tmp_name']);
     $evaluation = file_get_contents($_FILES['myevaluation']['tmp_name']);
     
        

     $arr = array(":id_filiere"=>$id_filiere,":id_prof"=>$id_prof,":id_departement"=>$id_departement,":libelle_mod" => $libelle_mod ,":nb_heure"=>$nb_heure,":semestre"=>$semestre,":objectif"=>$objectif,":nature"=>$nature,":prerequis"=>$prerequis,":cours"=>$cours,":TP"=>$TP,":TD"=>$TD,":descriptif"=>$descriptif,":evaluation"=>$evaluation);
     $sql = "INSERT INTO module (id_filiere,id_prof,id_departement,libelle_mod,nb_heure,semestre,objectif,nature,prerequis,cours,TP,TD,descriptif,evaluation)
     VALUES (:id_filiere,:id_prof,:id_departement,:libelle_mod,:nb_heure,:semestre,:objectif,:nature,:prerequis,:cours,:TP,:TD,:descriptif,:evaluation)";
     $res = $con->prepare($sql);
        

     $res->execute($arr);
     if ($res) {
       header('location:module.php');
             } else{echo "ko";}}
?>
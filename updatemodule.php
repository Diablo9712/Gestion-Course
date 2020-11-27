
 
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

 
 <style type="text/css">
    .form-control {
         text-align: center;
    }
    .form-group{
         text-align: center;
    }
     
   
   .h1{
         text-align: center;


   }

 </style>
 


                                 
<?php

require 'connexion.php';
 
 

$id_module = $_GET['id_module'];
$sql = 'SELECT m.*,c.id_cycle,f.id_filiere,pr.id_prof FROM module as m
 join cycle as c on m.id_cycle=c.id_cycle
 join filiere as f on m.id_filiere=f.id_filiere
 join professeur as pr on m.id_prof=pr.id_prof


 WHERE m.id_module=:id_module';

$sql = 'SELECT * FROM module WHERE id_module=:id_module';
$statement = $con->prepare($sql);
$statement->execute([':id_module' => $id_module ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
 
if (isset ($_POST['edit'])  ) {
//$id_module = $_POST['id_module'];

  $id_filiere = $_POST['id_filiere'];
     $id_prof = $_POST['id_prof'];
   


     $id_departement= $_POST['id_departement'];

echo "".$id_departement;
     $libelle_mod = $_POST['libelle_mod'];
     $nb_heure = $_POST['nb_heure'];
     $semestre = $_POST['semestre'];
     $objectif = file_get_contents($_FILES['myobjectif']['tmp_name']);
     $nature = $_POST['nature'];
     $prerequis = $_POST['prerequis'];
    // $evaluation = $_POST['evaluation'];
     $cours = file_get_contents($_FILES['mycours']['tmp_name']);
     $TP = file_get_contents($_FILES['myTP']['tmp_name']);
     $TD = file_get_contents($_FILES['myTD']['tmp_name']);
 
     $descriptif = file_get_contents($_FILES['mydescriptif']['tmp_name']);
  //   $evaluation = file_get_contents($_FILES['mydescriptif']['tmp_name']);
    
     $evaluation = file_get_contents($_FILES['myevaluation']['tmp_name']);
     
  $sql = 'UPDATE module SET libelle_mod=:libelle_mod, id_filiere=:id_filiere,id_prof=:id_prof,nb_heure=:nb_heure,id_departement=:id_departement, objectif=:objectif,semestre=:semestre,nature=:nature, prerequis=:prerequis,cours=:cours,TD=:TD,TP=:TP,evaluation=:evaluation , descriptif=:descriptif WHERE id_module=:id_module';
  $statement = $con->prepare($sql);
  $statement->execute([':libelle_mod' => $libelle_mod ,':id_filiere' => $id_filiere ,':id_prof' => $id_prof,':id_departement' => $id_departement,':nature' => $nature,':nb_heure' => $nb_heure,':cours' => $cours,':TD' => $TD,':TP' => $TP,':evaluation' => $evaluation, ':semestre' => $semestre, ':descriptif' => $descriptif, ':objectif' => $objectif , ':prerequis' => $prerequis ,':id_module' => $id_module]) ;
  if ($statement) {
 

   echo  "<script type='text/javascript'>document.location.replace('module.php');
alert(' Bien modifier ');
   </script>";
  }
  
   
else{
  echo "<script>alert('no')</script>";

}


}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <?php include "blog.php"; ?>
</head>
<body>

        <div class="container">
            <div class="data">
                <div class="col-lg-12">
                     
                    <form method="post"  enctype="multipart/form-data">



<label for="id_filiere">Faculty</label>

<select name="id_filiere" class="form-control">   

     <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM filiere';
    $query = mysqli_query($con,$sql);
       while($data = mysqli_fetch_assoc($query)){
            
     
      
     if ($data['id_filiere']==$person->id_filiere) 
        {
          echo" <option selected value=".$data['id_filiere'].">".$data['libelle_fil']."</option> " ; 
        }
    
           echo" <option  value=".$data['id_filiere'].">".$data['libelle_fil']."</option> "  ;
        
      
        

    }
    ?>

  </select>

                        <div class="form-group">
                             <div class="form-group"> <label for="libelle_mod">module</label>
          <input type="libelle_mod" value="<?= $person->libelle_mod; ?>" name="libelle_mod" id="libelle_mod" class="form-control">
       

        </div>

                        <div class="form-group"> <label for="coordinateur">coordinator</label>
 
          <input type="coordinateur" value="<?= $person['coordinateur']; ?>" name="coordinateur" id="coordinateur" class="form-control">
</div>
<div class="form-group"> 
  <label for="nb_heure">number of hours</label>
          <input type="nb_heure" value="<?= $person->nb_heure; ?>" name="nb_heure" id="nb_heure" class="form-control">
        </div>


<select name="id_departement" class="form-control">   

     <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM departement';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
         ?>    
         <option   value="<?php echo $data['id_departement']; ?>">  <?php echo $data['libelle_dep']; ?></option> 
    <?php
    }
    ?>

  </select>

                             <div class="form-group"> 
                              <label for="nature">nature</label>
          <input type="nature" value="<?= $person->nature; ?>" name="nature" id="nature" class="form-control">
       

        </div>
          
 
 
                        <div class="form-group"> <label for="objectif">goal</label>

          <input    type="file" name="my"class="form-control" required="" accept=".pdf"    >
        </div>
                        
                         <div class="form-group">
                             <div class="form-group"> <label for="prerequis">prerequisite</label>
          <input type="prerequis" value="<?= $person->prerequis; ?>" name="prerequis" id="prerequis" class="form-control">
       

        </div>
  <div class="form-group"> <label for="descriptif">description</label>

          <input    type="file" name="mydescriptif"class="form-control"  accept=".pdf"    >
        </div>
           <div class="form-group">
                             <div class="form-group"> <label for="semestre">semester</label>
          <input type="semestre" value="<?= $person->semestre; ?>" name="semestre" id="semestre" class="form-control">
       

        </div>
        <div class="form-group">
                             <div class="form-group"> <label for="cours">course</label>
          <input type="file"   name="mycours" id="cours" accept=".pdf"   class="form-control">
</div>

       <div class="form-group">
                             <div class="form-group"> <label for="TD">TD</label>
          <input type="file"   name="myTD" id="TD"  accept=".pdf"   class="form-control">
        </div>
       <div class="form-group">
                             <div class="form-group"> <label for="TP">TP</label>
          <input type="file"   name="myTP" id="TP" accept=".pdf"   class="form-control">
       </div>
  <div class="form-group">
                             <div class="form-group"> <label for="evaluation">Evaluation</label>
          <input type="file"   name="myevaluation" id="evaluation" accept=".pdf"   class="form-control">
       </div>
                       <div class="form-group">
          <button type="submit" name="edit" class="btn btn-info">Edit</button>
        </div>
</div></form>
                </div>
            </div>  
        </div>
</body>
</html>
 



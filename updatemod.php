
 
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
 
  $id_filiere = $_POST['id_filiere'];
     $id_prof = $_POST['id_prof'];
   
 $nature = $_POST['nature'];
     $prerequis = $_POST['prerequis'];

     $id_departement= $_POST['id_departement'];
 
     $libelle_mod = $_POST['libelle_mod'];
     $nb_heure = $_POST['nb_heure'];
     $semestre = $_POST['semestre'];
    

  $sql = 'UPDATE module SET libelle_mod=:libelle_mod, id_filiere=:id_filiere,id_prof=:id_prof,nb_heure=:nb_heure,id_departement=:id_departement, objectif=:objectif,semestre=:semestre,nature=:nature, prerequis=:prerequis,cours=:cours,TD=:TD,TP=:TP,evaluation=:evaluation , descriptif=:descriptif WHERE id_module=:id_module';
  $statement = $con->prepare($sql);
  if($statement->execute([':libelle_mod' => $libelle_mod ,':id_filiere' => $id_filiere ,':id_prof' => $id_prof,':id_departement' => $id_departement,':nature' => $nature,':nb_heure' => $nb_heure,':cours' => $cours,':TD' => $TD,':TP' => $TP,':evaluation' => $evaluation, ':semestre' => $semestre, ':descriptif' => $descriptif, ':objectif' => $objectif , ':prerequis' => $prerequis ,':id_module' => $id_module])){
 

   echo  "<script type='text/javascript'>document.location.replace('module.php');
alert(' Bien modifier ');
   </script>";
  }
 

if ($person->objectif!="" && $person->descriptif!="" && $person->cours!="" && $person->TD!="" && $person->TP!="" && $person->evaluation!="") {
$objectif=$person->objectif;
$descriptif=$person->descriptif;
$evaluation=$person->evaluation;
$TD=$person->TD;
$TP=$person->TP;
$cours=$person->cours;


  $sql = 'UPDATE module SET libelle_mod=:libelle_mod, id_filiere=:id_filiere,id_prof=:id_prof,nb_heure=:nb_heure,id_departement=:id_departement, objectif=:objectif,semestre=:semestre,nature=:nature, prerequis=:prerequis,cours=:cours,TD=:TD,TP=:TP,evaluation=:evaluation , descriptif=:descriptif WHERE id_module=:id_module';
  $statement = $con->prepare($sql);
  if($statement->execute([':libelle_mod' => $libelle_mod ,':id_filiere' => $id_filiere ,':id_prof' => $id_prof,':id_departement' => $id_departement,':nature' => $nature,':nb_heure' => $nb_heure,':cours' => $cours,':TD' => $TD,':TP' => $TP,':evaluation' => $evaluation, ':semestre' => $semestre, ':descriptif' => $descriptif, ':objectif' => $objectif , ':prerequis' => $prerequis ,':id_module' => $id_module])){
 

   echo  "<script type='text/javascript'>document.location.replace('module.php');
alert(' Bien modifier ');
   </script>";
  }
}
}










if (isset ($_POST['editf'])  ) {
$objectif = file_get_contents($_FILES['myobjectif']['tmp_name']);
    
     $cours = file_get_contents($_FILES['mycours']['tmp_name']);
     $TP = file_get_contents($_FILES['myTP']['tmp_name']);
     $TD = file_get_contents($_FILES['myTD']['tmp_name']);
 
     $descriptif = file_get_contents($_FILES['mydescriptif']['tmp_name']);
    
     $evaluation = file_get_contents($_FILES['myevaluation']['tmp_name']);
     
  $sql = 'UPDATE module SET  objectif=:objectif ,cours=:cours,TD=:TD,TP=:TP,evaluation=:evaluation , descriptif=:descriptif WHERE id_module=:id_module';
  $statement = $con->prepare($sql);
  if($statement->execute([ ':cours' => $cours,':TD' => $TD,':TP' => $TP,':evaluation' => $evaluation,  ':descriptif' => $descriptif, ':objectif' => $objectif ,':id_module' => $id_module])){
 
 

   echo  "<script type='text/javascript'>document.location.replace('module.php');
alert(' Bien modifier ');
   </script>";
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


<center>
<label for="id_filiere">Files</label>

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
  </center>

                        <div class="form-group">
                             <div class="form-group"> <label for="libelle_mod">module</label>
          <input type="libelle_mod" value="<?= $person->libelle_mod; ?>" name="libelle_mod" id="libelle_mod" class="form-control">
       

        </div>

          
<label>coordinator</label>

<select name="id_prof" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM professeur';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
        
     if ($data['id_prof']==$person->id_prof ) 
        {
          echo" <option selected value=".$data['id_prof'].">".$data['nom']."</option> " ; 
        }
    
           echo" <option  value=".$data['id_prof'].">".$data['nom']."</option> "  ;
        
      
        

    }
    ?>
               </select>
               <br>


        
<div class="form-group"> 
  <label for="nb_heure">number of hours</label>
          <input type="nb_heure" value="<?= $person->nb_heure; ?>" name="nb_heure" id="nb_heure" class="form-control">
        </div>

 
<label for="id_departement">Departement</label>

<select name="id_departement" class="form-control">   

     <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT* FROM departement';
    $query = mysqli_query($con,$sql);
       while($data = mysqli_fetch_assoc($query)){
            
     
      
     if ($data['id_departement']==$person->id_departement) 
        {
          echo" <option selected value=".$data['id_departement'].">".$data['libelle_dep']."</option> " ; 
        }
    
           echo" <option  value=".$data['id_departement'].">".$data['libelle_dep']."</option> "  ;
         

    }
    ?>

  </select>

                             <div class="form-group"> 
                              <label for="nature">nature</label>
          <input type="text" value="<?= $person->nature; ?>" name="nature" id="nature" class="form-control">
       

        </div>
          
 
 
                        
                         <div class="form-group">
                             <div class="form-group"> <label for="prerequis">prerequisite</label>
          <input type="text" value="<?= $person->prerequis; ?>" name="prerequis" id="prerequis" class="form-control">
       

        </div>


 <div class="form-group">
                             <div class="form-group"> <label for="semestre">semester</label>
          <input type="text" value="<?= $person->semestre; ?>" name="semestre" id="semestre" class="form-control">
       

        </div>
        </div>   <div class="form-group">
          <button type="submit" name="edit" class="btn btn-info">Edit</button>
        </div></div></div>
        <br>
    <div class="panel panel-primary">
        <div class="panel-body">
        <div class="form-group"> 
         <label for="objectif">course  </label>
          <?php if($person->cours!=""){
         echo ' fichier existant '.$a='<a href="data:application/pdf;base64,'.base64_encode($person->cours).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a>'; 
          
           
          } 
          ?>
          <br>   
          if you want to change it:
          <input type="file"  name="mycours"class="form-control"   accept=".pdf">    
        </div>

  <div class="form-group"> <label for="TP">TP  </label>
           <?php if($person->TP!=""){
            echo ' fichier existant <a href="data:application/pdf;base64,'.base64_encode($person->TP).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a>'; 
         
           
          } ?>
            <br>   
          if you want to change it:
          <input    type="file" name="myTP"class="form-control"  accept=".pdf"    >
        </div>
  

  <div class="form-group"> <label for="TD">TD  </label>
           <?php if($person->TD!=""){
            echo ' fichier existant <a href="data:application/pdf;base64,'.base64_encode($person->TD).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a>'; 
         
           
          } ?>
            <br>   
          if you want to change it:
          <input    type="file" name="myTD"class="form-control"  accept=".pdf"    >
        </div>
   <div class="form-group"> <label for="objectif">objectif  </label>
           <?php if($person->objectif!=""){
            echo ' fichier existant <a href="data:application/pdf;base64,'.base64_encode($person->objectif).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a>'; 
         
           
          } ?>
            <br>   
          if you want to change it:
          <input    type="file" name="myobjectif"class="form-control"  accept=".pdf"    >
        </div>
                      
                         <div class="form-group"> <label for="descriptif">Description  </label>
           <?php if($person->descriptif!=""){
            echo ' fichier existant <a href="data:application/pdf;base64,'.base64_encode($person->descriptif).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a>'; 
         
           
          } ?>
            <br>   
          if you want to change it:
          <input    type="file" name="mydescriptif"class="form-control"  accept=".pdf"    >
        </div>
             <div class="form-group"> <label for="evaluation">Evaluation  </label>
           <?php if($person->evaluation!=""){
            echo ' fichier existant <a href="data:application/pdf;base64,'.base64_encode($person->evaluation).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a>'; 
         
           
          } ?>
            <br>   
          if you want to change it:
          <input    type="file" name="myevaluation"class="form-control"  accept=".pdf"    >
        </div>
<div class="form-group">
          <button type="submit" name="editf" style="background-color: red;" class="btn  btn-danger  btn-lg">Edit your fils</button>
        </div>
 </form>
                </div>
            </div>  
        </div>
</body>
</html>
 



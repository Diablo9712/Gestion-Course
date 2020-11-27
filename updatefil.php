
 
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
 
$id_filiere = $_GET['id_filiere'];
$sql = 'SELECT f.*,c.id_cycle FROM filiere as f join cycle as c on f.id_cycle=c.id_cycle   WHERE f.id_filiere=:id_filiere';
$statement = $con->prepare($sql);
$statement->execute([':id_filiere' => $id_filiere ]);
foreach ($statement as $person) { 


  
if (isset ($_POST['edit'])  ) {
  $id_cycle = $_POST['id_cycle'];
  $coordinateur = $_POST['coordinateur'];
  $libelle_fil = $_POST['libelle_fil'];
  $prerequis = $_POST['prerequis']; 
 
   
 
   $descriptif = file_get_contents($_FILES['mydescriptif']['tmp_name']);
     
 
  $objectif = file_get_contents($_FILES['my']['tmp_name']);


  $sql = 'UPDATE filiere SET libelle_fil=:libelle_fil, id_cycle=:id_cycle,coordinateur=:coordinateur, objectif=:objectif, prerequis=:prerequis, descriptif=:descriptif WHERE id_filiere=:id_filiere';
  $statement = $con->prepare($sql);
  if ($statement->execute([':libelle_fil' => $libelle_fil,':id_cycle' => $id_cycle,':coordinateur' => $coordinateur,  ':descriptif' => $descriptif, ':objectif' => $objectif , ':prerequis' => $prerequis ,':id_filiere' => $id_filiere])) {
    header("Location:filière.php");
 
 } 

  if($person['descriptif']!="" &&  $person['objectif']!=""){

    $descriptif= $person['descriptif'];
    $objectif= $person['objectif'];
  $sql = 'UPDATE filiere SET libelle_fil=:libelle_fil, id_cycle=:id_cycle,coordinateur=:coordinateur, objectif=:objectif , prerequis=:prerequis, descriptif=:descriptif WHERE id_filiere=:id_filiere';
  $statement = $con->prepare($sql);
  if ($statement->execute([':libelle_fil' => $libelle_fil,':id_cycle' => $id_cycle,':coordinateur' => $coordinateur , ':prerequis' => $prerequis ,  ':descriptif' => $descriptif, ':objectif' => $objectif ,':id_filiere' => $id_filiere])) {
    header("Location:filière.php");
}
     

  } 
}

if (isset ($_POST['editf'])  ) {
   
 
   
 
   $descriptif = file_get_contents($_FILES['mydescriptif']['tmp_name']);
     
 
  $objectif = file_get_contents($_FILES['my']['tmp_name']);


  $sql = 'UPDATE filiere SET  objectif=:objectif , descriptif=:descriptif WHERE id_filiere=:id_filiere';
  $statement = $con->prepare($sql);
  if ($statement->execute([  ':descriptif' => $descriptif, ':objectif' => $objectif  ,':id_filiere' => $id_filiere])) {
    header("Location:filière.php");
 
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
         
    <center> <label>Cycle</label>
  </center> 
<select name="id_cycle" class="form-control">   

         
     <?php
                 
                  include 'connecion.php';
    
    $sql = 'SELECT  DISTINCT id_cycle,libelle_cycle FROM   cycle     ';
    $query = mysqli_query($con,$sql);

    while($data = mysqli_fetch_assoc($query)){
      
        
     if ($data['id_cycle']==$person['id_cycle']) 
        {
          echo" <option selected value=".$data['id_cycle'].">".$data['libelle_cycle']."</option> " ; 
        }
    
           echo" <option  value=".$data['id_cycle'].">".$data['libelle_cycle']."</option> "  ;
        
      
        
     
    
    }
 ?>

  </select>

                        <div class="form-group"> <label for="libelle_fil">Faculty</label>
          <input type="libelle_fil" value="<?= $person['libelle_fil' ]; ?>" name="libelle_fil" id="libelle_fil" class="form-control">
       

        </div>
                       
<center><label>coordinator</label>
</center>
<select name="coordinateur" class="form-control">   
              <option > <?= $person['coordinateur' ]; ?> </option>
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM professeur';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
        
     if ($data['nom']==$person->coordinateur ) 
        {
          echo" <option selected value=".$data['nom'].">".$data['nom']."</option> " ; 
        }
    
           echo" <option  value=".$data['nom'].">".$data['nom']."</option> "  ;
        
      
        

    }
    ?>
               </select>
               <br>

                        
                        <div class="form-group">
                             <div class="form-group"> <label for="prerequis">prerequisite</label>
          <input type="prerequis"  name="prerequis" value="<?=  $person['prerequis' ]; ?>"  id="prerequis" class="form-control">
       

        </div>   <div class="form-group">
          <button type="submit" name="edit" class="btn btn-info">Edit</button>
        </div></div></div>
        <br>
    <div class="panel panel-primary">
        <div class="panel-body">
        <div class="form-group"> 
         <label for="objectif">objectif  </label>
          <?php if($person['objectif']!=""){
         echo ' existing file '.$a='<a href="data:application/pdf;base64,'.base64_encode($person['objectif']).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a>'; 
          
           
          } 
          ?>
          <br>   
          if you want to change it:
          <input type="file"  name="my"class="form-control"   accept=".pdf">    
        </div>

  <div class="form-group"> <label for="descriptif">description </label>
           <?php if($person['descriptif']!=""){
            echo ' existing file <a href="data:application/pdf;base64,'.base64_encode($person['descriptif']).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a>'; 
         
           
          } ?>
            <br>   
          if you want to change it:
          <input    type="file" name="mydescriptif"class="form-control"  accept=".pdf"    >
        </div>
 <?php
    }
    ?>

                      
<div class="form-group">
          <button type="submit" name="editf" style="background-color: red;" class="btn  btn-danger  btn-lg">Edit your file</button>
        </div>
            </form>
                </div>
            </div>  
        </div>
</body>
</html>


 
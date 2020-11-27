
 
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
 
 

$id_labo = $_GET['id_labo'];
$sql = 'SELECT * FROM laboratoire WHERE id_labo=:id_labo';
$statement = $con->prepare($sql);
$statement->execute([':id_labo' => $id_labo ]);
foreach ($statement as $person) { 
 
if (isset ($_POST['edit'])  ) {

  $libelle_labo = $_POST['libelle_labo'];
  $coordinateur = $_POST['coordinateur'];
  $champ = $_POST['champ'];
  $axe = $_POST['axe'];
  $CED = $_POST['CED'];
   
   
     $objectif = file_get_contents($_FILES['my']['tmp_name']);
     $descriptif = file_get_contents($_FILES['mydescriptif']['tmp_name']);
  

  if($person['descriptif']!="" &&  $person['objectif']!=""){

    $descriptif= $person['descriptif'];
    $objectif= $person['objectif'];
$sql = 'UPDATE laboratoire SET champ=:champ, libelle_labo=:libelle_labo,coordinateur=:coordinateur, axe=:axe, CED=:CED, objectif=:objectif, champ=:champ, descriptif=:descriptif WHERE id_labo=:id_labo';
  $statement = $con->prepare($sql);
  if ($statement->execute([':champ' => $champ,':libelle_labo' => $libelle_labo,':coordinateur' => $coordinateur,  ':descriptif' => $descriptif, ':objectif' => $objectif , ':axe' => $axe ,':CED' => $CED  ,':id_labo' => $id_labo])) {
    header("Location:laboratoire.php");
  }}

}



if (isset ($_POST['editf'])  ) {
   
 
   
 
   $descriptif = file_get_contents($_FILES['mydescriptif']['tmp_name']);
     
 
  $objectif = file_get_contents($_FILES['my']['tmp_name']);
$sql = 'UPDATE laboratoire SET champ=:champ, libelle_labo=:libelle_labo,coordinateur=:coordinateur, axe=:axe, CED=:CED, objectif=:objectif, champ=:champ, descriptif=:descriptif WHERE id_labo=:id_labo';
  $statement = $con->prepare($sql);
  if ($statement->execute([':champ' => $champ,':libelle_labo' => $libelle_labo,':coordinateur' => $coordinateur,  ':descriptif' => $descriptif, ':objectif' => $objectif , ':axe' => $axe ,':CED' => $CED  ,':id_labo' => $id_labo])) {
    header("Location:laboratoire.php");
  }}


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
                     
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group"> <label for="libelle_labo">laboratory</label>
          <input type="libelle_labo" value="<?= $person['libelle_labo']; ?>" name="libelle_labo" id="libelle_labo" class="form-control">
       

        </div>
                        <div class="form-group"> <label for="champ">field</label>
          <input type="champ" value="<?= $person['champ']; ?>" name="champ" id="champ" class="form-control">
       

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

     
                        
                        <div class="form-group"> <label for="CED">CED</label>
          <input type="CED" value="<?= $person['CED']; ?>" name="CED" id="CED" class="form-control">
       

        </div>
     
     


                          <div class="form-group">
          <button type="submit" name="edit" class="btn btn-info">Edit</button>
        </div>



           <br>
    <div class="panel panel-primary">
        <div class="panel-body">
        <div class="form-group"> 
         <label for="objectif">Goal  </label>
          <?php if($person['objectif']!=""){
         echo ' existing file '.$a='<a href="data:application/pdf;base64,'.base64_encode($person['objectif']).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a>'; 
          
           
          } 
          ?>
          <br>   
          if you want to change it:
          <input type="file"  name="my"class="form-control"   accept=".pdf">    
        </div>

  <div class="form-group"> <label for="descriptif">descriptif  </label>
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
          <button type="submit" name="editf" style="background-color: red;" class="btn  btn-danger  btn-lg">Edit your files</button>
        </div>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>
 






 
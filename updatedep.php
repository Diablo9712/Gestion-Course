
 
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
 
 

$id_departement = $_GET['id_departement'];
$sql = 'SELECT * FROM departement WHERE id_departement=:id_departement';
$statement = $con->prepare($sql);
$statement->execute([':id_departement' => $id_departement ]);
foreach ($statement as $person) {
 
if (isset ($_POST['edit'])  ) {
  $libelle_dep = $_POST['libelle_dep'];
  $coordinateur = $_POST['coordinateur'];
     
     $descriptif = file_get_contents($_FILES['mydescriptif']['tmp_name']); 
    if($person['descriptif']!="" ){

    $descriptif= $person['descriptif'];

  $sql = 'UPDATE departement SET libelle_dep=:libelle_dep,coordinateur=:coordinateur, descriptif=:descriptif WHERE id_departement=:id_departement';
  $statement = $con->prepare($sql);
  if ($statement->execute([ ':libelle_dep' => $libelle_dep,':coordinateur' => $coordinateur,  ':descriptif' => $descriptif ,':id_departement' => $id_departement])) {
    header("Location:departement.php");
  }}

}
if (isset ($_POST['editf'])  ) {

   $descriptif = file_get_contents($_FILES['mydescriptif']['tmp_name']);
   

  $sql = 'UPDATE departement SET   descriptif=:descriptif WHERE id_departement=:id_departement';
  $statement = $con->prepare($sql);
  if ($statement->execute([   ':descriptif' => $descriptif ,':id_departement' => $id_departement])) {
    header("Location:departement.php");
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
                     
                    <form method="post"  enctype="multipart/form-data">
 

     

                        <div class="form-group"> <label for="libelle_dep">Departement</label>
          <input type="libelle_dep" value="<?= $person['libelle_dep']; ?>" name="libelle_dep" id="libelle_dep" class="form-control">
       

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
          <button type="submit" name="edit" class="btn btn-info">Edit</button>
        </div>
<br>
    <div class="panel panel-primary">
        <div class="panel-body">
        <div class="form-group"> 
        

  <div class="form-group"> <label for="descriptif">description  </label>
           <?php if($person['descriptif']!=""){
            echo ' existing file <a href="data:application/pdf;base64,'.base64_encode($person['descriptif']).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a>'; 
         
           
          }?>
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
 






 
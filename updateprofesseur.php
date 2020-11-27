 
 


<?php

require 'connexion.php';
 
 
if (isset( $_GET['id_prof'])) {
 

$id_prof = $_GET['id_prof'];
$sql = 'SELECT * FROM professeur WHERE id_prof=:id_prof';
$statement = $con->prepare($sql);
$statement->execute([':id_prof' => $id_prof ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
 
if (isset ($_POST['edit'])  ) {
     $nom = $_POST['nom'];
     $date_naiss = $_POST['date_naiss'];
     $telephone = $_POST['telephone'];
     $email = $_POST['email'];
     $adresse = $_POST['adresse'];
     $prenom = $_POST['prenom'];
     $ville = $_POST['ville'];
     $CIN = $_POST['CIN']; 
     $CV = file_get_contents($_FILES['myfile']['tmp_name']);
     
    
     $grade = $_POST['grade'];
     $site = $_POST['site'];
     $ordre = $_POST['ordre'];
     $code_travail = $_POST['code_travail'];
 $id_departement = $_POST['id_departement'];
     $id_labo = $_POST['id_labo'];
  $sql = 'UPDATE professeur SET nom=:nom, prenom=:prenom, email=:email, date_naiss=:date_naiss, telephone=:telephone, adresse=:adresse, ville=:ville,   CIN=:CIN, grade=:grade, site=:site, ordre=:ordre,id_departement=:id_departement, id_labo=:id_labo,code_travail=:code_travail, CV=:CV WHERE id_prof=:id_prof';
  $statement = $con->prepare($sql);
  if ($statement->execute([':nom' => $nom, ':prenom' => $prenom, ':email' => $email,':date_naiss'=>$date_naiss,':telephone'=>$telephone,'adresse'=>$adresse,':ville'=>$ville,':CIN'=>$CIN,':grade'=>$grade,':site'=>$site ,':ordre' => $ordre,':id_departement' => $id_departement, ':id_labo' => $id_labo,':code_travail' => $code_travail,':CV' => $CV ,':id_prof' => $id_prof])) {
    header("Location:professeur.php");
}}


}   
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
</head>
<body>
    <?php include "blog.php"; ?>
 
     
      
        <section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <h1 class="display-4 py-2 text-truncate">Edit professor </h1>
                    <div class="px-2">
                        <form method="post"  class="justify-content-center" enctype="multipart/form-data" >
         


<div class="form-group">
          <label for="nom">Last name</label>
          <input value="<?= $person->nom; ?>" type="text" name="nom" id="nom" class="form-control">
        </div>

        <div class="form-group">
          <label for="prenom">First name</label>
          <input type="text" value="<?= $person->prenom; ?>" name="prenom" id="prenom" class="form-control">
        </div>

          <div class="form-group"> <label for="email">Email</label>
          <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
       

        </div> 


        <div class="form-group"> <label for="date_naiss">Date of birth</label>
          <input type="date" value="<?= $person->date_naiss; ?>" name="date_naiss" id="date_naiss" class="form-control">
        </div> 


        <div class="form-group"> <label for="telephone">phone</label>
          <input type="text" value="<?= $person->telephone; ?>" name="telephone" id="telephone" class="form-control">
        </div>


        <div class="form-group">  <label for="adresse">Address</label>
          <input type="text" value="<?= $person->adresse; ?>" name="adresse" id="adresse" class="form-control">
        </div>


         <div class="form-group"> <label for="ville">City</label>
          <input type="text" value="<?= $person->ville; ?>" name="ville" id="ville" class="form-control">
        </div>

       

        <div class="form-group"> <label for="CIN">CIN</label>
          <input type="text" value="<?= $person->CIN; ?>" name="CIN" id="CIN" class="form-control">
        </div>


<div class="form-group"> <label for="grade">grade</label>
          <input type="text" value="<?= $person->grade; ?>" name="grade" id="grade" class="form-control">
        </div>

        <div class="form-group"> <label for="site">site</label>
          <input type="text" value="<?= $person->site; ?>" name="site" id="site" class="form-control">
        </div>

        <div class="form-group"> <label for="ordre">order</label>
          <input type="text" value="<?= $person->ordre; ?>" name="ordre" id="ordre" class="form-control">
        </div>

        <div class="form-group"> <label for="code_travail">work_code</label>
          <input type="text" value="<?= $person->code_travail; ?>" name="code_travail" id="code_travail" class="form-control">
        </div>
       





        <div class="form-group"> 
          <label for="CV">CV</label>

          <input type="file" name="myfile"class="form-control" required="" accept=".pdf"    >
        </div>
 <label>Departement</label>
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
     <label>Laboratory</label>
  <select name="id_labo" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM laboratoire';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
         ?>  
         
         <option   value="<?php echo $data['id_labo']; ?>">  <?php echo $data['libelle_labo']; ?></option> 
    <?php
    }
    ?>

  </select>
        <div class="form-group">
          <button type="submit" name="edit" class="btn btn-info">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
 







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
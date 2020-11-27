
<?php
require 'connexion.php';
 
 

$CNE = $_GET['CNE'];
$sql = 'SELECT * FROM etudiants WHERE CNE=:CNE';
$statement = $con->prepare($sql);
$statement->execute([':CNE' => $CNE ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
 
if (isset ($_POST['edit'])  ) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $date_naiss = $_POST['date_naiss'];
  $telephone = $_POST['telephone'];
  $adresse = $_POST['adresse'];
  $ville = $_POST['ville'];
  $CNE = $_POST['CNE'];
  $CNI = $_POST['CNI'];
  //$CV = $_POST['CV'];
     $CV = file_get_contents($_FILES['my']['tmp_name']);
  $sql = 'UPDATE etudiants SET nom=:nom, prenom=:prenom, email=:email, date_naiss=:date_naiss, telephone=:telephone, adresse=:adresse, ville=:ville, CNI=:CNI, CV=:CV , CNE=:CNE WHERE CNE=:CNE';
  $statement = $con->prepare($sql);
  if ($statement->execute([':nom' => $nom, ':prenom' => $prenom, ':email' => $email, ':date_naiss' => $date_naiss,':telephone' => $telephone,'adresse' =>$adresse, ':ville' => $ville, ':CNI' => $CNI, ':CV' => $CV ,':CNE' => $CNE])) {
    header("Location:Etudiant.php");
  }



}


 ?>
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
<?php require 'blog.php'; ?>
   
     
      
        <section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <h1 class="display-4 py-2 text-truncate">Edit student</h1>
                    <div class="px-2">
                        <form method="post"  class="justify-content-center" enctype="multipart/form-data" >
        <div class="form-group">
          <label for="nom">Last name</label>
          <input value="<?= $person->nom; ?>" type="text" name="nom" id="nom" class="form-control">
        </div>
        <div class="form-group">
          <label for="prenom">First name</label>
          <input type="prenom" value="<?= $person->prenom; ?>" name="prenom" id="prenom" class="form-control">
        </div>
        <div class="form-group">


        </div> <div class="form-group"> <label for="email">Email</label>
          <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
       

        </div> <div class="form-group"> <label for="date_naiss">Date of birth</label>
          <input type="date" value="<?= $person->date_naiss; ?>" name="date_naiss" id="date_naiss" class="form-control">
        </div> <div class="form-group"> <label for="telephone">Phone</label>
          <input type="telephone" value="<?= $person->telephone; ?>" name="telephone" id="telephone" class="form-control">
        </div><div class="form-group">  <label for="adresse">Addresse</label>
          <input type="adresse" value="<?= $person->adresse; ?>" name="adresse" id="adresse" class="form-control">
        </div> <div class="form-group"> <label for="ville">City</label>
          <input type="ville" value="<?= $person->ville; ?>" name="ville" id="ville" class="form-control">
        </div><div class="form-group">  <label for="CNE">CNE</label>
          <input type="CNE" value="<?= $person->CNE; ?>" name="CNE" id="CNE" class="form-control">
        </div> <div class="form-group"> <label for="CNI">CNI</label>
          <input type="CNI" value="<?= $person->CNI; ?>" name="CNI" id="CNI" class="form-control">
        </div>
        <div class="form-group"> <label for="CV">CV</label>

          <input    type="file" name="my"class="form-control" accept=".pdf"    >
        </div>
        <div class="form-group">
          <button type="submit" name="edit" class="btn btn-info">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
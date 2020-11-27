
 
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
 
 

$id_these = $_GET['id_these'];
$sql = 'SELECT * FROM these WHERE id_these=:id_these';
$statement = $con->prepare($sql);
$statement->execute([':id_these' => $id_these ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
 
if (isset ($_POST['edit'])  ) {
  $nompf = $_POST['nompf'];
  $nometd = $_POST['nometd'];
  $sujet = $_POST['sujet'];
  $coordinnateur = $_POST['coordinnateur'];
  $Etat_davancement = $_POST['Etat_davancement'];
     $rapport = file_get_contents($_FILES['my']['tmp_name']);
  $sql = 'UPDATE these SET nompf=:nompf,nometd=:nometd, sujet=:sujet, coordinnateur=:coordinnateur, rapport=:rapport, Etat_davancement=:Etat_davancement WHERE id_these=:id_these';
  $statement = $con->prepare($sql);
  if ($statement->execute([':nompf' => $nompf,':nometd' => $nometd, ':sujet' => $sujet,  ':coordinnateur' => $coordinnateur,':rapport' => $rapport, ':Etat_davancement' => $Etat_davancement ,':id_these' => $id_these])) {
    header("Location:these.php");
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

<select name="nompf" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM professeur';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
         ?>    
     <label>coordinator</label>     <option   value="<?php echo $data['nom']; ?>">  <?php echo $data['nom']; ?></option> 
    <?php
    }
    ?>

  </select>
            <br>

<select name="nometd" class="form-control">   

     <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM etudiants';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
         ?>    
     <label>coordinateur</label>     <option   value="<?php echo $data['nom']; ?>">  <?php echo $data['nom']; ?></option> 
    <?php
    }
    ?>

  </select>
                        <div class="form-group"> <label for="sujet">Topic</label>
          <input type="sujet" value="<?= $person->sujet; ?>" name="sujet" id="sujet" class="form-control">
       

        </div>

<select name="coordinnateur" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM professeur';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
         ?>    
     <label>coordinator</label>     <option   value="<?php echo $data['nom']; ?>">  <?php echo $data['nom']; ?></option> 
    <?php
    }
    ?>

  </select>
           
                        <div class="form-group"> <label for="rapport">report</label>

          <input    type="file" name="my"class="form-control" accept=".pdf"    >
        </div>
                        
                        <div class="form-group">
                             <div class="form-group"> <label for="Etat_davancement">Progress_state</label>
          <input type="Etat_davancement" value="<?= $person->Etat_davancement; ?>" name="Etat_davancement" id="Etat_davancement" class="form-control">
       

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
 






 
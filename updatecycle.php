
 
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
 
 

$id_cycle = $_GET['id_cycle'];
$sql = 'SELECT * FROM cycle WHERE id_cycle=:id_cycle';
$statement = $con->prepare($sql);
$statement->execute([':id_cycle' => $id_cycle ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
 
if (isset ($_POST['edit'])  ) {
   
  $libelle_cycle = $_POST['libelle_cycle'];
  
  $sql = 'UPDATE cycle SET libelle_cycle=:libelle_cycle  WHERE id_cycle=:id_cycle';
  $statement = $con->prepare($sql);
  if ($statement->execute([':libelle_cycle' => $libelle_cycle  ,':id_cycle' => $id_cycle])) {
    header("Location:cycle.php");
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

                    <div class="form-group"> <label for="libelle_cycle">Cycle</label>
          <input type="libelle_cycle" value="<?= $person->libelle_cycle; ?>" name="libelle_cycle" id="libelle_cycle" class="form-control">
       

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
 






 
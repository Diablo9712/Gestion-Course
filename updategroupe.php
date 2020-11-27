
 
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
 
 

$id_groupe = $_GET['id_groupe'];
$sql = 'SELECT g.*,f.id_filiere FROM groupe as g join filiere as f on g.id_filiere=f.id_filiere WHERE g.id_groupe=:id_groupe';
$statement = $con->prepare($sql);
$statement->execute([':id_groupe' => $id_groupe ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
 
if (isset ($_POST['edit'])  ) {
  $libelle = $_POST['libelle'];
  $id_filiere = $_POST['id_filiere'];
    $sql = 'UPDATE groupe SET id_filiere=:id_filiere, libelle=:libelle WHERE id_groupe=:id_groupe';
  $statement = $con->prepare($sql);
  if ($statement->execute([':id_filiere' => $id_filiere,':libelle' => $libelle ,':id_groupe' => $id_groupe])) {
    header("Location:groupe.php");
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
                     
                    <form method="post">
                       
                       <center> <label>Cycle</label>
  </center>
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
                             <div class="form-group"> <label for="libelle">wording</label>
          <input type="text" value="<?= $person->libelle; ?>" name="libelle" id="libelle" class="form-control">
       

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
 






 
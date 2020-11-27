
 
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
  

$id_equipe = $_GET['id_equipe'];
$sql = 'SELECT eq.*,f.id_filiere FROM equipe_pedagogique as eq
 join filiere as f on eq.id_filiere=f.id_filiere 
 WHERE eq.id_equipe=:id_equipe';
$statement = $con->prepare($sql);
$statement->execute([':id_equipe' => $id_equipe ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
 
if (isset ($_POST['edit'])  ) {
  $coordinateur = $_POST['coordinateur'];
  $id_filiere = $_POST['id_filiere'];
   
  $sql = 'UPDATE equipe_pedagogique SET id_filiere=:id_filiere,coordinateur=:coordinateur  WHERE id_equipe=:id_equipe';
  $statement = $con->prepare($sql);
  if ($statement->execute([ ':id_filiere' => $id_filiere,':coordinateur' => $coordinateur,':id_equipe' => $id_equipe])) {
    header("Location:equipe_pedagogique.php");
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
 

     
 
 <center> <label>Cordinnateur</label>
</center>
     <input type="coordinateur" value="<?= $person->coordinateur; ?>" name="coordinateur" id="coordinateur" class="form-control">
           
  <br>

 <center> <label>filière</label>
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
  <br>
 
                       <div class="form-group">
          <button type="submit" name="edit" class="btn btn-info">Edit</button>
        </div>

            </form>
                </div>
            </div>  
        </div>
</body>
</html>
 






 
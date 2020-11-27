
 
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
 
 

$id = $_GET['id'];
$sql = 'SELECT * FROM examen WHERE id=:id';
$statement = $con->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['edit'])  ) {
  $dateexamen = $_POST['dateexamen'];
 
     $filename = file_get_contents($_FILES[' myexamen']['tmp_name']);
   
  $sql = 'UPDATE examen SET filename=:filename,dateexamen=:dateexamen  WHERE id=:id';
  $statement = $con->prepare($sql);
  if ($statement->execute([ ':filename' => $filename,':dateexamen' => $dateexamen,':id' => $id])) {
    header("Location:examen.php");
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
 
             
  <div class="form-group"> <label for="examen">examen</label>

          <input    type="file" name="myexamen"class="form-control" accept=".pdf"    >
        </div>


                <input type="date" name="dateexamen" class="form-control" value="<?= $person->dateexamen; ?>" placeholder="date" required="" autofocus="">

 
                       <div class="form-group">
          <button type="submit" name="edit" class="btn btn-info">Edit</button>
        </div>

            </form>
                </div>
            </div>  
        </div>
</body>
</html>
 






 
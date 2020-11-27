
 
 

<?php
$con=mysqli_connect('localhost','root','','basecour');
 
if(session_id() == '') {
session_start();

 $id_prof=$_SESSION['id'];}
include 'menuP.php';
 $query = "SELECT * FROM professeur WHERE id_prof = '". $id_prof."' ";  
           $result = mysqli_query($con, $query);  
           $data  = $result->fetch_assoc();
           if(mysqli_num_rows($result) > 0)  
           {  
 
    
 
            $nom = $data['nom'];
         
echo '<p><font color=black> Welcome professor'. $nom .'  , You are connected</font></p><br>';

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
 


                                 
<?php

require 'connexion.php';
 
 

$id_module = $_GET['id_module'];
$sql = "SELECT * FROM module WHERE id_module=:id_module and id_prof = '". $id_prof."'";
$statement = $con->prepare($sql);
$statement->execute([':id_module' => $id_module ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
 
if (isset ($_POST['edit'])  ) { 
  
   
     $cours = file_get_contents($_FILES['mycours']['tmp_name']);
     $TP = file_get_contents($_FILES['myTP']['tmp_name']);
     $TD = file_get_contents($_FILES['myTD']['tmp_name']);
     $evaluation = file_get_contents($_FILES['myeva']['tmp_name']);
 
     
  $sql = "UPDATE module SET  cours=:cours,TD=:TD,TP=:TP,evaluation=:evaluation  WHERE id_module=:id_module";
  $statement = $con->prepare($sql);
  if (
    $statement->execute([ ':cours' => $cours,':TD' => $TD,':TP' => $TP,':evaluation' => $evaluation ,':id_module' => $id_module]) ) {
  
     echo  "<script type='text/javascript'>document.location.replace('module_prof.php');
alert(' Bien modifier ');
   </script>";
 }

}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
</head>
<body>

        <div class="container">
            <div class="data">
                <div class="col-lg-12">
                     
                    <form method="POST"  enctype="multipart/form-data">
 
        <div class="form-group">
                             <div class="form-group"> <label for="cours">courses</label>
          <input type="file"   name="mycours" id="cours" accept=".pdf"   class="form-control">
       <div class="form-group">
                             <div class="form-group"> <label for="TD">TD</label>
          <input type="file"   name="myTD" id="TD"  accept=".pdf"   class="form-control">
       <div class="form-group">
                             <div class="form-group"> <label for="TP">TP</label>
          <input type="file"   name="myTP" id="TP" accept=".pdf"   class="form-control">
        <div class="form-group"> <label for="eva">evaluation</label>
          <input type="file"   name="myeva" id="eva" accept=".pdf"   class="form-control">
        
                       <div class="form-group">
          <button type="submit" name="edit" class="btn btn-info">Edit</button>
        </div>
</div></form>
                </div>
            </div>  
        </div>
</body>
</html>
 






 
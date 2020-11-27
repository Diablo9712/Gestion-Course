
 
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
 
 

$id_PFE = $_GET['id_PFE'];
$sql = 'SELECT * FROM pfe WHERE id_PFE=:id_PFE';
$statement = $con->prepare($sql);
$statement->execute([':id_PFE' => $id_PFE ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
 
if (isset ($_POST['edit'])  ) {
  $Etat_davancement = $_POST['Etat_davancement'];
   
     $rapport = file_get_contents($_FILES['myrapport']['tmp_name']);
     $presentation = file_get_contents($_FILES['mypresentation']['tmp_name']);

   $video_explicative = $_FILES['file']['name'];
   $tmp = $_FILES['file']['tmp_name'];
     move_uploaded_file($tmp, "video/".$video_explicative);
     //$rapport = file_get_contents($_FILES['my']['tmp_name']);
  $sql = 'UPDATE pfe SET rapport=:rapport,Etat_davancement=:Etat_davancement, video_explicative=:video_explicative, presentation=:presentation WHERE id_PFE=:id_PFE';
 if( $statement = $con->prepare($sql)){
 $statement->execute([   ':rapport' => $rapport ,  ':Etat_davancement' => $Etat_davancement ,':video_explicative' => $video_explicative,   ':presentation' => $presentation,':id_PFE' => $id_PFE]) ;
   
     echo  "<script type='text/javascript'>document.location.replace('table_pfe.php');
alert(' Bien');
   </script>";
   }
 else {

echo "<script>alert('no')</script>";
}
  



}

 
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <?php include "menu.php"; ?>
</head>
<body>

        <div class="container">
            <div class="data">
                <div class="col-lg-12">
                     
                    <form method="post"  enctype="multipart/form-data">
                    
    <form method="post"  enctype="multipart/form-data">
 
  <div class="form-group">
                             <div class="form-group"> <label for="rapport">report</label>
          <input type="file"   name="myrapport" id="rapport" accept=".pdf"   class="form-control">
        <div class="form-group">
                             <div class="form-group"> <label for="presentation">presentation</label>
          <input type="file"   name="mypresentation" id="presentation" accept=".pdf"   class="form-control">
       <div class="form-group">
                             <div class="form-group"> <label for="Video">Video</label>
          <input type="file"   name="file" id="Video"  accept=".mp4"   class="form-control">
       <div class="form-group">
                             <div class="form-group"> <label for="Etat_davancement">State of progress</label>
          <input   name="Etat_davancement" id="Etat_davancement"    class="form-control">
        
                       <div class="form-group">
          <button type="submit" name="edit" class="btn btn-info">Edit</button>
        </div>
</div></form>
                        
                          
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>
 





 
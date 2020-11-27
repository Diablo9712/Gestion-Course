
 
<?php
$con=mysqli_connect('localhost','root','','basecour');
//include 'menuP.php';
 
if(session_id() == '') {
session_start();

 $id_prof=$_SESSION['id'];}
 $query = "SELECT * FROM professeur p,laboratoire l,departement d
WHERE p.id_labo=l.id_labo
AND p.id_departement=d.id_departement 
AND id_prof = '". $id_prof."' ";  
           $result = mysqli_query($con, $query);  
           $data  = $result->fetch_assoc();
           if(mysqli_num_rows($result) > 0)  
           {  
 
    
 
            $nom = $data['nom'];
         
echo '<p><font color=black> Hello '. $nom .'  , you are connected </font></p><br>';
include 'menuP.php';
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
 

$id_PFE = $_GET['id_PFE'];
$sql = 'SELECT p.*,e.CNE FROM pfe as p
join etudiants as e on p.CNE=e.CNE 
 WHERE p.id_PFE=:id_PFE';
$statement = $con->prepare($sql);
$statement->execute([':id_PFE' => $id_PFE ]);
foreach ($statement as $person) { 
 
if (isset ($_POST['edit'])  ) {

  $CNE = $_POST['CNE'];
  $sujet = $_POST['sujet'];
  $Etat_davancement = $_POST['Etat_davancement'];
    
  $sql = 'UPDATE pfe SET CNE=:CNE, sujet=:sujet,  Etat_davancement=:Etat_davancement WHERE id_PFE=:id_PFE';
  $statement = $con->prepare($sql);
  if ($statement->execute([':CNE' => $CNE,':sujet' => $sujet,':Etat_davancement' => $Etat_davancement ,':id_PFE' => $id_PFE])) {
     
 
     echo  "<script type='text/javascript'>document.location.replace('tableauPfeProf.php');
alert(' Bien modifier ');
   </script>";
  }   
       

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
                     
                    <form method="post"  enctype="multipart/form-data">
 <input type="hidden"  value="<?= $person->id_prof; ?>" name="id_prof">
            <br>

<select name="CNE" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM etudiants';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
            
     
      
     if ($data['CNE']==$person['CNE']) 
        {
          echo" <option selected value=".$data['CNE'].">".$data['CNE']."</option> " ; 
        }
    
           echo" <option  value=".$data['CNE'].">".$data['CNE']."</option> "  ;
        
      
        

    }
    ?>
               </select>
               <br>
                        <div class="form-group"> <label for="sujet">Topic</label>
          <input type="sujet" value="<?= $person['sujet']; ?>" name="sujet" id="sujet" class="form-control">
       

        </div>
                  
                        <div class="form-group">
                             <div class="form-group"> <label for="Etat_davancement">Progress_state</label>
          <input type="Etat_davancement" value="<?= $person['Etat_davancement']; ?>" name="Etat_davancement" id="Etat_davancement" class="form-control">
       

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
 






 






 
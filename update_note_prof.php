
 
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
         
echo '<p><font color=black> Hello professor '. $nom .'  , you are  connected </font></p><br>';

}  
            
  
 



require 'connexion.php';
 
 

$id_note = $_GET['id_note'];
$sql = 'SELECT * FROM note n  WHERE id_note=:id_note

 ';
$statement = $con->prepare($sql);
$statement->execute([':id_note' => $id_note ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
 
if (isset ($_POST['edit'])  ) {
  $CNE = $_POST['CNE'];
     $id_module = $_POST['id_module'];
    

     $note_N = $_POST['note_N'];
     $note_R = $_POST['note_R'];
     $observation = $_POST['observation'];
    
  $sql = 'UPDATE note SET CNE=:CNE, id_module=:id_module,note_N=:note_N, note_R=:note_R , observation=:observation WHERE id_note=:id_note';
  $statement = $con->prepare($sql);
  $statement->execute([':CNE' => $CNE,':id_module' => $id_module,':note_N' => $note_N,':note_R' => $note_R,':observation' => $observation,  ':id_note' => $id_note]);
 
 
if ($statement) {
  
   echo  "<script type='text/javascript'>document.location.replace('afficheNote.php');
alert(' Bien modifier  ');
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
                     
                    <form method="POST">

<label>Student name</label>

<select name="CNE" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM etudiants';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
         ?>    
          <option   value="<?php echo $data['CNE']; ?>">  <?php echo $data['CNE']; ?></option> 
    <?php
    }
    ?>
               </select>
               <br>
                <br>
<label>Module</label>

<select name="id_module" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM module';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
         ?>    
          <option   value="<?php echo $data['id_module']; ?>">  <?php echo $data['libelle_mod']; ?></option> 
    <?php
    }
    ?>
               </select>
                        <div class="form-group"> <label for="note_N">note_N</label>
          <input type="note_N" value="<?= $person->note_N; ?>" name="note_N" id="note_N" class="form-control">
       

        </div> <div class="form-group"> <label for="note_R">note_R</label>
          <input type="note_R" value="<?= $person->note_R; ?>" name="note_R" id="note_R" class="form-control">
       

        </div> <div class="form-group"> <label for="observation">observation</label>
          <input type="observation" value="<?= $person->observation; ?>" name="observation" id="observation" class="form-control">
       

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
 






 
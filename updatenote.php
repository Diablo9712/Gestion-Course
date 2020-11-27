
 
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
 
$sql = 'SELECT n.*,e.CNE,m.id_module FROM note as n 
join etudiants as e on n.CNE=e.CNE 
join module as m on n.id_module=m.id_module
WHERE f.id_note=:id_note';
 

$id_note = $_GET['id_note'];
$sql = 'SELECT * FROM note WHERE id_note=:id_note';
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
  if ($statement->execute([':CNE' => $CNE,':id_module' => $id_module,':note_N' => $note_N,':note_R' => $note_R,':observation' => $observation,  ':id_note' => $id_note])) {
    header("Location:note.php");
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
                     
                    <form method="POST">

<label>Nom étudiant</label>

<select name="CNE" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM etudiants';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
            
     
      
     if ($data['CNE']==$person->CNE) 
        {
          echo" <option selected value=".$data['CNE'].">".$data['CNE']."</option> " ; 
        }
    
           echo" <option  value=".$data['CNE'].">".$data['CNE']."</option> "  ;
        
      
        

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
            
     
      
     if ($data['id_module']==$person->id_module) 
        {
          echo" <option selected value=".$data['id_module'].">".$data['libelle_mod']."</option> " ; 
        }
    
           echo" <option  value=".$data['id_module'].">".$data['libelle_mod']."</option> "  ;
        
      
        

    }
    ?>
               </select>
                        <div class="form-group"> <label for="note_N">Normal rating</label>
          <input type="note_N" value="<?= $person->note_N; ?>" name="note_N" id="note_N" class="form-control">
       

        </div> <div class="form-group"> <label for="note_R">Remediation note</label>
          <input type="note_R" value="<?= $person->note_R; ?>" name="note_R" id="note_R" class="form-control">
       

        </div> <div class="form-group"> <label for="observation">Observation</label>
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
 






 

<?php 

 
$con=mysqli_connect('localhost','root','','basecour');
 
if(session_id() == '') {
session_start();

 $id_prof=$_SESSION['id'];}
 $query = "SELECT * FROM professeur WHERE id_prof = '". $id_prof."' ";  
           $result = mysqli_query($con, $query);  
           $data  = $result->fetch_assoc();
           if(mysqli_num_rows($result) > 0)  
           {  
 
    
 
            $nom = $data['nom'];
         
echo '<h3><font  color=black> Welcome professor '. $nom .'  , You are connected </font></h3><br>';

}  
       
?> 
  
                  
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8">
      <script type="text/javascript">
     $("#search").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $("#table tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});
      
    </script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    
     <style type="text/css">
         
  
.content {
  height: 150%;
  margin: 2em auto;
  max-width:900px;
  max-height: calc(190% - 190px);
  width: 150%;
}
   
 

    </style>
    <script type="text/javascript">
        
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
}); 
        

    </script>
 
      
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 60px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 0px;
        }
        .table {
    margin: 60 auto;
    width: 80%;

}

.content {
  height: 150%;
  margin: 2em auto;
  max-width:900px;
  max-height: calc(190% - 190px);
  width: 150%;
}

    .table{
         text-align: center;
    }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script><script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<!DOCTYPE html>
<html>
<head>
            
 </head>

<body>
  
                          
     
                    <?php
include 'menuP.php';
     
$con=mysqli_connect('localhost','root','','basecour');
                  echo '<div class="container margin-top-20">

    <div class="panel panel-primary">
        <div class="panel-heading"> </div>
        <div class="panel-body">
          <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>  
';
                
$stat=('select * from note n ,module m,etudiants e ,professeur pr
WHERE n.id_module=m.id_module
AND n.CNE=e.CNE
AND m.id_prof=pr.id_prof
AND pr.id_prof="'.$id_prof.'"
');
$result = mysqli_query($con, $stat); 
                           echo "<table class='table table-striped table-hover'> 
                                ";
                                echo " <thead>"; 
                                  echo " <tr>"; 

                                       echo " <th>CNE</th> ";
                                       echo " <th>Module</th> ";
                                      
                                       echo " <th>normal note</th> ";
                                       echo " <th>catch-up note</th> ";
                                     echo " <th>Observation</th> ";
                                      
                                       
                                     echo " <th>Remove</th> ";
                                       echo " <th>Edit</th> ";
                                   echo " </tr> ";
                               echo "  </thead> ";
                                 echo "<tbody> ";
                               while ($data = $result->fetch_assoc()){
                          
                                       echo " <tr> "; 
                                        echo "<tbody  id='myTable'>";
                                       echo "<td>".$data['CNE']."  </td>  ";
                                       echo "<td>".$data['libelle_mod']."  </td>  ";
                                      
                                       echo "<td>".$data['note_N']."  </td>  ";
                                       echo "<td>".$data['note_R']."  </td>  ";
                                       echo "<td>".$data['observation']."  </td>  ";
                                      
                                         
                                      echo "<td><a href=\"afficheNote.php?id_note=$data[id_note]\" onClick=\"return confirm('vous êtes sur?')\"><i class='material-icons'>&#xe872;</i></a></td>  ";
  echo "<td><a href=\"update_note_prof.php?id_note=$data[id_note]\" class='btn btn-info'>Edit</a> </td>  ";
                                   echo "</tr>";   
                                
        }
                              echo " </tbody> ";                            
                           echo "</table>";
                            
 ?>
                    
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
 

 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div style=" margin:auto; top: 0 %; padding-left:800px;">

<i class="material-icons" style="font-size:48px;color:red;"class="btn btn-primary" data-toggle="modal" data-target="#myModal">add_circle</i> 
</div>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title">Add note</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
         
             
 <form   method="POST"   >
                <br>
<label>CNE</label>

<select name="CNE" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT CNE FROM professeur p,filiere f,etudiants e,module m,groupe g
WHERE p.id_prof=m.id_prof
AND m.id_filiere=f.id_filiere
AND f.id_filiere=g.id_filiere
AND g.id_groupe=e.id_groupe
AND p.id_prof='. $id_prof .' GROUP BY CNE';



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
               <br>
                <input type="text" name="note_N" class="form-control" placeholder="note_N" required="" autofocus="">
                <input type="text" name="note_R" class="form-control" placeholder="note_R" required="" autofocus="">
                <input type="text" name="observation" class="form-control" placeholder="observation" required="" autofocus="">
                 
<div class="input-group">
  <button class="btn btn-md btn-block submit" name="ajouternote" type="submit"><i class="fas fa-user-plus"></i> Add</button>
</div>

            </form>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>   
</body>
</html>

<?php
require 'connexion.php';
if (isset($_GET['id_note'])) {
   
$id = $_GET['id_note'];
  
$sql = "DELETE FROM note WHERE id_note=:id";
$query = $con->prepare($sql);
$query->execute(array(':id' => $id));
 }
?>

<?php 








      
include 'connexion.php';
 if(isset($_POST['ajouternote']))
{     
     $CNE = $_POST['CNE'];
     $id_module = $_POST['id_module'];
    

     $note_N = $_POST['note_N'];
     $note_R = $_POST['note_R'];
     $observation = $_POST['observation'];
    

     $arr = array( ":CNE"=>$CNE,":id_module"=>$id_module,":note_N"=>$note_N,":note_R"=>$note_R,":observation"=>$observation);
     $sql = "INSERT INTO note ( CNE,id_module,note_N,note_R,observation )
     VALUES (:CNE,:id_module,:note_N,:note_R,:observation)";
     $res = $con->prepare($sql);
     //$res=bindParam($CV);

     $res->execute($arr);
     
    }
 ?>
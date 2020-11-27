
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

    <script type="text/javascript">
      (function(document) {
  'use strict';

  var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
      
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
  height: 200%;
  margin: 2em auto;
  max-width:900px;
  max-height: calc(200% - 200px);
  width: 200%;
}

    .table{
         text-align: center;
    }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<!DOCTYPE html>
<html>
<head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 </head>

<body>
  
                           

                           
     
                    <?php
                     
                    include 'blog.php';
$con=mysqli_connect('localhost','root','','basecour');
                  echo '<div class="container margin-top-20">

    <div class="panel panel-primary">
        <div class="panel-heading"> </div>
        <div class="panel-body">
          <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>  
';
                
$stat=('select * from etudiants 
   INNER JOIN groupe ON etudiants.id_groupe= groupe.id_groupe
  ');
$result = mysqli_query($con, $stat); 
  
                           echo "<table class='table table-bordered table-striped'> 
                                ";
                                echo " <thead>"; 
                                  echo " <tr>"; 
                                       echo " <th>CNE</th> ";

                                       echo " <th>Last name</th> ";
                                       echo " <th>First name</th> ";

                                      echo "  <th>Date of birth</th> ";
                                       echo " <th>Phone</th>"; 
                                       echo " <th>Email</th> ";
                                       echo " <th>Adresse</th> ";
                                       echo " <th>City</th> ";
                                        echo "<th>CNI</th> ";
                                        echo "<th>Groupe</th> ";
                                       echo " <th>CV</th> ";

                                       echo " <th>Remove</th> ";
                                       echo " <th>Edit</th> ";
                                   echo " </tr> ";
                               echo "  </thead> ";
                                 echo "<tbody> ";
                               while ($data = $result->fetch_assoc()){
                                       echo " <tr> ";
                                        echo "<tbody  id='myTable'>";
                                        echo "<td>".$data['CNE']."</td>  ";
                                       
                                      echo "  <td>".$data['nom']." </td>  ";
                                        echo "<td>".$data['prenom']."  </td>  ";

                                       echo " <td>".$data['date_naiss']." </td>  ";
                                        echo "<td>".$data['telephone']." </td>  ";
                                       echo " <td>".$data['email']."</td>  ";
                                        echo "<td>".$data['adresse']." </td>  ";
                                       echo " <td>".$data['ville']."</td>  ";
                                       echo " <td>".$data['CNI']."</td>  ";
                                       echo " <td>".$data['libelle']."</td>  ";

                               echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["CV"]).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> '; 
                                      echo "<td><a href=\"Etudiant.php?CNE=$data[CNE]\" onClick=\"return confirm('are you sure?')\"><i class='material-icons'>&#xe872;</i></a></td>"; 
                                  echo "<td> <a href=\"update.php?CNE=$data[CNE]\" class='btn btn-info'>Edit</a></td>";             
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

<?php
//including the database connection file
require 'connexion.php';

  if (isset($_GET['CNE'])) {
//getting id of the data from url
$id = $_GET['CNE'];
 
//deleting the row from table
$sql = "DELETE FROM etudiants WHERE CNE=:id";
$query = $con->prepare($sql);
$query->execute(array(':id' => $id));
   }
?> 
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
  <div style=" margin:auto; top: 0 %; padding-left:900px;">

<i class="material-icons" style="font-size:48px;color:red;"class="btn btn-primary" data-toggle="modal" data-target="#myModal">person_add</i> 
</div>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title">Add a student</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
         
             
 <form class="form-signup"  action="insertetd.php" method="POST" enctype="multipart/form-data" >
                  <div class="form-row">
    <div class="col">
                <input type="text" name="nom" class="form-control" placeholder="Nom" required>
                </div>
    <div class="col">
                <input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
                </div>
                </div>
         <input type="date" name="date_naiss" class="form-control" placeholder="date_naissance" required>
                <input type="text" name="telephone" class="form-control" placeholder="Téléphone" required>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <input type="text" name="adresse" class="form-control" placeholder="Adresse" required>
               <input type="text" name="ville" class="form-control" placeholder="Ville" required>
                <input type="text" name="CNE" class="form-control" placeholder="CNE" maxlength="9" required>
              <input type="text" name="CNI" class="form-control" placeholder="CNI" required>

 <label>Groupe</label>
  <select name="id_groupe" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    $sql = 'SELECT * FROM groupe';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
            
         ?>  
         <option   value="<?php echo $data['id_groupe']; ?>">  <?php echo $data['libelle']; ?></option> 
    <?php
    }  
    ?>

  </select>

 <br><center>
  <label  >CV 
              <input type="file" name="myfile" class="form-control" placeholder="CV"  autofocus="" accept=".pdf">
            </label></center>
              <input type="password" name="password" class="form-control" placeholder="Password" required autofocus="">
 
            <br>
<div class="input-group">
  <button class="btn btn-md btn-block submit btn-info" name="insert" type="submit"><i class="fas fa-user-plus"></i> Add</button>
</div>


            </form>
        <!-- Modal footer -->
         
        
      </div>
    </div>
  </div>
  
</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 </head>

<?php 
 include 'connexion.php';

                
 if(isset($_POST['insert']))
{     
    
            $nom = $_POST['nom'];
     $date_naiss = $_POST['date_naiss'];
     $telephone = $_POST['telephone'];
     $adresse = $_POST['adresse'];
     $prenom = $_POST['prenom'];
     $ville = $_POST['ville'];
     $CNE = $_POST['CNE'];

     $CNI = $_POST['CNI']; 
    
      $id_groupe = $_POST['id_groupe']; 

    


   $CV = $_FILES['myfile']['name'];
   $tmp = $_FILES['myfile']['tmp_name'];
     move_uploaded_file($tmp, "cv/".$CV);
    
    // $CV = file_get_contents($_FILES['myfile']['tmp_name']);
       $email = $_POST["email"];  
     $password=$_POST["password"];
    //  $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));AND
$stmt = $con->prepare("SELECT * FROM etudiants WHERE email=? or CNE=? or password=?");
$stmt->execute(array($_POST['email'],$_POST['CNE'],$_POST['password']));
if ( $user1 = $stmt->fetch()){
  
   echo  "<script type='text/javascript'>document.location.replace('Etudiant.php');
alert(' Il y a déjà une personne qui utilise  les information que vous avez entrer ');
   </script>";

   
  }
  else{
    
      
     $arr = array(":nom" => $nom ,":date_naiss"=>$date_naiss,":telephone"=>$telephone,":email"=>$email,":adresse"=>$adresse,":prenom"=>$prenom,":ville"=>$ville,":CNE"=>$CNE,":CNI"=>$CNI,":id_groupe"=>$id_groupe,":CV"=>$CV,":password"=>$password);
     $sql = "INSERT INTO etudiants (nom,date_naiss,telephone,email,adresse,prenom,ville,CNE,CNI,id_groupe,CV,password )
     VALUES (:nom,:date_naiss,:telephone,:email,:adresse,:prenom,:ville,:CNE,:CNI,:id_groupe,:CV,:password)";
     $res = $con->prepare($sql);
     //$res=bindParam($CV);

     $res->execute($arr);
} 
     }
?>
 
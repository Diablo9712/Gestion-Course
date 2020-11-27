<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta charset="UTF-8">
    
    <script type="text/javascript">
      
      (function () {
    var showResults;
    $('#search-box').keyup(function () {
        var searchText;
        searchText = $('#search-box').val();
        return showResults(searchText);
    });
    showResults = function (searchText) {
        $('tbody tr').hide();
        return $('tbody tr:Contains(' + searchText + ')').show();
    };
    jQuery.expr[':'].Contains = jQuery.expr.createPseudo(function (arg) {
        return function (elem) {
            return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
        };
    });
}.call(this));
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    
    <style type="text/css">
        .wrapper{
            width: 70px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 0px;
        }
        .table {
    margin: 0 auto;
    width: 80%;
   .body {
  padding: 8px;
  margin: 2px;
  border: 1px solid;
}
}

.margin-top-20 {
    margin-top: 20px;
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
</head>
<body>
  
                           
     
                    <?php
                     
                    include 'blog.php';
                 include 'connexion.php';
              
$stat=$con->prepare("SELECT * FROM professeur p,laboratoire l,departement d
WHERE p.id_labo=l.id_labo
AND p.id_departement=d.id_departement
                     
  ");
$stat->execute();
   echo ' <div class="container margin-top-20">

    <div class="panel panel-primary " style="width:1150px">
        <div class="panel-heading"> </div>
        <div class="panel-body">
          <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>   ';
               
                           echo "
<section class='container'>
                           <table class='table table-bordered table-striped'> 
                                ";
                                echo " <thead>"; 
                               
                                  echo " <tr>"; 

                                       echo " <th>Last name</th> ";
                                       echo " <th>First name</th> ";

                                      echo "  <th>date of birth</th> ";
                                       echo " <th>Phone</th>"; 
                                       echo " <th>Email</th> ";
                                       echo " <th>Adresse</th> ";
                                       echo " <th>City</th> ";
                                        echo "<th>CIN</th> ";
                                      // echo " <th>password</th> ";
                                       echo " <th>grade</th> ";
                                       echo " <th>site</th> ";
                                       echo " <th>ordre</th> ";
                                       echo " <th>work code</th> ";
                                       echo " <th>Departement</th> ";
                                       echo " <th>Laboratory</th> ";
                                       echo " <th>CV</th> ";
                                       echo " <th>Remove</th> ";
                                       echo " <th>Edit</th> ";
                                       echo "</tbody>";
                                   echo " </tr> ";
                               echo "  </thead> ";
                               while ($data = $stat->fetch()){
                                       echo " <tr> ";
                                        echo "<tbody  id='myTable'>";
                                      echo "  <td>".$data['nom']." </td>  ";
                                        echo "<td>".$data['prenom']."  </td>  ";

                                       echo " <td>".$data['date_naiss']."</td>";
                                        echo "<td>".$data['telephone']."</td>";
                                       echo " <td>".$data['email']."</td>";
                                        echo "<td>".$data['adresse']."</td>";
                                       echo " <td>".$data['ville']."</td>";

                                       echo " <td>".$data['CIN']."</td>";
                                       //echo " <td>".$data['password']."</td>";            
                                       echo " <td>".$data['grade']."</td>";            
                                       echo " <td>".$data['site']."</td>";            
                                       echo " <td>".$data['ordre']."</td>";            
                                       echo " <td>".$data['code_travail']."</td>";      
                                         echo " <td>".$data['libelle_dep']."</td>";            


                                  echo " <td>".$data['libelle_labo']."</td>";            
      

                               echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["CV"]).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> '; 
                                      echo "<td><a href=\"Professeur.php?id_prof=$data[id_prof]\" onClick=\"return confirm('vous êtes sur?')\"><i class='material-icons'>&#xe872;</i></a></td>";
                                       echo "<td> <a href=\"updateprofesseur.php?id_prof=$data[id_prof]\" class='btn btn-info'>Edit</a></td>";    
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

<?php
//including the database connection file
require 'connexion.php';
if (isset($_GET['id_prof'])) {
 
//getting id of the data from url
$id = $_GET['id_prof'];
 
//deleting the row from table
$sql = "DELETE FROM professeur WHERE id_prof=:id";
$query = $con->prepare($sql);
$query->execute(array(':id' => $id));
  }
?>
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
  <div style=" margin:auto; top: 1 %; padding-left:900px;">

<i class="material-icons" style="font-size:48px;color:red;"class="btn btn-primary" data-toggle="modal" data-target="#myModal">person_add</i> 
</div>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title">Add Professor</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
         
             
 <form class="form-signup"   action="insertprofesseur.php" method="POST" enctype="multipart/form-data" >
                 
               
                <div class="form-row">
    <div class="col">
                <input type="text" name="nom" class="form-control" placeholder="Nom" required>
                </div>
    <div class="col">
                <input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
                </div>
                </div>
         <input type="date" name="date_naiss" class="form-control" placeholder="date_naissance" required autofocus="">
                <input type="text" name="telephone" class="form-control" placeholder="Téléphone" required autofocus="">
                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus="">
                <input type="text" name="adresse" class="form-control" placeholder="Adresse" required autofocus="">
               <input type="text" name="ville" class="form-control" placeholder="Ville" required autofocus="">
              <input type="text" name="CIN" class="form-control" placeholder="CIN" required autofocus="">
 <center><label  >CV 
              <input type="file" name="myfile" class="form-control" placeholder="CV"  autofocus="" accept=".pdf">
            </label></center>
              <input type="password" name="password" class="form-control" placeholder="Password" required autofocus="">
              <input type="text" name="grade" class="form-control" placeholder="grade" required autofocus="">
              <input type="text" name="site" class="form-control" placeholder="site" required autofocus="">
              <input type="text" name="ordre" class="form-control" placeholder="ordre" required autofocus="">
              <input type="text" name="code_travail" class="form-control" placeholder="code_travail" required autofocus="">
               <label>Département</label>
  <select name="id_departement" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM departement';
    $query = mysqli_query($con,$sql);

    while($data = mysqli_fetch_assoc($query)){
              
         ?>   
         <option   value="<?php echo $data['id_departement']; ?>">  <?php echo $data['libelle_dep']; ?></option> 
    <?php
    }
    ?>

  </select>
    
     <label>Laboratoire</label>
  <select name="id_labo" class="form-control"> 

              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM laboratoire';
    $query = mysqli_query($con,$sql);
      

    while($data = mysqli_fetch_assoc($query)){
              
         ?>  
         <option   value="<?php echo $data['id_labo']; ?>">  <?php echo $data['libelle_labo']; ?></option> 
    <?php
    }
    ?>

  </select>

  
 
            <br>
<div class="input-group">
  <button class="btn btn-md btn-block submit btn-info" name="insert" type="submit"><i class="fas fa-user-plus"></i> Add</button>
</div>
        
            </form>
       
        
      </div>
    </div>
  </div>
  
</div>

 
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 </head>


</body>
</html>
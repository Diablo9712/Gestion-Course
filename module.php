
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
                 
                 
$stat=("SELECT * FROM module m,filiere f,professeur p,departement d
WHERE m.id_prof=p.id_prof
AND m.id_filiere=f.id_filiere
AND m.id_departement=d.id_departement");
$result = mysqli_query($con, $stat); 
                  
   echo ' <div class="container margin-top-20">

    <div class="panel panel-primary " style="width:1150px">
        <div class="panel-heading"> </div>
        <div class="panel-body">
          <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>   ';
               
     
                           echo "<table class='table table-striped table-hover'> 
                                ";
                                echo " <thead>"; 
                                  echo " <tr>"; 

                                      
                                       echo " <th>Faculty</th> ";
                                       echo " <th>professor</th> ";
                                       echo " <th>Departement</th> ";
                                       echo " <th>module</th> ";
                                       echo " <th>number of hours</th> ";
                                      echo "  <th>semester</th> ";
                                      echo " <th>nature</th> ";
                                       echo " <th>prerequisite</th> ";
                                       echo " <th>Goal</th>"; 
                                       
                                       echo " <th>course</th> ";
                                       echo " <th>description</th> ";
                                       echo " <th>TD</th> ";
                                       echo " <th>TP</th> ";
                                       echo " <th>evaluation</th> ";
                                       
                                        echo " <th>Remove</th> ";
                                       echo " <th>Edit</th> ";
                                   echo " </tr> ";
                               echo "  </thead> ";
                                 echo "<tbody> ";
                               while ($data = $result->fetch_assoc()){
                           
                             
                                       echo " <tr> "; 
                                        echo "<tbody  id='myTable'>";
                                       echo "<td>".$data['libelle_fil']."  </td>  ";
                                       echo "<td>".$data['nom']."  </td>  ";
                                       echo "<td>".$data['libelle_dep']."  </td>  ";
                                      
                                       echo "<td>".$data['libelle_mod']."  </td>  ";
                                      echo "  <td>".$data['nb_heure']." </td>  ";
                                       echo " <td>".$data['semestre']." </td>  ";
                                       echo " <td>".$data['nature']."</td>  ";
                                       echo " <td>".$data['prerequis']."</td>  ";


                                       echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["objectif"]).'" download > <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> ';


                                       echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["cours"]).'" download > <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> ';


                                       echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["descriptif"]).'" download > <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> ';


                                       echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["TD"]).'" download > <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> ';


                                        echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["TP"]).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> ';


                                 echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["evaluation"]).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> ';


                                         
                                      echo "<td><a href=\"module.php?id_module=$data[id_module]\" onClick=\"return confirm('are you sure?')\"><i class='material-icons'>&#xe872;</i></a>
                                       </td>";
                                       echo"<td><a href=\"updatemod.php?id_module=$data[id_module]\" class='btn btn-info'>Edit</a></td>   ";
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

  
if (isset($_GET['id_module'])) {
    
$id = $_GET['id_module'];
  
$sql = "DELETE FROM module WHERE id_module=:id";
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
  <div style=" margin:auto; top: 0 %; padding-left:900px;">

<i class="material-icons" style="font-size:48px;color:red;"class="btn btn-primary" data-toggle="modal" data-target="#myModal">add_circle</i> 
</div>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title">Add module</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
         
 <form    method="POST"   enctype="multipart/form-data" >
              
               
<label>Nom professor</label>

<select name="id_prof" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM professeur';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
         ?>    
          <option   value="<?php echo $data['id_prof']; ?>">  <?php echo $data['nom']; ?></option> 
    <?php
    }
    ?>
               </select>
               <br>

                <input type="text" name="libelle_mod" class="form-control" placeholder="module" autofocus="">
          <label>Departement</label>
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
               
                   
<label>filière</label>

<select name="id_filiere" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM filiere';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
         ?>    
          <option   value="<?php echo $data['id_filiere']; ?>">  <?php echo $data['libelle_fil']; ?></option> 
    <?php
    }
    ?>
               </select>
               

                <input type="text" name="nb_heure" class="form-control" placeholder="nombre heure" autofocus="">
                <input type="text" name="semestre" class="form-control" placeholder="semestre" autofocus="">
                <input type="text" name="nature" class="form-control" placeholder="nature" autofocus="">
                 <input type="text" name="prerequis" class="form-control" placeholder="prerequis" autofocus="">
                 <center>
                   
               <label>Goal
                <input type="file"  name="myobjectif" accept=".pdf" class="form-control"      >
                 </label> 
               <label>Cours
               <input type="file" name="mycours" accept=".pdf"  class="form-control"   >  </label>
            <br> 
  <label >TD 
              <input type="file"  name="mytd" accept=".pdf" class="form-control"     >
              </label> 
            <label  >TP
               <input type="file"  name="mytp" accept=".pdf"class="form-control"     >
                 </label><br>
              
  <label >descriptiON
                <input type="file"  name="mydescriptif" class="form-control"accept=".pdf"    >
               </label> 
   <label  >Evaluation
                <input type="file" name="myevaluation"class="form-control" accept=".pdf"  >
               </label>
              <br>
<div class="input-group">
  <button class="btn btn-md btn-block submit btn-info" name="ajouter" type="submit"><i class="fas fa-user-plus"></i> Add</button>
</div>

  </center>
 
            </form>
        <!-- Modal footer -->
     
     
      </div>
    </div>
  </div>
  
</div> 
  
</body>
</html>


<?php  

 include 'connexion.php';

 if(isset($_POST['ajouter']))
{     
    
     $id_filiere = $_POST['id_filiere'];
     $id_departement = $_POST['id_departement'];
     $id_prof = $_POST['id_prof'];
       
    
     $libelle_mod = $_POST['libelle_mod'];
     $nb_heure = $_POST['nb_heure'];
     $semestre = $_POST['semestre']; 
      $nature = $_POST['nature'];
     $prerequis = $_POST['prerequis'];
   
      
     $objectif = file_get_contents($_FILES['myobjectif']['tmp_name']);
   
     $cours = file_get_contents($_FILES['mycours']['tmp_name']);
     $TP = file_get_contents($_FILES['mytp']['tmp_name']);
     $TD = file_get_contents($_FILES['mytd']['tmp_name']);
 
     $descriptif = file_get_contents($_FILES['mydescriptif']['tmp_name']);
     $evaluation = file_get_contents($_FILES['myevaluation']['tmp_name']);
   
        

     $arr = array(":id_filiere"=>$id_filiere,":id_prof"=>$id_prof,":id_departement"=>$id_departement,":libelle_mod" => $libelle_mod ,":nb_heure"=>$nb_heure,":semestre"=>$semestre,":objectif"=>$objectif,":nature"=>$nature,":prerequis"=>$prerequis,":cours"=>$cours,":TP"=>$TP,":TD"=>$TD,":descriptif"=>$descriptif,":evaluation"=>$evaluation);
     $sql = "INSERT INTO module (id_filiere,id_prof,id_departement,libelle_mod,nb_heure,semestre,objectif,nature,prerequis,cours,TP,TD,descriptif,evaluation)
     VALUES (:id_filiere,:id_prof,:id_departement,:libelle_mod,:nb_heure,:semestre,:objectif,:nature,:prerequis,:cours,:TP,:TD,:descriptif,:evaluation)";
     $res = $con->prepare($sql);
        

     $res->execute($arr);
     
          echo  "<script type='text/javascript'>document.location.replace('module.php');
alert(' bien ');
   </script>";
            }
?>

 

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
echo '<h4> <font color=black> Welcome professor'. $nom .'  , You are connected
</font> </h4> ';

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
    </script>
</head>
<!DOCTYPE html>
<html>
<head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 </head>

<body>
  
                           
     
                    <?php
                     
include 'menuP.php';

$con=mysqli_connect('localhost','root','','basecour');
                 
                 
$stat=("SELECT * FROM module m,filiere f,professeur p,departement d
WHERE m.id_prof=p.id_prof
AND m.id_filiere=f.id_filiere
AND m.id_departement=d.id_departement 
AND m.id_prof='".$id_prof."'");
$result = mysqli_query($con, $stat); 
                  
   echo ' <div class="container">

    <div class="panel panel-primary " style="width:1250px">
        <div class="panel-heading"> </div>
        <div class="panel-body">
          <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>   ';
               
     
                           echo "<table class='table table-striped table-hover'> 
                                ";
                                echo " <thead>"; 
                                  echo " <tr>"; 

                                      
                                       echo " <th>Faculty</th> ";
                                       echo " <th>Departement</th> ";
                                       echo " <th>module</th> ";
                                       echo " <th>number of hours</th> ";
                                      echo "  <th>semester</th> ";
                                      echo " <th>nature</th> ";
                                       echo " <th>prerequisite</th> ";
                                       
                                       echo " <th>course</th> ";
                                      
                                       echo " <th>TD</th> ";
                                       echo " <th>TP</th> ";
                                       echo " <th>evaluation</th> ";
                                       
                                        echo " <th>Remove</th> ";
                                       echo " <th>Add course</th> ";
                                   echo " </tr> ";
                               echo "  </thead> ";
                                 echo "<tbody> ";
                               while ($data = $result->fetch_assoc()){
                           
                             
                                       echo " <tr> "; 
                                        echo "<tbody  id='myTable'>";
                                       echo "<td>".$data['libelle_fil']."  </td>  ";
                                       echo "<td>".$data['libelle_dep']."  </td>  ";
                                      
                                       echo "<td>".$data['libelle_mod']."  </td>  ";
                                      echo "  <td>".$data['nb_heure']." </td>  ";
                                       echo " <td>".$data['semestre']." </td>  ";
                                       echo " <td>".$data['nature']."</td>  ";
                                       echo " <td>".$data['prerequis']."</td>  ";


                                    

                                       echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["cours"]).'" download > <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> ';


                                        

                                       echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["TD"]).'" download > <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> ';


                                        echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["TP"]).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> ';


                                 echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["evaluation"]).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> ';


                                         
                                      echo "<td><a href=\"module_prof.php?id_module=$data[id_module]\" onClick=\"return confirm('are you sure?')\"><i class='material-icons'>&#xe872;</i></a>
                                       </td>";
                                       echo"<td><a href=\"my_table.php?id_module=$data[id_module]\" class='btn btn-primary'>+</a></td>   ";
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
 
<?php  

 include 'connexion.php';

 if(isset($_POST['insert']))
{     
    
     $id_filiere = $_POST['id_filiere'];
     $id_departement = $_POST['id_departement'];
     $id_prof = $_POST['id_prof'];
       
    
     $libelle_mod = $_POST['libelle_mod'];
     $nb_heure = $_POST['nb_heure'];
     $semestre = $_POST['semestre'];
     $objectif = file_get_contents($_FILES['myobjectif']['tmp_name']);
     $nature = $_POST['nature'];
     $prerequis = $_POST['prerequis'];
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
     if ($res) {
          echo "";
             } else{echo "ko";}}
?>
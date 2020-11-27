
<?php
$con=mysqli_connect('localhost','root','','basecour');
//include 'menuP.php';
 
if(session_id() == '') {
session_start();
$identifiant=$_SESSION['id'];
 }
 
 $query = "SELECT * FROM etudiants e,groupe g,filiere f  WHERE CNE = '". $identifiant."'
   and  e.id_groupe= g.id_groupe
   and g.id_filiere=f.id_filiere
  ";  
           $result = mysqli_query($con, $query);  
           $data  = $result->fetch_assoc();
           if(mysqli_num_rows($result) > 0)  
           {  

    
 
            $CNE = $data['CNE'];
            $prenom = $data['prenom'];
            $nom = $data['nom'];
            $id_groupe = $data['libelle'];
            $id_filiere=$data['libelle_fil'];
         
echo '<p><font color=black> Hello Mr/Mm '. $nom.' '.$prenom.', your CNE is N°: '.$CNE.'  , You are connected in the group '.$id_groupe.' your sector is '.$id_filiere.' </font></p><br>';

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
<?php include('menu.php'); ?>

<html>
<head>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 </head>

<body>
  
                           
     
                    <?php
                     
$con=mysqli_connect('localhost','root','','basecour');
                 
                 
$stat=("SELECT * FROM module m,filiere f,professeur p,departement d , etudiants e ,groupe g
WHERE m.id_prof=p.id_prof
AND m.id_departement=d.id_departement
AND m.id_filiere=f.id_filiere
AND g.id_filiere=f.id_filiere

and e.id_groupe=g.id_groupe
AND e.CNE='".$identifiant."'
");
$result = mysqli_query($con, $stat); 
                  
   echo ' <div class="container margin-top-20">

    <div class="panel panel-primary " style="width:1200px">
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
                                       
                                       echo " <th>course</th> ";
                                       echo " <th>TD</th> ";
                                       echo " <th>TP</th> ";
                                       echo " <th>evaluation</th> ";
                                       
                                     
                                   echo " </tr> ";
                               echo "  </thead> ";
                                 echo "<tbody> ";
                               while ($data = $result->fetch_assoc()){
                           
                             
                                       echo " <tr> "; 
                                        echo "<tbody  id='myTable'>";
                                       echo "<td>".$data['libelle_fil']."  </td>  ";
                                       echo "<td>".$data['id_prof']."  </td>  ";
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
  
  
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
         
echo '<p><font color=black> Bievenue Mr/Mm '. $nom.' '.$prenom.', votre CNE est N°: '.$CNE.'  , Vous étes connecter dans le groupe '.$id_groupe.' votre filière est '.$id_filiere.' </font></p><br>';

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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
    margin: 80 auto;
    width: 90%;

}

.content {
  height: 180%;
  margin: 2em auto;
  max-width:900px;
  max-height: calc(190% - 190px);
  width: 180%;
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
<body>
  
                           
      
<?php 
  
include 'menu.php';
            
  

 
                            
$con=mysqli_connect('localhost','root','','basecour');
 
                  echo '<div class="container margin-top-20">

    <div class="panel panel-primary">
        <div class="panel-heading"> </div>
        <div class="panel-body">
          <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>  
';
                
$stat=('select id_PFE,e.CNE, pr.id_prof, pr.nom,pr.prenom, libelle_fil, libelle_cycle, sujet, Etat_davancement, rapport,video_explicative, presentation from pfe p,etudiants e,professeur pr, filiere f , cycle c
WHERE p.CNE=e.CNE
 AND e.CNE = "'. $identifiant.'"
AND p.id_prof=pr.id_prof
AND p.id_PFE=c.id_cycle
AND p.id_PFE=f.id_filiere
 
  
');
$result = mysqli_query($con, $stat); 
                           echo "<table class='table table-striped table-hover 'enctype='multipart/form-data' > 
                                ";
                                echo " <thead>"; 
                                  echo " <tr>"; 

                                      echo "  <th>CNE</th> ";
                                      echo "  <th>Name Frame</th> ";
                                      echo "  <th>First Name Framing</th> ";
                                      
                                      echo "  <th>Faculty</th> ";
                                      echo "  <th>Cycle</th> ";

                                       echo " <th>Frame</th> ";
                                      
                                       echo " <th>topic</th> ";
                                      echo "  <th>State of progress</th> ";

                                       echo " <th>report</th> ";
                                      echo "  <th>explanatory video</th> ";
                                      echo "  <th>Presentation</th> ";
                                       echo " <th>Edit</th> ";
                                   echo " </tr> ";
                               echo "  </thead> ";
                                 echo "<tbody> ";
                               while ($data = $result->fetch_assoc()){
                          
                                       echo " <tr> "; 
                                        echo "<tbody  id='myTable'>";
                                       echo "<td>".$data['CNE']."  </td>  ";
                                       echo "<td>".$data['nom']."  </td>  ";
                                       echo "<td>".$data['prenom']."  </td>  ";
                                       
                                       echo "<td>".$data['libelle_fil']."  </td>  ";
                                        echo "<td>".$data['libelle_cycle']."  </td>  ";
                                        echo "<td>".$data['nom']."  </td>  ";
                                       echo " <td>".$data['sujet']." </td>  ";

                                       echo " <td>".$data['Etat_davancement']." </td>  ";
                                     


                                       echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["rapport"]).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> '; 
                                       

                                      


                                       echo " <td><a href='watch_etudiant.php?id_PFE=$data[id_PFE]\"'>".$data['video_explicative']."


                                       </a></td>  ";
                                        

                                         echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["presentation"]).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> '; 

                                      
  echo "<td> <a href=\"update_pfe_etudiant.php?id_PFE=$data[id_PFE]\" class='btn btn-info'>déposer mon projet</a></td>";             
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
 

 
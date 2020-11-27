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
         
echo '<h4><font color=black> Hello '. $nom .'  , you are connected </font></h4><br>';

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
<body>
   
  
<?php

            
   
 
                  
include 'menuP.php';
$con=mysqli_connect('localhost','root','','basecour');             
$stat=('select e.CNE, e.nom ,e.prenom,p.sujet , rapport, Etat_davancement , video_explicative ,id_PFE, presentation from pfe p,etudiants e,professeur pr
WHERE p.CNE=e.CNE
AND p.id_prof=pr.id_prof
AND p.id_prof = "'. $id_prof.'"

 
 
');
$result = mysqli_query($con, $stat); 
                  echo '<div class="container margin-top-20">

    <div class="panel panel-primary">
        <div class="panel-heading"> </div>
        <div class="panel-body">
          <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>  
';
   
                           echo "<table class='table table-striped table-hover'> 
                                ";
                                echo " <thead>"; 
                                  echo " <tr>"; 

                                      echo "  <th>CNE</th> ";
                                      echo "  <th>student name</th> ";
                                      echo "  <th>first name student</th> ";

                                      
                                       echo " <th>topic</th> ";
                                      echo "  <th>Progress_state</th> ";

                                       
                                      echo "  <th>explanatory video</th> ";
                                      echo " <th>report</th> ";
                                      echo "  <th>presentation</th> ";
                                      echo "  <th>Student Info</th> ";
                                         echo " <th>Remove</th> ";
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
                                       echo "<td>".$data['sujet']."  </td>  "; 
                                       echo " <td>".$data['Etat_davancement']." </td>  ";
                                     
                                        echo " <td><a href='watch_pfe_prof.php?id_PFE=$data[id_PFE]\"'>".$data['video_explicative']."


                                       </a></td>  ";
                                       echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["rapport"]).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> '; 
                                       
                                        

                                         echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["presentation"]).'" > <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> ';
  
 

echo "<td><a href=\"tableauPfeProf.php?id_PFEE=$data[id_PFE]?#popup1\"><i   style='font-size:29px ;color:red'class='fa fa-user'></i></a></td>  ";
 echo "<td><a href=\"tableauPfeProf.php?id_PFE=$data[id_PFE]\" onClick=\"return confirm('vous êtes sur?')\"><i class='material-icons'>&#xe872;</i></a></td>  ";
  echo "<td> <a href=\"updatepfe_prof.php?id_PFE=$data[id_PFE]\" class='btn btn-info'>Edit subject</a></td>";           
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

<i  style="font-size:48px;color:red;" class="glyphicon glyphicon-education" data-toggle="modal" data-target="#myModal">+</i> 
</div>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title">Add end of studies project</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
         
          
<?php
 include 'connexion.php';
 $a=$id_prof;
 if(isset($_POST['ajouterpfe']))
{     
    
     $CNE = $_POST['CNE'];
     $id_prof =$a;

     $sujet = $_POST['sujet'];
     //$id_groupe = $_POST['id_groupe'];

 

     $arr = array(":CNE" => $CNE ,":id_prof" => $id_prof ,":sujet" => $sujet   );
     $sql = "INSERT INTO pfe (CNE,id_prof,sujet     )
     VALUES (  :CNE , :id_prof , :sujet  )";
     $res = $con->prepare($sql);
     
            
$res->execute($arr) ;
 
            }

         
?>

 <form  method="POST"   enctype="multipart/form-data"  >
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
         <option   value="<?php echo  $data['CNE']; ?>">  <?php echo $data['CNE']; ?></option> 
    <?php
    }
    ?>

  </select>
<br>
                <input type="text" name="sujet" class="form-control" placeholder="sujet"    autofocus="">
                <br>
 

               <br> 
               
 
<div class="input-group">
  <button class="btn btn-md btn-block submit" name="ajouterpfe" type="submit"><i class="fas fa-user-plus"></i> Add</button>
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
//including the database connection file
require 'connexion.php';
 if (isset($_GET['id_PFE'])) {
$id = $_GET['id_PFE'];
  
$sql = "DELETE from pfe WHERE id_PFE=:id";
$query = $con->prepare($sql);
$query->execute(array(':id' => $id));
 
  }
   
?>








<div id="popup1" class="overlay">
  <div class="popup">
    <h2>Students information</h2>
    <a class="close" href="#">&times;</a>
    <div class="content">




     <?php
        
     
     include 'connexion.php';
      
 if (isset($_GET['id_PFEE'])) {
$id = $_GET['id_PFEE'];
$stat=$con->prepare(' select e.CNE, e.nom ,e.prenom,e.email,e.telephone,e.date_naiss,e.adresse,e.ville ,id_PFE   from pfe p,etudiants e 
WHERE id_PFE="'.$id.'"
AND p.CNE=e.CNE
  
   ');
$stat->execute();  
 echo " <center><table class='table table-striped table-hover'> ";
                                
                                echo " <thead>"; 
                                  echo " <tr>"; 

                                       echo " <th>CNE</th> ";
                                      echo "  <th>Nom</th> ";
                                      echo "  <th>prenom</th> ";
                                      echo "  <th>E-mail</th> ";
                                       echo " <th>Phone</th>";
                                      echo "  <th>date of birth</th> ";

                                        
                                       echo " <th>Adress</th> ";
                                       echo " <th>City</th> ";

                                   echo " </tr> ";
                               echo "  </thead> ";
                                 echo "<tbody> ";

                                 while ($data = $stat->fetch()) {
                                  
                                       echo " <tr> ";
                                        echo "<td>".$data['CNE']."  </td>  ";
                                        echo "<td>".$data['nom']."  </td>  ";
                                        echo "<td>".$data['prenom']."  </td>  ";
                                        echo "<td>".$data['email']."  </td>  ";
                                        echo "<td>".$data['telephone']."  </td>  ";
                                        echo "<td>".$data['date_naiss']."  </td>  ";
                                        echo "<td>".$data['adresse']."  </td>  ";
                                        echo "<td>".$data['ville']."  </td>  ";

                                       

                             
                                   echo "</tr>";   
                          }
                              echo " </tbody> ";                            
                           echo "</table>";

}
                               
    ?>
    </div>
  </div>
</div>


 
  
<style type="text/css">
   
  

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 100px auto;
  padding: 20px;
  background: #fff;
  border-radius: 10px;
  width: 90%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
   
  .popup{
    width: 70%;
  }
}

</style>
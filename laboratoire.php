
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
                     
                    include 'blog.php';
                  
$con=mysqli_connect('localhost','root','','basecour');
                  echo '<div class="container margin-top-20">

    <div class="panel panel-primary">
        <div class="panel-heading"> </div>
        <div class="panel-body">
          <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>  
';
                
$stat=('select * from laboratoire');
$result = mysqli_query($con, $stat); 
                           echo "<table class='table table-striped table-hover'> 
                                ";
                                echo " <thead>"; 
                                  echo " <tr>"; 

                                      
                                       echo " <th>laboratory</th> ";
                                       echo " <th>field</th> ";
                                       echo " <th>CED</th> ";
                                      echo "  <th>Axe</th> ";
                                       echo " <th>Coordinator</th> ";
                                       echo " <th>goal</th>"; 

                                       echo " <th>description</th> ";
                                       
                                        echo " <th>Remove</th> ";
                                       echo " <th>Edit</th> ";
                                   echo " </tr> ";
                               echo "  </thead> ";
                                 echo "<tbody> ";
                               while ($data = $result->fetch_assoc()){
                          
                                       echo " <tr> "; 
                                        echo "<tbody  id='myTable'>";
                                      
                                       echo "<td>".$data['libelle_labo']."  </td>  ";
                                      echo "  <td>".$data['champ']." </td>  ";
                                       echo " <td>".$data['CED']."</td>  ";
                                      
                                       echo " <td>".$data['axe']." </td>  ";
                                   
                                       echo " <td>".$data['coordinateur']."</td>  ";
                                          echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["objectif"]).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> '; 
                                       echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["descriptif"]).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> '; 
                                         
                                      echo "<td><a href=\"laboratoire.php?id_labo=$data[id_labo]\" onClick=\"return confirm('are you sure?')\"><i class='material-icons'>&#xe872;</i></a></td>  ";
  echo "<td><a href=\"updatelaboratoire.php?id_labo=$data[id_labo]\"class='btn btn-info'>Edit</a> </td>  ";
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
  <div style=" margin:auto; top: 0 %; padding-left:900px;">

<i class="material-icons" style="font-size:48px;color:red;"class="btn btn-primary" data-toggle="modal" data-target="#myModal">add_circle</i> 
</div>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title">Add laboratory</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
         
             
 <form    action="laboratoire.php" method="POST"   enctype="multipart/form-data" >
               
                <input type="text" name="libelle_labo" class="form-control" placeholder="laboratoire" autofocus=""> 
                <input type="text" name="champ" class="form-control" placeholder="champ" autofocus=""> 
                <input type="text" name="axe" class="form-control" placeholder="Axe" autofocus=""> 
 
               <input type="text" name=" CED" class="form-control" placeholder=" CED" autofocus="">
            
<label>coordinateur</label>

<select name="coordinateur" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM professeur';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
         ?>    
          <option   value="<?php echo $data['nom']; ?>">  <?php echo $data['nom']; ?></option> 
    <?php
    }
    ?>
               </select>
               <br>
                 
<label  >goal   <input type="file" name="objectif"   class="form-control" placeholder="objectif"  autofocus="" accept=".pdf">
               </label>
     
  <label  >description
  <input type="file" name="myfile"    class="form-control"   accept=".pdf">      
            </label>
     
<br>
       
<br>

        
        <div class="input-group">
  <button class="btn btn-md btn-block submit btn-info" name="ajouterlab" type="submit"><i class="fas fa-user-plus"></i> Add</button>
</div> </form>
      </div>
    </div>
  </div>
  
</div>   
</body>
</html>

<?php
//including the database connection file
require 'connexion.php';
if (isset($_GET['id_labo'])) {
   
$id = $_GET['id_labo'];
  
$sql = "DELETE FROM laboratoire WHERE id_labo=:id";
$query = $con->prepare($sql);
$query->execute(array(':id' => $id));
 }
?>
<?php 
 
 include 'connexion.php';

 if(isset($_POST['ajouterlab']))
{     
    

     $libelle_labo = $_POST['libelle_labo'];
     $champ = $_POST['champ'];
     $axe = $_POST['axe'];
      $descriptif = file_get_contents($_FILES['myfile']['tmp_name']);
     $objectif = file_get_contents($_FILES['objectif']['tmp_name']);
      
     $coordinateur = $_POST['coordinateur'];
   
     
     $CED = $_POST['CED'];
     $arr = array(":libelle_labo"=>$libelle_labo,":champ" => $champ  ,":axe"=>$axe,":objectif"=>$objectif,":coordinateur"=>$coordinateur,":descriptif"=>$descriptif,":CED"=>$CED);
     $sql = "INSERT INTO laboratoire (libelle_labo, champ,axe,objectif,coordinateur,descriptif ,CED   )
     VALUES (:libelle_labo,:champ ,:axe,:objectif,:coordinateur,:descriptif,:CED)";
     $res = $con->prepare($sql);
     
$res->execute($arr); 
               }
?>
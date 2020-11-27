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
                
$stat=('select * from equipe_pedagogique d , filiere f
  WHERE d.id_filiere=f.id_filiere');
$result = mysqli_query($con, $stat); 
                           echo "<table class='table table-striped table-hover'> 
                                ";
                                echo " <thead>"; 
                                  echo " <tr>"; 

                                      
                                    
                                       echo " <th>Coordinator</th> "; 
                                         echo " <th>Faculty</th> ";
                                        echo " <th>Remove</th> ";
                                       echo " <th>Edit</th> ";
                                   echo " </tr> ";
                               echo "  </thead> ";
                                 echo "<tbody> ";
                               while ($data = $result->fetch_assoc()){
                          
                                       echo " <tr> "; 
                                        echo "<tbody  id='myTable'>";
                                      
                                      echo "  <td>".$data['coordinateur']." </td>  ";
                                        echo "<td>".$data['libelle_fil']."  </td>  ";
                                      

                                        
                                         
                                      echo "<td><a href=\"equipe_pedagogique.php?id_equipe=$data[id_equipe]\" onClick=\"return confirm('vous êtes sur?')\"><i class='material-icons'>&#xe872;</i></a></td>  ";
                              
  echo "<td><a href=\"update_equipe_pedagogique.php?id_equipe=$data[id_equipe]\" class='btn btn-info'>Edit</a></td>";             
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
          <h1 class="modal-title">Add a team</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
         
             
 <form    action="equipe_pedagogique.php" method="POST"   enctype="multipart/form-data" >
  

              
  <br>
                <input type="text" name="coordinateur" class="form-control" placeholder="coordinateur" required="" autofocus="">
  <br> 
                

              
  <label>filière</label>

<select name="id_filiere" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM filiere';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
         ?>    
     <label>Faculty</label>     <option   value="<?php echo $data['id_filiere']; ?>">  <?php echo $data['libelle_fil']; ?></option> 
    <?php
    }
    ?>

  </select>
            
 <br>

            </form>
        <div class="input-group">
  <button class="btn btn-md btn-block submit btn-info" name="ajouter" type="submit"><i class="fas fa-user-plus"></i> Add</button>
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
 if (isset($_GET['id_equipe'])) {
$id = $_GET['id_equipe'];
  
$sql = "DELETE FROM equipe_pedagogique WHERE id_equipe=:id";
$query = $con->prepare($sql);
$query->execute(array(':id' => $id));
 
  }
   
?>


<?php 
 
 include 'connexion.php';

 if(isset($_POST['ajouter']))
{     
    

     $id_filiere = $_POST['id_filiere'];
      
      
     $coordinateur = $_POST['coordinateur'];
   
     
     $arr = array( ":coordinateur"=>$coordinateur,":id_filiere"=>$id_filiere );
     $sql = "INSERT INTO equipe_pedagogique ( coordinateur,id_filiere    )
     VALUES ( :coordinateur,:id_filiere)";
     $res = $con->prepare($sql);
     
$res->execute($arr); 
               }else{
                echo "ko";
               }
?>
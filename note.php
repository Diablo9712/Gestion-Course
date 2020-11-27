
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
                
$stat=('select * from note n ,module m,etudiants e
WHERE n.id_module=m.id_module 
AND n.CNE=e.CNE
');
$result = mysqli_query($con, $stat); 
                           echo "<table class='table table-striped table-hover'> 
                                ";
                                echo " <thead>"; 
                                  echo " <tr>"; 

                                       echo " <th>CNE</th> ";
                                       echo " <th>Module</th> ";
                                      
                                       echo " <th>Normal rating</th> ";
                                       echo " <th>note Catch-up</th> ";
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
                                      
                                         
                                      echo "<td><a href=\"note.php?id_note=$data[id_note]\" onClick=\"return confirm('are you sure?')\"><i class='material-icons'>&#xe872;</i></a></td>  ";
  echo "<td><a href=\"updatenote.php?id_note=$data[id_note]\" class='btn btn-info'>Edit</a> </td>  ";
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
    
    $sql = 'SELECT * FROM etudiants';
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
    
<br><br>
            
        <!-- Modal footer -->
        <div class="input-group">
  <button class="btn btn-md btn-block submit btn-info" name="ajouternote" type="submit"><i class="fas fa-user-plus"></i> Add</button>
</div>

        
      </div>
    </div></form>
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
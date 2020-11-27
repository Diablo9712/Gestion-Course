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
                     
                    include 'blog.php';
                  
$con=mysqli_connect('localhost','root','','basecour');
                  echo '<div class="container margin-top-20">

    <div class="panel panel-primary">
        <div class="panel-heading"> </div>
        <div class="panel-body">
          <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>  
';
                
$stat=('select * from pfe p,etudiants e ,professeur pr
WHERE p.CNE=e.CNE
 
AND p.id_prof=pr.id_prof');
$result = mysqli_query($con, $stat); 
                           echo "<table class='table table-striped table-hover'> 
                                ";
                                echo " <thead>"; 
                                  echo " <tr>"; 

                                      echo "  <th>CNE</th> ";

                                       echo " <th>Frame</th> ";
                                      
                                       echo " <th>Topic</th> ";
                                      echo "  <th>State of progress</th> ";

                                       echo " <th>report</th> ";
                                      echo "  <th>explanatory video</th> ";
                                      echo "  <th>presentation</th> ";
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
                                       echo "<td>".$data['sujet']."  </td>  "; 
                                       echo " <td>".$data['Etat_davancement']." </td>  ";
                                     


                                       echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["rapport"]).'" download> <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> '; 
                                       

                                      


                                       echo " <td><a href='watch.php?id_PFE=$data[id_PFE]\"'>".$data['video_explicative']."


                                       </a></td>  ";
                                        

                                         echo '<td> <a href="data:application/pdf;base64,'.base64_encode($data["presentation"]).'" > <i class="fa fa-cloud-download" style="font-size:25px;color:red"></i> </a> </td> '; 

                                      echo "<td><a href=\"pfe.php?id_PFE=$data[id_PFE]\" onClick=\"return confirm('are you sure?')\"><i class='material-icons'>&#xe872;</i></a></td>  ";
  echo "<td> <a href=\"updatepfe.php?id_PFE=$data[id_PFE]\" class='btn btn-info'>Edit</a></td>";             
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
          <h1 class="modal-title">Add End of studies project</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
         
          
<?php
 include 'connexion.php';
 if(isset($_POST['ajouterpfe']))
{     
    
     $CNE = $_POST['CNE'];
     $id_prof = $_POST['id_prof'];

     $sujet = $_POST['sujet'];
     //$id_groupe = $_POST['id_groupe'];


   $video_explicative = $_FILES['file']['name'];
   $tmp = $_FILES['file']['tmp_name'];
     move_uploaded_file($tmp, "video/".$video_explicative);
     //$rapport = $_POST['rapport'];


     $Etat_davancement = "0%";
   
     $rapport = file_get_contents($_FILES['myfile']['tmp_name']);
     $presentation = file_get_contents($_FILES['mypresentation']['tmp_name']);

     $arr = array(":CNE" => $CNE ,":id_prof" => $id_prof ,":sujet" => $sujet ,":rapport"=>$rapport,":video_explicative"=>$video_explicative,":Etat_davancement"=>$Etat_davancement,":presentation"=>$presentation  );
     $sql = "INSERT INTO pfe (CNE,id_prof,sujet,rapport,video_explicative ,Etat_davancement,presentation    )
     VALUES (  :CNE , :id_prof , :sujet , :rapport , :video_explicative , :Etat_davancement , :presentation )";
     $res = $con->prepare($sql);
     
            
$res->execute($arr) ;
 
            }

         
?>

 <form  method="POST"   enctype="multipart/form-data"  >
               <label>CNE</label>
  <select name="CNE" class="form-control">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM etudiants';
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
<label>Encadrent</label>

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
           
           
                <input type="text" name="Etat_davancement" class="form-control" placeholder="Etat_davancement"   autofocus="">
                 
  <label >Video
   <input type="file" name="file" class="form-control" placeholder="video" accept=".mp4"  >
              </label>

<label  >Report    
   <input type="file" name="myfile"  class="form-control" placeholder="rapport"   accept=".pdf">
               </label><br>
 <center> <label  >presentation
   <input type="file" name="mypresentation"  accept=".pdf" class="form-control" placeholder="rapport"   >
              </label></center>

            <br><br>
 
 <div class="input-group">
  <button class="btn btn-md btn-block submit btn-info" name="ajouter" type="submit"><i class="fas fa-user-plus"></i> Add</button>
</div>
         
            </form>
      
        
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

 
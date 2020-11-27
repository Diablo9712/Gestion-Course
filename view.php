 


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
         
echo '<h4><font color=black> Bievenue '. $nom .'  , Vous étes connecter </font></h4><br>';

}  
 
?>

  <body>
    
            <body>
    
              <?php


 include 'menuP.php';

    

$con=mysqli_connect('localhost','root','','basecour');

                $query1 = "SELECT * from notifications  
                 where  idprof='".$id_prof."'  ";
    $r=mysqli_query($con,$query1);

            
                   echo "<table class='table table-striped table-hover'> 
                                ";
                                echo " <thead>"; 
                                  echo " <tr>"; 

                                      
                                       echo " <th>Claim</th> ";
                                       echo " <th>Date</th> ";
                                      
                                      
                                       echo " <th>Reply</th> ";
                                   echo " </tr> ";
                               echo "  </thead> ";
                                 echo "<tbody> ";

  
while ($a=$r->fetch_assoc()) {
      echo " <tr> "; 
                                        echo "<tbody  id='myTable'>";
                                       echo "<td>".$a['type']."  </td>  ";
                                       echo "<td>".$a['date_notif']."  </td>  ";
                                       echo "<td><a href='repondre.php ' ><i class='fa fa-wechat' style='font-size:36px'></i></a> </td>  ";
                                      
                                   echo "</tr>";   
                                        
 
}
     echo " </tbody> ";                            
                           echo "</table>";
  
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   
<i id="myBtn" class="fa fa-user-circle-o" style="font-size:48px;color:red"></i>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
     <?php/*
$stat=$con->prepare('SELECT * from `etudiants` where `CNE` ="'.$i['name'].'"');
$stat->execute(); 
 echo "<table class='table table-striped table-hover'> 
                                ";
                                echo " <thead>"; 
                                  echo " <tr>"; 

                                       echo " <th>Nom</th> ";
                                       echo " <th>Prenom</th> ";

                                      echo "  <th>date_naiss</th> ";
                                       echo " <th>Télephone</th>"; 
                                       echo " <th>Email</th> ";
                                       echo " <th>Adresse</th> ";
                                       echo " <th>Ville</th> ";
                                       echo " <th>CNE</th> ";
                                        echo "<th>CNI</th> ";

                                   echo " </tr> ";
                               echo "  </thead> ";
                                 echo "<tbody> ";
                               while ($data = $stat->fetch()){
                                       echo " <tr> ";
                                      echo "  <td>".$data['nom']." </td>  ";
                                        echo "<td>".$data['prenom']."  </td>  ";

                                       echo " <td>".$data['date_naiss']." </td>  ";
                                        echo "<td>".$data['telephone']." </td>  ";
                                       echo " <td>".$data['email']."</td>  ";
                                        echo "<td>".$data['adresse']." </td>  ";
                                       echo " <td>".$data['ville']."</td>  ";
                                        echo "<td>".$data['CNE']."</td>  ";
                                       echo " <td>".$data['CNI']."</td>  ";

                             
                                   echo "</tr>";   
                               
        }
                              echo " </tbody> ";                            
                           echo "</table>";


                               
 */   ?>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 

<?php
$con=mysqli_connect('localhost','root','','basecour');
 
if(session_id() == '') {
session_start();

 $id_prof=$_SESSION['id'];}
include 'menuP.php';
 $query = "SELECT * FROM professeur WHERE id_prof = '". $id_prof."' ";  
           $result = mysqli_query($con, $query);  
           $data  = $result->fetch_assoc();
           if(mysqli_num_rows($result) > 0)  
           {  
 
    
 
            $nom = $data['nom'];
         
echo '<p><font color=black> Hello professor '. $nom .'  , you are connected </font></p><br>';

}  
            ?>
  <body>
   

             

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!--Google webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  </head>
  <body>
  <section class="box">
<center>
 
    <h3>Consult your student's information!</h3> <a     href="#popup1">  
   <i style="font-size:44px ;color:red  "  class="fa fa-user"></i> </a> </center>
     <form method="POST"  class="form-inline my-2 my-lg-0 justify-content-center">
      
         <input id="etddIp" name="etddIp" type="hidden" value="<?php echo($id_prof); ?>">  
         
         <br>
    <textarea  name="reponse"   type="text" placeholder="Message"  rows="5" style="width:485px" required=""> Reply ...</textarea>
   
<center>
   <button class="button" type="submit"name="ajouter"  >Send</button></center>
    </section>
</form> 
</body>
</html>
<style type="text/css">
  @charset "utf-8";
body {
    background:url(../img/debut_light.png) fixed;
    
} 
.box {
    
    width:500px;
    height:300px;
    background:#fff;
    border-radius:8px;
    color: black;
    border-bottom:8px solid #5e95cd;
    box-shadow: 0px 0px 30px #888888;
}
 

</style>  
<style>
.button {
 background-color: #2A068A;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>


 <?php 
          $con=mysqli_connect('localhost','root','','basecour');
 
          if(isset($_POST['ajouter'])){

             $reponse=$_POST['reponse'];
            // $id_prof =$_POST['id_prof'];
             
            $sql = "UPDATE notifications
SET   reponse='$reponse' WHERE idprof='".$id_prof."' ";
            $r=mysqli_query($con,$sql);
            if ($r) {
           
echo "<script>alert('message Envoyer')</script>";
            }else{
              echo "ko";
              echo mysqli_error($con);
            }

 
          }
        
         
?> 
    </div>

</div>

<div id="popup1" class="overlay">
  <div class="popup">
    <h2>Students information</h2>
    <a class="close" href="#">&times;</a>
    <div class="content">




     <?php
     include 'connexion.php';
$stat=$con->prepare('SELECT * from notifications n ,etudiants e
 where   idprof="'.$id_prof.'"
and n.idetd=e.CNE
order by `date_notif` DESC
   ');
$stat->execute(); 
$data = $stat->fetch();
 echo " <center><table class='table table-striped table-hover'> ";
                                
                                echo " <thead>"; 
                                  echo " <tr>"; 

                                       echo " <th>CNE</th> ";
                                      echo "  <th>Nom</th> ";
                                      echo "  <th>prenom</th> ";
                                      echo "  <th>E-mail</th> ";
                                       echo " <th>Télephone</th>";
                                      echo "  <th>date_naiss</th> ";

                                        
                                       echo " <th>Adresse</th> ";
                                       echo " <th>Ville</th> ";

                                   echo " </tr> ";
                               echo "  </thead> ";
                                 echo "<tbody> ";
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
                               
                              echo " </tbody> ";                            
                           echo "</table>";


                               
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
</body>
</html>

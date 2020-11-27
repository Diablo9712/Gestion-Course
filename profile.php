  
 
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
         
echo '<p><font color=black> Hello Mr/Mm '. $nom.' '.$prenom.', your CNE is N °: '.$CNE.'  , You are connected in the group :'.$id_groupe.' your sector is'.$id_filiere.' </font></p><br>';

}
            
  

?>  


<?php

require 'connexion.php';
 
  
$sql = "SELECT * FROM etudiants WHERE   CNE = '" . $identifiant . "'";
$statement = $con->prepare($sql);
$statement->execute([':CNE' => $identifiant ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
  
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
</head>
<body>
    <?php include "menu.php"; ?>
     <!------ Include the above in your HEAD tag ---------->
 <center>
<div class="container">
    <div class="col-sm-12">
        
      <div class="col-sm-7 well margin-well">
           <center>

   <a href="Profile.php"> <i class='fas fa-user-graduate'  class="a" style='font-size:70px'></i><br><spane> </span></a>  
</center>
        <p>
        <i class="glyphicon glyphicon-user"></i> Full Name  :  <i class="ayoub"> <?= $person->nom ?> | |<?=  $person->prenom;   ?></i>
          <br>
        <i class="glyphicon glyphicon-calendar"></i> Date of Birth : <i class="ayoub"> <?= $person->date_naiss ?></i> 
          <br>
          <i class="glyphicon glyphicon-envelope"></i> E-Mail  :<i class="ayoub"> <?= $person->email ?> </i>
           <br>
          <i  class="material-icons">&#xe551;</i>  Phone : <i class="ayoub"> <?= $person->telephone ?> </i>
          <br>
          <i class="glyphicon glyphicon-info-sign"></i> CIN : <i class="ayoub"> <?= $person->CNI ?> </i>
            <br>
          <i class="glyphicon glyphicon-star"></i>  Address : <i class="ayoub"> <?= $person->adresse ?> </i>
          <br>
          <i   style="font-size:24px" class="fa">&#xf2c6;</i>  City : <i class="ayoub"> <?= $person->ville ?> </i>
          </p>
          <div class="pull-right"> 
        </div>
    </div>
  </div>
</div></center> 
</div>
</body>
</html>
 






 <style type="text/css">
 .ayoub{
  color: blue;
  
} 
 
 </style>

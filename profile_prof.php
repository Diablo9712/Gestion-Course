
 

<?php
$con=mysqli_connect('localhost','root','','basecour');
 
if(session_id() == '') {
session_start();

 $id_prof=$_SESSION['id'];}
 $query = "SELECT * FROM professeur WHERE id_prof = '". $id_prof."' ";  
           $result = mysqli_query($con, $query);  
           $data  = $result->fetch_assoc();
           if(mysqli_num_rows($result) > 0)  
           {  
 
    
 
            $nom = $data['nom'];
         
echo '<h4><font  color=black> Hello professor '. $nom .'  , you are connected </font></h4><br>';

}  
     
            
  
 
require 'connexion.php';
 
include 'menuP.php'; 
  
$sql = "SELECT * FROM professeur pr , departement d, laboratoire l  WHERE   pr.id_prof = '" . $id_prof . "'and pr.id_labo=l.id_labo and pr.id_departement=d.id_departement ";
$statement = $con->prepare($sql);
$statement->execute([':id_prof' => $id_prof ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
  


?>
  <center>
<div class="container">
    <div class="col-sm-12">
       
      <div class="col-sm-7 well margin-well">
        <p>
   <a href="profile_prof.php"><i class='fas fa-user-tie' style='font-size:70px'></i><br></a>  


        <i class="glyphicon glyphicon-user"></i> Full Name  :  <i class="ay"> <?= $person->nom ?> | |<?=  $person->prenom;   ?></i>
          <br>
        <i class="glyphicon glyphicon-calendar"></i> Date of Birth : <i class="ay"> <?= $person->date_naiss ?></i> 
          <br>
          <i class="glyphicon glyphicon-envelope"></i> E-Mail  :<i class="ay"> <?= $person->email ?> </i>
          <br>
          <i class="glyphicon glyphicon-globe"></i> Sito Web :<a href=""><i class="ay"> <?= $person->site ?> </i></a>
          <br>
          <i class="glyphicon glyphicon-info-sign"></i> CIN : <i class="ay"> <?= $person->CIN ?> </i><br>
          <i class="glyphicon glyphicon-info-sign"></i> Labor Code : <i class="ay"> <?= $person->code_travail ?> </i>
               <br>
          <i class="glyphicon glyphicon-star"></i>  Addresse : <i class="ay"> <?= $person->adresse ?> </i>
          <br>
          <i   style="font-size:24px" class="fa">&#xf2c6;</i>  City : <i class="ay"> <?= $person->ville ?> </i>

          <br>
           <i class="fa fa-cubes" style="font-size:24px"></i>  Department : <i class="ay"> <?= $person->libelle_dep ?> </i>
<br>
          <i   style="font-size:24px" class="fa">&#xf2c6;</i>  Laboratory : <i class="ay"> <?= $person->libelle_labo ?> </i>

          </p>
          <div class="pull-right"> 
        </div>
    </div>
  </div>
</div></center> 
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
 






 


 <style type="text/css">
 .ay{
  color: blue;
  
} 
 </style>
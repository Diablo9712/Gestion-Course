      
          
<?php
$con=mysqli_connect('localhost','root','','basecour');
//include 'menuP.php';
 
if(session_id() == '') {
session_start();

 $identifiant=$_SESSION['id'];
 $query = "SELECT * FROM etudiants e,groupe g  WHERE CNE = '". $identifiant."'
   and  e.id_groupe= g.id_groupe
  ";  
           $result = mysqli_query($con, $query);  
           $data  = $result->fetch_assoc();
           if(mysqli_num_rows($result) > 0)  
           {  

    
 
            $CNE = $data['CNE'];
            $prenom = $data['prenom'];
            $nom = $data['nom'];
            $id_groupe = $data['libelle'];
         
echo '<p><font color=black> Welcome Mr / Mm '. $nom.' '.$prenom.', your CNE is N °: '.$CNE.'  , You are connected in the group '.$id_groupe.'  </font></p> ';
}}
         ?>   

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
  <body>
    
       
<?php
include 'menu.php';

                 include 'connecion.php';

 $query = "SELECT * FROM notifications n , professeur pr  WHERE n.idprof=pr.id_prof and     idetd = '". $identifiant."' 
order by 
date_notif
 DESC

  ";  
           $result = mysqli_query($con, $query);  
              
                 
     
while ($data = mysqli_fetch_assoc($result)) {
 

           echo "<center>  <p id='p1'>  Your teacher ".$data['nom']. " , answered you by : <span id='p2'> ".$data['reponse']." </span> </p></center>";
        }
    ?>

      
  <section class="box">
    <center> <h3>Claim ?  </h3>
     <form method="POST"  action="reclamationinsert.php" class="form-inline my-2 my-lg-0 justify-content-center">
    

         <input id="etddId" name="etddId" type="hidden" value="<?php echo($identifiant); ?>">  
         <select name="id_prof" class="form-control"  style="width:485px">   
              
               <?php
                 
                 include 'connecion.php';
    
    $sql = 'SELECT * FROM professeur    ';
    $query = mysqli_query($con,$sql);
    while($data = mysqli_fetch_assoc($query)){
              
         ?>  
         
         <option   value="<?php echo $data['id_prof']; ?>">  <?php echo $data['nom']; ?></option> 
    <?php
    }
    ?>

  </select>
         <br>
    <textarea  name="message"   type="text" placeholder="Message"  rows="5" style="width:485px" required=""> Hello Mr ....</textarea>
   <button class="button" type="submit"name="ajouter"  >To send</button>
   </section>
</form> 
</body>
</html><style type="text/css">
  @charset "utf-8";
body {
    background:url(../img/debut_light.png) fixed;
   
   
}
#p1 {background-color: #ff8080;}
#p2 {background-color: #ffffff;}
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

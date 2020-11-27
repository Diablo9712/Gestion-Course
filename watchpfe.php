<?php 
 
 include 'menu.php';
     include 'connecion.php';
    if (isset($_GET['id_PFE'])) {
$id = $_GET['id_PFE'];
    $sql = 'SELECT video_explicative FROM pfe ';
    $query = mysqli_query($con,$sql); 
  
 
               
                 while ($data = mysqli_fetch_array($query)){
    
              $name=$data['video_explicative'];
    	 
     
   
          } 
   echo "<center> <video width='615'  controls>
	<source src='video/". $name." 'type='video/mp4'></video></center>  ";
?>
 
 

 
    <?php
    }
    ?>
     
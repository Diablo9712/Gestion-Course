<?php   //session_start();

/*if(!isset($_SESSION['database']) or $_SESSION['database']==false )
{
  

 
}*/

  $cnx= new PDO("mysql:host=localhost;dbname=basecour","root","");
 
?>
<!DOCTYPE html>
<?php

 //include('database.php');

?>
<html>
 
<body>

<?php 
//include('header.php'); 
?>
</nav>
<?php include('menuP.php'); ?>
<?php 
include('profile_prof.php'); ?>
          
</div>

</body>
</html>

  
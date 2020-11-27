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
<head>
  <?php include('inccss.php'); ?>
 
</head>
<body>

<?php 
include('headerP.php'); 
?>
</nav>
<?php include('menuP.php'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"> 
<?php 
include('table_reclame.php'); ?>
          
</div>

  <?php include('incjs.php'); ?>
</body>
</html>

  
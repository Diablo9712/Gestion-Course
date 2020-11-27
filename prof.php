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
 
</head>
<body>
<?php  session_start(); ?>
 
<?php 
include('my_table.php'); ?>
          
</div>

</body>
</html>

  
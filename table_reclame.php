<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
table {
  border-collapse: collapse;

  width: 70%;
}

th, td {
  text-align: left;
  padding: 8px;
  border-bottom: 1px solid #ddd;
}


th {
  background-color: #74b5d3;
  color: white;
}
.button {
  background-color: #4CAF50;
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
<body>
	<?php 
		$cnx= new PDO("mysql:host=localhost;dbname=basecour","root","");

		//////////////////////////////////////////////////////
		
 

 //////////////////////////////////////////////////////////////////
$req="SELECT `name`, `message`, `status`, `date` FROM `notifications`";
 $res=$cnx->query($req);

 echo '<table>';
    echo "<tr style='background-color: #74b5d3'>
				<td>Student Name</td>
				<td>Message</td>
				<td>Status</td>
				<td>Date</td>
<td></td>
			</tr>";
    
 foreach ($res->fetchAll() as $value) 
 {
 	echo "
			
 	<tr>
		 	<td>$value[0]</td>
		 	<td>$value[1]</td>
		 	<td>$value[2]</td>
		 	<td>$value[3]</td>
		 	<td> <a href='repose.php' class='button'>reply</a> </td>
		 	
		 	
		
		 </tr>";
 	
 	//echo "<br>";
 }
 echo "</table>";
 ?>


</body>
</html>
<?php
$con=mysqli_connect('localhost','root','','basecour');
$query = "SELECT id_etudiant from etudiants order by id_etudiant desc limit 1";
$result = mysqli_query($con, $query); 
$data  = $result->fetch_assoc();
$id = $data['id_etudiant'];


?>
<!DOCTYPE html>
<html>
<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default" style=" box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
					<div class="panel-heading">projet de recherche</div>
					<div class="panel-body" style="">
						<table align = "center" data-toggle="table"   data-search="true"  data-pagination="true"  >
						    <thead>
						    <tr>
						                

						        <th  data-sortable="true" ><h3><center>Topic</center></h3></th>
						        <th  data-sortable="true"><h3><center>State of progress</center></h3></th>
						        <th data-sortable="true"><h3><center>Framing</center></h3></th>


							</tr>
						    </thead>
							<tbody>

							<?php 
							 include('database.php');

							$q = "SELECT * FROM pfe
							         INNER JOIN professeur ON pfe.id_prof = professeur.id_prof
							         INNER JOIN etudiants ON pfe.id_etudiant = etudiants.id_etudiant
							         WHERE etudiants.id_etudiant = $id ";
							$r = $con -> query($q) ;
							while ($c = $r -> fetch())
							{
							?>
							<tr>
							<td> 
							<?php echo $c['sujet'] ; ?>
							</td>
							<td> 
							<?php echo $c['Etat_davancement']; ?>
							</td>
							<td> 
							<?php
								$query = "SELECT * from professeur WHERE id_prof = '".$c['id_prof']."' ";
							    $result = $con -> query($query) ;
							    $t = $result -> fetch();
							 echo $t['nom'] ; ?>
							</td>
							
                          
							</tr>	
							<?php
							}
							?>
							</tbody>
						</table>
						<form action="tableauPfe.php" method="POST">	
						<input type="file" name="file" /><br>
						<input type="submit" name="submit" value='Envoyer le rapport' />

						</form>
					</div>
				</div>
			</div>
		</div>		
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	
	</html>

<?php 
$con= new PDO("mysql:host=localhost;dbname=basecour","root","");
if(isset($_POST["submit"])){
    
    //$blob = fopen($_FILES['file']['tmp_name'],'rb');
    	


    	$sql = "UPDATE pfe
                SET rapport = :rapport
                WHERE id = '".$id."' ";

        $stmt = $con->prepare($sql);
	
        $stmt->bindParam(':rapport', $_POST['file'], PDO::PARAM_LOB);
        $stmt->bindParam(':id', $id);
        $execute = $stmt;
    
		 echo "<p style='color:green;text-align:center;'> Import successful </p>";
		 header("Location: pfe.php?id=$id&Opération=ressuite");



}
?>	
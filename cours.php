
<!DOCTYPE html>
<html>
<div class="row">
			<div class="col-lg-12 ">
				<div class="panel panel-default" style=" box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
					<div class="panel-heading">Cours</div>
					<div class="panel-body">
						<table data-toggle="table"   data-search="true"  data-pagination="true"  >
						    <thead>
						    <tr>
						                

						        
						        <th   data-sortable="true"><h3><center>Module</center></h3></th>
						        <th data-sortable="true"><h3><center>Number Hours</center></h3></th>
                                <th  data-sortable="true" ><h3><center>Course</center></h3></th>
							</tr>
						    </thead>
							<tbody>
							<?php 
							$q =  "SELECT * from module ";
							$r = $con -> query($q) ;
							while ($c = $r -> fetch_assoc())
							{
							?>
							<tr>
							<td> 
							<?php echo $c['libelle_mod'] ; ?>
							</td>
							<td> 
							<?php echo $c['nb_heure']; ?>
							</td>
							<td> 
							<?php echo $c['cours'] ; ?>
							</td>
							
                            
							<td style = "text-align:center;">
							<?php 
						echo "<a href=\"modifier_cours.php?id=".$c['id_module']."\" class=\"btn btn-warning\">Edit</span>" ;
							?>
							</td>
					

						
							<td style = "text-align:center;"> 
							<?php 
			
	
			echo "<a href=\"supprimer_cours.php?id=".$c['id_module']."\" class=\"btn btn-danger\">Remove</span>" ;
		
		
							?>
							</td>
							</tr>	
							<?php
							}
							?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>		
		<span><a href="ajouter_crs.php" class="btn btn-info col-xs-6 col-sm-4 col-lg-2" >Add Course</a></span>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	
	</html>
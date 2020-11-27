
<!DOCTYPE html>
<html>
<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default" style=" box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
					<div class="panel-heading"></div>
					<div class="panel-body" style="">
						<table align = "center" data-toggle="table"   data-search="true"  data-pagination="true"  >
						    <thead>
						    <tr>
						                

						        <th  data-sortable="true" ><h3><center>Messages</center></h3></th>
						       

							</tr>
						    </thead>
							<tbody>

							<?php 
							 include('database.php');

							$q = "SELECT * FROM notifications ";
							$r = $con -> query($q) ;
							while ($c = $r -> fetch())
					
							?>
							<tr>
							<td> 
							<?php echo $c['message'] ; ?>
							</td>
							
							
                          
							</tr>	
						</table>
							
							</tbody>
						
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





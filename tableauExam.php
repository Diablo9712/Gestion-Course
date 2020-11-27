<?php
include"database.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html>
<div class="row">
			<div class="col-lg-12">
				
					
					<div class="panel-body" style="">
						<table data-toggle="table"   data-search="true"  data-pagination="true"  >
						    <thead>
						    <tr>
						                
                   <div class="col-lg-12" >
						        <th  data-sortable="true" ><h3><center>ID</center></h3></th>
						        <th  data-sortable="true"><h3><center>File</center></h3></th>
						        <th data-sortable="true"><h3><center>Date</center></h3></th>
								<th data-sortable="true"><h3><center>Action</center></h3></th>
							</tr>
						    </thead>
							<tbody>
							<?php 
							
							$q =  "SELECT * FROM examan ORDER BY date DESC";
							       

							$r = $con -> query($q) ;
							while ($c = $r -> fetch())
							{
							?>
							<tr>
							<td> 
							<?php echo $c['id'] ; ?>
							</td>
							<td> 
							<?php echo $c['filename']; ?>
							</td>
							<td> 
							<?php echo $c['date']; ?>
							</td>
							<td class="text-center"> 
							<a href="download.php?id=<?php echo $c['id'] ; ?>"class="btn btn-primary">Download</a>
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
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	
	</html>





<?php  

    $file = $c['filename'];
    

  
        echo '<div class="-">';
            echo '<img src="file/' . $file . '" width="200" alt="' .  pathinfo($file, PATHINFO_FILENAME) .'">';
            echo '<p><a href="download.php?file=' . urlencode($file) . '">Download</a></p>';
        echo '</div>';
   
    

?>
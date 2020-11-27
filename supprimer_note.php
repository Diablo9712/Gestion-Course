<?php
	include('database.php');
	


	$q1 = "DELETE FROM note WHERE id_note = '".$_GET['id']."'";
	$r1 = $con->query($q1);

    


	

	header('location:aff_noteP.php');
?>
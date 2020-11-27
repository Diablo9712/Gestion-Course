<?php  

	include"database.php";

		$q =  "SELECT cours FROM module ";
							       

	    $r = $con -> query($q) ;
while ($c = $r -> fetch())
		{
    $file = $c['cours'];
    

 
        echo '<div class="-">';
            echo '<img src="file/' . $file . '" width="200" alt="' .  pathinfo($file, PATHINFO_FILENAME) .'">';
            echo '<p><a href="download.php?file=' . urlencode($file) . '"></a></p>';
        echo '</div>';
   
     }

?>
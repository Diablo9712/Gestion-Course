<?php

//include 'database.php';

?>
<!doctype html>
<html lang="en">
 
  </head>

  <body>
    

          <?php 
          
          if(isset($_POST['submit'])){
              $message = $_POST['message'];
              $name = $_POST['name'];
              $query ="INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES (NULL, '$name', 'comment', '$message', 'unread', CURRENT_TIMESTAMP)";
              if(performQuery($query)){
                echo "<script>alert('your claim is made successfully')</script>";

                  header("location:reclamation.php");

              }  else{
                echo "<script>alert('incorrect claim')</script>";

                  }
          }
                
          ?>

    
    
       
        <form method="post" class="form-inline my- my-lg-0 justify-content-center">
        <div class="input-group">
        

        
         
         Votre reponse:  <textarea name="message"class="form-control mr-sm-2" type="text" placeholder="Message" required=""></textarea> 
         
          <button name="submitt" class="btn btn-outline-success my-2 my-sm-0" type="submit">Envoyer</button>
        </form> 

      </div>
   

<!--<?php
          /*
          if(isset($_POST['like'])){
              $name = $_POST['name'];
              $message = $_POST['message'];
              $query ="INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES (NULL, '$name','$message', 'like', '', 'unread', CURRENT_TIMESTAMP)";
              if ($query) {
                echo "<script>alert('votre réclamation est faite avec succès')</script>";
                
              }
              if(performQuery($query)){
                  header("location:ind.php");
              }
          }
          
         */ ?>
         <form method="post" class="form-inline my-2 my-lg-0">
          <input name="name" class="form-control mr-sm-2" type="text" placeholder="Name" required>
          <button name="like" class="btn btn-outline-success my-2 my-sm-0" type="submit">Like  </button>
        </form>-->
        
        
      
     

     <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/chart.min.js"></script>
  <script src="js/chart-data.js"></script>
  <script src="js/easypiechart.js"></script>
  <script src="js/easypiechart-data.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  
  </body>
</html>

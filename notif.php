 
<?php
$con=mysqli_connect('localhost','root','','basecour');
//include 'menuP.php';
 
if(session_id() == '') {
session_start();

 $id_prof=$_SESSION['id'];
include 'menuP.php';
 $query = "SELECT * FROM professeur WHERE id_prof = '". $id_prof."' ";  
           $result = mysqli_query($con, $query);  
           $data  = $result->fetch_assoc();
           if(mysqli_num_rows($result) > 0)  
           {  
            $nom = $data['nom'];
         
echo '<p><font color=black> Hello '. $nom .'  , you are connected </font></p><br>';

}
            }
            ////////////////////////////////

            ////////////////////////////////

  

?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body>
   


<nav class="navbar navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="material-icons" style="font-size:35px;color:red">&#xe159;</i>
                <?php
                $query = "SELECT * from `notification` where `status` = 'unread' order by `date_notif` DESC";
                if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
              <?php
                }

                    ?> 

              </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php
                $query = "SELECT * from `notification` order by `date_notif` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
              <a style ="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="view.php?id=<?php echo $i['id'] ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date_notif'])) ?></i></small><br/>
                  <?php 
                  
                if($i['type']=='comment'){
                    echo "Nouvelle réclamation!!";
                }else if($i['type']=='like'){
                    echo ucfirst($i['name'])." liked your post.";
                }
                  
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "No Records yet.";
                 }
                     ?>
            </div>
          </li>
        </ul>
       <?php 
           /*
          if(isset($_POST['submit'])){
              $message = $_POST['message'];
              $query ="INSERT INTO `notification` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES (NULL, '', 'comment', '$message', 'unread', CURRENT_TIMESTAMP)";
              if(performQuery($query)){
                  header("location:ind.php");
              }
          }
                
          ?> </div>
    </nav>
    <br><br><br><br>
       <center> <form method="post" class="form-inline my-2 my-lg-0">
          <input name="message"class="form-control mr-sm-2" type="text" placeholder="Message" required>
          <button name="submit" class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit</button>
        </form>  </center>
          <?php
          
          if(isset($_POST['like'])){
              $name = $_POST['name'];
              $query ="INSERT INTO `notification` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES (NULL, '$name', 'like', '', 'unread', CURRENT_TIMESTAMP)";
              if(performQuery($query)){
                  header("location:ind.php");
              }
          }
          
          */?>
       <!-- <form method="post" class="form-inline my-2 my-lg-0">
          <input name="name" class="form-control mr-sm-2" type="text" placeholder="Name" required>
          <button name="like" class="btn btn-outline-success my-2 my-sm-0" type="submit">Like  </button>
        </form>-->
     
 

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<style type="text/css">
.navbar {
  color: red;
    margin: 0 auto;
    width: 80%;
}
</style>


 <?php 
          include 'connexion.php';

     
          if(isset($_POST['ajouter'])){
            $message=$_POST['message'];
       $id_prof=$_POST['id_prof'];
       $status="unread";
       $type="comment";
            echo "<center>".$id_prof."</center>";
     $arr = array(":message" => $message , ":id_prof" => $id_prof ,":type" => $type,":status" => $status);
     $sql = "INSERT INTO notifications (type,message,status,date_notif, id_prof)
     VALUES (:message,:id_prof,:type,:status ,:now())";
     $res = $con->prepare($sql);

     $res->execute($arr);
     if ($res==1) {

                echo "<script>alert('your claim is made successfully')</script>";

                  header("location:ind.php");

              }  else{
                echo "<script>alert('incorrect claim')</script>";

                  }
          }
                
          ?>
 
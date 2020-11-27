
 <?php 
          $con=mysqli_connect('localhost','root','','basecour');
 
          if(isset($_POST['ajouter'])){

             $message=$_POST['message'];
             $id_prof =$_POST['id_prof'];
             $status="unread";
             $type="comment";
             $id_etudiant=$_POST['etddId'];
        //    echo($id_etudiant . '  '.$id_prof);
             
            $sql = "INSERT INTO notifications (id,type,message,status,idprof,idetd,date_notif) VALUES (null,'$message','$type','$status','$id_prof','$id_etudiant', CURRENT_TIMESTAMP)";
            $r=mysqli_query($con,$sql);
            if ($r) {
 
   
   echo  "<script type='text/javascript'>document.location.replace('ind.php');
alert('Envoyé ');
   </script>";     
            }else{
              echo "ko";
              echo mysqli_error($con);
            }


           // $res = $con->prepare($sql);
            // echo($id_prof);
            // echo($id_etudiant);
            //$res->execute(array_values($arr));

     // if ($res) {

     //            echo "<script>alert('votre réclamation est faite avec succès')</script>";

     //              header("location:ind.php");

     //          }  else{
     //            echo "<script>alert('réclamation incorrecte')</script>";

     //              }
          }
                
          ?>
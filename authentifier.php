 <?php 
session_start();
 $con=mysqli_connect('localhost','root','','basecour');


 if(isset($_POST['valider']))
{

          
           $email = mysqli_real_escape_string($con, $_POST["email"]);
          
           $password = mysqli_real_escape_string($con, $_POST["password"]);

           
          // $password = password_hash('ayoub123', PASSWORD_DEFAULT);  
           

        $query = "SELECT * FROM etudiants WHERE email = '$email' AND password='$password' ";  
           $result = mysqli_query($con, $query);  
           $data  = $result->fetch_assoc();

           $queryp = "SELECT * FROM professeur WHERE email = '$email'  AND password='$password' ";  
           $resultp = mysqli_query($con, $queryp);  
           $datap  = $resultp->fetch_assoc();

                if(mysqli_num_rows($resultp) ==1)  
             {  
              
                                                              }
                              $_SESSION['email'] = $data['email'];
                              $_SESSION['id'] = $datap['id_prof'];
                           
                            //header('location:prof.php?id='. $_SESSION['id'].'');
                            header('location:profile_prof.php?id='. $_SESSION['id'].'');
                         
                }  

   
            if(mysqli_num_rows($result) ==1 )  
             {  
              
                  $_SESSION['email'] = $data['email'];
                  $_SESSION['id'] = $data['CNE'];
               
                header('location:profile.php?id='. $_SESSION['id'].'');
             }
                
             
          
 ?>  

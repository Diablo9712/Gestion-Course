 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
</script>
</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 
    <div id="logreg-forms">
        <form class="form-signin" action="authentifier.php" method="POST">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">log in</h1>
             
            <div class="input-group">
            
              <input type="text" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
            </div>

            <div class="input-group">
              <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>

            <div class="input-group">
              <button class="btn btn-md btn-rounded btn-block form-control submit" name="valider"  type="submit"><i class="fas fa-sign-in-alt"></i> Authenticate</button>
            </div>
 
            <a href="#" id="forgot_pswd">Forgot password?</a>
            <hr>
            <!-- <p>Don't have an account!</p>  -->
             
            </form>

       
      
      <form action="#" class="form-reset">
                <input type="Email" id="Email" class="form-control" placeholder="Email" required="" autofocus="">
                <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
                <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>
            </form>

           
<?php 
 include 'connexion.php';

                
 if(isset($_POST['insert']))
{     
    
            $nom = $_POST['nom'];
     $date_naiss = $_POST['date_naiss'];
     $telephone = $_POST['telephone'];
     $adresse = $_POST['adresse'];
     $prenom = $_POST['prenom'];
     $ville = $_POST['ville'];
     $CNE = $_POST['CNE'];

     $CNI = $_POST['CNI']; 
     $CV = file_get_contents($_FILES['myfile']['tmp_name']);
       $email = $_POST["email"];  
     $password=$_POST["password"];
    //  $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
     
      
     $arr = array(":nom" => $nom ,":date_naiss"=>$date_naiss,":telephone"=>$telephone,":email"=>$email,":adresse"=>$adresse,":prenom"=>$prenom,":ville"=>$ville,":CNE"=>$CNE,":CNI"=>$CNI,":CV"=>$CV,":password"=>$password);
     $sql = "INSERT INTO etudiants (nom,date_naiss,telephone,email,adresse,prenom,ville,CNE,CNI,CV,password )
     VALUES (:nom,:date_naiss,:telephone,:email,:adresse,:prenom,:ville,:CNE,:CNI,:CV,:password)";
     $res = $con->prepare($sql);
     //$res=bindParam($CV);

     $res->execute($arr);
     if ($res) {
       header('location:afficheProfile.php');
     }
     }
?>
 
 <form class="form-signup"   method="POST" enctype="multipart/form-data" >
                 
                <p style="text-align:center">OR</p>

                <input type="text" name="nom" class="form-control" placeholder="Nom" required="" autofocus="">
                

                <input type="text" name="prenom" class="form-control" placeholder="Prénom" required autofocus="">
              
               <input type="date" name="date_naiss" class="form-control" placeholder="date_naissance" required autofocus="">
                <input type="text" name="telephone" class="form-control" placeholder="Téléphone" required autofocus="">
                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus="">
                <input type="text" name="adresse" class="form-control" placeholder="Adresse" required autofocus="">
               <input type="text" name="ville" class="form-control" placeholder="Ville" required autofocus="">
                <input type="text" name="CNE" class="form-control" placeholder="CNE" required autofocus="">
              <input type="text" name="CNI" class="form-control" placeholder="CNI" required autofocus="">
              <i>CV</i> <input type="file" name="myfile" class="form-control" placeholder="CV"  autofocus="" accept=".pdf">
              <input type="password" name="password" class="form-control" placeholder="Password" required autofocus="">
 
<div class="input-group">
  <button class="btn btn-md btn-block submit" name="insert" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
</div>

                <a href="#" id="cancel_signup"><i class="fa fa-angle-left"></i> Back</a>
            </form>
            <br>

    </div>
            </div>
        </div>
    </div>
</div>
 
  
</body>
</html>                            
  <script type="text/javascript">
        function toggleResetPswd(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle() // display:block or none
    $('#logreg-forms .form-reset').toggle() // display:block or none
}

function toggleSignUp(e){
    e.preventDefault();
    $('#logreg-forms .form-signin').toggle(); // display:block or none
    $('#logreg-forms .form-signup').toggle(); // display:block or none
}

$(()=>{
    // Login Register Form
    $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
    $('#logreg-forms #cancel_reset').click(toggleResetPswd);
    $('#logreg-forms #btn-signup').click(toggleSignUp);
    $('#logreg-forms #cancel_signup').click(toggleSignUp);
})
    </script>
       <style type="text/css">
        body{
  width: 100%;
  height: auto;
  background: -webkit-linear-gradient(0deg, #ffffff 0%, #ffffff 100%);
  font-family: "Robato",sans-serif;
  font-size: 17px;
}

#logreg-forms{
    width:412px;
    margin:10vh auto;
    background-color:#ffffff4d;
    box-shadow: 0 7px 7px rgba(0, 0, 0, 0.12), 0 12px 40px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}

#logreg-forms form {
    width: 100%;
    max-width: 410px;
    padding: 15px;
    margin: auto;
}
#logreg-forms .form-control {
    position: relative;
    box-sizing: border-box;
    height: auto;
    padding: 10px;
    font-size: 16px;
}
#logreg-forms .form-control:focus { z-index: 2; }
#logreg-forms .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}
#logreg-forms .form-signin input[type="password"] {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

#logreg-forms .social-login{
    width:390px;
    margin:0 auto;
    margin-bottom: 14px;
}
#logreg-forms .social-btn{
    font-weight: 100;
    color:white;
    width:190px;
    font-size: 0.9rem;
}

#logreg-forms a{
    display: block;
    padding-top:10px;
    color:##000000;
}

#logreg-form .lines{
    width:200px;
    border:1px solid red;
}


#logreg-forms button[type="submit"]{ margin-top:10px; }

#logreg-forms .facebook-btn{  background-color:#3C589C; }

#logreg-forms .google-btn{ background-color: #DF4B3B; }

#logreg-forms .form-reset, #logreg-forms .form-signup{ display: none; }

#logreg-forms .form-signup .social-btn{ width:210px; }

#logreg-forms .form-signup input { margin-bottom: 2px;}

.form-signup .social-login{
    width:210px !important;
    margin: 0 auto;
}

.submit{
  background: -webkit-linear-gradient(0deg,  #2dfbff 0%, #3c96ff 100%);
  border-radius: 25px;
  color: #fff;
}

/* Mobile */

@media screen and (max-width:500px){
    #logreg-forms{
        width:300px;
    }

    #logreg-forms  .social-login{
        width:200px;
        margin:0 auto;
        margin-bottom: 10px;
    }
    #logreg-forms  .social-btn{
        font-size: 1.3rem;
        font-weight: 100;
        color:white;
        width:200px;
        height: 56px;

    }
    #logreg-forms .social-btn:nth-child(1){
        margin-bottom: 5px;
    }
    #logreg-forms .social-btn span{
        display: none;
    }
     

}
    </style>
    
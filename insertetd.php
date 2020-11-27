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
     $id_groupe = $_POST['id_groupe']; 
     $CV = file_get_contents($_FILES['myfile']['tmp_name']);

   $tmp = $_FILES['myfile']['tmp_name'];
     move_uploaded_file($tmp, "cv/".$CV);
       $email = $_POST["email"];  
     $password=$_POST["password"];
    //  $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));AND
$stmt = $con->prepare("SELECT * FROM etudiants WHERE email=? or CNE=? or password=?");
$stmt->execute(array($_POST['email'],$_POST['CNE'],$_POST['password']));
if ( $user1 = $stmt->fetch()){
  
   
   echo  "<script type='text/javascript'>document.location.replace('Etudiant.php');
alert(' There is already a person using the information you have entered');
   </script>";

  }
  else{
    
      
     $arr = array(":nom" => $nom ,":date_naiss"=>$date_naiss,":telephone"=>$telephone,":email"=>$email,":adresse"=>$adresse,":prenom"=>$prenom,":ville"=>$ville,":CNE"=>$CNE,":CNI"=>$CNI,":id_groupe"=>$id_groupe,":CV"=>$CV,":password"=>$password);
     $sql = "INSERT INTO etudiants (nom,date_naiss,telephone,email,adresse,prenom,ville,CNE,CNI,id_groupe,CV,password )
     VALUES (:nom,:date_naiss,:telephone,:email,:adresse,:prenom,:ville,:CNE,:CNI,:id_groupe,:CV,:password)";
     $res = $con->prepare($sql);
     //$res=bindParam($CV);

     $res->execute($arr); 

    header('location:Etudiant.php');
   
}  
     }
?>
 
 
<?php 

 include 'connexion.php';
 if(isset($_POST['insert']))
{    
     $password = $_POST['password'];

    //  $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
     
     $nom = $_POST['nom'];
     $date_naiss = $_POST['date_naiss'];
     $telephone = $_POST['telephone'];
     $email = $_POST['email'];
     $adresse = $_POST['adresse'];
     $prenom = $_POST['prenom'];
     $ville = $_POST['ville'];
     $CIN = $_POST['CIN']; 
     $CV = file_get_contents($_FILES['myfile']['tmp_name']);
     
    
     $grade = $_POST['grade'];
     $password = $_POST['password'];
     $site = $_POST['site'];
     $ordre = $_POST['ordre'];
     $code_travail = $_POST['code_travail'];
     $id_departement = $_POST['id_departement'];
     $id_labo = $_POST['id_labo'];

     $stmt = $con->prepare("SELECT * FROM professeur WHERE email=? or code_travail=? or password=? or CIN=?");
$stmt->execute(array($_POST['email'],$_POST['code_travail'],$_POST['password'],$_POST['CIN']));
if ( $user1 = $stmt->fetch()){
   // header('location:professeur.php');
  
   
   echo  "<script type='text/javascript'>document.location.replace('professeur.php');
alert(' There is already a person using the information you have entered ');
   </script>";
   
  }
  else{

     $arr = array(":nom" => $nom ,":date_naiss"=>$date_naiss,":telephone"=>$telephone,":email"=>$email,":adresse"=>$adresse,":prenom"=>$prenom,":ville"=>$ville,":CIN"=>$CIN,":CV"=>$CV,":password"=>$password,":grade"=>$grade,":site"=>$site,":ordre"=>$ordre,":id_departement"=>$id_departement,":id_labo"=>$id_labo,":code_travail"=>$code_travail);
     $sql = "INSERT INTO professeur (nom,date_naiss,telephone,email,adresse,prenom,ville,CIN,CV,password,grade ,site ,ordre,id_departement,id_labo , code_travail )
     VALUES (:nom,:date_naiss,:telephone,:email,:adresse,:prenom,:ville,:CIN,:CV,:password,:grade,:site,:ordre,:id_departement,:id_labo,:code_travail)";
     $res = $con->prepare($sql);
     //$res=bindParam($CV);

     $res->execute($arr);

    header('location:professeur.php');
     }
   
}
?> 
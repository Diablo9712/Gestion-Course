
<!DOCTYPE html>
<html>
<head>
		<title> Mon profile Professeur </title>
		<link href="stylesheets/styleperso.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<form action="profile.php" method="POST">
<div class="form-style-10">
<?php

/*session_start();
//include("database.php");
$con=mysqli_connect('localhost','root','','basecour');
//include("authentifier.php");

$identifiant = $_GET['id'];*/
 

 $query = "SELECT * FROM professeur ";  
           $result = mysqli_query($con, $query);  
           $data  = $result->fetch_assoc();
           if(mysqli_num_rows($result) > 0)  
           {  
           	$nom = $data['nom'];
  			$email = $data['email'];
			$prenom =  $data['prenom'] ;
			$telephone = $data['telephone'];   
			$date_naiss =  $data['date_naiss'] ;
			$adresse = $data['adresse']; 
			$ville = $data['ville']; 
			$code_travail= $data['code_travail']; 
			$grade = $data['grade']; 
			$CIN =  $data['CIN']; 
           	}
     echo '<p><font color=black> Hello '. $nom .'  , you are connected </font></p><br>';
	

    ?>


<div class="section"><span>1</span></div>
    <div class="inner-wrap">
      <label for='Actuel'> Current Password </label> <input type="password" name="oldpass" placeholder="Ancien mot de passe" /> <br>
<label for='new'>New Password</label> <input type="password" name="pass" placeholder=" Nouveau mot de passe" /> <br>

    </div>

<div class="section"><span>2</span>Personal informations</div>
<label for='email'>Email</label> <input type="email" name="email" value=<?php echo $email ?> /> <br>
<label for='Societe'> Last name </label> <input type="text" name="nom" value=<?php echo $nom ?> /> <br>
<label for='Contact'> First name </label> <input type="text" name="prenom" value=<?php echo $prenom ?> /> <br>
<label for='Fonction'> Date of Birth </label> <input type="text" name="date_naiss" value=<?php echo $date_naiss ?> /> <br>
<label for='Adresse'> Addresse </label> <input type="text" name="Adresse" value=<?php echo $adresse ?> /> <br>
<label for='Ville'> City </label> <input type="text" name="Ville" value=<?php echo $ville ?> /> <br>
<label for='Region'>Grade</label> <input type="text" name="grade" value=<?php echo $grade ?> /> <br>
<label for='Pays'> CIN </label> <input type="text" name="CNI" value=<?php echo $CIN ?> /> <br>
<label for='Tel'> Phone </label> <input type="text" name="Telephone" value=<?php echo $telephone ?> /> <br>

<input style="background-color:green;" type="submit" value="Modifier" name="update"/> <input type="submit" name="retour" value="Retour">

</div>
</form>

</body>
		
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
</html>

<?php
$con=mysqli_connect('localhost','root','','basecour');

if(isset($_POST['update']))
{
 $identifiant = $_POST['id'];
	
				if(isset($_POST['email']))
			{
						
				//verification Email
				$email_valide = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
				if(preg_match($email_valide , $_POST['email']))
							{
								
							    $req="UPDATE professeur SET email = '". $_POST['email'] . "' WHERE id_prof = $prof ";
								      
								 mysqli_query($con,$req); header("Location: profileProf.php?id=$identifiant");


								 echo  "<p style='color:green;text-align:center;'>Email is successfully changed </p>";
								
							}
							else
							{
								echo  ' <div align=center ><font color="red"> your email Is not valid </font></div>' ;
								
							}
			}


			if (isset($_POST['nom'])) {
				 $req = "UPDATE professeur SET nom = '". $_POST['nom'] . "' WHERE id_prof = '" . $identifiant . "' ";
				         
				 mysqli_query($con,$req); header("Location: profileProf.php?id=$identifiant");


				 echo  "<p style='color:green;text-align:center;'> Votre nom est modfié avec succès </p>";
			}

			if (isset($_POST['prenom'])) {
				 $req = "UPDATE professeur SET prenom = '". $_POST['prenom'] . "' WHERE id_prof = '" . $identifiant . "' ";
				         
				 mysqli_query($con,$req); header("Location: profileProf.php?id=$identifiant");


				 echo  "<p style='color:green;text-align:center;'> Votre prenom est modfié avec succès </p>";
			}

			if (isset($_POST['date_naiss'])) {
				 $req = "UPDATE Professeur SET date_naiss = '". $_POST['date_naiss'] . "' WHERE id_prof = '" . $identifiant . "' ";
				         
				 mysqli_query($con,$req); header("Location: profileProf.php?id=$identifiant");


				 echo  "<p style='color:green;text-align:center;'> Votre date de naissance est modfié avec succès </p>";
			}

			if (isset($_POST['Adresse'])) {
				 $req = "UPDATE professeur SET Adresse = '". $_POST['Adresse'] . "' WHERE id_prof = '" . $identifiant . "' ";
				         
				 mysqli_query($con,$req); header("Location: profileProf.php?id=$identifiant");


				 echo  "<p style='color:green;text-align:center;'> Votre adresse est modfié avec succès </p>";
			}

			if (isset($_POST['Ville'])) {
				 $req = "UPDATE professeur SET ville = '". $_POST['Ville'] . "' WHERE id_prof = '" . $identifiant . "' ";
				         
				 mysqli_query($con,$req); header("Location: profileProf.php?id=$identifiant");


				 echo  "<p style='color:green;text-align:center;'> Votre ville est modfié avec succès </p>";
			}

			if (isset($_POST['grade'])) {
				 $req = "UPDATE professeur SET grade = '". $_POST['grade'] . "' WHERE id_prof = '" . $identifiant . "' ";
				         
				 mysqli_query($con,$req); header("Location: profileProf.php?id=$identifiant");


				 echo  "<p style='color:green;text-align:center;'> Votre grade est modfié avec succès </p>";
			}

			if (isset($_POST['CNI'])) {
				 $req = "UPDATE professeur SET grade = '". $_POST['grade'] . "' WHERE id_prof = '" . $identifiant . "' ";
				         
				 mysqli_query($con,$req); header("Location: profileProf.php?id=$identifiant");


				 echo  "<p style='color:green;text-align:center;'> Votre grade est modfié avec succès </p>";
			}

	

			if (isset($_POST['telephone'])) {
				 $req = "UPDATE professeur SET telephone = '". $_POST['telephone'] . "' WHERE id_prof= '" . $identifiant . "' ";
				         
				 mysqli_query($con,$req); header("Location: profileProf.php?id=$identifiant");


				 echo  "<p style='color:green;text-align:center;'> Votre numéro de téléphone est modfié avec succès </p>";
			}

			
}





?>	

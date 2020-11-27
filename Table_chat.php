<?php 
session_start();
 $identifiant=$_SESSION['id'];
 ?>

<?php 
$cnx= new PDO("mysql:host=localhost;dbname=basecour","root","");

$con=mysqli_connect('localhost','root','','basecour');

 $identifiant=$_SESSION['id'];
include 'menuP.php';
 $query = "SELECT * FROM professeur WHERE id_prof = '". $identifiant."' ";  
           $result = mysqli_query($con, $query);  
           $data  = $result->fetch_assoc();

if(isset($_POST['message']) AND !empty($_POST['message']))
 {
 $pseudo=htmlspecialchars($data['nom']);
 $message=htmlspecialchars($_POST['message']);
 $insertmsg=$cnx->prepare('INSERT INTO chat(pseudo,message) VALUES (?,?)');
 $insertmsg->execute(array($pseudo,$message));
 }

 /*if(isset($_POST['pseudo']) AND isset($_POST['message']) AND !empty($_POST['pseudo']) AND !empty($_POST['message']))
 {
 $pseudo=htmlspecialchars($_POST['pseudo']);
 $message=htmlspecialchars($_POST['message']);
 $insertmsg=$cnx->prepare('INSERT INTO chat(pseudo,message) VALUES (?,?)');
 $insertmsg->execute(array($pseudo,$message));
 }*/
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style>
		body
		{
margin: 0;
overflow: hidden;
font-family:'Lucida Sans','Lucida Sans Regular','Lucida Grande','Lucida Sans Unicode',Geneva,Verdana,sans serif;
		}
#messages{
	height: 88vh;
	overflow-x: hidden;
	padding: 10px;
	background-image: url(image.png)
}
form{
	display: flex
}
input {
	font-size: 1.2rem;
padding: 10px;
margin: 10px 5px;
appearance: none;
-webkit-appearance:none;
border: 1px solid #ccc;
border-radius: 5px
}
</style>
</head>
<body>
	<div id="messages">
<form method="post" action="" >
<!--<input type="text" name="pseudo" value="<?php //if(isset($pseudo)){echo $pseudo; } ?>" placeholder="PSEUDO" ><br/>-->
<!--<input type="text" name="pseudo" value="<?php //$data['nom']; ?>" placeholder="PSEUDO" ><br/>-->
<textarea type="text" name="message" placeholder="MESSAGE"></textarea><br/>

<input type="submit" value="Envoyer" />
</form>
<?php 
$allmsg=$cnx->query('SELECT * FROM chat ORDER BY id ');
while ($msg = $allmsg->fetch()) 
{
?>
<b><?php echo $msg['pseudo'] ?> :</b><?php echo $msg['message'] ?><br/>
<?php 
}
 ?>
 </div>
</body>
</html>
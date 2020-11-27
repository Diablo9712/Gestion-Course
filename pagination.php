	<?php 
	$objPDO = new PDO("mysql:host=localhost;dbname=basecour","root","");
	$videoParPage=5;
	$videosTotalesReq=$objPDO->query('SELECT COUNT( id_module) FROM module');
$VideosTotales=$videosTotalesReq;

if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page']>0)
{
	$_GET['page']=intval($_GET['page']);
	$pageCourante=$_GET['page'];
}
else
{
	$pageCourante=1;
	
}
//echo $pageCourante;
$depart=($pageCourante-1)*$videoParPage;
	 ?>
<!DOCTYPE html>

<html>
<head>

	<title></title>

</head>
<body>s
<?php 
include 'blog.php';
$videos=$objPDO->query('SELECT id_module,libelle_mod FROM module ORDER BY id_module DESC LIMIT '.$depart.','.$videoParPage);
while ($vid = $videos->fetch(PDO::FETCH_ASSOC)) 
{
?>
<b>N°<?php echo $vid['id_module']; ?> - <?php echo $vid['libelle_mod']; ?>
	
</b><br/>
<i><?php echo $vid['libelle_mod']; ?></i>
<br/><br/>
<?php 
}
 ?>
 <?php 
 for($i=1;$i<=$pagesTotales;$i++)
echo '<a href="pagination.php?page'.$i.'">'.$i.'</a>';
  ?>
 <br/><br/><br/>


</body>
</html>
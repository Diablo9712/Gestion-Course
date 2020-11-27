<?php   session_start();

if(!isset($_SESSION['database']) or $_SESSION['database']==false )
{
  


}





$i=1;
 
?>
<!DOCTYPE html>
<?php
  //session_start();
  include('database.php');
?>


<html>
<head>
	
	



<link href="LoginCss/style.css" rel="stylesheet">



<link rel="stylesheet" href="assets/signup-form.css" type="text/css" />

        <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="./css/prettify-1.0.css" rel="stylesheet">
        <link href="./css/base.css" rel="stylesheet">
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
            <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<!--Icons-->
<?php include('inccss.php'); ?>
</head>



<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<?php include('headerP.php'); ?>
</nav>

				
	<?php include('menuP.php'); ?>		
<div class="col-sm-8 col-sm-offset-3 col-lg-offset-2 main"> 
	

    <div class="signup-form-container  " style=" box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);" >
<?php


if(isset($_POST['btn']))
{

  if(empty($_POST['cours']) and empty($_POST['heure'])) 
 {
  
echo '<div class="alert bg-danger" role="alert">
          <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> A field is empty!<a  class="pull-right" aria-hidden="true"></a>
        </div>';  

        
 }else
 {


      
  $sql2 = 'INSERT INTO module VALUES ("","'.$_POST['cours'].'","'.$_POST['heure'].'")'; 
 
   $con->query($sql2);        
 
echo '<div class="alert bg-success" role="alert">
          <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Your module is well registered! <a href="#" class="pull-right"></a>
        </div>'; 
 } 
}






?>








    
         <!-- form start -->
         <form   enctype="multipart/form-data"  method="post">
         
         <div class="form-header " >
         	<h3 class="form-title"><i class="fa fa-user"></i> Classes </h3>
                      
         <div class="pull-right">
             <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
         </div>
                      
         </div>
                  
         <div class="form-body">
         
         	  <div class="alert alert-info" id="message" style="display:none;">
              No Save
              </div>

              <div class="row ">

              <div class="form-group" >
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></div>
                   <input name="cours"  class="form-control" type="text" placeholder="Cours">
                   </div>
                   <span class="help-block" id="error"></span>
              </div>

                      
            <div class="form-group" >
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></div>
                   <input name="heure"  class="form-control" type="number" min="0" max="100" placeholder="Nombre Heures">
                   </div>
                   <span class="help-block" id="error"></span>
              </div>               
             
              </div>
<br> <br> <br>
              </table>
            <form action="tableauPfe.php" method="POST">  
            <input type="file" name="file" /><br>
            <input type="submit" name="submit" value='Envoyer le cours' />
            
            <div class="form-footer">
                 <button type="submit" class="btn btn-info" name="btn">
                 <span class="glyphicon glyphicon-log-in"></span> Save
                 </button>
            </div>
           

            </form>

           
           </div>
 </div>
    
    

  <?php include('script_acc.php'); ?>   

	
</body>
</html>
<?php 
$con= new PDO("mysql:host=localhost;dbname=basecour","root","");
if(isset($_POST["submit"]))
{
    
    //$blob = fopen($_FILES['file']['tmp_name'],'rb');
      


      $sql = "UPDATE module
                SET cours = :cours
                WHERE id = '".$id."' ";

        $stmt = $con->prepare($sql);
  
        $stmt->bindParam(':rapport', $_POST['file'], PDO::PARAM_LOB);
        $stmt->bindParam(':id', $id);
        $execute = $stmt;
    
     echo "<p style='color:green;text-align:center;'> Import successful</p>";
     header("Location: pfe.php?id=$id&Opération=ressuite");



}
?>  
	
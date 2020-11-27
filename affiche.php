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
	
	



<link href="stylesheets/style.css" rel="stylesheets">



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
<?php include('header.php'); ?>
</nav>

				
	<?php include('menu.php'); ?>		
<div class="col-sm-8 col-sm-offset-3 col-lg-offset-2 main"> 
	

    <div class="signup-form-container  " style=" box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);" >
    
         <!-- form start -->
         
         
         <div class="form-header " >
         	<h3 class="form-title"><i class="fa fa-user"></i> Note </h3>
                      
         <div class="pull-right">
             <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
         </div>
                      
         </div>
                  
         <div class="form-body">
         
         	  <div class="alert alert-info" id="message" style="display:none;">
             
              </div>

              <div class="row ">   
                   <div class="form-group col-lg-6">
                <div class='input-group date' id='datetimepicker'>
                                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <input type='text' class="form-control" />

                </div>
            </div>
        

               
                       
                   <div class="form-group col-lg-6">
                        <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-book"></span></div>
                         <select class="form-control"  name="module">
                          <option selected >Modules</option>

                                     <?php
                                       $sql = "SELECT * FROM module"; 
                                       $result=$bdd->query($sql);  

                                       $data=$result->fetchAll(PDO::FETCH_ASSOC);
                                      foreach ($data as $donne){
                                      
                                              
                                                       ?>
                                       <option value="<?php echo $donne['id_module']; ?>"><?php echo $donne['libellé']; ?></option>
                                     
                                       
                                          <?php

                                                          
                                             }?>
                                     
                                     
                              </select>

                        </div>  

               </div>               
             
              </div>
<br> <br> <br>
              <div class="form-group" >
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></div>
                   <textarea name="rappel"  class="form-control" rows="2" placeholder="Rappel"></textarea>
                   </div>
                   <span class="help-block" id="error"></span>
              </div>

                      
         	  <div class="form-group" >
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></div>
                   <textarea name="idee"  class="form-control" rows="3" placeholder="Idée Générale"></textarea>
                   </div>
                   <span class="help-block" id="error"></span>
              </div>
                        
              <div class="form-group">
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></div>
                   <textarea name="resume"  class="form-control" rows="6" placeholder="Résumé"></textarea>
                   </div> 
                   <span class="help-block" id="error"></span>                     
              </div>
                        

                  
                        
            </div>
            
            <div class="form-footer">
                 <button type="submit" class="btn btn-info">
                 <span class="glyphicon glyphicon-log-in"></span>
                 </button>
            </div>


            </form>
            
           </div>

	</div>
    
    

  <?php include('script_acc.php'); ?>   

	
</body>
</html>

	
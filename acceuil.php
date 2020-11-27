 <!DOCTYPE html>
    <html>
    <head>
      <title></title>
    </head>
    <body>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!------ Include the above in your HEAD tag ---------->
<?php
include 'blog.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-bookmark"></span> Quick shortcuts</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                          <a href="Filière.php" class="btn btn-danger  " role="button"><i class="fa fa-book" style="font-size:24px"></i> <br/>Faculty</a>
                          <a href="groupe.php" class="btn btn-warning  " role="button"><i class="fa fa-group" style="font-size:24px"></i> <br/>Groupe</a>
                          <a href="laboratoire.php" class="btn btn-info  " role="button"><i class="fa fa-codepen" style="font-size:24px"></i> <br/>Laboratory</a>
                          <a href="module.php" class="btn btn-success  " role="button"><i class="material-icons">&#xe8f0;</i> <br/>Module</a>
                           
                          <a href="equipe_pedagogique.php" class="btn btn-primary " role="button"><i class='fas fa-cubes' style='font-size:24px'></i> <br/>Educational-team</a>
                        </div>
                        <div class="col-xs-6 col-md-6">
                          <a href="pfe.php" class="btn btn-success  " role="button"><i class='fas fa-user-graduate' style='font-size:24px'></i> <br/>end of studies project</a>
                          <a href="note.php" class="btn btn-info  " role="button"><span class="glyphicon glyphicon-file"></span> <br/>Notes</a>
                          <a href="planning.php" class="btn btn-warning  " role="button"><i class='far fa-calendar-alt' style='font-size:24px'></i><br/>Planning</a>
                          <a href="departement.php" class="btn btn-danger  " role="button"><i class="fa fa-paste" style="font-size:24px"></i><br/>Department</a>
                        
                        </div>
                         <div class="col-xs-6 col-md-6">
                         
                          <a href="cycle.php" class="btn btn-primary  " role="button"><i class='fas fa-book-open' style='font-size:24px'></i><br/>cycle</a>
                          <a href="notification.php" class="btn btn-primary  " role="button"><i class='fas fa-bell' style='font-size:24px'></i><br/>Claim</a>
                        </div>
                   
                    </div>

                    <a href="index.php" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> The site</a>
                </div>
            </div>
        </div>
    </div>
</div>

    </body>
    <style type="text/css">
      body {

 
  height: 150%;
  margin: 2em auto;
  max-width:900px;
  max-height: calc(190% - 190px);
  width: 150%;
 
       padding-top:60px; }
.panel-body .btn:not(.btn-block) {

 width:120px;margin-bottom:20px; }
    </style>
    </html>
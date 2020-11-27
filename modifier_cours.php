<?php   session_start();

if(!isset($_SESSION['database']) or $_SESSION['database']==false )
{
  


}





 
?>
<!DOCTYPE html>
<?php
 include('database.php');
?>
<html>
<head>
  <?php include('inccss.php'); ?>
  
       
            
 
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<?php include('headerP.php'); ?>
</nav>

<?php include('menuP.php'); ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"> 
<br><br><br>

<div class="panel panel-default" align="center">

          <div class="panel-heading">
          <em class="text-center " align ="center">Change courses  </em>
          </div>

          <div class="panel-body">
          <?php


if(isset($_POST['btn1']))
{

  if(empty($_POST['cours']))
 {
  header('location:modifier_cours.php?id='.$_GET['id'].'');   
echo '<div class="alert bg-danger" role="alert">
          <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Saisie le nom du module! <a  class="pull-right" aria-hidden="true"></a>
        </div>';  

        
 }else
 {


      
      $q2 = 'update Module set Nom_Module = "'.$_POST['cours'].'" where id_module="'.$_GET['id'].'" ';
      $r2 = $con ->query($q2); 
 header('location:modifier_cours.php?id='.$_GET['id'].'');   
echo '<div class="alert bg-success" role="alert">
          <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Votre nom de module est bien modifié! <a href="#" class="pull-right"></a>
        </div>'; 
 } 
}





if(isset($_POST['btn2']))
{

  if(empty($_POST['heure']))
 {
  header('location:modifier_cours.php?id='.$_GET['id'].'');   
echo '<div class="alert bg-danger" role="alert">
          <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Saisie le nombtre d heure! <a  class="pull-right" aria-hidden="true"></a>
        </div>';  

        
 }else
 {


      
      $q2 = 'update Module set nb_heure = "'.$_POST['heure'].'" where id_module="'.$_GET['id'].'" ';
      $r2 = $con ->query($q2); 
 header('location:modifier_cours.php?id='.$_GET['id'].'');   
echo '<div class="alert bg-success" role="alert">
          <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Your hours are changed! <a href="#" class="pull-right"></a>
        </div>'; 
 } 
}

?>

<div class="col-md-12">

<form  method="POST" enctype="multipart/form-data"   >  
<div class="col-md-1">
</div>    
<div class="col-md-10">
      <br><br>
          <div class="panel-body">
            <table data-toggle="table" id="table-style" data-url="tables/data2.json" data-row-style="rowStyle">
                <thead>
                <tr>
                    <th data-field="id" data-align="right" >Fields</th>
                    <th data-field="name" >Informations</th>
                    <th data-field="price" >Edit</th>
                </tr>
                </thead>
              <tbody>
              <?php
     
 


              $q =  "select * from module where id_module='".$_GET['id']."'";
              $r = $con -> query($q) ;
              while ($c = $r -> fetch_assoc())
              {

                 

              ?>
              <tr>
              <td> <label><center>Numero :</center> </label></td>
              <td> <input class="form-control" name="num" type="text" value="<?php echo $c['id_module'];?>"></td>
              
              </tr>
              <tr>
              <td> <label> <center>Course name:</center></label></td>
              <td> <input class="form-control" name="module" type="text" value="<?php echo $c['courd'];?>"></td>
              <td><button type="submit" class="btn btn-primary" name="btn1">switch</button> </td>
              </tr>
              <tr>
              <td> <label><center>Number of Hours:</center> </label></td>
              <td> <input class="form-control" name="heures" type="text" value="<?php echo $c['nb_heure'];?>"></td>
              <td><button type="submit" class="btn btn-primary" name="btn2">switch</button> </td>
              </tr>

            
              <?php
              }
              ?>
              </tbody>
            </table>
            <script>
                $(function () {
                    $('#hover, #striped, #condensed').click(function () {
                        var classes = 'table';
            
                        if ($('#hover').prop('checked')) {
                            classes += ' table-hover';
                        }
                        if ($('#condensed').prop('checked')) {
                            classes += ' table-condensed';
                        }
                        $('#table-style').bootstrapTable('destroy')
                            .bootstrapTable({
                                classes: classes,
                                striped: $('#striped').prop('checked')
                            });
                    });
                });
            
                function rowStyle(row, index) {
                    var classes = ['active', 'success', 'info', 'warning', 'danger'];
            
                    if (index % 2 === 0 && index / 2 < classes.length) {
                        return {
                            classes: classes[index / 2]
                        };
                    }
                    return {};
                }
            </script>
          </div>
        </div>
      
        </form>
      </div>
          
</div>
</div>

  <?php include('incjs.php'); ?>
</body>
</html>

  
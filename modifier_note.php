<?php
   include"database.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
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
          <em class="text-center " align ="center">Change notes </em>
          </div>

          <div class="panel-body">
          <?php
if(isset($_POST['btn1']))
{

  if(empty($_POST['nomE']))
 {
   
  header('location:modifier_note.php?id='.$_GET['id'].'');   
echo '<div class="alert bg-danger" role="alert">
          <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Enter a name! <a  class="pull-right" aria-hidden="true"></a>
        </div>';  
 }else
 {
  
      $q2 = 'update etudiants set nom = "'.$_POST['nomE'].'" where id_note="'.$_GET['id'].'" ';
      $r2 = $con ->query($q2); 
 header('location:modifier_note.php?id='.$_GET['id'].'');   
echo '<div class="alert bg-success" role="alert">
          <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Your name has been changed!<a href="#" class="pull-right"></a>
        </div>'; 
 } 
}

if(isset($_POST['btn2']))
{

  if(empty($_POST['Module']))
 {
  header('location:modifier_note.php?id='.$_GET['id'].'');   
echo '<div class="alert bg-danger" role="alert">
          <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Enter a General module! <a  class="pull-right" aria-hidden="true"></a>
        </div>';  
 }else
 {
  
      $q2 = 'update module set libelle_mod = "'.$_POST['Module'].'" where id_note="'.$_GET['id'].'" ';
      $r2 = $con ->query($q2); 
 header('location:modifier_note.php?id='.$_GET['id'].'');   
echo '<div class="alert bg-success" role="alert">
          <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Your General Idea is well changed<a href="#" class="pull-right"></a>
        </div>'; 
 } 
}
 
 
if(isset($_POST['btn3']))
{

  if(empty($_POST['NoteN']))
 {
  header('location:modifier_note.php?id='.$_GET['id'].'');   
echo '<div class="alert bg-danger" role="alert">
          <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>Enter a summary! <a  class="pull-right" aria-hidden="true"></a>
        </div>';  
 }else
 {
  
      $q2 = 'update note set note_N = "'.$_POST['NoteN'].'" where id_note="'.$_GET['id'].'" ';
      $r2 = $con ->query($q2); 
 header('location:modifier_note.php?id='.$_GET['id'].'');   
echo '<div class="alert bg-success" role="alert">
          <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Your summary has been changed!<a href="#" class="pull-right"></a>
        </div>'; 
 } 
}

if(isset($_POST['btn4']))
{

  if(empty($_POST['NoteR']))
 {
  header('location:modifier_note.php?id='.$_GET['id'].'');   
echo '<div class="alert bg-danger" role="alert">
          <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Enter a Rematch Note! <a  class="pull-right" aria-hidden="true"></a>
        </div>';  
 }else
 {
  
      $q2 = 'update note set note_R = "'.$_POST['NoteR'].'" where id_note="'.$_GET['id'].'" ';
      $r2 = $con ->query($q2); 
 header('location:modifier_note.php?id='.$_GET['id'].'');   
echo '<div class="alert bg-success" role="alert">
          <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Your catch-up note has been changed! <a href="#" class="pull-right"></a>
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
     
 
                
              $q =  "select * from note where id_note='".$_GET['id']."'";
              $r = $con -> query($q) ;
              while ($c = $r -> fetch_assoc())
              {

               $num=$c['id_module'];

              $q1 =  "select * from module where id_module='$num'";
              $r1 = $con -> query($q1) ;
              $c1 = $r1 -> fetch_assoc();
               

                          $objPDO = new PDO("mysql:host=localhost;dbname=basecour","root","");
                          $objPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                          $sqlEtud = "SELECT * FROM etudiants Inner join note on etudiants.id_etudiant = note.id_etudiant";
                          $etudiants = $objPDO->query($sqlEtud);

                       



                          


         
              ?>

              <form action="" method="GET" name="form">

               <select class="form-control" name="nom" onchange="this.form.submit()">
                        <?php $val = $row['CNE']; ?>
                           <option value="" disabled="true" selected> CNE </option>
                          <?php foreach ($etudiants->fetchAll() as $row):?>
                           
                            <option value=<?= $row['nom'] ?> <?php if(isset($val)&& $val == $row['CNE']) echo "selected"?>> <?= $row['CNE'] ?> </option>
                          <?php endforeach ?>
 <?php 
    if(isset($_GET['nom']))
    {
        $cne = $_GET['nom'];
        
        $objPDO = new PDO("mysql:host=localhost;dbname=basecour","root","");
                          $objPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                          $sqlEtu = "SELECT * FROM etudiants
                          WHERE cne = $cne";
                          $rst = $objPDO->query($sqlEtu);
                         

                          foreach ($rst->fetchAll() as $value)
                          {
                            $nom = $value['nom'];
                          }
                             
                          

    }
  
    
    

    

 ?>                                                        
                </select>
                  </form>

              <tr>
              <td> <label><center>Last name :</center> </label></td>
              <td> <input class="form-control" name="nomE" type="text" value=<?php  echo $row['nom'];  ?>  ></td>
              <td><button type="submit" class="btn btn-primary" name="btn1">Edit</button></td>
              </tr>
              <tr>
              <td> <label> <center>Module:</center></label></td>
              <td> <input class="form-control" name="Module" type="text" value="<?php echo $c['libelle_mod'];?>"></td>
              <td><button type="submit" class="btn btn-primary" name="btn2">Edit</button> </td>
              </tr>
              <tr>
              <td> <label><center>Review note:</center> </label></td>
              <td> <input class="form-control" name="NoteN" type="text" value="<?php echo $c['note_N'];?>"></td>
              <td><button type="submit" class="btn btn-primary" name="btn3">Edit</button> </td>
              </tr>
              <tr>
              <td> <label> <center>Catch-up note:</center></label></td>
              <td> <input class="form-control" name="NoteR" type="text" value="<?php echo $c['note_R'];?>"></td>
              <td><button type="submit" class="btn btn-primary" name="btn4">Edit</button> </td>
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

  
<?php
session_start();
$con=mysqli_connect("localhost","root","","cds-db") or die("not connected");

if($_SESSION['username']==''){
    echo"<script> alert('Please LogIn First?')</script>";
    echo"<script> history.back()</script>";
    header("location: index.php");
}
?>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
// for activate Subject   	
if(isset($_GET['acid']))
{
$acid=intval($_GET['acid']);
$status=1;
$sql="update modules_tbl set status=:status where mo_id=:acid ";
$query = $dbh->prepare($sql);
$query->bindParam(':acid',$acid,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$msg="Module Activate successfully";
}

 // for Deactivate Subject
if(isset($_GET['did']))
{
$did=intval($_GET['did']);
$status=0;
$sql="update modules_tbl set status=:status where mo_id=:did ";
$query = $dbh->prepare($sql);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$msg="Module Deactivate successfully";
}




    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HOD Manage Modules</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        <link rel="stylesheet" href="styles.css">
          <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body class="top-navbar-fixed">
    <div class="login-background" >
        <div class="slider">
        <div class="load">
            

        <div id="navbar">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Manage Modules</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><li><a href="create-module.php"><i class="fa fa-home"></i> Modules</a></li>
            							<li class="active">Manage Modules</li>
            						</ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                                    
                        <section class="section">
                        <div class="container-fluid">

                             

<div class="row">
    <div class="col-md-12">

        <div class="panel">
            <div class="panel-heading">
                
                <button name="login" class="btn btn-success btn-labeled pull-right"><a href="create-module.php">Add</a><span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                <div class="panel-title">
                    <h5>View Modules Info</h5>
                    
                
                </div>
                
            </div>
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                           
                                                        <th>#</th>
                                                          <th>Module Title</th>
                                                            <th>Module Code</th>
                                                            <th>Module Credit</th>
                                                            <th>Academic Year & semester</th>
                                                            <th>Level</th> 
                                                            <th>Status</th> 
                                                            
                                                          
                                                            <th>Edit </th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                          <th>#</th>
                                                          <th>Module Title</th>
                                                            <th>Module Code</th>
                                                            <th>Module Credit</th>
                                                            <th>Academic Year & semester</th>
                                                            <th>Level</th> 
                                                            <th>Status</th> 
                                                            

                                                            
                                                           
                                                            <th>Edit  </th>
                                                            
                                                        </tr>
                                                        
                                                    </tfoot>
                                                    <tbody>
                                                        
<?php $sql = "SELECT  distinct modules_tbl.mo_id,modules_tbl.mo_title,modules_tbl.mo_code,modules_tbl.mo_credit,modules_tbl.status,modules_tbl.le_id,academic_year_tbl.year,modules_tbl.ay_id,academic_year_tbl.semester,level_tbl.le_title,level_tbl.le_id,academic_year_tbl.ay_id from modules_tbl join academic_year_tbl on academic_year_tbl.ay_id=modules_tbl.ay_id join level_tbl on level_tbl.le_id=modules_tbl.le_id ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<tr>
 <td><?php echo htmlentities($cnt);?>
                                                            <td><?php echo htmlentities($result->mo_title);?></td>
                                                            <td><?php echo htmlentities($result->mo_code);?></td>
                                                            <td><?php echo htmlentities($result->mo_credit);?></td>
                                                            <td><?php echo htmlentities($result->year);?>- semester: <?php echo htmlentities($result->semester);?></td>
                                                            <td><?php echo htmlentities($result->le_title);?></td>
                                                            <td><?php $stts=$result->status;
if($stts=='0')
{
	echo htmlentities('Inactive');
}
else
{
	echo htmlentities('Active');
}
                                                             ?></td>
                                                            
<td>
<?php if($stts=='0')
{ ?>
<a href="manage-modules.php?acid=<?php echo htmlentities($result->mo_id);?>" onclick="confirm('do you really want to ativate this Module');"><i class="fa fa-check" title="Acticvate Record"></i> </a><?php } else {?>

<a href="manage-modules.php?did=<?php echo htmlentities($result->mo_id);?>" onclick="confirm('do you really want to deativate this Module');"><i class="fa fa-times" title="Deactivate Record"></i> </a>
<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit-modules.php?classid=<?php echo htmlentities($result->mo_id);?>"><i class="fa fa-edit" title="Edit Record"></i> </a> 
</td>

</tr>
<?php $cnt=$cnt+1;}} ?>
                                                       
                                                    
                                                    </tbody>
                                                </table>

                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script></div></div></div></div>
    </body>
</html>
<?php } ?>


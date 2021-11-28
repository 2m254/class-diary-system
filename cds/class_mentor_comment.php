
<?php
        include('cr-includes/config.php');
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
include('cm-includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
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
   <?php include('cm-includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('cm-includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Manage Class Diary</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="cm-dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="#"><i class="fa fa-home"></i> Class-Diary</a/li>
            							<li class="active">View Class Diary.</li>
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
                                            <button name="login" class="btn btn-success btn-labeled pull-right"><a href="add-class_diary.php">Add</a><span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                <div class="panel-title">
                                                    <h5>View Class Diary Info</h5>
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
                                            <div class="panel-body p-25">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            
                                                            <th>Day</th>
                                                            <th>Date</th>

                                                            <th>Module</th>
                                                            <th>Lecture</th>
                                                            
                                                            <th>Activity</th>
                                                            <th>Content</th>
                                                            
                                                            <th>commnent Description</th>
                                                          
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                          <th>ID</th>
                                                         
                                                            <th>Day</th>
                                                            <th>Date</th>
                                                            
                                                            <th>Module</th>
                                                            <th>Lecture</th>
                                                            
                                                            <th>Activity</th>
                                                            <th>Content</th>
                                                            
                                                            <th>commnent Description</th>
                                                           
                                                            
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
<?php $sql = "SELECT distinct class_diary_tbl.day,class_diary_tbl.dat,class_diary_tbl.activity,class_diary_tbl.toc,class_diary_tbl.commdesc,modules_tbl.mo_title,lecture_tbl.lect_name from class_diary_tbl join modules_tbl on class_diary_tbl.cd_id=modules_tbl.mo_id join lecture_tbl on lecture_tbl.lect_id=class_diary_tbl.cd_id";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<tr>
 <td><?php echo htmlentities($cnt);?></td>
                                                            
                                                            <td><?php echo htmlentities($result->day);?></td>
                                                            <td><?php echo htmlentities($result->dat);?></td>
                                                            
                                                            <td><?php echo htmlentities($result->mo_title);?></td>
                                                            <td><?php echo htmlentities($result->lect_name);?></td>
                                                          
                                                            <td><?php echo htmlentities($result->activity);?></td>
                                                            <td><?php echo htmlentities($result->toc);?></td>
                                                            
                                                            <td ><?php echo htmlentities($result->commdesc);?></td>

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


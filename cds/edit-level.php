<?php
        include('cr-includes/config.php');
session_start();
$con=mysqli_connect("localhost","root","","cds-db") or die("not connected");

if($_SESSION['username']==''){
    echo"<script> alert('Please LogIn First?')</script>";
    echo"<script> history.back()</script>";
    header("location: index.php");
}
?><?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['update']))
{
    $le_title=$_POST['le_title'];
    $le_class=$_POST['le_class']; 
    $de_id=$_POST['de_id']; 
   
   
    
    $cid=intval($_GET['classid']);
    $sql="update  level_tbl set le_title=:le_title,le_class=:le_class,de_id=:de_id where le_id=:cid ";
    $query = $dbh->prepare($sql);
$query->bindParam(':le_title',$le_title,PDO::PARAM_STR);
$query->bindParam(':le_class',$le_class,PDO::PARAM_STR);
$query->bindParam(':de_id',$de_id,PDO::PARAM_STR);



$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->execute();
$msg="level has been updated successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CDS Update Module</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body class="top-navbar-fixed">
    <div class="login-background" >
        <div class="slider">
        <div class="load">
            

        <div id="navbar">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?>   
          <!-----End Top bar>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

<!-- ========== LEFT SIDEBAR ========== -->
<?php include('includes/leftbar.php');?>                   
 <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Update Level</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            							<li><a href="manage-level.php">Level</a></li>
            							<li class="active">Update Level</li>
            						</ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                              

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Update levels info</h5>
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

                                                <form method="post" >
                            <?php 
                            $cid=intval($_GET['classid']);
                            $sql = "SELECT * from level_tbl where le_id=:cid";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':cid',$cid,PDO::PARAM_STR);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $cnt=1;
                            if($query->rowCount() > 0)
                            {
                            foreach($results as $result)
                              {   ?>

                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Level Name</label>
                                                		<div class="">
                                                			<input type="text" name="le_title" value="<?php echo htmlentities($result->le_title);?>" required="required" class="form-control" id="success">
                                                            <span class="help-block">Eg- level 1, level 2 etc</span>
                                                		</div>
                                                	</div>
                                                    <div class="form-group has-success">
                                                       <div class="form-group">
                                                <label for="default" class="control-label">Level Room</label>
                                                
                                                       
 <select name="le_class" class="form-control" id="success"  required="required">
 <option value="<?php echo htmlentities($result->le_class); ?>"><?php echo htmlentities($result->le_class); ?></option>
<option  id="success" class="form-control" value="A">A</option>
<option  id="success" class="form-control" value="B">B</option>
<option   id="success" class="form-control" value="C">C</option>



 </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group has-success">
                                                       <div class="form-group">
                                                <label for="default" class="control-label">Department</label>
                                                
                                                       
 <select name="de_id" class="form-control" id="success"  required="required">
 <?php $sql = "SELECT * from department_tbl ";


$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->de_id); ?>"><?php echo htmlentities($result->de_short); ?></option>
<?php }


} ?>
 </select>
                                                        </div>
                                                    </div>

                                                    
                                                       
                                                    
                                                  
                                            
                                                   
                                                    
                                                   
                                                    <?php }} ?>
  <div class="form-group has-success">

                                                        <div class="">
                                                            <button type="submit" name="update" class="btn btn-success btn-labeled">Update<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    
                                                    
                    
                                                    		
                                                           
                                                    			<button name="login" class="btn btn-success btn-labeled pull-right"><a href="manage-level.php">Back</a><span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    		</div>
                    </div>


                                                    
                                                </form>

                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-8 col-md-offset-2 -->
                                </div>
                                <!-- /.row -->

                               
                               

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

             
                    <!-- /.right-sidebar -->

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        </div></div></div></div>


        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  } ?>

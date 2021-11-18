<?php
session_start();
error_reporting(0);
include('cr-includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['update']))
{
    $weeks=$_POST['weeks'];
    $days=$_POST['days']; 
    $date=$_POST['date'];
    $de_id=$_POST['de_id'];
    
    $cid=intval($_GET['classid']);
    $sql="update  class_diary_tbl set week=:weeks,day=:days,dat=:date,de_id=:de_id where cd_id=:cid ";
    $query = $dbh->prepare($sql);

$query->bindParam(':weeks',$weeks,PDO::PARAM_STR);
$query->bindParam(':days',$days,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':de_id',$de_id,PDO::PARAM_STR);

$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->execute();
$msg="C D S has been updated successfully";
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
            <?php include('cr-includes/topbar.php');?>   
          <!-----End Top bar>
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

<!-- ========== LEFT SIDEBAR ========== -->
<?php include('cr-includes/leftbar.php');?>                   
 <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Update Module</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="cr-dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            							<li><a href="manage-class_diary.php">Class Diary</a></li>
            							<li class="active">Update Class Diary.</li>
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
                                                    <h5>Update Class Diary info</h5>
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
$sql = "SELECT * from class_diary_tbl where cd_id=:cid";
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
                                                        <label for="success" class="control-label">week</Title></label>
                                                		<div class="">
                                                			<input type="number" name="weeks" value="<?php echo htmlentities($result->week);?>" required="required" class="form-control" id="success">
                                                            <span class="help-block">Eg- 1,2,3,4 etc</span>
                                                		</div>
                                                	</div>
                                                    <div class="form-group has-success">
                                                       <div class="form-group">
                                                <label for="default" class="control-label">day</label>
                                                
                                                       
 <select name="days" class="form-control" id="success"  required="required">
 <option value="<?php echo htmlentities($result->day); ?>"><?php echo htmlentities($result->day); ?></option>
 <option value="Monday ">Monday</option>
<option value="Tuesday ">Tuesday</option>
<option value="Wednesday ">wednesday</option>
<option value="Thursday ">Thursday</option>
<option value="Friday ">Friday</option>
<option value="Surtday ">Surtday</option>
<option value="Sunday ">Sunday</option>



 </select>
 <span class="help-block">Eg- Monday,Tuesday etc</span>
                                                        </div>
                                                    </div>
                                                     <div class="form-group has-success">
                                                        <label for="success"  class="control-label">Date</label>
                                                        <div class="">
                                                            <input type="date"    name="date" value="<?php echo htmlentities($result->dat);?>" class="form-control" required="required" id="success" maxlength="2">
                                                            <span class="help-block">Eg- 08:00 AM, 12:50 PM etc</span>
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
                                                    
                                                    
                    
                                                    		
                                                           
                                                    			<button name="login" class="btn btn-success btn-labeled pull-right"><a href="manage-class_diary.php">Back</a><span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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

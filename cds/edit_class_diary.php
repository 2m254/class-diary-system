
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
include('cr-includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['update']))
{
    $ay_id=$_POST['ay_id'];
    $week=$_POST['week']; 
    $day=$_POST['day'];
    $dat=$_POST['dat'];
    $de_id=$_POST['de_id'];
    $le_id=$_POST['le_id'];
    $mo_id=$_POST['mo_id'];
    $lect_id=$_POST['lect_id'];
    $start_time=$_POST['start_time'];
    $end_time=$_POST['end_time'];
    $activity=$_POST['activity'];
    $toc=$_POST['toc'];
    $comment=$_POST['comment'];
    $commdesc=$_POST['commdesc'];

    $cid=intval($_GET['classid']);
    $sql="update  class_diary_tbl set ay_id=:ay_id,week=:week,day=:day,dat=:dat,de_id=:de_id,le_id=:le_id,mo_id=:mo_id,lect_id=:lect_id,start_time=:start_time,
    end_time=:end_time,activity=:activity,toc=:toc,comment=:comment,commdesc=:commdesc where cd_id=:cid ";
    $query = $dbh->prepare($sql);
$query->bindParam(':ay_id',$ay_id,PDO::PARAM_STR);
$query->bindParam(':week',$week,PDO::PARAM_STR);
$query->bindParam(':day',$day,PDO::PARAM_STR);
$query->bindParam(':dat',$dat,PDO::PARAM_STR);
$query->bindParam(':de_id',$de_id,PDO::PARAM_STR);
    $query->bindParam(':le_id',$le_id,PDO::PARAM_STR);
    $query->bindParam(':mo_id',$mo_id,PDO::PARAM_STR);
    $query->bindParam(':lect_id',$lect_id,PDO::PARAM_STR);
    $query->bindParam(':start_time',$start_time,PDO::PARAM_STR);
    $query->bindParam('end_time',$end_time,PDO::PARAM_STR);
    $query->bindParam(':activity',$activity,PDO::PARAM_STR);
    $query->bindParam(':toc',$toc,PDO::PARAM_STR);
    $query->bindParam(':comment',$comment,PDO::PARAM_STR);
    $query->bindParam(':commdesc',$commdesc,PDO::PARAM_STR);

$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->execute();
$msg="C D S  has been updated successfully";
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
                                    <h2 class="title">Update Class Diary</h2>
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
$sql = "SELECT distinct class_diary_tbl.cd_id,class_diary_tbl.week,class_diary_tbl.day,class_diary_tbl.dat,class_diary_tbl.activity,class_diary_tbl.toc,class_diary_tbl.commdesc,modules_tbl.mo_title,lecture_tbl.lect_name from class_diary_tbl join modules_tbl on class_diary_tbl.cd_id=modules_tbl.mo_id join lecture_tbl on lecture_tbl.lect_id=class_diary_tbl.cd_id where cd_id=:cid";
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
                                                       <div class="form-group">
                                                <label for="default" class="control-label">Academic Year</label>
                                                
                                                       
 
<?php $sql = "SELECT * from academic_year_tbl where status=1 ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
{
foreach($results as $result)
{   ?>
                                                   
<input type="text" name="ay_id" class="form-control" id="classname" value="<?php echo htmlentities($result->year)?> -- semester: <?php echo htmlentities($result->semester)?>" readonly>
                                                        

                                                    <?php }} ?>
                                                    </div>
                                                    </div>
                                                       <div class="form-group has-success">
                                                        <label for="success" class="control-label">Week</label>
                                                        <div class="">
                                                            <input type="number" name="week"  value="<?php echo htmlentities($result->week);?>" required="required" class="form-control" id="success" maxlength="8" >
                                                            <span class="help-block">Eg- ict101 etc</span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group has-success">
                                                       <div class="form-group">
                                                <label for="default" class="control-label">Day</label>
                                                
                                                       
 <select name="day" class="form-control" id="success"  required="required">

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
                                                        <label for="success"  class="control-label">dat</label>
                                                        <div class="">
                                                            <input type="date"    name="dat" value="<?php echo htmlentities($result->dat);?>" class="form-control" required="required" id="success" maxlength="2">
                                                            <span class="help-block">Eg- 10,15 etc</span>
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
                                                    <div class="form-group has-success">
                                                       <div class="form-group">
                                                <label for="default" class="control-label">Level</label>
                                                
                                                       
 <select name="le_id" class="form-control" id="success"  required="required">
 <?php $sql = "SELECT * from level_tbl ";?>

<?php
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
{
foreach($results as $result)
{   ?>

<option value="<?php echo htmlentities($result->le_id); ?>"><?php echo htmlentities($result->le_title); ?>&nbsp; </option>
<?php }


} ?>
 </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">
                                                       <div class="form-group">
                                                <label for="default" class="control-label">Module</label>
                                                
                                                       
 <select name="mo_id" class="form-control" id="success"  required="required">
 <?php $sql = "SELECT * from modules_tbl ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->mo_id); ?>"><?php echo htmlentities($result->mo_title); ?></option>
<?php }


} ?>
 </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">
                                                       <div class="form-group">
                                                <label for="default" class="control-label">Lecture</label>
                                                
                                                       
 <select name="lect_id" class="form-control" id="success"  required="required">
 <?php $sql = "SELECT * from lecture_tbl ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->lect_id); ?>"><?php echo htmlentities($result->lect_name); ?></option>
<?php }


} ?>
 </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="success"  class="control-label">Start Time</label>
                                                        <div class="">
                                                            <input type="time"    name="start_time" value="<?php echo htmlentities($result->start_time);?>" class="form-control" required="required" id="success" maxlength="2">
                                                            <span class="help-block">Eg- 07:00:PM </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="success"  class="control-label">End Time</label>
                                                        <div class="">
                                                            <input type="time"    name="end_time" value="<?php echo htmlentities($result->end_time);?>" class="form-control" required="required" id="success" maxlength="2">
                                                            <span class="help-block">Eg- 12:50:AM </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">
                                                    <label for="success"  class="control-label">Activity</label>
<div class="col-sm-10">
<?php  $act=$result->activity;
if($act=="Practical")
{
?>
<input type="radio" name="activity" value="<?php echo htmlentities($result->activity);?>" required="required" checked>Practical <input type="radio" name="<?php echo htmlentities($result->activity);?>" value="Theory" required="required">Theory
<?php }?>
<?php  
if($act=="Theory")
{
?>
<input type="radio" name="activity" value="<?php echo htmlentities($result->activity);?>" required="required" >Practical <input type="radio" name="<?php echo htmlentities($result->activity);?>" value="Theory" required="required" checked>Theory
<?php }?>
</div>
</div>

<div class="form-group has-success">
                                                        <label for="success"  class="control-label">Content</label>
                                                        <div class="">
                                                            <input type="text"    name="toc" value="<?php echo htmlentities($result->toc);?>" class="form-control" required="required" id="success" maxlength="2">
                                                            <span class="help-block">Eg- title of content.</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group has-success">
                                                    <label for="success"  class="control-label">Comment</label>
<div class="col-sm-10">
<?php  $activit=$result->activity;
if($activit=="understandable")
{
?>
<input type="radio" name="activity" value="<?php echo htmlentities($result->comment);?>" required="required" checked>Understandable <input type="radio" name="activity" value="<?php echo htmlentities($result->comment);?>" required="required">Not understandable
<?php }?>
<?php  
if($activit=="not understandable")
{
?>
<input type="radio" name="activity" value="<?php echo htmlentities($result->comment);?>" required="required" >Understandable <input type="radio" name="activity" value="<?php echo htmlentities($result->comment);?>" required="required" checked>Not Understandable
<?php }?>
</div>
</div>
<div class="form-group has-success">
                                                       <label for="success" class="control-label">Comment Description </label>
                                                       <div class="">
                                                       <textarea rows="5" cols="30" name="commdesc" value="<?php echo htmlentities($result->commdesc);?>"></textarea>
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

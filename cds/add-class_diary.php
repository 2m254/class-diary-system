<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
    $ay_id=$_POST['ay_id'];
    $week=$_POST['week'];
    $day=$_POST['day']; 
    $dat=$_POST['dat'];
    
    $de_id=$_POST['de_id'];
    $le_id=$_POST['le_id'];
    $level_room=$_POST['level_room'];
    $mo_id=$_POST['mo_id'];
    $lect_id=$_POST['lect_id'];
    $start_time=$_POST['start_time'];
    $end_time=$_POST['end_time'];
    $activity=$_POST['activity'];
    $toc=$_POST['toc'];
    $comment=$_POST['comment'];
    $commdesc=$_POST['commdesc'];
   
    
    
    $sql="INSERT INTO  class_diary_tbl(ay_id,week,day,dat,de_id,le_id,level_room,mo_id,lect_id,start_time,end_time,activity,toc,comment,commdesc) VALUES(:ay_id,:week,:day,:dat,:de_id,:le_id,:level_room,:mo_id,:lect_id,:start_time,:end_time,:activity,:toc,:comment,:commdesc)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':ay_id',$ay_id,PDO::PARAM_STR);
    $query->bindParam(':week',$week,PDO::PARAM_STR);
    $query->bindParam(':day',$day,PDO::PARAM_STR);
    $query->bindParam(':dat',$dat,PDO::PARAM_STR);
    $query->bindParam(':de_id',$de_id,PDO::PARAM_STR);
    $query->bindParam(':le_id',$le_id,PDO::PARAM_STR);
    $query->bindParam(':level_room',$level_room,PDO::PARAM_STR);
    $query->bindParam(':mo_id',$mo_id,PDO::PARAM_STR);
    $query->bindParam(':lect_id',$lect_id,PDO::PARAM_STR);
    $query->bindParam(':start_time',$start_time,PDO::PARAM_STR);
    $query->bindParam('end_time',$end_time,PDO::PARAM_STR);
    $query->bindParam(':activity',$activity,PDO::PARAM_STR);
    $query->bindParam(':toc',$toc,PDO::PARAM_STR);
    $query->bindParam(':comment',$comment,PDO::PARAM_STR);
    $query->bindParam(':commdesc',$commdesc,PDO::PARAM_STR);








$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Class Diary Created successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CDS HOD Create Modules</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
        
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
        <<script>
            function my_fun(str){
                if(window.XMLHttpRequest)
                {
                    xmlhttp =new XMLHttpRequest();

                }else{
                    xmlhttp=new ActiveXobject("Microsoftt.XMLHTTP");

                }
                xmlhttp.open("GET","helper.php?value="+str,true);
                xmlhttp.send();
            }
        </script>
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
                        <div class="container-fluid">````````
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Create Class Diary </h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                    <li><a href="cr-dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            							<li><a href="manage-class_diary.php">Class-Diary</a></li>
            							<li class="active">add class diary</li>
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
                                            <div class="panel-heading"
                                            >
                                                <div class="panel-title">
                                                    <h5>Fill Class Diary</h5>
                                                </div>
                                            </div>
           <?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done! </strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
  
                                            <div class="panel-body">

                                            <form method="post">

                                            
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
                                                   
<input type="text" name="ay_id" class="form-control" id="classname" value="<?php echo htmlentities($result->year)?> --- semester: <?php echo htmlentities($result->semester)?>" readonly>
                                                        

                                                    <?php }} ?>
                                                    </div>
                                                    </div>
                                                   
                                                   <div class="form-group has-success">
                                                       <label for="success" class="control-label">week number</label>
                                                       <div class="">
                                                           <input type="number" name="week" class="form-control" required="required" id="success">
                                                           
                                                       </div>
                                                   </div>

                                                      <div class="form-group has-success">
                                                      <div class="form-group">
                                               <label for="default" class="control-label">day</label>
                                                      
<select name="day" class="form-control" id="success">
<option selected >-----Select day-----</option>

<option value="Monday ">Monday</option>
<option value="Tuesday ">Tuesday</option>
<option value="Wednesday ">wednesday</option>
<option value="Thursday ">Thursday</option>
<option value="Friday ">Friday</option>
<option value="Surtday ">Surtday</option>
<option value="Sunday ">Sunday</option>


</select>
                                                       </div>
                                                   </div>
                                                   <div class="form-group has-success">
                                                       <label for="success" class="control-label">Date</label>
                                                       <div class="">
                                                           <input type="date" name="dat" class="form-control" required="required" id="success">
                                                           
                                                        
                                                   </div>
                                                   </div>
                                                   <div class="form-group has-success">
                                                      <div class="form-group">
                                               <label for="default" class="control-label">Department</label>
                                               
                                                      
<select name="de_id" class="form-control" id="success"  required="required">
<?php 
$dep=$_SESSION['department'];
$sql = "SELECT * from department_tbl where de_short='$dep'";
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
                                               <label for="default" class="control-label">level</label>
                                                      
<select name="le_id" class="form-control" id="success" required="required">
<?php 
$lev=$_SESSION['level_name'];
$lev_room=$_SESSION['level_room'];
$sql = "SELECT * from level_tbl where le_title='$lev' and le_class='$lev_room'";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->le_id); ?>"><?php echo htmlentities($result->le_title); ?></option>
<?php }} ?>
</select>

                                                       </div>
                                                   </div>
                                                   <div class="form-group has-success">
                                                       <label for="success" class="control-label">Room</label>
                                                       <div class="">
                                                           <input type="text" name="level_room" value="<?php echo $_SESSION['level_room'];?>" readonly="<?php echo $_SESSION['level_room'];?>" class="form-control" required="required" id="success">
                                                           
                                                        
                                                   </div>
                                                   </div>
                                                   <div class="form-group has-success">
                                                      <div class="form-group">
                                               <label for="default" class="control-label">module</label>
                                                      
<select name="mo_id" class="form-control" id="success" required="required">
<option selected>------Select module------</option>
<?php $sql = "SELECT * from modules_tbl where status=1";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->mo_id); ?>"><?php echo htmlentities($result->mo_title); ?></option>
<?php }} ?>
</select>
                                                       </div>
                                                   </div>

                                                   <div class="form-group has-success">
                                                      <div class="form-group">
                                               <label for="default" class="control-label">lecture</label>
                                                      
<select name="lect_id" class="form-control" id="success" required="required">
<option selected>------Select lecture------</option>
<?php $sql = "SELECT * from lecture_tbl";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->lect_id); ?>"><?php echo htmlentities($result->lect_name); ?></option>
<?php }} ?>
</select> 
                                                       </div>
                                                   </div>
                                                   <div class="form-group has-success">
                                                       <label for="success" class="control-label">Start Time</label>
                                                       <div class="">
                                                           <input type="time" name="start_time" class="form-control" required="required" id="success">
                                                           
                                                       </div>
                                                   </div>
                                                   <div class="form-group has-success">
                                                       <label for="success" class="control-label">End Time</label>
                                                       <div class="">
                                                           <input type="time" name="end_time" class="form-control" required="required" id="success">
                                                           
                                                       </div>
                                                   </div>
                                                   <div class="form-group has-success">
                                                       <label for="success" class="control-label"><u><b>Activity:</b></u></label>
                                                       
                                                       <label for="success" class="control-label">Practical</label>  <input type="radio" name="activity"   value="Practical" required="required" checked="">  <label for="success" class="control-label">Theory</label>   <input type="radio" name="activity"  id="success" value="Theory" required="required">  
                                                           
                                                       
                                                   </div>
                                                   <div class="form-group has-success">
                                                       <label for="success" class="control-label">Title of the Contents </label>
                                                       <div class="">
                                                           <input type="text" name="toc" class="form-control" required="required" id="success">
                                                           
                                                       </div>
                                                   </div>
                                                   <div class="form-group has-success">
                                                       <label for="success" class="control-label"><u><b>Comment:</b></u></label>
                                                       <div class="">
                                                       <label for="success" class="control-label">Understandable</label>  <input type="radio" name="comment"   value="Understandable" required="required" checked="">  <label for="success" class="control-label">Not Understandable</label>   <input type="radio" name="comment"  id="success" value="Not Understandable" required="required">  
                                                           
                                                       </div>
                                                   </div>
                                                   <div class="form-group has-success">
                                                       <label for="success" class="control-label">Comment Description </label>
                                                       <div class="">
                                                       <textarea rows="5" cols="30" name="commdesc"></textarea>
                                                       </div>
                                                   </div>
                                                    
                                                    
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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



        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
        </div> </div> </div> </div>
    </body>
</html>
<?php  } ?>

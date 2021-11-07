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
$mo_title=$_POST['mo_title'];
$mo_code=$_POST['mo_code']; 
$mo_credits=$_POST['mo_credits'];
$le_id=$_POST['le_id'];


$sql="INSERT INTO  module_tbl(mo_title,mo_code,mo_credits,le_id) VALUES(:mo_title,:mo_code,:mo_credits,:le_id)";
$query = $dbh->prepare($sql);
$query->bindParam(':mo_title',$mo_title,PDO::PARAM_STR);
$query->bindParam(':mo_code',$mo_code,PDO::PARAM_STR);
$query->bindParam(':mo_credits',$mo_credits,PDO::PARAM_STR);
$query->bindParam(':le_id',$le_id,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Class Created successfully";
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
                                    <h2 class="title">Create Modules </h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="#">Modules</a></li>
            							<li class="active">Create Modules</li>
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
                                                    <h5>Create Modules</h5>
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

                                                <form  method="post">
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Module Title</label>
                                                		<div class="">
                                                			<input type="text" name="mo_title" class="form-control" required="required" id="success">
                                                            
                                                		</div>
                                                	</div>
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Module Code</label>
                                                		<div class="">
                                                			<input type="text" maxlength="16" name="mo_code" class="form-control" required="required" id="success">
                                                            
                                                		</div>
                                                	</div>

                                                       <div class="form-group has-success">
                                                        <label for="success"  class="control-label">Module Credit </label>
                                                        <div class="">
                                                            <input type="text" maxlength="2" name="mo_credits" required="required" class="form-control" id="success">
                                                            

                                                        </div>

                                                        <div class="form-group has-success">
                                                       <div class="form-group">
                                                <label for="default" class="control-label">Level</label>
                                                
                                                       
 <select name="le_id" class="form-control" id="success"  required="required">
<option value="">Select Department Name</option>
<?php $sql = "SELECT * from level_tbl ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount()>0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->le_id); ?>"><?php echo htmlentities($result->le_title); ?>&nbsp; -<?php echo htmlentities($result->le_class); ?></option>
<?php }


} ?>
 </select>
                                                        </div>
                                                    </div>



                                                        
                                                    
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                                                       		
                                                           
                                                           <button name="login" class="btn btn-success btn-labeled pull-right"><a href="manage-modules.php">Back</a><span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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

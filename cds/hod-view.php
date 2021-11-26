
<?php
session_start();
error_reporting(0);
include_once 'controllers/Comment.php';
	$com = new Comment();
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
        <style>
 		.box{border: 2px solid #999;margin: 20px auto 0;padding: 10px;width: 1138px;height: 580px;overflow: scroll;}
 		.box ul{margin: 0;padding: 0;list-style: none;}
 		.box li{display: block;border-bottom: 1px dashed #ddd;margin-bottom: 5px;padding-bottom: 5px;}
 		.box li:last-child{border-bottom: 0 dashed #ddd;}
 		.box span{color: #888;}
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
                                    <h2 class="title">Manage Class Diary</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="cm-dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="$"><i class="fa fa-home"></i> Class-Diary</a/li>
            							<li class="active">View Class Diary</li>
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

                                                
                                            <div class="box">
 		<ul>
 			<?php 
 				$result = $com->index();
 				while ($data = $result->fetch_assoc()) {
 			 ?>
               <div class="form-group has-success"> <div class="form-group">
               

              <table border="0">
                  <tr><td><b>Week:   </b> <?php echo $data['week'] ?> </td>
                
                  <td><b>Day:</b> <?php echo $data['day'] ?> </td>
                  <td><b>Date:</b> <?php echo $data['dat'] ?> </td>
                </tr><br>
                <tr><td><b>Department:</b> <b><?php echo $data['de_short'] ?> </b></td>
                
                  <td><b>class:</b> <?php echo $data['le_title'] ?> </td>
                  <td><b>Room:</b> <?php echo $data['le_class'] ?> </td>
                </tr>
                <br>
                <tr><td><b>Start Time:</b> <b><?php echo $data['start_time'] ?> </b></td>
                
                  <td><b>Activity:</b> <?php echo $data['activity'] ?> </td>
                  <td><b>End Time:</b> <?php echo $data['end_time'] ?> </td>
                </tr>
               
              </table> </label> </div>  </div>
 			
                                                      

              




             
             <div class="form-group has-success">
                  
                  <div class="panel-body p-25">

                    <table id="" class="display table table-striped table-bordered" cellspacing="0" width="100%">

                    <thead>
                                                        <tr>
                                                            

                                                            <th>Module</th>
                                                            <th>Lecture</th>
                                                          
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                          
                                                            <th>Module</th>
                                                            <th>Lecture</th>
                                                          
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
 
                                                                <td><?php echo $data['mo_title']; ?></td>
                                                                <td><?php echo $data['lect_name']; ?></td>
                                                            
                                                    </tbody>
                                                    

                 </table>

                 <p>
             <div class="form-group has-success">
         <div class="form-group">
                 
                
     <b>Activity:&nbsp;&nbsp;</b><?php echo $data['toc'] ?> 
                  
                 </label></div></p>
                  
                
                </div>
                
                
             <div class="form-group has-success">
         <div class="form-group">
                 
                
     <b>Activity:&nbsp;&nbsp;</b><?php echo $data['commdesc'] ?> 
                  
                 </div>
                  
                
                </div>
                <button class="btn btn-success btn-labeled pull-left" href><a href="cm-comment.php?classid=<?php echo htmlentities($result->mo_id);?>">Comment</a><span class="btn-label btn-label-left"><i class="fa "></i></span></button>
                 
                <div class="form-group text-center mb-3 mt-4">
                    <div class="form-group mt-20">
                                                    		
                                                           
                                                    			<button type="submit"  class="btn btn-success btn-labeled pull-right">Approve<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    		</div>
                    </div>
                    </div></div>

               <h3>------------------------- ------------------------ ------------------------------- --------------------- ----------------------------</h3>

 			<?php } ?>
 		</ul>
 	</div><br><br>
 	
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


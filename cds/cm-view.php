
<?php
session_start();
error_reporting(0);
include('includes/config.php');
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
 		<ul><il>
             
         <?php $sql = "SELECT distinct class_diary_tbl.cd_id,class_diary_tbl.week,department_tbl.de_short,class_diary_tbl.day,class_diary_tbl.dat,
			class_diary_tbl.activity,class_diary_tbl.toc,class_diary_tbl.commdesc,class_diary_tbl.start_time,class_diary_tbl.end_time,modules_tbl.mo_title,
			lecture_tbl.lect_name,level_tbl.le_title,level_tbl.le_class,class_diary_tbl.cm_checked,class_diary_tbl.cm_comm from class_diary_tbl join modules_tbl on class_diary_tbl.cd_id=modules_tbl.mo_id 
			join lecture_tbl on lecture_tbl.lect_id=class_diary_tbl.cd_id join department_tbl on 
			department_tbl.de_id=class_diary_tbl.cd_id join level_tbl on level_tbl.le_id=class_diary_tbl.cd_id";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
               <div class="form-group has-success"> <div class="form-group">
               

              <table border="0">
                  <tr><td><b>Week:   </b> <?php  echo htmlentities($result->week);?> </td>
                
                  <td><b>Day:</b> <?php  echo htmlentities($result->day);?> </td>
                  <td><b>Date:</b> <?php  echo htmlentities($result->dat);?> </td>
                </tr>
                <tr><td><b>Department:</b> <b><?php  echo htmlentities($result->de_short);?> </b></td>
                
                  <td><b>class:</b> <?php  echo htmlentities($result->le_title);?> </td>
                  <td><b>Room:</b> <?php  echo htmlentities($result->le_class); ?> </td>
                </tr>
                
                <tr><td><b>Start Time:</b> <b><?php  echo htmlentities($result->start_time);?> </b></td>
                
                  <td><b>Activity:</b> <?php  echo htmlentities($result->activity); ?> </td>
                  <td><b>End Time:</b> <?php  echo htmlentities($result->end_time); ?> </td>
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


                                                                <td><?php  echo htmlentities($result->mo_title);?></td>
                                                                <td><?php  echo htmlentities($result->lect_name); ?></td>
                                                               
</tr>


                                                    </tbody>
                                                    

                 </table>

                 <p>
             <div class="form-group has-success">
         <div class="form-group">
                 
                
     <b>Activity:&nbsp;&nbsp;</b><?php  echo htmlentities($result->toc);?> 
                  
                 </label></div></p>
                  
                
                </div>
                
                
             <div class="form-group has-success">
         <div class="form-group">
                 
                
     <b>Activity:&nbsp;&nbsp;</b><?php  echo htmlentities($result->commdesc); ?> 
                  
                 </div>
                  
                
                </div>  <div class="form-group has-success">
         <div class="form-group">
                 
                
     <h5><b>Your Comment:&nbsp;&nbsp;</h5><?php  echo htmlentities($result->cm_comm); ?> </b>
                  
                 </div>
                  
                
                </div>



                <button class="btn btn-success btn-labeled pull-left" ><a href="cm-comment.php?classid=<?php echo htmlentities($result->cd_id);?>">Comment</a><span class="btn-label btn-label-left"><i class="fa ">

                </i></span></button>
                 
                <div class="form-group">

&nbsp;&nbsp;&nbsp;&nbsp;<p ><div class="btn btn-success btn-labeled pull-left">
<?php  $stats=$result->cm_checked;
if($stats=="1")
{
?>
<input type="checkbox"  name="cm_checked" value="" required="required" checked> 
<?php }?>
<?php  
if($stats=="0")
{
?>
<input type="checkbox" name="cm_checked" value=""  > 
<?php }?>



</div></p>
</div>


</il></ul>

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
<?php }} ?>


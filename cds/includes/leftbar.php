<div class="left-sidebar bg-black-300 box-shadow ">
                        <div class="sidebar-content">
                            <div class="user-info closed">
                                <img src="images/admin.jpg"  alt="#####" width="100" height="100" class="img-circle profile-img">
                                <h6 class="title"><?php echo$_SESSION['fname'];?></h6>
                                <small class="info">Head Of Department</small>
                            </div>
                            <!-- /.user-info -->

                            <div class="sidebar-nav">
                                <ul class="side-nav color-gray">
                                    <li class="nav-header">
                                        <span class="">Main Category</span>
                                    </li>
                                    <li>
                                        <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
                                     
                                    </li>

                                    <li class="nav-header">
                                        <span class="">Appearance</span>
                                    </li>

                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-users"></i> <span>Academic Year</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="add-academic_year.php"><i class="fa fa-bars"></i> <span>Add academic</span></a></li>
                                            <li><a href="manage-academic_year.php"><i class="fa fa fa-server"></i> <span>manage Academic Year</span></a></li>
                                            
                                           
                                        </ul>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-users"></i> <span>Levels</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="create-level.php"><i class="fa fa-bars"></i> <span>Create Level</span></a></li>
                                            <li><a href="manage-level.php"><i class="fa fa fa-server"></i> <span>manage Level</span></a></li>
                                            
                                           
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Modules</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="create-module.php"><i class="fa fa-bars"></i> <span>Create Modules</span></a></li>
                                            <li><a href="manage-modules.php"><i class="fa fa fa-server"></i> <span>Manage Modules</span></a></li>
                                           
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Lectures</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="create-lecture.php"><i class="fa fa-bars"></i> <span>Create Lecture</span></a></li>
                                            
                                            <li><a href="manage-lectures.php"><i class="fa fa fa-bars"></i> <span>Manage Lectures</span></a></li>
                                           
                                        </ul>
                                    </li>
                                    
    <li class="has-children">                                        
        <a href="#"><i class="fa fa-info-circle"></i> <span>Class Diary </span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                        
                                            <li><a href="view_class_diary.php"><i class="fa fa-bars"></i> <span>View Class Diary Table</span></a></li>
                                            <li><a href="hod-view.php"><i class="fa fa-bars"></i> <span>View Class Diary </span></a></li>
                                           
                                        </ul>
                                        <li class="has-children">                                        
        <a href="#"><i class="fa fa-info-circle"></i> <span>Add User & Profile </span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                        
                                        <li><a href="create-users.php"><i class="fa fa fa-server"></i> <span>Add CM Or CR </span></a></li>
                                        <li><a href="manage-users.php"><i class="fa fa-bars"></i> <span>Manage User </span></a></li>
                                            <li><a href="change-password.php"><i class="fa fa-server"></i> <span>Change Your Password </span></a></li>
                                           
                                        
                                           
                                    </li>
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>
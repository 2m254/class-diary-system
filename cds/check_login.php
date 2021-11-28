<?php
      
       session_start();
     

if(count($_POST) > 0 ){

$connection = mysqli_connect("localhost", "root", "", "cds-db") or die("not connected");

$username = $_POST['username'];
$password = $_POST['password'];
$post=$_POST['post'];

$sel_q  = "SELECT * FROM users_tbl WHERE username = '$username' AND password = '$password' and post='$post'";
$row = mysqli_query($connection, $sel_q);
$result = mysqli_fetch_array($row);
if(is_array($result)){
	$_SESSION['username'] = $result['username'];
    $_SESSION['password'] = $result['password'];
	$_SESSION['user_id'] = $result['user_id'];
    $_SESSION['post'] = $result['post'];
    $_SESSION['level_name'] = $result['level_name'];
    $_SESSION['level_room'] = $result['level_room'];
    $_SESSION['department'] = $result['department'];
    $_SESSION['fname'] = $result['fname'];
    $_SESSION['lname'] = $result['lname'];
    
    if(isset($_SESSION['username']) AND $result['post']=="HOD" AND $post=="HOD"){
      header('location:dashboard.php');
    }

    else if(isset($_SESSION['username']) AND $result['post']=="CM" AND $post=="CM"){
        header('location:CM-dashboard.php');
    }
    else if(isset($_SESSION['username']) AND $result['post']=="CR" AND $post=="CR"){
        header('location:add-class_diary.php');
    }
}
else{
	echo"<script>alert('Invalid Account?')</script>";
    echo"<script>history.back()</script>";
}
}


?>

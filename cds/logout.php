

<?php
$connection = mysqli_connect("localhost", "root", "", "cds-db");
session_start();
//destroy the session
session_unset();
//redirect to login page
header("location: index.php");
?>

<?php

include "includes/config.php"; // Using database connection file here

$id = $_GET['classid']; // get id through query string

$del = "delete from modules_tbl where id = '$id'"; // delete query
$query = $dbh->prepare($del);
if($query)
{
    mysqli_close($dbh); // Close connection
    header("location:manage_modules.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
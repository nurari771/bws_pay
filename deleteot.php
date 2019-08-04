<?php
session_start ();
include('connect.php');
$ot_id=$_GET['ot_id'];
$sql="DELETE FROM ot WHERE ot_id ='$ot_id'";
 
if(mysqli_query($conn,$sql)){
    header("location:report.php");
}    ?>

<?php
session_start ();
include('connect.php');
$late_id=$_GET['late_id'];
$sql="DELETE FROM late_id WHERE late_id ='$late_id'";
 
if(mysqli_query($conn,$sql)){
    header("location:admin_master_data.php");
}    ?>

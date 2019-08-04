<?php
session_start ();
include('connect.php');
$latedayot_id=$_GET['latedayot_id'];
$sql="DELETE FROM lateday WHERE latedayot_id ='$latedayot_id'";
 
if(mysqli_query($conn,$sql)){
    header("location:latestaff1.php");
}    ?>

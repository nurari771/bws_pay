<?php
include('connect.php');
$com_id=$_GET['com_id'];
$sql="DELETE FROM commission WHERE com_id ='$com_id'";
 
if(mysqli_query($conn,$sql)){
    header("location:report.php");
}    ?>

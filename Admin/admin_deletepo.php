<?php
include('connect.php');
$position_id=$_GET['position_id'];
$sql="DELETE FROM position WHERE position_id ='$position_id'";
 
if(mysqli_query($conn,$sql)){
    header("location:admin_master_data.php");
}    ?>

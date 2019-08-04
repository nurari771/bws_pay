<?php
include('connect.php');
$member_id=$_GET['member_id'];
$sql="DELETE FROM member WHERE member_id ='$member_id'";
 
if(mysqli_query($conn,$sql)){
    header("location:admin_profile.php");
}    ?>

<?php
session_start ();
include('connect.php');
$maoot_id=$_GET['maoot_id'];
$sql="DELETE FROM mao_ot WHERE maoot_id ='$maoot_id'";
 
if(mysqli_query($conn,$sql)){
    header("location:admin_master_data.php");
}    ?>

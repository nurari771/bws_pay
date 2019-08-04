<?php
session_start ();
include('connect.php');
$travel_id=$_GET['travel_id'];
$sql="DELETE FROM travel WHERE travel_id ='$travel_id'";
 
if(mysqli_query($conn,$sql)){
    header("location:admin_travel.php");
}    ?>
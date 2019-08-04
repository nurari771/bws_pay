<?php 
include('connect.php');
$com_id = $_POST['com_id'];
$name_project= $_POST['name_project'];
$com_day = $_POST['com_day'];
$total_com = $_POST['total_com'];
$confirm = $_POST['confirm'];
  


   $sql = "UPDATE commission SET `com_id` = '$com_id' , `name_project` = '$name_project' , `total_com` = '$total_com' ,`com_day` = '$com_day' ,`confirm` = '$confirm' WHERE `com_id`= '$com_id'";
    if(mysqli_query($conn,$sql)) {
        echo "<script type='text/javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
        header("location:admin_com.php");
    }else{
        
        
    }
mysqli_close($conn);
?>
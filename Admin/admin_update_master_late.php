<?php 
$late_id= $_POST['late_id'];
$duration= $_POST['duration'];
$nextday= $_POST['nextday'];

include ("connect.php");
   $sql="UPDATE `late_id` SET `late_id`='$late_id',`duration`='$duration',`nextday`='$nextday' where `late_id`='$late_id'";
    //$sql_query=mysqli_query($conn,$sql);
    if(mysqli_query($conn,$sql)) {
        echo "<script type='text/javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
        header("location:admin_master_data.php");
    }else{
        
        echo "<script type='text/javascript'>alert('ไม่สามารถแก้ไขข้อมูลได้');window.history.go(-1);</script>" ;
    }
mysqli_close($conn);
?>
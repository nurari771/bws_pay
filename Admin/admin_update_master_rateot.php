<?php 
$rateot_id= $_POST['rateot_id'];
$rate_price= $_POST['rate_price'];

include ("connect.php");
   $sql="UPDATE `rate_ot` SET `rateot_id`='$rateot_id',`rate_price`='$rate_price'";
    //$sql_query=mysqli_query($conn,$sql);
    if(mysqli_query($conn,$sql)) {
        echo "<script type='text/javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
        header("location:admin_master_data.php");
    }else{
        
        echo "<script type='text/javascript'>alert('ไม่สามารถแก้ไขข้อมูลได้');window.history.go(-1);</script>" ;
    }
mysqli_close($conn);
?>
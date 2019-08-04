<?php 
$maoot_id= $_POST['maoot_id'];
$pay_category= $_POST['pay_category'];
$d_ot= $_POST['d_ot'];

include ("connect.php");
   $sql="UPDATE `mao_ot` SET `maoot_id`='$maoot_id',`pay_category`='$pay_category',`d_ot`='$d_ot'  where `maoot_id`='$maoot_id'";
    //$sql_query=mysqli_query($conn,$sql);
    if(mysqli_query($conn,$sql)) {
        echo "<script type='text/javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
        header("location:admin_master_data.php");
    }else{
        
        echo "<script type='text/javascript'>alert('ไม่สามารถแก้ไขข้อมูลได้');</script>" ;
    }
mysqli_close($conn);
?>
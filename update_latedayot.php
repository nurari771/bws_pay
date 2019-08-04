<?php 
$latedayot_id= $_POST['latedayot_id'];
$duration = $_POST['duration'];
$nextday = $_POST['nextday'];
$date = $_POST['date'];
 
  
include ("connect.php");
   $sql="UPDATE `lateday` SET  `latedayot_id`='$latedayot_id',`duration`='$duration',`nextday`='$nextday' , `date`='$date' WHERE `latedayot_id` = '$latedayot_id'";
    //$sql_query=mysqli_query($conn,$sql);
    echo $sql; exit();
    if(mysqli_query($conn,$sql)) {
        echo "<script type='text/javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
        header("location:latestaff1.php");
    }
mysqli_close($conn);
?>
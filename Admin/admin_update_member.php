<?php 
$member_id = $_POST['member_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$nickname = $_POST['nickname'];
$start_day = $_POST['start_day'];
$position_id = $_POST['position_id'];
$id = $_POST['id'];

include('connect.php');
   $sql="UPDATE `member` SET `member_id`='$member_id',`first_name`='$first_name',
   `last_name`='$last_name',`nickname`='$nickname' ,`start_day`='$start_day',`position_id`='$position_id',
`id`='$id' WHERE `member_id` = '$member_id'";
//    var_dump($sql);exit();

    if(mysqli_query($conn,$sql)) {
        echo "<script type='text/javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
        header("location:admin_profile.php");
        
        
    }
mysqli_close($conn);
?>
<?php 
include('connect.php');
$travel_id= $_POST['travel_id'];
$member_id= $_POST['member_id'];
$travel_date= $_POST['travel_date'];
$travel_go = $_POST['travel_go'];
$pay_go = $_POST['pay_go'];
$pic_go = null;
$pic_back = null;

if (isset($_FILES['picGo'])) {
    // echo "1"."<br>";
    $pic_go = $_FILES['picGo']['name'] ?? null;
    // echo "<br>";
    move_uploaded_file($_FILES['picGo']['tmp_name'],"images/".$_FILES['picGo']['name']);
}

if (isset($_FILES['picBack'])) {
    // echo "2"."<br>";
    $pic_back=$_FILES['picBack']['name'] ?? null;
    // echo "<br>";
    move_uploaded_file($_FILES['picBack']['tmp_name'],"images/".$_FILES['picBack']['name']);
}

$travel_back= $_POST['travel_back'];
$pay_back = $_POST['pay_back'];
$total_pay= $_POST['total_pay'];
$travel_detail = $_POST['travel_detail'];
$makeday_travel = $_POST['makeday_travel'];

    if ($pic_go != null && $pic_back == null) {

        $sql = "UPDATE `travel` SET `travel_id`='$travel_id',`travel_date`='$travel_date',`member_id`='$member_id', `travel_go`='$travel_go',`pay_go`='$pay_go',`pic_go`='$pic_go',`travel_back`='$travel_back' , `pay_back`='$pay_back', `total_pay`='$total_pay' ,  `travel_detail`='$travel_detail' , `makeday_travel`='$makeday_travel' WHERE `travel_id` = '$travel_id'";

    } else if ($pic_go == null && $pic_back != null) {

        $sql = "UPDATE `travel` SET `travel_id`='$travel_id',`travel_date`='$travel_date',`member_id`='$member_id', `travel_go`='$travel_go',`pay_go`='$pay_go',`travel_back`='$travel_back' , `pay_back`='$pay_back' , `pic_back`='$pic_back' , `total_pay`='$total_pay' ,  `travel_detail`='$travel_detail' , `makeday_travel`='$makeday_travel' WHERE `travel_id` = '$travel_id'";

    } else if ($pic_go != null && $pic_back != null) {

        $sql = "UPDATE `travel` SET `travel_id`='$travel_id',`travel_date`='$travel_date',`member_id`='$member_id', `travel_go`='$travel_go',`pay_go`='$pay_go',`pic_go`='$pic_go',`travel_back`='$travel_back' , `pay_back`='$pay_back' , `pic_back`='$pic_back' , `total_pay`='$total_pay' ,  `travel_detail`='$travel_detail' , `makeday_travel`='$makeday_travel' WHERE `travel_id` = '$travel_id'";

    } else {

        $sql = "UPDATE `travel` SET `travel_id`='$travel_id',`travel_date`='$travel_date',`member_id`='$member_id', `travel_go`='$travel_go',`pay_go`='$pay_go',`travel_back`='$travel_back' , `pay_back`='$pay_back', `total_pay`='$total_pay' ,  `travel_detail`='$travel_detail' , `makeday_travel`='$makeday_travel' WHERE `travel_id` = '$travel_id'";

    }
   
    //$sql_query=mysqli_query($conn,$sql);
    if(mysqli_query($conn,$sql)) {
        echo "<script type='text/javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
        header("location:report.php");
    }else{
        
        echo "<script type='text/javascript'>alert('ไม่สามารถแก้ไขข้อมูลได้');window.history.go(-1);</script>" ;
    }
mysqli_close($conn);
?>
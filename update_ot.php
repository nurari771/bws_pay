<?php
include ("connect.php");
$ot_id= $_POST['ot_id']; 
$day_ot = $_POST['day_ot'];
$time_start = $_POST['time_start'] ?? null;
$time_end = $_POST['time_end'] ?? null;
$price_ot= $_POST['price_ot'] ?? null;
$name_ot= $_POST['name_ot'];
$ot_detail= $_POST['ot_detail'];
$makeday_ot= $_POST['makeday_ot'];	
$pay_category = null;
$d_ot = $_POST['d_ot'];
if ($d_ot != 0) {
    $mao_ot = "SELECT pay_category from mao_ot where d_ot = '$d_ot'";
    $result_mao = $conn->query($mao_ot);
    $row = $result_mao->fetch_assoc();
    $pay_category = $row['pay_category'];
}
    
$check= $_POST['check'];

echo $ot_id."<br>".$day_ot."<br>".$time_start."<br>".$time_end."<br>".$price_ot."<br>".$name_ot."<br>".$ot_detail."<br>".$makeday_ot."<br>".$pay_category."<br>".$d_ot."<br>".$check;

    if ($check == 'time') {
        $sql="UPDATE ot SET ot_id='$ot_id',day_ot='$day_ot',time_start='$time_start',time_end='$time_end',price_ot='$price_ot',name_ot='$name_ot',ot_detail='$ot_detail', makeday_ot='$makeday_ot', pay_category = null, d_ot = null WHERE ot_id = '$ot_id'";
    } else {
        $sql="UPDATE ot SET ot_id = '$ot_id', day_ot = '$day_ot', time_start = null, time_end = null, price_ot = null, name_ot = '$name_ot',ot_detail = '$ot_detail', makeday_ot = '$makeday_ot', pay_category = '$pay_category', d_ot = '$d_ot' WHERE ot_id = '$ot_id'";
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
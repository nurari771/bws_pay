<?php
    include('connect.php');
    session_start();
    $member_id = $_SESSION['member_id'];
    $day_ot = $_POST['day_ot'];
    $name_ot = $_POST['name_ot'];
    $ot_detail = $_POST['ot_detail'];
    ($_POST['time_start'] == "") ? $time_start == null : $time_start = $_POST['time_start'];  
    ($_POST['time_end'] == "") ? $time_end == null : $time_end = $_POST['time_end'];  
    ($_POST['d_ot'] == "") ? $d_ot == null : $d_ot = $_POST['d_ot'];  
    ($_POST['makeday_ot'] == "") ? $makeday_ot == null : $makeday_ot = $_POST['makeday_ot'];  
    ($_POST['price_ot'] == "") ? $price_ot == null : $price_ot = $_POST['price_ot'];  
    ($_POST['pay_category'] == "") ? $pay_category == null : $pay_category = $_POST['pay_category'];
    $confirm = $_POST['confirm'];
    
    if (!empty($d_ot)) {
        $mao = "SELECT pay_category from mao_ot WHERE d_ot = '$pay_category'";
        $result = $conn->query($mao);
        $row = $result->fetch_assoc();
        $pay_category = $row['pay_category'];
    }
    
    
    
    // if($pay_category == $d_ot){
    //     $pay_category = 'value';
    
    // else if ($pay_category == 2){
    //     echo ("18.00-04.00");
    //     $pay_category= "18.00-02.00";
    // }
    // else if($pay_category == 3){
    //     //echo ("18.00-06.00");
    //     $pay_category= "18.00-06.00";
    // }
    // else if ($pay_category == 4){
    //     //echo ("เสาร์ 5ชั่วโมงขึ้น");
    //     $pay_category= "เสาร์ 5ชั่วโมงขึ้น";
    // }   
    // else if ($pay_category == 5){
    //     //echo ("อาทิตย์ 5ชั่วโมงขึ้น");
    //     $pay_category= "อาทิตย์ 5ชั่วโมงขึ้น";
    // }  
    $sql = "INSERT INTO ot (member_id,day_ot,time_start,time_end
    ,name_ot,ot_detail,makeday_ot,price_ot,d_ot,pay_category,confirm) 
    values ('$member_id', '$day_ot', '$time_start', '$time_end' 
     , '$name_ot' , ' $ot_detail' ,'$makeday_ot','$price_ot' ,'$d_ot' ,'$pay_category','ยังไม่เบิกจ่าย')";
    if ($conn->query($sql) === TRUE) {
        header("location:report.php");        
        return true;
                
	} else {
        
        return false;
        }
    
   ?>
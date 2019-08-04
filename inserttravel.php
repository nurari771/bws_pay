<?php
    include('connect.php');
    session_start();
    
   
    $member_id = $_SESSION['member_id'];
    $travel_date=$_POST['travel_date'];
    $travel_go=$_POST['travel_go'];
    $pay_go=$_POST['pay_go'];
    $pic_go=$_FILES["pic_go"]["name"];
    move_uploaded_file($_FILES["pic_go"]["tmp_name"],"images/".$_FILES["pic_go"]["name"]);

    $confirm = $_POST['confirm'];
    $travel_back=$_POST['travel_back'];
    $pay_back=$_POST['pay_back'];
    $pic_back=$_FILES["pic_back"]["name"];
    move_uploaded_file($_FILES["pic_back"]["tmp_name"],"images/".$_FILES["pic_back"]["name"]);
    $total_pay=$_POST['total_pay'];
    $travel_detail=$_POST['travel_detail'];
    $makeday_travel=$_POST['makeday_travel'];

    $sql = "INSERT INTO travel(member_id,travel_date,travel_go,pay_go,pic_go,travel_back,pay_back,
    pic_back,total_pay,travel_detail,makeday_travel,confirm) 
    VALUES('$member_id','$travel_date','$travel_go','$pay_go','$pic_go','$travel_back','$pay_back',
    '$pic_back','$total_pay','$travel_detail','$makeday_travel','ยังไม่เบิกจ่าย');";
  if ($conn->query($sql) === TRUE) {
        header("location:report.php");        
        return true;
                
	} else {
        return false;
        }
        ?>
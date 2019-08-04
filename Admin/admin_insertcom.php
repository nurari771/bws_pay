<?php
    include('connect.php');

    $member_id=$_POST['member_id'];
    $com_day=$_POST['com_day'];
    $name_project=$_POST['name_project'];
    $total_com=$_POST['total_com'];
    $confirm = $_POST['confirm'];
   
    $sql = "INSERT INTO commission (member_id,com_day,name_project,total_com,confirm)
    VALUES('$member_id','$com_day','$name_project','$total_com','ยังไม่เบิกจ่าย');";
        if ($conn->query($sql) == TRUE) {
            header("location:admin_com.php");
            return true;
        } else {
            return false;
        }
?>
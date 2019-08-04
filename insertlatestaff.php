<?php
    include('connect.php');
    session_start();
    $member_id = $_SESSION['member_id'];
    ($_POST['duration'] == "") ? $duration== null : $duration = $_POST['duration'];
    ($_POST['nextday'] == "") ? $nextday == null : $nextday = $_POST['nextday'];  
    $date = $_POST['date'];
    $confirm = $_POST['confirm'];


    if (!empty($nextday)) {
        $late = "SELECT duration from late_id WHERE nextday = '$duration'";
        $result = $conn->query($late);
        $row = $result->fetch_assoc();
        $duration = $row['duration'];
    }
   
    
    $sql = "INSERT INTO lateday (member_id,duration,nextday,date,confirm) 
    values ('$member_id', '$duration', '$nextday', '$date' ,'ยังไม่ยืนยัน')";
    if ($conn->query($sql) === TRUE) {
        header("location:latestaff1.php");        
        return true;
                
	} else {
        
        return false;
        }
    
   ?>
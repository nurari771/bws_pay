<?php
    include('connect.php');

    $username=$_POST['username'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $nickname=$_POST['nickname'];
    $position_id=$_POST['position_id'];
    $start_day=$_POST['start_day'];
    $id=$_POST['id'];
    $status=$_POST['status'];
    $password=$_POST['password'];

    $sql = "INSERT INTO member(username,first_name,last_name,nickname,position_id,start_day,status,password,id) 
    VALUES('$username','$first_name','$last_name','$nickname','$position_id','$start_day','$status','$password','$id');";
  if ($conn->query($sql) === TRUE) {
        header("location:admin_profile.php");        
        return true;
                
	} else {
        return false;
        }
        ?>
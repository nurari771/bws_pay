<?php
    include('connect.php');
    $duration=$_POST['duration'];
    $nextday=$_POST['nextday'];

    $sql = "INSERT INTO late_id (duration,nextday)
    VALUES('$duration','$nextday');";
  if ($conn->query($sql) === TRUE) {
        header("location:admin_master_data.php");        
        return true;
                
	} else {
        header("location:admin_master_data.php");  
        return false;
        }
        ?>
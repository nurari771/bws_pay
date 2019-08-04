<?php
    include('connect.php');

    $position_id=$_POST['position_id'];
    $position=$_POST['position'];
    

    $sql = "INSERT INTO position (position_id,position)
    VALUES('$position_id','$position');";
        if ($conn->query($sql) == TRUE) {
            header("location:admin_master_data.php");
            return true;
        } else {
            return false;
        }
?>
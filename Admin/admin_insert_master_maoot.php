<?php
    include('connect.php');

    $pay_category=$_POST['pay_category'];
    $d_ot=$_POST['d_ot'];


    $sql = "INSERT INTO mao_ot(pay_category,d_ot)
    VALUES('$pay_category','$d_ot');";
  if ($conn->query($sql) === TRUE) {
        header("location:admin_master_data.php");        
        return true;
                
	} else {
        return false;
        }
        ?>
        
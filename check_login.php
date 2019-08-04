<?php
	session_start();
$username=$_POST['username'];
$password=$_POST['password'];

$servername = "localhost";
$username = "root";
$password = "monday110";
$dbname = "bws1";
$conn = new mysqli($servername, $username, $password, $dbname);
	// $hashPassword = hash('sha256', $_POST['password']);
//$hashPassword = hash('sha256', $_POST['password']);
// var_dump($hashPassword);exit();

	$strSQL = "SELECT * FROM member WHERE username = '".$_POST['username']."' and password = '".$_POST['password']."'";
	// var_dump($strSQL);exit();
	$objQuery = mysqli_query($conn, $strSQL);
	$objResult = mysqli_fetch_assoc($objQuery);
	if(!$objResult)
	{
		echo "<script type=\"text/javascript\">";
		echo "alert(\"ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง\");";
		echo "window.history.back();";
		echo "</script>";
	}
	else
	{
			$_SESSION["member_id"] = $objResult["member_id"];
			$_SESSION["status"] = $objResult["status"];
			session_write_close();

			if($objResult["status"] == "admin")
			{
				header("location: Admin/admin_index1.php");
			}
			else if($objResult["status"] == "member")
			{
				header("location: index.php");
			}
			else{
				header("location: login.php");
			}
	}
	mysqli_close($conn);
?>

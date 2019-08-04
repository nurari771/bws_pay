<?php 
date_default_timezone_set('Asia/Bangkok');
include('connect.php');
include('lock.php');
$sql = "SELECT * from commission as c inner join member as m on m.member_id = c.member_id where c.member_id = '".$_GET['member_id']."' AND c.com_id = '".$_GET['com_id']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>ดูค่าคอมมิชชั่น</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="asset/css/main.css" />
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">

	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<!-- Header -->
								<header id="header">
									<strong>ดูค่าคอมมิชชัน</strong>
									<ul class="icons">
									<a href="logout.php"><img src="images/icon.png"></a>
									</ul>
								</header>
							<!-- Section -->
<section>
<h5 align="center">ดูค่าคอมมิชชั่น</h4><br>
	<form>
	<table class="table table-borderless">
		<tbody>
			<tr>
			<div class="form-row">
 	 	  <td align="right"><label for="firstname">ชื่อ-นามสกุล: </label></td>
 				<td><div class="form-group col-md-7">
  			<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['first_name']." ".$row['last_name']; ?>" readonly></td>
  </div></tr>


  <tr>
	  <div class="form-row">
	    <td align="right"><label for="input">โดย: </label></td>
	 	 	  <td> <div class="form-group col-md-7">
	 				 <label>รวมกับเงินเดือน</label>
	  </div></td>
	</div></tr>


  <tr>
	  <div class="form-row">
	      <td align="right"><label for="com_day">ลงวันที่: </label></td>
				   <td><div class="form-group col-md-7">
	      <input type="date" class="form-control" id="com_day" value="<?php echo $row['com_day']; ?>"readonly>
	    </div></td>
		</div>
  </tr>

  <tr>
    <div class="form-row">
	    <td align="right"><label for="name_project">ชื่อโครงการ: </label></td>
				<td><div class="form-group col-md-7">
	 	      <input type="text" class="form-control" id="name_project" name="name_project" value="<?php echo $row['name_project']; ?>" readonly>
	 	    </div></td>
		</div></tr>

  <tr>
		<div class="form-row">
		  <td align="right"><label for="total_com">จำนวนเงิน:</label></td>
			 <td><div class="form-group col-md-7">
      <input type="text" class="form-control" id="total_com"name="total_com" value="<?php echo $row['total_com']; ?>" readonly>
    </div></td>
	</div></tr>
</tbody>
</table>
	<center><a href="admin_com.php" class="button primary">ย้อนกลับ</a></center>
</form>
</section>
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<!-- <section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>																																																																																																																			ธนสิษฐ์ รับผิดชอบbackendหน้านี้
								-->

							<!-- Menu -->
							<nav id="menu">
								<header class="major">
									<h2>เมนู</h2>
								</header>
								<ul>
									<li><a href="admin_index1.php">หน้าแรก</a></li>
									<li><a href="admin_profile.php">ข้อมูลพนักงาน</a></li>
									<li>
										<span class="opener">สิทธิการเบิก</span>
										<ul>
											<li><a href="admin_ot.php">OT</a></li>
											<ul>
													<li><a href="admin_latestaff1.php">ตรวจสอบสิทธิการขอมาสายของพนักงาน</a></li>
												</ul></li>
											<li><a href="admin_travel.php">ค่าเดินทาง</a></li>
											<li><a href="admin_com.php">ค่าคอม</a></li>
											
									</ul>
										<li><a href="admin_report.php">ข้อมูลการเบิกรายบุคคุล</a>
									</li>
									
									<li>
										<span class="opener">รายงาน</span>
										<ul>
											<li><a href="admin_sumot.php">OT</a></li>
											
											<li><a href="admin_sumtravel.php">ค่าเดินทาง</a></li>
											<li><a href="admin_sumcom.php">ค่าคอม</a></li>
											
									</ul>
									            
							</nav>

		<!-- Scripts -->
			<script src="asset/js/jquery.min.js"></script>
			<script src="asset/js/browser.min.js"></script>
			<script src="asset/js/breakpoints.min.js"></script>
			<script src="asset/js/util.js"></script>
			<script src="asset/js/main.js"></script>

	</body>
</html>

<?php 
date_default_timezone_set('Asia/Bangkok');
include('connect.php');
include('lock.php');
$sql = "SELECT * from ot as t inner join member as m on m.member_id = t.member_id where t.member_id = '".$_GET['member_id']."' AND t.ot_id = '".$_GET['ot_id']."'";
$result = $conn->query($sql);
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>


<!DOCTYPE HTML>

<html>
	<head>
		<title>ดูค่า OT</title>
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
									<strong>  สิทธิการเบิกOT</strong>
									<ul class="icons">
									<a href="logout.php"><img src="images/icon.png"></a>
									</ul>
								</header>
							<!-- Section -->
<section>
<h5 align="center">ดูค่าOT</h4><br>
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
	      <td align="right"><label for="makeday_ot">วันที่ทำOT: </label></td>
				   <td><div class="form-group col-md-7">
	      <input type="date" class="form-control" id="day_ot" name="day_ot" value="<?php echo $row['day_ot']; ?>" readonly>
	    </div></td>
		</div>
  </tr>
  <tr>
	  <div class="form-row">
	      <td align="right"><label for="day_ot">ลงวันที่: </label></td>
				   <td><div class="form-group col-md-7">
	      <input type="date" class="form-control" id="makeday_ot" name="makeday_ot" value="<?php echo $row['makeday_ot']; ?>" readonly>
	    </div></td>
		</div>
  </tr>
  <tr>
    <div class="form-row">
	    <td align="right"><label for="name_ot">ชื่อโครงการ: </label></td>
				<td><div class="form-group col-md-7">
	 	      <input type="text" class="form-control" id="name_ot" name="name_ot" value="<?php echo $row['name_ot'] ?>" readonly>
	 	    </div></td>
		</div></tr>
        <tr>
        <div class="form-row">
	    <td align="right"><label for="time_start">เวลาเริ่มต้น: </label></td>
				<td><div class="form-group col-md-7">
	 	      <input type="text" class="form-control" id="time_start" name="time_start" value="<?php echo $row['time_start']; ?>" readonly>
	 	    </div></td>
		</div></tr>
        <tr>
        <div class="form-row">
	    <td align="right"><label for="time_end">เวลาสิ้นสุด: </label></td>
				<td><div class="form-group col-md-7">
	 	      <input type="text" class="form-control" id="time_end" name="time_end" value="<?php echo $row['time_end']; ?>" readonly>
	 	    </div></td>
		</div></tr>
		<tr>
		<div class="form-row">
		  <td align="right"><label for="price_ot">จำนวนเงิน:</label></td>
			 <td><div class="form-group col-md-7">
      <input type="text" class="form-control" id="price_ot" name="price_ot" value="<?php echo $row['price_ot']; ?>" readonly>
    </div></td>
	</div></tr>
        <tr>
    <div class="form-row">
	    <td align="right"><label for="pay_category">สำหรับเหมา: </label></td>
				<td><div class="form-group col-md-7">
	 	      <input type="text" class="form-control" id="pay_category" name="pay_category" value="<?php echo $row['pay_category']; ?>"  readonly>
	 	    </div></td>
		</div></tr>
  <tr>
		<div class="form-row">
		  <td align="right"><label for="price_ot">จำนวนเงิน:</label></td>
			 <td><div class="form-group col-md-7">
      <input type="text" class="form-control" id="d_ot" name="d_ot" value="<?php echo $row['d_ot']; ?>" readonly>
    </div></td>
	</div></tr>
</tbody>
</table>
	<center><a href="admin_ot.php" class="button primary">ย้อนกลับ</a></center>
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
								</section> 																																																																																																																																								พงศธร รับผิดชอบbackendหน้านี้
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

							<!-- Footer -->
								<footer id="footer">
								</footer>

						</div>
					</div>
			</div>

		<!-- Scripts -->
			<script src="asset/js/jquery.min.js"></script>
			<script src="asset/js/browser.min.js"></script>
			<script src="asset/js/breakpoints.min.js"></script>
			<script src="asset/js/util.js"></script>
			<script src="asset/js/main.js"></script>

	</body>
</html>

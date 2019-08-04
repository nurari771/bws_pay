<!DOCTYPE HTML>
<?php 
include('connect.php');
include('lock.php');
$sql = "SELECT * FROM late_id WHERE late_id = '".$_GET['late_id']."' ORDER BY late_id" ;
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<html>
	<head>
		<title>แก้ไขข้อมูล Master Data กำหนดการมาสาย</title>
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
									<strong>แก้ไขข้อมูล Master Data กำหนดการมาสาย</strong>
									<ul class="icons">
									<a href="logout.php"><img src="images/icon.png"></a>
									</ul>
								</header>

<!-- Section -->
<section>
<form method="POST" action="admin_update_master_late.php">
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="duration">ช่วงเวลาที่ทำ OT</label>
      <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $row['duration']; ?> "placeholder="ช่วงเวลาที่ทำ" required>
	  <input type="hidden" name="late_id" id="late_id" value="<?php echo $row['late_id']; ?>">
    </div>	
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="nextday">เวลาเข้างานได้ไม่เกิน</label>
      <input type="text" class="form-control" id="nextday" name="nextday" value="<?php echo $row['nextday']; ?> "placeholder="เวลาเข้างานได้ไม่เกิน" required>
    </div>	
  </div>
  
	  <input class="primary" type="submit" value="บันทึก">
		<input type="reset" value="ยกเลิก" />
</form>
</section>
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">
							
				<!-- Search                                                                                                                                                                                                                                         พงศธร รับผิดชอบ backendหน้านี้
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
							</ul>

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




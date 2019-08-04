<!DOCTYPE HTML>
<?php 
include('connect.php');
include('lock.php');
$sql = "SELECT * FROM mao_ot WHERE maoot_id = '".$_GET['maoot_id']."' ORDER BY maoot_id" ;
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<html>
	<head>
		<title>แก้ไขข้อมูล Master Data เหมาจ่าย OT</title>
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
									<strong>แก้ไขข้อมูล Master Data เหมาจ่าย OT</strong>
									<ul class="icons">
									<a href="logout.php"><img src="images/icon.png"></a>
									</ul>
								</header>

<!-- Section -->
<section>
<form method="POST" action="admin_update_master_maoot.php">
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="pay_category">ช่วงเวลาที่ทำ OT</label>
      <input type="text" class="form-control" id="pay_category" name="pay_category" value="<?php echo $row['pay_category']; ?> "placeholder="ช่วงเวลา" required>
	  <input type="hidden" name="maoot_id" id="maoot_id" value="<?php echo $row['maoot_id']; ?>">
    </div>	
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="d_ot">เรทการจ่าย OT</label>
      <input type="text" class="form-control" id="d_ot" name="d_ot" value="<?php echo $row['d_ot']; ?> "placeholder="ราคาเหมาจ่าย" required>
    </div>	
  </div>
  <!-- <div class="form-row">
    <div class="form-group col-md-5">
      <label for="canlate">กำหนดสามารถมาสายได้</label>
      <input type="text" class="form-control" id="canlate" name="canlate" value="<?php echo $row['canlate']; ?>" placeholder="00.00 น." required>
    </div>	
  </div> -->
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




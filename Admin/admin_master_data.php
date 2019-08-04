<?php 
	require('connect.php');
	include('lock.php');
	$user = "SELECT * FROM rate_ot" ;
	$result = mysqli_query($conn,$user);
	$count = mysqli_num_rows($result);
	$mao = "SELECT * FROM mao_ot" ;
	$result_mao = mysqli_query($conn,$mao);
	$count_mao = mysqli_num_rows($result_mao);
	$late = "SELECT * FROM late_id" ;
	$result_late = mysqli_query($conn,$late);
	$count_late = mysqli_num_rows($result_late);
	$position = "SELECT * FROM `position`" ;
	$result_position = mysqli_query($conn,$position);
	$count_position = mysqli_num_rows($result_position);
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Master Data</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="asset/css/main.css" />
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<strong>Master Data</strong></a>
									<ul class="icons">
									<a href="logout.php"><img src="images/icon.png"></a>
									</ul>
								</header>

							<!-- Section -->
								<section>
								<div class="table-wrapper">
									<!-- <a href="admin_masterrateotadd.php" class="button primary float-right">เพิ่มข้อมูลคำนวณตามระยะเวลา</a><br> -->
									<div class="table-responsive-sm">
										<h3>ตำแหน่ง</h3>
										<a href="admin_position_add.php" class="button primary float-right">เพิ่มข้อมูลตำแหน่ง</a><br><br><br>
									  <table class="table table-hover">
											<thead>
												<tr>
													<!-- <th scope="col">ลำดับ</th> -->
													<th scope="col">รหัสตำแหน่ง</th>
													<th scope="col">ตำแหน่ง</th>
													<th scope="col">จัดการ</th>
											</thead>
											<tbody>
												<?php if ($count_position == 0) { ?>
												<tr>
													<td colspan="7" style="text-align: center;">ไม่พบข้อมูล</td>
												</tr>
												<?php 
												} else {
														while ($row_position = $result_position->fetch_assoc()) { 
												?>
												<tr>
													<td><?php echo $row_position['position_id']; ?></td>
													<td><?php echo $row_position['position']; ?> </td>
													<td>
														<a href="admin_editposition.php?position_id=<?php echo $row_position['position_id'] ?>"><i class="fas fa-pencil-alt" style="font-size: 16px;"></i></a>
														<a href="admin_deletepo.php?position_id=<?php echo $row_position['position_id'];?>"><span class="fas fa-minus" data-toggle="modal"></span>
													</td>
												</tr>
												<?php
														}
												}
												?>
											</tbody>
									  </table>
									</div>
								<div class="table-wrapper">
									<!-- <a href="admin_masterrateotadd.php" class="button primary float-right">เพิ่มข้อมูลคำนวณตามระยะเวลา</a><br> -->
									<div class="table-responsive-sm">
										<h3>เรทการจ่าย OT แบบคำนวณตามระยะเวลา</h3>
									  <table class="table table-hover">
											<thead>
												<tr>
													<!-- <th scope="col">ลำดับ</th> -->
													<th scope="col">เรทการจ่ายOT</th>
													<th scope="col">จัดการ</th>
													
											</thead>
											<tbody>
												<?php if ($count == 0) { ?>
												<tr>
													<td colspan="7" style="text-align: center;">ไม่พบข้อมูล</td>
												</tr>
												<?php 
												} else {
														while ($row = $result->fetch_assoc()) { 
												?>
												<tr>
													<!-- <td><?php echo $row['rateot_id']; ?></td> -->
													<td><?php echo $row['rate_price']; ?> บาท</td>
													<td>
														<a href="admin_master_editrateot.php?rateot_id=<?php echo $row['rateot_id'] ?>"><i class="fas fa-pencil-alt" style="font-size: 16px;"></i></a>
														<!-- <a href="admin_delete_ot.php?rateot_id=<?php echo $row['rateot_id'];?>"><span class="fas fa-minus" data-toggle="modal"></span> -->
													</td>
												</tr>
												<?php
														}
												}
												?>
											</tbody>
									  </table>
									</div>
									<div class="table-responsive-sm">
										<br>
										<h3>การจ่าย OT เหมาตามช่วงเวลา</h3><p>
										<a href="admin_master_maoot_add.php" class="button primary float-right">เพิ่มข้อมูลคำนวณตามช่วงเวลา</a><br><br>
									  <table class="table table-hover">
											<thead>
												<tr>
													<!-- <th scope="col">ลำดับ</th> -->
													<th scope="col">เวลาเหมาของ OT</th>
													<th scope="col">เรทการจ่าย OT</th>
													<!-- <th scope="col">กำหนดสามารถมาสายได้</th> -->
													<th scope="col">จัดการ</th>
											</thead>
											<tbody>
												<?php if ($count_mao == 0) { ?>
												<tr>
													<td colspan="7" style="text-align: center;">ไม่พบข้อมูล</td>
												</tr>
												<?php 
												} else {
														while ($row_mao = $result_mao->fetch_assoc()) { 
												?>
												<tr>
													<!-- <td><?php echo $row_mao['maoot_id']; ?></td> -->
													<td><?php echo $row_mao['pay_category']; ?></td>
													<td><?php echo $row_mao['d_ot']; ?> </td>
													<!-- <td><?php echo $row_mao['canlate']; ?> </td> -->
													<td>
														<a href="admin_edit_master_maoot.php?maoot_id=<?php echo $row_mao['maoot_id'] ?>"><i class="fas fa-pencil-alt" style="font-size: 16px;"></i></a>
														<a href="admin_delete_master_maoot.php?maoot_id=<?php echo $row_mao['maoot_id'];?>"><span class="fas fa-minus" data-toggle="modal"></span>
													</td>
												</tr>
												<?php
														}
												}
												?>
											</tbody>
									  </table>
									</div>

									<div class="table-responsive-sm">
									<br>
										<h3>ข้อมูลกำหนดการมาสาย</h3><p>
										<a href="admin_master_lateday_add.php" class="button primary float-right">เพิ่มข้อมูลคำนวณตามช่วงเวลา</a><br><br>
									  <table class="table table-hover">
											<thead>
												<tr>
													<!-- <th scope="col">ลำดับ</th> -->
													<th scope="col">ช่วงเวลาที่ทำ OT</th>
													<th scope="col">เวลาเข้างานได้ไม่เกิน</th>
													
													<th scope="col">จัดการ</th>
											</thead>
											<tbody>
												<?php if ($count_late == 0) { ?>
												<tr>
													<td colspan="7" style="text-align: center;">ไม่พบข้อมูล</td>
												</tr>
												<?php 
												} else {
														while ($row_late = $result_late->fetch_assoc()) { 
												?>
												<tr>
													<!-- <td><?php echo $row_late['']; ?></td> -->
													<td><?php echo $row_late['duration']; ?></td>
													<td><?php echo $row_late['nextday']; ?> </td>
													<td>
														<a href="admin_edit_master_late.php?late_id=<?php echo $row_late['late_id'] ?>"><i class="fas fa-pencil-alt" style="font-size: 16px;"></i></a>
														<a href="admin_delete_master_late.php?late_id=<?php echo $row_late['late_id'];?>"><span class="fas fa-minus" data-toggle="modal"></span>
													</td>
												</tr>
												<?php
														}
												}
												?>
											</tbody>
									  </table>
									</div>
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
								</section> 																																																																																									พงศธร รับผิดชอบbackendหน้านี้
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

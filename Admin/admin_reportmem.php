<?php 
	require('connect.php');
	include('lock.php');
	$memberID = $_GET['member_id'];
	$memberOT = 0;
	$memberComm = 0;
	$memberTravel = 0;
	$month = date_default_timezone_set('m');
	
	$userOT = "SELECT * from ot as o inner join member as m on o.member_id = m.member_id where o.member_id = '".$memberID."'";
	$resultOT = $conn->query($userOT);
	$countOT = mysqli_num_rows($resultOT);
	
	$userCommission = "SELECT * from commission as c inner join member as m on c.member_id = m.member_id where c.member_id = '".$_GET['member_id']."'";
	$resultCommission = $conn->query($userCommission);
	$countCommission = mysqli_num_rows($resultCommission);

	$userTravel = "SELECT * from travel as t inner join member as m on t.member_id = m.member_id where t.member_id = '".$_GET['member_id']."'";
	$resultTravel = $conn->query($userTravel);
	$countTravel = mysqli_num_rows($resultTravel);

	
	$monthOT = "SELECT * from ot as o inner join member as m on o.member_id = m.member_id where o.member_id = '".$memberID."' AND MONTH(o.makeday_ot) = '".$month."'";
	$resultmOT = $conn->query($monthOT);
	$countmOT = mysqli_num_rows($resultmOT);
	// if ($countmOT != 0) {
	// 	while ($rowmot = $resultmOT->fetch_assoc()) {
	// 		$memberOT += (int)$rowmot['price_ot'];
	// 		$memberOT += (int)$rowmot['d_ot'];
	// 	}
	// }

	$monthCommission = "SELECT * from commission as c inner join member as m on c.member_id = m.member_id where c.member_id = '".$_GET['member_id']."' AND MONTH(c.com_day) = '".$month."'";
	$resultmCommission = $conn->query($monthCommission);
	$countmCommission = mysqli_num_rows($resultmCommission);
	if ($countmCommission != 0) {
		// while ($rowmComm = $resultmCommission->fetch_assoc()) {
		// 	$memberComm += (int)$rowmComm['total_com'];
		// }
	}

	$monthTravel = "SELECT * from travel as t inner join member as m on t.member_id = m.member_id where t.member_id = '".$_GET['member_id']."' AND MONTH(t.travel_date) = '".$month."'";
	$resultmTravel = $conn->query($monthTravel);
	$countmTravel = mysqli_num_rows($resultmTravel);
	if ($countmTravel != 0) {
		// while ($rowmTravel = $resultmTravel->fetch_assoc()) {
		// 	// $memberTravel += (int)$rowmTravel['pay_go'];
		// 	// $memberTravel += (int)$rowmTravel['pay_back'];
		// }
	}
	$total = $memberOT+$memberComm+$memberTravel;

	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$ot_search = $_POST['ot_serach'];
		$memberOT = 0;
		$memberComm = 0;
		$memberTravel = 0;
		$total = 0;
		
		if ($ot_search == 0) {
			$monthOT = "SELECT * from ot as o inner join member as m on o.member_id = m.member_id where o.member_id = '".$memberID."' AND MONTH(o.makeday_ot) = '".$month."'";
			$resultmOT = $conn->query($monthOT);
			$countmOT = mysqli_num_rows($resultmOT);
			// if ($countmOT != 0) {
			// 	while ($rowmot = $resultmOT->fetch_assoc()) {
			// 		$memberOT += (int)$rowmot['price_ot'];
			// 		$memberOT += (int)$rowmot['d_ot'];
			// 	}
			// }

			$monthCommission = "SELECT * from commission as c inner join member as m on c.member_id = m.member_id where c.member_id = '".$_GET['member_id']."' AND MONTH(c.com_day) = '".$month."'";
			$resultmCommission = $conn->query($monthCommission);
			$countmCommission = mysqli_num_rows($resultmCommission);
			// if ($countmCommission != 0) {
			// 	while ($rowmComm = $resultmCommission->fetch_assoc()) {
			// 		$memberComm += (int)$rowmComm['total_com'];
			// 	}
			// }

			$monthTravel = "SELECT * from travel as t inner join member as m on t.member_id = m.member_id where t.member_id = '".$_GET['member_id']."' AND MONTH(t.travel_date) = '".$month."'";
			$resultmTravel = $conn->query($monthTravel);
			$countmTravel = mysqli_num_rows($resultmTravel);
			// if ($countmTravel != 0) {
			// 	while ($rowmTravel = $resultmTravel->fetch_assoc()) {
			// 		$memberTravel += (int)$rowmTravel['pay_go'];
			// 		$memberTravel += (int)$rowmTravel['pay_back'];
			// 	}
			// }
			$total = $memberOT+$memberComm+$memberTravel;
		} else { 
			$userOT = "SELECT * from ot as o inner join member as m on o.member_id = m.member_id where o.member_id = '".$memberID."' AND MONTH(o.makeday_ot) = '".$ot_search."'";
			$resultOT = $conn->query($userOT);

			$userCommission = "SELECT * from commission as c inner join member as m on c.member_id = m.member_id where c.member_id = '".$_GET['member_id']."' AND MONTH(c.com_day) = '".$ot_search."'";
			$resultCommission = $conn->query($userCommission);

			$userTravel = "SELECT * from travel as t inner join member as m on t.member_id = m.member_id where t.member_id = '".$_GET['member_id']."' AND MONTH(t.travel_date) = '".$ot_search."'";
			$resultTravel = $conn->query($userTravel);
		}
	}
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>รายงาน</title>
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
									<strong>รายงานการเบิก</strong></a>
									<ul class="icons">
									<a href="logout.php"><img src="images/icon.png"></a>
									</ul>
								</header>
								<!-- <center><h4>Report</h4></center><br> -->

<table class="table table-borderless">
 <tbody>
 <tr>
   <div class="form-row">
	<td align="right"><label for="m_report">เดือน: </label></td>
	 <td><div class="form-group col-md-7">
	 <form method="post">
	 <select id="m_report" class="form-control" name="ot_serach">
		<option value="0">-ทุกเดือน-</option>
		<option value="01" <?= (!empty($_POST['ot_serach']) && $_POST['ot_serach'] == '01') ? 'selected' : '' ?>>มกราคม</option>
		<option value="02" <?= (!empty($_POST['ot_serach']) && $_POST['ot_serach'] == '02') ? 'selected' : '' ?>>กุมภาพันธ์</option>
		<option value="03" <?= (!empty($_POST['ot_serach']) && $_POST['ot_serach'] == '03') ? 'selected' : '' ?>>มีนาคม</option>
		<option value="04" <?= (!empty($_POST['ot_serach']) && $_POST['ot_serach'] == '04') ? 'selected' : '' ?>>เมษายน</option>
		<option value="05" <?= (!empty($_POST['ot_serach']) && $_POST['ot_serach'] == '05') ? 'selected' : '' ?>>พฤษภาคม</option>
		<option value="06" <?= (!empty($_POST['ot_serach']) && $_POST['ot_serach'] == '06') ? 'selected' : '' ?>>มิถุนายน</option>
		<option value="07" <?= (!empty($_POST['ot_serach']) && $_POST['ot_serach'] == '07') ? 'selected' : '' ?>>กรกฎาคม</option>
		<option value="08" <?= (!empty($_POST['ot_serach']) && $_POST['ot_serach'] == '08') ? 'selected' : '' ?>>สิงหาคม</option>
		<option value="09" <?= (!empty($_POST['ot_serach']) && $_POST['ot_serach'] == '09') ? 'selected' : '' ?>>กันยายน</option>
		<option value="10" <?= (!empty($_POST['ot_serach']) && $_POST['ot_serach'] == '10') ? 'selected' : '' ?>>ตุลาคม</option>
		<option value="11" <?= (!empty($_POST['ot_serach']) && $_POST['ot_serach'] == '11') ? 'selected' : '' ?>>พฤศจิกายน</option>
		<option value="12" <?= (!empty($_POST['ot_serach']) && $_POST['ot_serach'] == '12') ? 'selected' : '' ?>>ธันวาคม</option>
   	</select>
  </div>
  <div class="col-2 col-12-small">
<input class="primary" type="submit" value="ค้นหา">
</form>
</div></td>
 </div>
</tr>
</tbody>
</table>

								<section>
								
									<div class="table-responsive-sm">
										<h3>โอที</h3>
									  <table class="table table-hover">
											<thead>
												<tr>
													<th scope="col">วันที่</th>
													<!-- <th scope="col">เวลาที่เริ่มทำ</th>
													<th scope="col">เวลาที่สิ้นสุด</th> -->
													<th scope="col">จำนวนที่เบิก</th>
													<th scope="col">สำหรับเหมา</th>
													<!-- <th scope="col">ราคาเหมา</th> -->
													<th scope="col">จัดการ</th>
													
													<th scope="col">สถานะ</th>
												</tr>
											</thead>
											<tbody>
												<?php if ($countOT == 0) { ?>
												<tr>
													<td colspan="6" style="text-align: center;">ไม่พบข้อมูล OT ของคุณ</td>
												</tr>
												<?php 
												} else {
														while ($rowOT = $resultOT->fetch_assoc()) { 
												?>
												<tr>
													<td><?php echo $rowOT['day_ot'] ?></td>
													<!-- <td><?php echo $rowOT['time_start'] ?></td>
													<td><?php echo $rowOT['time_end'] ?></td> -->
													<td><?php echo $rowOT['price_ot'] ?></td>
													<!-- <td><?php echo $rowOT['pay_category'] ?></td> -->
													<td><?php echo $rowOT['d_ot'] ?></td>
													<td>
															<a href="admin_see_ot.php?member_id=<?php echo $rowOT['member_id']; ?>&ot_id=<?php echo $rowOT['ot_id']; ?>"><i class="fas fa-eye"></i></a>
													
															<!-- <a href="admin_edit_ot.php?member_id=<?php echo $rowOT['member_id']; ?>&ot_id=<?php echo $rowOT['ot_id']; ?>"><i class="fas fa-pencil-alt" style="font-size: 16px;"></i></a>
													
															<a href="admin_deleteot.php?member_id=<?php echo $rowOT['member_id'];?>&ot_id=<?php echo $rowOT['ot_id']; ?>"onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');"><span class="fas fa-minus" data-toggle="modal" data-target="#exampleModal" ></span> -->
													</td>
													<td>
													<?php echo $rowOT['confirm'] ?></td>
													</td>
												</tr>
												<?php 
												?>
												<?php
															$memberOT += (int)$rowOT['price_ot'];
															$memberOT += (int)$rowOT['d_ot'];
														}
												}
												?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2">รวมค่า OT ทั้งหมด</td>
													<td colspan="2"><?php echo $memberOT ?> บาท</td>
												</tr>
											</tfoot>
									  </table>
									</div>

									<div class="table-responsive-md">
										<h3>คอมมิชชั่น</h3>
									  <table class="table table-hover">
											<thead>
												<tr>
													<th scope="col">วันที่ทำรายการ</th>
													<th scope="col">ชื่อโครงการที่ทำ</th>
													<th scope="col">ค่าเบิกจ่าย</th>
													<th scope="col">จัดการ</th>
													<th scope="col">สถานะ</th>
													<!-- <th scope="col">ลบ</th> -->
												</tr>
											</thead>
											<tbody>
												<?php if ($countCommission == 0) { ?>
												<tr>
													<td colspan="10" style="text-align: center;">ไม่พบข้อมูล Comission ของคุณ</td>
												</tr>
												<?php 
												} else {
														while ($rowCommission = $resultCommission->fetch_assoc()) { 
												?>
												<tr>
													<td><?php echo $rowCommission['com_day'] ?></td>
													<td><?php echo $rowCommission['name_project'] ?></td>
													<td><?php echo $rowCommission['total_com'] ?></td>
													<td>
													
															<a href="admin_see_com.php?member_id=<?php echo $rowCommission['member_id']; ?>&com_id=<?php echo $rowCommission['com_id']; ?>"><i class="fas fa-eye"></i></a>
													
															<!-- <a href="edit_travel.php"><i class="fas fa-pencil-alt" style="font-size: 16px;"></i></a>
													
															<a href="deleteot.php?id=$row[id]"><span class="fas fa-minus" data-toggle="modal" data-target="#exampleModal" ></span> -->
													</td> 
													<td><?php echo $rowCommission['confirm'] ?></td>
												</tr>
												<?php
															$memberComm += (int)$rowCommission['total_com'];
														}
												}
												?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2">รวมค่า Commission ทั้งหมด</td>
													<td><?php echo $memberComm ?> บาท</td>
												</tr>
											</tfoot>
									  </table>
									</div>

									<div class="table-responsive-lg">
										<h3>ค่าเดินทาง</h3>
									  <table class="table table-hover">
											<thead>
												<tr>
													<th scope="col">วันที่เดินทาง</th>
													<!-- <th scope="col">เดินทางขาไป</th> -->
													<!-- <th scope="col">ค่าใช้จ่ายขาไป</th> -->
													<th scope="col">รูปหลักฐานขาไป</th>
													<!-- <th scope="col">เดินทางขากลับ</th> -->
													<th scope="col">ค่าใช้จ่ายขากลับ</th>
													<!-- <th scope="col">รูปหลักฐานขากลับ</th> -->
													<th scope="col">รวม</th>
													<th scope="col">จัดการ</th>
													<th scope="col">สถานะ</th>
												</tr>
											</thead>
											<tbody>
												<?php if ($countTravel == 0) { ?>
												<tr>
													<td colspan="6" style="text-align: center;">ไม่พบข้อมูลการเดินทางของคุณ</td>
												</tr>
												<?php 
												} else {
														while ($rowTravel = $resultTravel->fetch_assoc()) { 
												?>
												<tr>
													<td><?php echo $rowTravel['travel_date'] ?></td>
													<!-- <td><?php echo $rowTravel['travel_go'] ?></td> -->
													<!-- <td><?php echo $rowTravel['pay_go'] ?></td> -->
													<td><img src="../images/<?php echo $rowTravel['pic_go'] ?>" style="height: 5%; weight: 10%;"></td>
													<!-- <td><?php echo $rowTravel['travel_back'] ?></td> -->
													<!-- <td><?php echo $rowTravel['pay_back'] ?></td> -->
													<td><img src="../images/<?php echo $rowTravel['pic_back'] ?>" style="height: 5%; weight: 10%;"></td>
													<td><?php echo $rowTravel['total_pay'] ?></td>
													<td>
															<a href="admin_see_travel.php?member_id=<?php echo $rowTravel['member_id']; ?>&travel_id=<?php echo $rowTravel['travel_id']; ?>"><i class="fas fa-eye"></i></a>
													
															<!-- <a href="admin_edit_travel.php?member_id=<?php echo $rowTravel['member_id']; ?>&travel_id=<?php echo $rowTravel['travel_id']; ?>"><i class="fas fa-pencil-alt" style="font-size: 16px;"></i></a>
													
															<a href="admin_deletetravel.php?member_id=<?php echo $rowTravel['member_id'];?>&travel_id=<?php echo $rowTravel['travel_id']; ?>"onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');"><span class="fas fa-minus" data-toggle="modal" data-target="#exampleModal" ></span> -->
													</td>
													<td><?php echo $rowTravel['confirm'] ?></td>
												</tr>
												<?php
															$memberTravel += (int)$rowTravel['pay_go'];
															$memberTravel += (int)$rowTravel['pay_back'];
														}
												}
												?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="3">รวมค่าเดินทางทั้งหมด</td>
													<td colspan="2"><?php echo $memberTravel ?> บาท</td>
												</tr>
												<tr>
													<td colspan="3">รวมค่าเบิกของเดือนนี้ทั้งหมด</td>
													<td colspan="2">
														<?php 
															$total = $memberOT+$memberComm+$memberTravel;

															echo ($total) ? $total : "0";
														?> บาท
													</td>
												</tr>
											</tfoot>
									  </table>
									</div>

								</section>
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							

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
<!-- Search -->
<!-- <section id="search" class="alt">
<form method="post" action="#">
<input type="text" name="query" id="query" placeholder="Search" />
</form>
</section>                                                                                                                                                                                                                                                                                      ธนสิษฐ์ รับผิดชอบ backendหน้านี้
-->
	</body>
</html>

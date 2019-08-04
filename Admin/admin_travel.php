<?php 
   require('connect.php');
	 include('lock.php');
   $travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id inner join position on member.position_id = position.position_id  ORDER BY travel.travel_id " ;
   $resulttravel = mysqli_query($conn,$travel);
   $counttravel = mysqli_num_rows($resulttravel);
	 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$travel_serach = $_POST['travel_serach'];
		if ($travel_serach == 0) {
			$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id inner join position on member.position_id = position.position_id ORDER BY travel.travel_id " ;
			$resulttravel = mysqli_query($conn,$travel);
			$counttravel = mysqli_num_rows($resulttravel);
		} else {
			$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id inner join position on member.position_id = position.position_id  WHERE MONTH(travel.makeday_travel) = '$travel_serach' ORDER BY travel.travel_id " ;
			$resulttravel = mysqli_query($conn,$travel) or die ($conn->error);
			$counttravel = mysqli_num_rows($resulttravel);
		}
		
	}
	$memberTravel = 0;
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>ค่าเดินทางพนักงาน</title>
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
									<strong>การเบิกค่าเดินทาง</strong></a>
									<ul class="icons">
									<a href="logout.php"><img src="images/icon.png"></a>
									</ul>
								</header>

							<!-- Section -->
								<section>
								<table class="table table-borderless">
								<tbody>
 <tr>
   <div class="form-row">
	<td align="right"><label for="m_report">เดือน: </label></td>
	 <td><div class="form-group col-md-7">
	 <form method="post">
	  	<select id="m_report" class="form-control" name="travel_serach">
			<option value="0" selected>-ทุกเดือน-</option>
			<option value="01">มกราคม</option>
			<option value="02">กุมภาพันธ์</option>
			<option value="03">มีนาคม</option>
			<option value="04">เมษายน</option>
			<option value="05">พฤษภาคม</option>
			<option value="06">มิถุนายน</option>
			<option value="07">กรกฎาคม</option>
			<option value="08">สิงหาคม</option>
			<option value="09">กันยายน</option>
			<option value="10">ตุลาคม</option>
			<option value="11">พฤศจิกายน</option>
			<option value="12">ธันวาคม</option>
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
								<div class="table-wrapper">
												<table class="alt">
													<thead>
														<tr>
															<td align="right"><a href="admin_traadd.php" class="button primary">เพิ่มข้อมูล</a></td>
														</tr>
													</thead>
												</table>
									<div class="table-responsive-sm">
										<h3>ค่าเดินทาง</h3>
									  <table class="table table-hover">
											<thead>
												<tr>
													<th scope="col">ชื่อ-นามสกุล</th>
													
													<th scope="col">ตำแหน่ง</th>
													<!-- <th scope="col">ขาไป</th>
													<th scope="col">ขากลับ</th> -->
													<th scope="col">จำนวนเงิน</th>
													<th scope="col">วันที่ทำรายการ</th>
                          <th scope="col">จัดการ</th>
                          <th scope="col">ยืนยัน</th>
													<th scope="col">ยกเลิก</th>
													<th scope="col">สถานะ</th>
												</tr>
											</thead>
											<tbody>
												<?php if ($counttravel == 0) { ?>
												<tr>
													<td colspan="7" style="text-align: center;">ไม่พบข้อมูลการเบิกค่าเดินทาง</td>
												</tr>
												<?php 
												} else {
														while ($row = $resulttravel->fetch_assoc()) { 
												?>
												<tr>
													
													<td><?php echo $row['first_name'] ?>
													<?php echo $row['last_name'] ?> (<?php echo $row['nickname'] ?>)</td> 
													
												 <td><?php echo $row['position'] ?></td>
													<!-- <td><?php echo $row['travel_go'] ?></td>
													<td><?php echo $row['travel_back'] ?></td> -->
                                                    <td><?php echo $row['total_pay'] ?></td>
																										<td><?php echo $row['makeday_travel'] ?></td>
													<td>
															<a href="admin_see_travel.php?member_id=<?php echo $row['member_id']; ?>&travel_id=<?php echo $row['travel_id']; ?>"><i class="fas fa-eye"></i></a>
													
													<a href="admin_edit_travel.php?member_id=<?php echo $row['member_id'];?>&travel_id=<?php echo $row['travel_id']; ?>"><i class="fas fa-pencil-alt" style="font-size: 16px;"></i></a>
													
													<a href="admin_delete_travel.php?member_id=<?php echo $row['member_id'];?>&travel_id=<?php echo $row['travel_id']; ?>"onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');"><span class="fas fa-minus" data-toggle="modal" data-target="#exampleModal" ></span>
													</td>
													<td>
															<a href="admin_updatestattravel.php?member_id=<?php echo $row['member_id'];?>&travel_id=<?php echo $row['travel_id']; ?>"><i class="fas fa-check"></i></span>
													</td>
													<td>
															<a href="admin_updatestattravel2.php?member_id=<?php echo $row['member_id'];?>&travel_id=<?php echo $row['travel_id']; ?>"><i class="fas fa-times"></i></span>
													</td>
													<td>
													<?php echo $row['confirm'] ?></td>
													</td>
												</tr>
												</tr>
												<?php
															$memberTravel += (int)$row['pay_go'];
															$memberTravel += (int)$row['pay_back'];
														}
												}
												?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2">รวมค่าเดินทางทั้งหมด</td>
													<td colspan="2"><?php echo $memberTravel ?> บาท</td>
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

							<!-- Search -->
								<!-- <section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>                                                                                                                                                                                                                  ธนสิษฐ์ รับผิดชอบ backendหน้านี้
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
											<!-- <li><a href="comsee.php">ค่าคอม</a></li> -->
									</ul>
										<li><a href="admin_report.php">ข้อมูลการเบิกรายบุคคุล</a>
									</li>
									<!-- <li><a href="admin_latestaff1.php">ข้อมูลการมาสาย</li> -->
									<li>
										<span class="opener">รายงาน</span>
										<ul>
											<li><a href="admin_sumot.php">OT</a></li>
											
											<li><a href="admin_sumtravel.php">ค่าเดินทาง</a></li>
											<li><a href="admin_sumcom.php">ค่าคอม</a></li>
											<!-- <li><a href="comsee.php">ค่าคอม</a></li> -->
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

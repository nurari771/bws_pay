<?php 
	require('connect.php');
	include('lock.php');
	$memberID = $_GET['member_id'];
	$late = "SELECT * from lateday as l inner join member as m on l.member_id = m.member_id where l.member_id = '".$memberID."'";
	$resultlate = mysqli_query($conn,$late);
	$countlate = mysqli_num_rows($resultlate);
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$late_serach = $_POST['late_serach'];
		if ($late_serach == 0) {
			$late = "SELECT * from lateday as l inner join member as m on l.member_id = m.member_id where l.member_id = '".$memberID."'";
			$resultlate = mysqli_query($conn,$late);
			$countlate = mysqli_num_rows($resultlate);
		} else {
			$late= "SELECT * from lateday as l inner join member as m on l.member_id = m.member_id where l.member_id = '".$memberID."' AND MONTH(l.date) = '".$late_serach."'";
			$resultlate = mysqli_query($conn,$late) or die ($conn->error);
			$countlate = mysqli_num_rows($resultlate);
		}
	}
	
?>
<!DOCTYPE HTML>

<html>
<head>
		<title>ตรวจสอบสิทธิการขอมาสายรายบุคคล</title>
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
									<strong>ตรวจสอบสิทธิการขอมาสายรายบุคคล</strong>
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
		 <td align="right"><label for="m_latestaff">เดือน: </label></td>
		 <td><div class="form-group col-md-7">
		 <form method="post">
	  	<select id="late_serach" class="form-control" name="late_serach">
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
			 
<input class="primary" type="submit" value="ค้นหา">
			 </div>
  
</form>
										
</tr>
	</tbody>
		</table>

			<div class="table-wrapper">
				<table class="alt">
													
				</table>
					<div class="table-wrapper">
						<table class="alt">
							<thead>
								<tr>
									<th>วันที่ขอมาสาย</th>													
									<th>เข้างานสายได้ไม่เกิน</th>
									<th>ตามข้อกำหนดที่ทำOT</th>
                                     <th>ยืนยันสถนะ</th>
                                     <th>สถานะ</th>
								</tr>
							</thead>
						<tbody>
							<?php if ($countlate == 0) { ?>
								<tr>
									<td colspan="7" style="text-align: center;">ไม่พบข้อมูล</td>
								</tr>
							<?php 
								} else {
								while ($rowlate = $resultlate->fetch_assoc()) { 
								?>
								<tr>
									<td><?php echo $rowlate['date']; ?></td>
								    <td><?php echo $rowlate['nextday']; ?></td>
									<td><?php echo $rowlate['duration']; ?>
													
													
								    <td>
														
													
									 <a href="admin_update_statlate.php?member_id=<?php echo $rowlate['member_id'];?>&latedayot_id=<?php echo $rowlate['latedayot_id']; ?>"><i class="fas fa-check"></i></span>
												
									<a href="admin_update_statlate2.php?member_id=<?php echo $rowlate['member_id'];?>&latedayot_id=<?php echo $rowlate['latedayot_id']; ?>"><i class="fas fa-times"></i></span>
									</td>
									<td><?php echo $rowlate['confirm']; ?></td>
													
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
								</section> 																																																																																											พงศธร รับผิดชอบbackendหน้านี้
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

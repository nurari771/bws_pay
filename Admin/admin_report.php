<?php 
	require('connect.php');
	include('lock.php');
	$user = "SELECT * FROM member inner join position on position.position_id = member.position_id  ORDER BY member_id " ;
	$result = mysqli_query($conn,$user);
	$count = mysqli_num_rows($result);
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>รายงานการเบิก</title>
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

							<!-- Section -->
								<section>
									<div class="table-responsive-sm">
										<h3>รายงานการเบิก</h3>
									  <table class="table table-hover">
											<thead>
												<tr>
													<!-- <th scope="col">รหัส</th> -->
													<th scope="col">ชื่อ-นามสกุล</th>
													
													<th scope="col">ตำแหน่ง</th>
													<th scope="col">เข้าดูข้อมูลการเบิก</th>
													<!-- <th scope="col">แก้ไข</th>
													<th scope="col">ลบ</th> -->
												</tr>
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
													<!-- <td><?php echo $row['member_id'] ?></td> -->
													<td><?php echo $row['first_name'] ?>
													<?php echo $row['last_name'] ?>(<?php echo $row['nickname'] ?>)</td>
													
													<td><?php echo $row['position'] ?></td>
													
													<td>
															<a href="admin_reportmem.php?member_id=<?php echo $row['member_id'] ?>"><i class="fas fa-eye"></i></a>
													</td>
													<!-- <td>
															<a href="#"><i class="fas fa-pencil-alt" style="font-size: 16px;"></i></a>
													</td>
													<td>
															<a href="#"><span class="fas fa-minus" data-toggle="modal" data-target="#exampleModal" ></span>
													</td> -->
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
								</section>																																																																																	ธนสิษฐ์ รับผิดชอบbackendหน้านี้
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

<?php
include('connect.php');
include('lock.php');
$sql = "SELECT * FROM member inner join position on member.position_id = position.position_id  where member.member_id = '".$_GET['member_id']."'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
//$d1 = $row['start_day'];
//$d2 = new DateTime(date('Y-m-d'));
// /$dd　= explode("-",$row['start_day']);
//$diff = $d2->diff($d1);
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>ดูข้อมูลพนักงาน</title>
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
									<!-- <a href="addmember.php" class="logo"> -->
										<strong>ข้อมูลส่วนตัว</strong> 
										<div align="right"><a href="logout.php"><img src="images/icon.png"></a></div>
								</header>
<!-- Section -->
<section>
<form>
<div class="form-row">
    <div class="form-group col-md-5">
      <label for="id">รหัสพนักงาน</label>
      <input type="text" class="form-control" id="id" placeholder="รหัสพนักงาน" value="<?php echo $row['id']; ?>" readonly>
  </div>
  <div class="form-group col-md-5">
      <label for="nickname">username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $row['username']; ?>" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="name">ชื่อ-นามสกุล</label>
      <input type="text" class="form-control" id="last_name" placeholder="นามสกุล" value="<?php echo $row['first_name']; ?>  <?php echo $row['last_name']; ?>" readonly>
    </div>
    <div class="form-group col-md-5">
      <label for="nickname">ชื่อเล่น</label>
      <input type="text" class="form-control" id="nickname" placeholder="ชื่อเล่น" value="<?php echo $row['nickname']; ?>" readonly>
    </div>
  </div>
 <div class="form-row">
    <div class="form-group col-md-5">
		<label for="start_day">วันที่เริ่มงาน</label>
      <input type="text" class="form-control" id="start_day" placeholder="วันที่เริ่มงาน" value="<?php echo $row['start_day']; ?>" readonly>
    </div>
    <div class="form-group col-md-5">
		<label for="total_year">จำนวนปีที่ทำงาน</label>
      <input type="text" class="form-control"  placeholder="จำนวนวันที่ทำงาน" value="<?php echo substr($row['start_day'], 0,4) ; ?>" readonly>  <!-- <?php echo $diff->y; ?>-->
    </div>
  </div>
 <div class="form-row">
    <div class="form-group col-md-5">
		<label for="total_day">จำนวนเดือนที่ทำงาน</label>
      <input type="text" class="form-control"  placeholder="จำนวนเดือนที่ทำงาน" value="<?php echo substr($row['start_day'], 5,2)-2 ; ?>" readonly>
    </div>
    <div class="form-group col-md-5">
		<label for="total_year">จำนวนวันที่ทำงาน</label>
      <input type="text" class="form-control"  placeholder="จำนวนปีที่ทำงาน" value="<?php echo substr($row['start_day'], 8,2) ; ?>" readonly>
    </div>
  </div>


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
								</section> 																																																																																																																															ธนสิษฐ์ รับผิดชอบbackendหน้านี้
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

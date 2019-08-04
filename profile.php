<?php
include('connect.php');
include('lock.php');

$sql = "SELECT * from member inner join position on member.position_id = position.position_id where member.member_id = '".$_SESSION['member_id']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$d1 = new DateTime($row['start_day']);
$d2 = new DateTime(date('Y-m-d'));
$diff = $d2->diff($d1);
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>ข้อมูลส่วนตัว</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
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
									<strong>ข้อมูลส่วนตัว</strong></a>
									<ul class="icons">
								     <a href="logout.php"><img src="images/icon.png"></a>
									</ul>
								</header>
<!-- Section -->
<section>
<form>
<div class="form-row">
    <div class="form-group col-md-5">
      <label for="id">รหัสพนักงาน</label>
      <input type="text" class="form-control"  id="id" placeholder="รหัสพนักงาน" value="<?php echo $row['id']; ?>" readonly>
  </div>
  <div class="form-group col-md-5">
      <label for="nickname">ชื่อ</label>
      <input type="text" class="form-control" id="first_name" placeholder="ชื่อ" value="<?php echo $row['first_name']; ?>" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="name">นามสกุล</label>
      <input type="text" class="form-control" id="last_name" placeholder="นามสกุล" value="<?php echo $row['last_name']; ?>" readonly>
    </div>
    <div class="form-group col-md-5">
      <label for="nickname">ชื่อเล่น</label>
      <input type="text" class="form-control" id="nickname" placeholder="ชื่อเล่น" value="<?php echo $row['nickname']; ?>" readonly>
    </div>
  </div>
 <div class="form-row">
    <div class="form-group col-md-5">
      <label for="position">ตำแหน่ง</label>
      <input type="text" class="form-control" id="position_id" placeholder="ตำแหน่ง" value="<?php echo $row['position_id']; ?>.<?php echo $row['position']; ?>" readonly>
    </div>
		
    <div class="form-group col-md-5">
      <label for="start_day">วันที่เริ่มงาน</label>
      <input type="text" class="form-control" id="start_day" placeholder="วันที่เริ่มงาน" value="<?php echo $row['start_day']; ?>" readonly>
    </div>
  </div>
 <div class="form-row">
    <div class="form-group col-md-5">
      <label for="total_year">จำนวนวันที่ทำงาน</label>
      <input type="text" class="form-control" id="total_year" placeholder="จำนวนวันที่ทำงาน" value="<?php echo $diff->d; ?>" readonly>
    </div>
    <div class="form-group col-md-5">
      <label for="total_day">จำนวนเดือนที่ทำงาน</label>
      <input type="text" class="form-control" id="total_day" placeholder="จำนวนเดือนที่ทำงาน" value="<?php echo $diff->m; ?>" readonly>
    </div>
  </div>
	<div class="form-row">
    <div class="form-group col-md-5">
      <label for="total_year">จำนวนปีที่ทำงาน</label>
      <input type="text" class="form-control" id="total_year" placeholder="จำนวนปีที่ทำงาน" value="<?php echo $diff->y; ?>" readonly>
    </div>
    
  </div>

</form>
</section>
						</div>
					</div>
					<!-- <?php var_dump($row['position']) ?> -->
				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">
							<!-- Search -->
							

							<!-- Menu -->
							<nav id="menu">
									<header class="major">
										<h2>เมนู</h2>
									</header>
									<ul>
										<li><a href="index.php">หน้าแรก</a></li>
										<li><a href="profile.php">ข้อมูลส่วนตัว</a></li>
										<li>
											<span class="opener">สิทธิการเบิก</span>
											<ul>
												<li><a href="OT.php">OT</a></li>
												<li><a href="travel.php">ค่าเดินทาง</a></li>
												<!-- <li><a href="comsee.php">ค่าคอม</a></li> -->
											</ul>
											<li><a href="latestaff1.php">สิทธิการขอมาสายเมื่อทำOT</a>
										</li>
											<li><a href="report.php">รายงาน</a>
										</li>
										
									</ul>
								</nav>


							<!-- Footer -->
								<footer id="footer">
								</footer>

						</div>
					</div>
			</div>
			<!-- // function day() {
		date ( string $format [, int $timestamp = time() ] ) : string                                                                                                                                                                   ธนสิษฐ์ รับผิดชอบbackendหน้านี้
		 -->

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
				
	</body>
</html>


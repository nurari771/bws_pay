<?php

require('connect.php');
	include('lock.php');
	
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>เพิ่มพนักงาน</title>
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
									<strong>เพิ่มพนักงาน</strong>
									<ul class="icons">
									<a href="logout.php"><img src="images/icon.png"></a>
									</ul>
								</header>

<!-- Section -->
<section>
<form method="post" action="admin_insertmember.php">
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="n_pay">รหัสพนักงาน<font color= red>*</font></label>
      <input type="text" class="form-control" id="id" name="id" placeholder="รหัสพนักงาน" required>
			
    </div>
    <div class="form-group col-md-5">
      <label for="first_name">username<font color= red>*</font></label>
      <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
    </div>
  </div>
	<div class="form-row">
    <div class="form-group col-md-5">
      <label for="last_name">ชื่อ<font color= red>*</font></label>
      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="ชื่อ" required>
    </div>
    <div class="form-group col-md-5">
      <label for="nickname">นามสกุล<font color= red>*</font></label>
      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="นามสกุล" required>
    </div>
  </div>
	<div class="form-row">
    <div class="form-group col-md-5">
      <label for="pos">ชื่อเล่น<font color= red>*</font></label>
      <input type="text" class="form-control" id= "nickname" name="nickname" placeholder="ชื่อเล่น" required>
    </div>
    
      <!-- <label for="start_day">ตำแหน่ง<font color= red>*</font></label>
      <input type="text" class="form-control" id="position" name="position" placeholder="ตำแหน่ง" required> -->
			<div class="form-group col-md-5">
      <label for="start_day">ตำแหน่ง<font color= red>*</font></label>
     <select name="position_id" id="position_id" >
				<?php 
				$user = "SELECT * FROM position " ;
					$result = $conn->query($user);
					while ($row = $result->fetch_assoc()) {
				?>
					<option value="<?php echo $row['position_id'] ?>"><?php echo $row['position_id'] ?>.<?php echo $row['position']; ?></option>
				<?php } ?>
			</select>
    </div>
  </div>
	<div class="form-row">
    <div class="form-group col-md-5">
      <label for="start_day">วันที่เริ่มทำงาน<font color= red>*</font></label>
      <input type="date" class="form-control" id="start_day" name="start_day" placeholder="วันที่เริ่มทำงาน" required>
    </div>
 
    <div class="form-group col-md-5">
      <label for="status">สถานะ<font color= red>*</font></label>
      <select name="status" id="status">
			<option value="admin">admin</option>
			<option value="member">member</option>
</select>

    </div>
		</div>
		<div class="form-row">
    <div class="form-group col-md-5">
      <label for="status">รหัสผ่าน<font color= red>*</font></label>
      <input type="text" class="form-control" id="password" name="password" placeholder="รหัสผ่าน" required>
    </div>
		
  </div>
	  <input class="primary" type="submit" value="บันทึก">
		<input type="reset" value="ยกเลิก"  />
</form>
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
							<!-- Search      
							<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>                                                                                                                                                                            ธนสิษฐ์ รับผิดชอบ backendหน้านี้
						 -->
		<!-- Scripts -->
			<script src="asset/js/jquery.min.js"></script>
			<script src="asset/js/browser.min.js"></script>
			<script src="asset/js/breakpoints.min.js"></script>
			<script src="asset/js/util.js"></script>
			<script src="asset/js/main.js"></script>
	
 
				

	</body>
</html>









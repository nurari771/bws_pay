<?php 
	
	include('connect.php');
	include('lock.php');
	$sql = "SELECT * from travel as t inner join member as m on m.member_id = t.member_id where t.member_id = '".$_GET['member_id']."' AND t.travel_id = '".$_GET['travel_id']."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	?>
	<!DOCTYPE HTML>

	<html>
		<head>
			<title>แก้ไขค่าเดินทาง</title>
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
										<strong>ค่าเดินทาง</strong>
										<ul class="icons">
									<a href="logout.php"><img src="images/icon.png"></a>
									</ul>
									</header>
	<!-- Section -->
	<section>
	<form method="POST" action="admin_update_travel.php" enctype="multipart/form-data">
		<div class="form-row">
		<div class="form-group col-md-5">
      <label for="member_id">จ่ายให้ :</label>
      <input type="text" class="form-control" id="member_id" placeholder="ชื่อ-นามสกุล" value ="<?php echo $row['first_name']." ".$row['last_name']; ?>" readonly>
    </div>
			<div class="form-group col-md-5">
				<label for="travel_date">เดินทาง ณ วันที่ :<font color= red>*</font></label>
				<input type="date" class="form-control" name="travel_date" id="travel_date"  placeholder="วันที่" value="<?php echo $row['travel_date']; ?>" required >
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-10">
				<label for="pos">โดย : เงินสด</label>
			</div>
		</div>
	
		<div class="form-row">
			<div class="row">
				<div class="col-4">
					<label for="travel_go">ขาไป<font color= red>*</font></label>
					<input type="text" class="form-control" id="travel_go" name="travel_go" placeholder="บริษัท-เดอะมอลล์" value="<?php echo $row['travel_go']; ?>" required>
				</div>
				<div class="col-4">
					<label for="pay_go">จำนวนเงิน<font color= red>*</font></label>
					<input type="text" class="form-control" id="pay_go" name="pay_go" value="<?php echo $row['pay_go']; ?>" onchange="totalPrice()" placeholder="บาท" required >
				</div>
				<div class="col-4">
					<label for="picGo">แนบรูปใหม่</label ><br> : รูปภาพเก่า : <img src="../images/<?php echo $row['pic_go']; ?>" style="width: 2.5rem; height: 1.5rem;"><br>
					<input type="file" name="picGo" id="picGo" > 
				</div>
			</div>
	
			<div class="row">
				<div class="col-4">
					<label for="travel_back">ขากลับ<font color= red>*</font></label>
					<input type="text" class="form-control" id="travel_back" name="travel_back" value="<?php echo $row['travel_back']; ?>" placeholder="เดอะมอลล์-บริษัท" >
				</div>
				<div class="col-4">
					<label for="pay_back">จำนวนเงิน<font color= red>*</font></label>
					<input type="text" class="form-control" id="pay_back" name="pay_back" value="<?php echo $row['pay_back']; ?>" onchange="totalPrice()" placeholder="บาท" >
				</div>
				<div class="col-4">
					<label for="picBack">แนบรูปใหม่</label ><br> รูปภาพเก่า : <img src="../images/<?php echo $row['pic_back']; ?>" style="width: 2.5rem; height: 1.5rem;"><br>
					<input type="file" name="picBack" id="picBack">
				</div>
			</div>
		<br><br><br><br>
			<div class="form-row">
				<div class="col-5 col-12-medium">
					<label >รวมค่าเดินทางทั้งสิ้น</label>
				</div>
				<div class="col-4 col-12-medium">
					<input type="text" id="total_pay" name="total_pay" value="<?php echo $row['total_pay']; ?>" readonly>
				</div>
				<div class="col-3 col-12-medium">
					<label >บาท</label >
				</div>
			</div>
			<div class="form-group col-md-10">
				<label for="month_w">รายละเอียด</label>
				<textarea name="travel_detail" id="travel_detail"  placeholder="Enter your message" rows="4"><?php echo $row['travel_detail']; ?></textarea>
			</div>
			<div class="form-row">
				<div class="col-4 col-12-small">
					<label for="">ทำราการ ณ วันที่<font color= red>*</font></label>
				</div>
				<div class="col-6 col-12-small">
					<input type="date" class="form-control" required id="makeday_travel" name="makeday_travel" value="<?php echo $row['makeday_travel']; ?>" readonly>
				</div>
				<input type="hidden" name="travel_id" value="<?php echo $row['travel_id']; ?>">
				<input type="hidden" name="member_id" value="<?php echo $row['member_id']; ?>">
				<div class="col-2 col-12-small">
					<input class="primary" type="submit" value="บันทึก">
				</div>
	
			</div>
		</div>
	
	</form>
	</section>
							</div>
						</div>
	
					<!-- Sidebar -->
						<div id="sidebar">
							<div class="inner">
								
								
						<!-- Search  
						<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>                                                                                                                                                                                                     ธนสิษฐ์ รับผิดชอบ backendหน้านี้
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
				<script>
					function totalPrice() {
							var go_price = parseInt(document.getElementById("pay_go").value);
							var back_price = parseInt(document.getElementById("pay_back").value);
							if (go_price == "" && back_price != "") {
								document.getElementById("total_pay").value = back_price;
							} else if (go_price != "" && back_price == "") {
								document.getElementById("total_pay").value = go_price;
							} else {
								document.getElementById("total_pay").value = go_price + back_price;
							}
					}
				</script>
				
		</body>
	</html>
	
	
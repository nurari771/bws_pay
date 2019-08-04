<?php 
	date_default_timezone_set('Asia/Bangkok');
include('connect.php');
include('lock.php');

$sql = "SELECT * from member where member_id = '".$_SESSION['member_id']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>ค่าเดินทาง</title>
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
									<strong>ค่าเดินทาง</strong></a>
									<ul class="icons">
								     <a href="logout.php"><img src="images/icon.png"></a>
									</ul>
								</header>
<!-- Section -->
<section>
<form method="POST" action="inserttravel.php"  enctype="multipart/form-data">
	<div class="form-row">
    <div class="form-group col-md-5">
      <label for="member_id">จ่ายให้ :</label>
      <input type="text" name="member_id" class="form-control" id="member_id" placeholder="ชื่อ-นามสกุล" value ="<?php echo $row['first_name']." ".$row['last_name']; ?>" readonly>
    </div>
    <div class="form-group col-md-5">
      <label for="travel_date">เดินทาง ณ วันที่ :<font color= red>*</font></label>
      <input type="date" name="travel_date" class="form-control" id="travel_date" placeholder="วันที่" >
    </div>
  </div>
	<div class="form-row">
    <div class="form-group col-md-10">
      <label for="pos">โดย : เงินสด</label>
    </div>
  </div>

	<div class="form-row">
		<div class="row">
	    <div class="col-4 col-12-medium">
	      <label for="travel_go">ขาไป<font color= red>*</font></label>
	      <input type="text" class="form-control" id="travel_go" name="travel_go" placeholder="บริษัท-เดอะมอลล์" required >
	    </div>
			<div class="col-4 col-12-medium">
	      <label for="pay_go">จำนวนเงิน<font color= red>*</font></label>
	      <input type="text" class="form-control" id="pay_go" name="pay_go" onchange="totalPrice()" placeholder="บาท" required>
	    </div>
			<div class="col-4 col-12-medium">
	      <label for="pic_go">แนบรูป</label > <br>
				<input type="file" name="pic_go" id="pic_go"  >
	    </div>
		</div>

		<div class="row">
	    <div class="col-4 col-12-medium">
	      <label for="travel_back">ขากลับ<font color= red>*</font></label>
	      <input type="text" class="form-control" id="travel_back" name="travel_back" placeholder="เดอะมอลล์-บริษัท" required>
	    </div>
			<div class="col-4 col-12-medium">
	      <label for="pay_back">จำนวนเงิน<font color= red>*</font></label>
	      <input type="text" class="form-control" id="pay_back" name="pay_back" onchange="totalPrice()" placeholder="บาท" required >
	    </div>
			<div class="col-4 col-12-medium">
	      <label for="pic_back">แนบรูป</label > <br>
				<input type="file" name="pic_back" id="pic_back"  >
	    </div>
		</div>
	<br><br><br><br>
		<div class="form-row">
			<div class="col-5 col-12-medium">
	      <label >รวมค่าเดินทางทั้งสิ้น</label>
	    </div>
			<div class="col-4 col-12-medium">
	      <input type="text" id="total_pay" name="total_pay" readonly>
	    </div>
			<div class="col-3 col-12-medium">
	      <label >บาท</label >
	    </div>
		</div>
		<div class="form-group col-md-10">
			<label for="month_w">รายละเอียด</label>
			<textarea name="travel_detail" id="travel_detail" placeholder="Enter your message" rows="4"></textarea>
		</div>
		<div class="form-row">
			<div class="col-4 col-12-small">
				<label for="">ทำราการ ณ วันที่<font color= red>*</font></label>
			</div>
			<div class="col-6 col-12-small">
				<input type="date" class="form-control" id="makeday_travel" name="makeday_travel" required>
			</div>
			<input name="member_id" type="hidden" id="member_id" value="<?=$cols[0]?>"/>
			<input type="hidden" class="form-control" id="confirm" placeholder="confirm" name="confirm">
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

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
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
			<!-- Search -->
								<!-- <section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>                                                                                                                                                                                      ธนสิษฐ์ รับผิดชอบ backendหน้านี้
								</section> -->
	</body>
</html>

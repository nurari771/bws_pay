<?php 
	date_default_timezone_set('Asia/Bangkok');
	include('lock.php');
include('connect.php');
$sql = "SELECT * from member where member_id = '".$_SESSION['member_id']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sqlrate = "SELECT * from rate_ot order by rateot_id desc limit 1";
$resultrate = $conn->query($sqlrate);
$rowRate = $resultrate->fetch_assoc();


?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>ค่าโอที</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
									<strong>เบิกโอที</strong></a>
									<ul class="icons">
								     <a href="logout.php"><img src="images/icon.png"></a>
									</ul>
								</header>
<!-- Section -->
<section>
<form method="post" name="insertot" id="contactForm" action="insertot.php">
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="n_pay">จ่ายให้ :</label>
      <input type="text" class="form-control" id="member_id" placeholder="ชื่อ-นามสกุล" value ="<?php echo $row['first_name']." ".$row['last_name']; ?>" readonly>
    </div>
    <div class="form-group col-md-5">
      <label for="nickname">ทำ ณ วันที่ :<font color= red>*</font></label>
      <input type="date" class="form-control" id="day_ot" name="day_ot" placeholder="วันที่" required >
    </div>
  </div>
	<div class="form-row">
    <div class="form-group col-md-10">
      <label for="pos">ประเภท<font color= red>*</font></label>

			<div>
				<input type="radio" id="nocheck" name="check" onclick="ShowHideDiv()" />
				<label for="nocheck">
				    ระบุเวลา
				</label>
			</div>

			<div>
				<input type="radio" class="form-control" id="check" name="check" onclick="ShowHideDiv()" />
				<label for="check">
				    เหมาจ่าย
				</label>
			</div>
    </div>
  </div>


	<!--options-->
	<div class="form-row">
    <div class="form-group col-md-5" id="opone" style="display: none">
      <label for="year_w">ระยะเวลา</label>

			<label for="year_w">เริ่ม</label>
      	<input type="datetime-local" class="form-control" id="timeStart" name="time_start" value="2019-03-09 20:00:00">
      <label for="year_w" >ถึง</label>
				<input type="datetime-local" class="form-control" id="timeEnd" name="time_end"  value="2019-03-10 02:00:00"><br>
				<input type="hidden" id="rate" value="<?php echo $rowRate['rate_price']; ?>"> 
				<?php //echo $rowRate['rate_price']; ?>
			<button type="button" id="calTime" onclick="calDiffTime()"  style="color: #ffffff;">คำนวณ </button><br><br>
				<label>รวมเป็นเงิน :</label>
				<input type="text" class="form-control" id="price_ot" name="price_ot" readonly>
			
  
    </div>
		
    <div class="form-group col-md-5" id="optwo" style="display: none">
      <label for="month_w">เลือกเวลา</label>
			<select name="pay_category" id="pay_category" onchange="priceFixed()">
				<option value="" selected>กรูณาเลือกช่วงเวลา</option>
			<?php 
				$sql = "SELECT * from mao_ot";
				$result = $conn->query($sql);
				while ($row = $result->fetch_assoc()) {
			?>
				<option value="<?php echo $row['d_ot']; ?>"><?php echo $row['pay_category']; ?></option>
			<?php } ?>
			</select>
			<script>
		
		</script>
			<label>รวมเป็นเงิน :</label>
			<input type="text" class="form-control" id="d_ot" name="d_ot" readonly>
    </div>
		<div class="form-row">
    <div class="form-group col-md-5">
      <label for="name_ot">ชื่อโครงการ :<font color= red>*</font></label>
      <input type="text" class="form-control" id="name_ot" name="name_ot" placeholder="ชื่อโครงการ" required >
    </div>
		<div class="form-group col-md-10">
			<label for="ot_detail">รายละเอียด</label>
			<textarea  id="ot_detail" name="ot_detail" placeholder="Enter your message" rows="4" ></textarea>
		</div>
		<div class="form-row">
			<div class="col-4 col-12-small">
				<label for="">ทำรายการ ณ วันที่<font color= red>*</font> </label>
			</div>
			<div class="col-6 col-12-small">
				<input type="date" class="form-control" id="makeday_ot" name="makeday_ot" required>
			</div>
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
							<!-- Search -->
								<!-- <section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section> -->

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

				<!-- function -->
		<script type="text/javascript">
		function ShowHideDiv() {
					var nocheck = document.getElementById("nocheck");
					var check = document.getElementById("check");
					opone.style.display = nocheck.checked ? "block" : "none";
					optwo.style.display = check.checked ? "block" : "none";

			}
		
		function priceFixed() {
				var time = document.getElementById("pay_category").value;
				document.getElementById("d_ot").value = time;
		}

		function calDiffTime() {
			var startTime = new Date(document.getElementById("timeStart").value);
			var endTime = new Date(document.getElementById("timeEnd").value);
			var difference = endTime.getTime() - startTime.getTime(); // This will give difference in milliseconds
			var rate = document.getElementById("rate").value;
			var price = Math.round((Math.round(difference / 60000))*rate);
			document.getElementById("price_ot").value = price;
		}
		// function lateday() {
		// 	var startTime = new Date(document.getElementById("timeStart").value);
		// 	var endTime = new Date(document.getElementById("timeEnd").value);
		// 	var nextday = endTime.getTime() - starTime.getTime();
		// 	document.getElementById("nextday").value = nextday;
		// }



		// $(document).ready(function(){
		// 	$("#calTime").on("click", function(){
		// 		var timeStart = $("#time_start").val();
		// 		var timeEnd = $("#time_end").val();
		// 		var timeDiff = calDiffTime(timeStart, timeEnd);
		// 		var price = timeDiff * 1.5;
		// 		$("#d_ot").val() = price;
		// 	});
 		// });                                                                                                                                                                      พงศธรรับผิดชอบbackendหน้านี้
                                                                                                                                                                                                            
		</script>
	</body>
</html>

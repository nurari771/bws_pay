<?php 
	date_default_timezone_set('Asia/Bangkok');
include('lock.php');
include('connect.php');

$sql = "SELECT * from ot as t inner join member as m on m.member_id = t.member_id where t.member_id = '".$_GET['member_id']."' AND t.ot_id = '".$_GET['ot_id']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sqlrate = "SELECT * from rate_ot order by rateot_id desc limit 1";
$resultrate = $conn->query($sqlrate);
$rowRate = $resultrate->fetch_assoc();
$tmp_start = explode(" ", $row['time_start']);
$tmp_end = explode(" ", $row['time_end']);
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>ค่าโอที</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="asset/css/main.css" />
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
<form method="post" name="admin_update_ot.php" id="admin_update_ot.php" action="admin_update_ot.php">
	<input type="hidden" name="ot_id" value="<?php echo $row['ot_id']; ?>" >
  <div class="form-row">
	<div class="form-group col-md-5">
      <label for="n_pay">จ่ายให้ :</label>
      <input type="text" class="form-control" id="member_id" placeholder="ชื่อ-นามสกุล" value="<?php echo $row['first_name']." ".$row['last_name']; ?>" readonly></td>
    </div>
    <div class="form-group col-md-5">
      <label for="nickname">ทำ ณ วันที่: <font color= red>*</font></label>
      <input type="date" class="form-control" id="day_ot" name="day_ot" placeholder="วันที่"  value="<?php echo $row['makeday_ot']; ?>" required>
    </div>
  </div>
	<h4>ประเภทการทำ OT</h4>
	<!--options-->
	<div class="form-row">
    <div class="form-group col-md-6"> 
			<?php if (!empty($row['price_ot'])) { ?>
				<input type="radio" id="nocheck" name="check" value="time" checked />
			<?php } else { ?>
				<input type="radio" id="nocheck" name="check" value="time"/>
			<?php } ?>
				<label for="nocheck">
				    ระบุเวลา
				</label><br>
      <label for="year_w">ระยะเวลา</label>
			<label for="year_w">เริ่ม</label>
      	<input type="datetime-local" class="form-control" id="timeStart" name="time_start" value="<?php echo $tmp_start[0]."T".$tmp_start[1]; ?>">
      <label for="year_w" >ถึง</label>
				<input type="datetime-local" class="form-control" id="timeEnd" name="time_end"  value="<?php echo $tmp_end[0]."T".$tmp_end[1]; ?>"><br>
				<input type="hidden" id="rate" value="<?php echo $rowRate['rate_price']; ?>"> 
			<button type="button" id="calTime" onclick="calDiffTime()" style="color: #ffffff;">คำนวณ </button><br><br>
				<label>รวมเป็นเงิน :</label>
				<input type="text" class="form-control" id="price_ot" name="price_ot" value="<?php echo $row['price_ot']; ?>" readonly>
    </div>

    <div class="form-group col-md-6">
			<!-- <h5>เหมาจ่าย</h5> -->
			<?php if (!empty($row['d_ot'])) { ?>
				<input type="radio" id="check" name="check" value="mao" checked />
			<?php } else { ?>
				<input type="radio" id="check" name="check" value="mao"/>
			<?php } ?>
				<label for="check">
				    เหมาจ่าย
				</label><br>
      <label for="month_w">เลือกเวลา</label>
			<select name="pay_category" id="pay_category" class="form-control" onchange="priceFixed()">
				<option value="<?php echo $row['d_ot']; ?>" selected><?php echo $row['pay_category']; ?></option>
				<?php 
					$pay_category = $row['pay_category'];
					$sqlCat = "SELECT * from mao_ot where pay_category NOT IN ('$pay_category')";
					$resultCat = $conn->query($sqlCat);
					while ($rowCat = $resultCat->fetch_assoc()) {
				?>
					<option value="<?php echo $rowCat['d_ot']; ?>"><?php echo $rowCat['pay_category']; ?></option>
				<?php } ?>
			</select>
			<label>รวมเป็นเงิน :</label>
			<input type="text" class="form-control" id="d_ot" name="d_ot"  value="<?php echo $row['d_ot']; ?>" readonly>
    </div>
		<div class="form-row">
    <div class="form-group col-md-5">
      <label for="name_ot">ชื่อโครงการ :<font color= red>*</font></label>
      <input type="text" class="form-control" id="name_ot" name="name_ot" placeholder="ชื่อโครงการ" value="<?php echo $row['name_ot']; ?>" >
    </div>
		<div class="form-group col-md-10">
			<label for="ot_detail">รายละเอียด<font color= red>*</font></label>
			<textarea  id="ot_detail" name="ot_detail" placeholder="Enter your message" rows="4"><?php echo $row['ot_detail']; ?></textarea>
		</div>
		<div class="form-row">
			<div class="col-4 col-12-small">
				<label for="">ทำรายการ ณ วันที่ <font color= red>*</font></label>
			</div>
			<div class="col-6 col-12-small">
				<input type="date" class="form-control" id="makeday_ot" name="makeday_ot" value="<?php echo $row['makeday_ot']; ?>">
			</div>
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

				<!-- function -->
		<script type="text/javascript">
		$(document).ready(function(){
			$("#check").change(function() {
					if($(this).prop('checked') !== true){
						$(this).closest('form').find("input[type=datetime]").val("");
					}
			});

			$("#nocheck").change(function() {
					if($(this).prop('checked') !== true){
						$(this).closest('form').find("select").val("");
					}
			});
		});
		
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

		// $(document).ready(function(){
		// 	$("#calTime").on("click", function(){
		// 		var timeStart = $("#time_start").val();
		// 		var timeEnd = $("#time_end").val();
		// 		var timeDiff = calDiffTime(timeStart, timeEnd);
		// 		var price = timeDiff * 1.5;
		// 		$("#d_ot").val() = price;
		// 	});
 		// });                                                                                                                                                                                                                                // พงศธร รับผิดชอบbackendหน้านี้                                                                                     
		                                                                                                              
		</script>
    
	</body>
</html>



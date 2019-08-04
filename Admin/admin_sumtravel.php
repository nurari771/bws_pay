<?php 
	require('connect.php');
	include('lock.php');
	$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id inner join position on member.position_id = position.position_id ORDER BY travel.travel_id " ;
	$travel_serach = null;
	$member_id = null;
	$position_id = null;
	$makeday_travel = null;


	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['high_search'])) {
		$member_id = $_POST['member_id'];
		$position_id = $_POST['position'];
		$makeday_travel = $_POST['makeday_travel'];
		if (!empty($member_id) && empty($position_id) && empty($makeday_travel)) {
			$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id inner join position on member.position_id = position.position_id WHERE member.member_id = '$member_id' ORDER BY travel.travel_id " ;
		} else if (empty($member_id) && !empty($position_id) && empty($makeday_travel)) {
			$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id inner join position on member.position_id = position.position_id WHERE member.position_id = '$position_id' ORDER BY travel.travel_id " ;
		} else if (empty($member_id) && empty($position_id) && !empty($makeday_travel)) {
			$travel = "SELECT * FROM travel inner join member on travel.member_id= member.member_id inner join position on member.position_id = position.position_id WHERE travel.makeday_travel = '$makeday_travel' ORDER BY travel.travel_id " ;
		} else if (!empty($member_id) && !empty($position_id) && empty($makeday_travel)) {
			$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id inner join position on member.position_id = position.position_id WHERE member.member_id = '$member_id' AND member.position_id = '$position_id' ORDER BY travel.travel_id " ;
		} else if (empty($member_id) && !empty($position_id) && !empty($makeday_travel)) {
			$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id inner join position on member.position_id = position.position_id WHERE member.position_id = '$position_id' AND travel.makeday_travel = '$makeday_travel' ORDER BY travel.travel_id " ;
		} else if (!empty($member_id) && empty($position_id) && !empty($makeday_travel)) {
			$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id inner join position on member.position_id = position.position_id WHERE member.member_id = '$member_id' AND travel.makeday_travel = '$makeday_travel' ORDER BY travel.travel_id " ;
		} else if (!empty($member_id) && !empty($position_id) && !empty($makeday_travel)) {
			$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id inner join position on member.position_id = position.position_id WHERE member.member_id = '$member_id' AND member.position_id = '$position_id' AND travel.makeday_travel = '$makeday_travel' ORDER BY travel.travel_id " ;
		} else {
			$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id inner join position on member.position_id = position.position_id ORDER BY travel.travel_id " ;
		} 
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['month'])) {
		$travel_serach = $_POST['travel_serach'];
		if ($travel_serach == 0) {
			$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id 
			inner join position on member.position_id = position.position_id ORDER BY travel.travel_id " ;
		} else {
			$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id 
		inner join position on member.position_id = position.position_id	WHERE MONTH(travel.makeday_travel) = '$travel_serach' ORDER BY travel.travel_id " ;
		}
	}
	$resulttravel = mysqli_query($conn,$travel) or die ($conn->error);
	$counttravel = mysqli_num_rows($resulttravel);
	$membertravell = 0;
	$memtravel =0;
?>
<html>
	<head>
		<title>รวมค่าเดินทาง</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="asset/css/main.css" />
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">


		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head>
	<body class="is-preload">

     		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo"><strong>รวมค่าเดินทาง</strong></a>
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
	  	<select id="travel_serach" class="form-control" name="travel_serach">
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
	<button type="submit" value="month" class="primary" name="month">ค้นหา</button>
</form>
</div></td>
 </div>
</tr>
</tbody>
</table>

<table class="table table-striped">
	<tbody>
		<tr>

  <script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.in").each(function(){
        	$(this).siblings(".panel-heading").find(".glyphicon").addClass("glyphicon-minus").removeClass("glyphicon-plus");
        });

        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).parent().find(".glyphicon").removeClass("glyphicon-plus").addClass("glyphicon-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).parent().find(".glyphicon").removeClass("glyphicon-minus").addClass("glyphicon-plus");
        });
    });
  </script>

<div class="bs-example">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-plus"></span>&nbsp;ขั้นสูง</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
						<form method="post">
            <div class="panel-body">
							 <div class="form-row">
								 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="p_report">ตำแหน่ง: </label>&nbsp;&nbsp;&nbsp;
									<div class="form-group col-md-3">
									<select name="position" id="position" >
										<option value="">-- กรุณาเลือกตำแหน่ง --</option>
										<?php 
											$sql = "SELECT * from position";
											$result = $conn->query($sql);
											while ($row = $result->fetch_assoc()) {
										?>
											<option value="<?php echo $row['position_id'] ?>"><?php echo $row['position']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-row">
								<label for="first_name">ชื่อ-นามสกุล: </label>&nbsp;&nbsp;&nbsp;
									<div class="form-group col-md-3">
									<select name="member_id" id="member_id" >
										<option value="">-- กรุณาเลือกชื่อที่ต้องการค้นหา --</option>
										<?php 
											$sql = "SELECT * from member";
											$result = $conn->query($sql);
											while ($row = $result->fetch_assoc()) {
										?>
											<option value="<?php echo $row['member_id'] ?>"><?php echo $row['first_name']." ".$row['last_name']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

								<div class="form-row">
							  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="makeday_day">ปฏิทิน: </label>&nbsp;&nbsp;&nbsp;
										<div class="form-group col-md-3">
									    <input type="date" class="form-control" id="makeday_travel" name="makeday_travel" placeholder="วัน/เดือน/ปี">
												<br><button type="submit" value="high_search" class="primary" name="high_search">ค้นหา</button>
								    </div>
							  </div>
                </div>
								</div>
								</form>
            </div>
        </div>
    </div>

   </div>
	 
  </tr>
 </tbody>
</table>
	<div class="table-wrapper">
		<table class="alt">
			<thead>
				<tr>
					<th>ชื่อ-นามสกุล</th>
					<th>ตำแหน่ง</th>
					<th>เงิน</th>
					<th>วันที่ทำรายการ</th>
				</tr>
					</thead>
					<tbody>
					<tbody>
					<?php if ($counttravel == 0) { ?>
					<tr>
					<td colspan="7" style="text-align: center;">ไม่พบข้อมูลการเบิก</td>
					</tr>
					<?php 
					} else {
					while ($rowtravel = $resulttravel->fetch_assoc()) { 
					?>
					<tr>
					<td><?php echo $rowtravel['first_name']." ".$rowtravel['last_name']; ?></td>
					<td><?php echo $rowtravel['position']; ?></td>
					<td><?php echo $rowtravel['total_pay']; ?></td>
					<td><?php echo $rowtravel['makeday_travel']; ?></td>
				</tr>
				<?php
															$membertravell += (int)$rowtravel['total_pay'];
														}
												}
												?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2">รวมค่า travel ทั้งหมด</td>
													<td colspan="2"><?php echo $membertravell ?> บาท</td>
												
												</tr>
											</tfoot>
									  </table>
									</div>
									<a href="admin_exceltravel.php?month=<?php echo $travel_serach; ?>&position_id=<?php echo $position_id; ?>&member_id=<?php echo $member_id; ?>&makeday_travel=<?php echo $makeday_travel ?>" class="button primary">Excel</a>
								</section>
						
					

	                         <!-- <a href="#" class="button primary">Excel</a> -->
	                       	 
 
	<!-- <ul class="pagination">
		<li><a href="#" class="page active">1</a></li>
		<li><a href="#" class="page">2</a></li>
		<li><a href="#" class="page">3</a></li>
		<li><a href="#" class="page">4</a></li>
		<li><a href="#" class="page">5</a></li>
		<li><a href="#" class="button small">Next</a></li>
	</ul> -->
 </div>
</div>
				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<!-- <section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />                                                                                                                                                                                ธนสิษฐ์รับผิดชอบ
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
											<!-- <li><a href="comsee.php">ค่าคอม</a></li>                                                                                                                                                                                                                                                                                                                                                   ธนสิษฐ์ รับผิดชอบ backendหน้านี้ 
											-->
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

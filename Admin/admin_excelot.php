<?php 

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=รายงานการเบิกค่าOT.xls");

require('connect.php');
session_start();
$ot = "SELECT * FROM ot inner join member on ot.member_id = member.member_id
inner join position on member.position_id = position.position_id ORDER BY ot.ot_id " ;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$serach = $_GET['month'];
	$member_id = $_GET['member_id'];
	$position_id = $_GET['position_id'];
	$makeday_ot = $_GET['makeday_ot'];
	if ($serach == 0) {
		$ot = "SELECT * FROM ot inner join member on ot.member_id = member.member_id
		inner join position on member.position_id = position.position_id" ;
		if (!empty($member_id) && empty($position_id) && empty($makeday_ot)) {
			$ot .= " WHERE member.member_id = '$member_id' ORDER BY ot.ot_id " ;
		} else if (empty($member_id) && !empty($position_id) && empty($makeday_ot)) {
			$ot .= " WHERE member.position_id = '$position_id' ORDER BY ot.ot_id" ;
		} else if (empty($member_id) && empty($position_id) && !empty($makeday_ot)) {
			$ot .= " WHERE ot.makeday_ot = '$makeday_ot' ORDER BY ot.ot_id " ;
		} else if (!empty($member_id) && !empty($position_id) && empty($makeday_ot)) {
			$ot .= " WHERE member.member_id = '$member_id' AND member.position_id = '$position_id' ORDER BY ot.ot_id " ;
		} else if (empty($member_id) && !empty($position_id) && !empty($makeday_ot)) {
			$ot .= " WHERE member.position_id = '$position_id' AND ot.makeday_ot = '$makeday_ot' ORDER BY ot.ot_id " ;
		} else if (!empty($member_id) && empty($position_id) && !empty($makeday_ot)) {
			$ot .= " WHERE member.member_id = '$member_id' AND ot.makeday_ot = '$makeday_ot' ORDER BY ot.ot_id " ;
		} else if (!empty($member_id) && !empty($position_id) && !empty($makeday_ot)) {
			$ot .= " WHERE member.member_id = '$member_id' AND member.position_id = '$position_id' AND ot.makeday_ot = '$makeday_ot' ORDER BY ot.ot_id " ;
		}
	} else {
		$ot = "SELECT * FROM ot inner join member on ot.member_id = member.member_id
		inner join position on member.position_id = position.position_id WHERE MONTH(ot.makeday_ot) = '$serach'" ;
		if (!empty($member_id) && empty($position_id) && empty($makeday_ot)) {
			$ot .= " AND member.member_id = '$member_id' ORDER BY ot.ot_id " ;
		} else if (empty($member_id) && !empty($position_id) && empty($makeday_ot)) {
			$ot  .= " AND member.position_id = '$position_id' ORDER BY ot.ot_id" ;
		} else if (empty($member_id) && empty($position_id) && !empty($makeday_ot)) {
			$ot .= " AND ot.makeday_ot = '$makeday_ot' ORDER BY ot.ot_id " ;
		} else if (!empty($member_id) && !empty($position_id) && empty($makeday_ot)) {
			$ot .= " AND member.member_id = '$member_id' AND member.position_id = '$position_id' ORDER BY ot.ot_id " ;
		} else if (empty($member_id) && !empty($position_id) && !empty($makeday_ot)) {
			$ot .= " AND member.position_id = '$position_id' AND ot.makeday_ot = '$makeday_ot' ORDER BY ot.ot_id " ;
		} else if (!empty($member_id) && empty($position_id) && !empty($makeday_ot)) {
			$ot .= " AND member.member_id = '$member_id' AND ot.makeday_ot = '$makeday_ot' ORDER BY ot.ot_id " ;
		} else if (!empty($member_id) && !empty($position_id) && !empty($makeday_ot)) {
			$ot .= " AND member.member_id = '$member_id' AND member.position_id = '$position_id' AND ot.makeday_ot = '$makeday_ot' ORDER BY ot.ot_id " ;
		}
	}
	
}
	$resultot = mysqli_query($conn,$ot);
	$countot = mysqli_num_rows($resultot);
	$memberott = 0;
	$memberottt = 0;
	$memot =0;
	
?>
<html>
	<head>



	</head>
	<body class="is-preload">

     		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									
								</header>

							<!-- Section -->
							<section>
								<table class="table table-borderless">
								<tbody>

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

<div class="bs-example"><h1>ค่าล่วงเวลา</h1>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-plus"></span></a>
                </h4>
            </div>


            


	<div class="table-wrapper">
		<table class="alt">
			<thead>
				<tr>
					<th>ชื่อ-นามสกุล</th>
					<th>ตำแหน่ง</th>
					<th>เงินแบบเหมา</th>
					<th>เงินแบบตามระยะเวลา</th>
					<th>วันที่ทำรายการ</th>
				</tr>
					</thead>
					<tbody>
					<tbody>
					<?php if ($countot == 0) { ?>
					<tr>
					<td colspan="7" style="text-align: center;">ไม่พบข้อมูลการเบิก</td>
					</tr>
					<?php 
					} else {
					while ($rowot = $resultot->fetch_assoc()) { 
					?>
					<tr>
					<td><?php echo $rowot['first_name']." ".$rowot['last_name']; ?></td>
					<td><?php echo $rowot['position']; ?></td>
					<td><?php echo $rowot['d_ot']; ?></td>
					<td><?php echo $rowot['price_ot']; ?></td>
					<td><?php echo $rowot['makeday_ot']; ?></td>
					</tr>
				<?php
															$memberott += (int)$rowot['price_ot'];
															$memberottt += (int)$rowot['d_ot'];
															$memot = $memberott+$memberottt;
														}
												}
												?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2">รวมค่า ot </td>
													<td colspan="1"><?php echo $memberottt ?> บาท</td>
													<td colspan="1"><?php echo $memberott ?> บาท</td>
													<td colspan="1">รวม <?php echo $memot ?> บาท</td>
												</tr>
											</tfoot>
									  </table>
									</div>
									
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
									</form>                                                                                                                                                                                               พงศธร รับผิดชอบหน้านี้ทั้งหมด
							-->
							

							<!-- Menu -->
						
		<!-- Scripts -->
			<script src="asset/js/jquery.min.js"></script>
			<script src="asset/js/browser.min.js"></script>
			<script src="asset/js/breakpoints.min.js"></script>
			<script src="asset/js/util.js"></script>
			<script src="asset/js/main.js"></script>

	</body>
</html>

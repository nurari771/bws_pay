<?php 

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=รายงานการเบิกค่าเดินทาง.xls");

	require('connect.php');
	session_start();
	$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id
	inner join position on member.position_id = position.position_id ORDER BY travel.travel_id " ;
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$serach = $_GET['month'];
		$member_id = $_GET['member_id'];
		$position_id = $_GET['position_id'];
		$makeday_travel = $_GET['makeday_travel'];
		if ($serach == 0) {
			$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id
			inner join position on member.position_id = position.position_id" ;
			if (!empty($member_id) && empty($position_id) && empty($makeday_travel)) {
				$travel .= " WHERE member.member_id = '$member_id' ORDER BY travel.travel_id " ;
			} else if (empty($member_id) && !empty($position_id) && empty($makeday_travel)) {
				$travel .= " WHERE member.position_id = '$position_id' ORDER BY travel.travel_id" ;
			} else if (empty($member_id) && empty($position_id) && !empty($makeday_travel)) {
				$travel .= " WHERE travel.makeday_travel = '$makeday_travel' ORDER BY travel.travel_id " ;
			} else if (!empty($member_id) && !empty($position_id) && empty($makeday_travel)) {
				$travel .= " WHERE member.member_id = '$member_id' AND member.position_id = '$position_id' ORDER BY travel.travel_id " ;
			} else if (empty($member_id) && !empty($position_id) && !empty($makeday_travel)) {
				$travel .= " WHERE member.position_id = '$position_id' AND travel.makeday_travel = '$makeday_travel' ORDER BY travel.travel_id " ;
			} else if (!empty($member_id) && empty($position_id) && !empty($makeday_travel)) {
				$travel .= " WHERE member.member_id = '$member_id' AND travel.makeday_travel = '$makeday_travel' ORDER BY travel.travel_id " ;
			} else if (!empty($member_id) && !empty($position_id) && !empty($makeday_travel)) {
				$travel .= " WHERE member.member_id = '$member_id' AND member.position_id = '$position_id' AND travel.makeday_travel = '$makeday_travel' ORDER BY travel.travel_id " ;
			}
		} else {
			$travel = "SELECT * FROM travel inner join member on travel.member_id = member.member_id
			inner join position on member.position_id = position.position_id WHERE MONTH(travel.makeday_travel) = '$serach'" ;
			if (!empty($member_id) && empty($position_id) && empty($makeday_travel)) {
				$travel .= " AND member.member_id = '$member_id' ORDER BY travel.travel_id " ;
			} else if (empty($member_id) && !empty($position_id) && empty($makeday_travel)) {
				$travel .= " AND member.position_id = '$position_id' ORDER BY travel.travel_id" ;
			} else if (empty($member_id) && empty($position_id) && !empty($makeday_travel)) {
				$travel .= " AND travel.makeday_travel = '$makeday_travel' ORDER BY travel.travel_id " ;
			} else if (!empty($member_id) && !empty($position_id) && empty($makeday_travel)) {
				$travel .= " AND member.member_id = '$member_id' AND member.position_id = '$position_id' ORDER BY travel.travel_id " ;
			} else if (empty($member_id) && !empty($position_id) && !empty($makeday_travel)) {
				$travel .= " AND member.position_id = '$position_id' AND travel.makeday_trsvel = '$makeday_travel' ORDER BY travel.travel_id " ;
			} else if (!empty($member_id) && empty($position_id) && !empty($makeday_travel)) {
				$travel .= " AND member.member_id = '$member_id' AND travel.makeday_travel = '$makeday_travel' ORDER BY travel.travel_id " ;
			} else if (!empty($member_id) && !empty($position_id) && !empty($makeday_travel)) {
				$travel .= " AND member.member_id = '$member_id' AND member.position_id = '$position_id' AND travel.makeday_travel = '$makeday_travel' ORDER BY travel.travel_id " ;
			}
		}
		
	}
	// echo $travel; die();
	$resulttravel = mysqli_query($conn,$travel);
	$counttravel = mysqli_num_rows($resulttravel) or die ($conn->error);

	$membertravell = 0;
	
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

<div class="bs-example">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-plus"></span></a>
                </h4>
            </div>


            


	<div class="table-wrapper"> <h3> ค่าเดินทาง</h3>
		<table class="alt">
			<thead>
				<tr>
					<th>ชื่อ-นามสกุล</th>
					<th>ตำแหน่ง</th>
					<th>เงินแบบเหมา</th>
					
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
													<td colspan="2">รวมค่าเดินทาง ทั้งหมด</td>
													<td colspan="2"><?php echo $membertravell ?> บาท</td>
												
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
									</form>                                                                                                                                                                            ธนสิษฐ์ รับผิดชอบหน้านี้
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

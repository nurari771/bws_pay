<?php 

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=รายงานการเบิกค่าคอมมิชชั่น.xls");

require('connect.php');
session_start();
$com = "SELECT * FROM commission inner join member on commission.member_id = member.member_id
inner join position on member.position_id = position.position_id ORDER BY commission.com_id " ;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$serach = $_GET['month'];
	$member_id = $_GET['member_id'];
	$position_id = $_GET['position_id'];
	$com_day = $_GET['com_day'];
	if ($serach == 0) {
		$com = "SELECT * FROM commission inner join member on commission.member_id = member.member_id
		inner join position on member.position_id = position.position_id" ;
		if (!empty($member_id) && empty($position_id) && empty($com_day)) {
			$com .= " WHERE member.member_id = '$member_id' ORDER BY commission.com_id " ;
		} else if (empty($member_id) && !empty($position_id) && empty($com_day)) {
			$com .= " WHERE member.position_id = '$position_id' ORDER BY commission.com_id" ;
		} else if (empty($member_id) && empty($position_id) && !empty($com_day)) {
			$com .= " WHERE commission.com_day = '$com_day' ORDER BY commission.com_id " ;
		} else if (!empty($member_id) && !empty($position_id) && empty($com_day)) {
			$com .= " WHERE member.member_id = '$member_id' AND member.position_id = '$position_id' ORDER BY commission.com_id " ;
		} else if (empty($member_id) && !empty($position_id) && !empty($com_day)) {
			$com .= " WHERE member.position_id = '$position_id' AND commission.com_day = '$com_day' ORDER BY commission.com_id " ;
		} else if (!empty($member_id) && empty($position_id) && !empty($com_day)) {
			$com .= " WHERE member.member_id = '$member_id' AND commission.com_day = '$com_day' ORDER BY commission.com_id " ;
		} else if (!empty($member_id) && !empty($position_id) && !empty($com_day)) {
			$com .= " WHERE member.member_id = '$member_id' AND member.position_id = '$position_id' AND commission.com_day = '$com_day' ORDER BY commission.com_id " ;
		}
	} else {
		$com = "SELECT * FROM commission inner join member on commission.member_id = member.member_id
		inner join position on member.position_id = position.position_id WHERE MONTH(commission.com_day) = '$serach'" ;
		if (!empty($member_id) && empty($position_id) && empty($com_day)) {
			$com .= " AND member.member_id = '$member_id' ORDER BY commission.com_id " ;
		} else if (empty($member_id) && !empty($position_id) && empty($com_day)) {
			$com  .= " AND member.position_id = '$position_id' ORDER BY commission.com_id" ;
		} else if (empty($member_id) && empty($position_id) && !empty($com_day)) {
			$com .= " AND commission.com_day = '$com_day' ORDER BY commission.com_id " ;
		} else if (!empty($member_id) && !empty($position_id) && empty($com_day)) {
			$com .= " AND member.member_id = '$member_id' AND member.position_id = '$position_id' ORDER BY commission.com_id " ;
		} else if (empty($member_id) && !empty($position_id) && !empty($com_day)) {
			$com .= " AND member.position_id = '$position_id' AND commission.com_day = '$com_day' ORDER BY commission.com_id " ;
		} else if (!empty($member_id) && empty($position_id) && !empty($com_day)) {
			$com .= " AND member.member_id = '$member_id' AND commission.com_day = '$com_day' ORDER BY commission.com_id " ;
		} else if (!empty($member_id) && !empty($position_id) && !empty($com_day)) {
			$com .= " AND member.member_id = '$member_id' AND member.position_id = '$position_id' AND commission.com_day = '$com_day' ORDER BY commission.com_id " ;
		}
	}
	
}
	$resultcom = mysqli_query($conn,$com) or die ($conn->error);
	$countcom = mysqli_num_rows($resultcom);
	
	$membercomm = 0;
	
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

	<div class="table-wrapper">
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
					<?php if ($countcom == 0) { ?>
					<tr>
					<td colspan="7" style="text-align: center;">ไม่พบข้อมูลการเบิก</td>
					</tr>
					<?php 
					} else {
					while ($rowcom = $resultcom->fetch_assoc()) { 
					?>
					<tr>
					<td><?php echo $rowcom['first_name']." ".$rowcom['last_name']; ?></td>
					<td><?php echo $rowcom['position']; ?></td>
					<td><?php echo $rowcom['total_com']; ?></td>
					
					<td><?php echo $rowcom['com_day']; ?></td>
				</tr>
				<?php
															$membercomm += (int)$rowcom['total_com'];
														}
												}
												?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2">รวมค่า คอมมิชชั่น ทั้งหมด</td>
													<td colspan="2"><?php echo $membercomm ?> บาท</td>
												
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
									</form>                                                                                                                                                ธนสิษฐ์ รับผิดชอบหน้านี้ทั้งหมด
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

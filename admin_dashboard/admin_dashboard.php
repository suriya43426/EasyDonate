<?php
	include_once('admin_header.php');
    include_once('../connection.php');
    $members= $connection->query("SELECT COUNT(*) FROM member where usertype = 'user'");
    $row = $members->fetch_array();
    $mem = $row['COUNT(*)'];
    $projects= $connection->query("SELECT COUNT(*) FROM project");
    $row2 = $projects->fetch_array();
    $pro = $row2['COUNT(*)'];
    $founds= $connection->query("SELECT COUNT(*) FROM member where usertype = 'foundation'");
    $row3 = $founds->fetch_array();
    $found = $row3['COUNT(*)'];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">ภาพรวมระบบ</h3>
							<p class="panel-subtitle">Period: Apr 14, 2019 - Oct 21, 2019</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number"><?php print $mem ;?></span>
											<span class="title">Donors</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number"><?php print $pro ;?></span>
											<span class="title">Project</span>
										</p>
									</div>
								</div>
                                <div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number"><?php print $found ;?></span>
											<span class="title">Foundation</span>
										</p>
									</div>
								</div>
                                
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					
					
					
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
	</div>
	<?php
	include('admin_footer.php');
	?>
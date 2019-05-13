<?php
	include_once('foundation_header.php');
	include_once('../connection.php');
	//session_start();
    $members= $connection->query("SELECT COUNT(*) FROM project where username_fk = '".$_SESSION['membername']."'");
    $row = $members->fetch_array();
    $mem = $row['COUNT(*)'];
    $projects= $connection->query("SELECT SUM(target_amount) FROM project where username_fk = '".$_SESSION['membername']."'");
    $row2 = $projects->fetch_array();
    $pro = $row2['SUM(target_amount)'];
	// $founds= $connection->query("SELECT SUM(donate_amount) FROM donate_payment,project where project_id_fk = 'foundation'");
    // $row3 = $founds->fetch_array();
    // $found = $row3['SUM(target_amount)'];

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
							<h3 class="panel-title">โครงการของคุณ</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bullhorn"></i></span>
										<p>
											<span class="number"><?php print $mem ;?></span>
											<span class="title">projects</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-flag"></i></span>
										<p>
											<span class="number"><?php print $pro ;?></span>
											<span class="title">Target | Baht</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-money"></i></span>
										<p>
											<span class="number">274,678</span>
											<span class="title">Total | Baht</span>
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
	include('foundation_footer.php');
	?>
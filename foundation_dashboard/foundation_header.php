<?php
	include('../connection.php');
	session_start();

	if(!isset($_SESSION['membername']) AND $_SESSION['userid'] == ''){
		header('location:login.php');
	}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Welcome To Foundation Dashboard</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="../assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
   .navbar-btn {
    float: left;
    padding: 9px 0;
    }
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-btn">
					
					<div>
						<img src="../upload/easylogo2.png" width="205" height="43" border="0">
					</div>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						
						<li class="dropdown">
						<?php
						$image = $connection->query("SELECT * FROM member WHERE username='".$_SESSION['membername']."'");
						$row = $image->fetch_array(); ?>
						
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../<?php echo $row['profile'];?>" class="img-circle" alt="Avatar"> <?php ?> <span><?php echo $_SESSION['membername'];?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								
								<li><a href="" data-toggle="modal" data-target="#logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="foundation_dashboard.php" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="create_project.php" class="" ><i class="lnr lnr-alarm"></i> <span>Create Project</span></a></li>
						
					</ul>
				</nav>
			</div>
		</div>

<div class="modal fade" id="logout" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure ?</h4>
        </div>
        <div class="modal-body">
          <p>Want to logout now ?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <a href="../logout.php"> <button type="button" class="btn btn-danger">Logout</button></a>
        </div>
      </div>
    </div>
  </div>
<?php
	include('user_header.php');
	include_once('../connection.php');
	
	$status = $_GET['status'];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/ed.css">
<script src="css/jquery.min.js"></script>
<script src="css/bootstrap.min.js"></script>

<div class="main">
<div class="container">
    <div class="jumbotron">
      <h3 class="display-4" style="margin-bottom: 13px;"><b>Payment Status:</b> </h3>
			<p class="lead">
				<?php
									    if($status=="success")
										//echo "Status code: " .$row["donate_payment_status"];
										{   echo '<br/><img src="images/checked.png" height="100" width="100"<br/>';
									        echo "<br/>Payment transaction complete";
											echo "<hr >";
											echo "ทำการพิมพ์ใบเสร็จ<hr>";
											echo '<div class="btn btn-default" role="button">Print : PDF</div> ';
										}
										else {
											echo '<br/><img src="images/fail.png" height="100" width="100"<br/>';
											echo "<br/>Payment transaction fail";
											echo "<hr >";
											echo '<div class="my-4"</div>';
										}
				 ?>
    </div>
</div>
</div>



 <?php
 	include('user_footer.php');
 ?>

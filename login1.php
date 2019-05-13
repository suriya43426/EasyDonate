<?php
	include_once('connection.php');
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

	$login = $connection->query("SELECT * FROM member WHERE username='$username' AND password= password('$password')");

	$fetch = $login->fetch_array();
	if($login->num_rows == 1){
		if($fetch['usertype'] == 'admin'){
			$_SESSION['member_id'] = $fetch['member_id'];
			$_SESSION['username'] = $fetch['username'];
            //$_SESSION['logged_in'] = 1  ; 
			header('location:admin_dashboard/admin_dashboard.php');

		}if ($fetch['usertype'] == 'user')  {
			$_SESSION['userid'] = $fetch['user_id'];
			$_SESSION['membername'] = $fetch['username'];
            //$_SESSION['logged_in'] = 1  ; 
			header('location:user_dashboard/user_dashboard.php');
			
		}elseif ($fetch['usertype'] == 'foundation')  {
		    $_SESSION['userid'] = $fetch['user_id'];
		    $_SESSION['membername'] = $fetch['username'];
            //$_SESSION['logged_in'] = 1  ; 
            header('location:foundation_dashboard/foundation_dashboard.php');
                
        }
           
	}else {
		$_SESSION['error'] = '';
        $_SESSION['logged_in'] = 1   ;
        header('location:index.php?error=1');
	}
?>
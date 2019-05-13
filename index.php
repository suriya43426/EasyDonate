<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>:: EASY DONATE ::</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="css/jquery.min.js"></script>
<script src="css/bootstrap.min.js"></script> 
<style type="text/css">
	.form-signin{max-width:330px;margin:0 auto;padding:15px;}
.form-signin .form-signin-heading,.form-signin .checkbox{margin-bottom:10px;}
.form-signin .checkbox{font-weight:normal;}
.form-signin .form-control{position:relative;font-size:16px;height:auto;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:10px;}
.form-signin .form-control:focus{z-index:2;}
.form-signin input[type="text"]{margin-bottom:-1px;border-bottom-left-radius:0;border-bottom-right-radius:0;}
.form-signin input[type="password"]{margin-bottom:10px;border-top-left-radius:0;border-top-right-radius:0;}
.account-wall{margin-top:50px;background-color:#f7f7f7;-moz-box-shadow:0 2px 2px rgba(0,0,0,0.3);-webkit-box-shadow:0 2px 2px rgba(0,0,0,0.3);box-shadow:0 2px 2px rgba(0,0,0,0.3);padding:40px 0 20px;}
.login-title{color:#555;font-size:18px;font-weight:400;display:block;}
.profile-img{width:200px;height:200px;display:block;margin:0 auto 10px;}
.need-help{margin-top:10px;}
.new-account{display:block;margin-top:10px;}
</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <img class="profile-img" src="upload/easy.png">
                <form class="form-signin" action="login.php" method="post">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    เข้าสู่ระบบ</button>
                <a href="#" class="pull-left need-help">
                    ลืมรหัสผ่าน?</a>
                <a href="#" class="pull-right need-help">
                    ยังไม่ได้เป็นสมาชิก?</a><span class="clearfix"></span>
                </form>
                   <?php if(isset($_GET['error'])==1){
                    echo "<font color=\"red\"><center>Invalid user or password</center></font>";
                   }?>
            </div>
            <a href="register.php" class="text-center new-account">ลงทะเบียนมูลนิธิ/โรงพยาบาล </a>
        </div>
    </div>
</div>
</body>
</html>                                		                            
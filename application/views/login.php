<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    
	
<link rel="Stylesheet" type="text/css" href="<?php echo css; ?>login2.css" />
<link rel="Stylesheet" type="text/css" href="<?php echo css; ?>bootstrap.min.css" />

</head>
<body>
<div id="login-form-logo">
    <img src="<?php echo images; ?>login-logo.png" style="width: 220px;"><br><br>
    <span>Enter user name and password to access your account</span>
</div>
<div class="row" id="login-main-div" style="margin-left:35%;">
    <div class="col-lg-6 text-center" id="login-form">
        <div class="panel panel-default" style="border-color:#ffffff;box-shadow: 0 1px 1px rgba(0,0,0,0);">
            <div class="panel-body">
			 <span style="color:#B10202;font-size:12px;font-weight:bold;">
				<?php if($error != "") {
				
				echo $error; 
				} ?>
				</span>
				<div style="text-align:left;width:300px;margin:auto;">
                <form action="<?php echo $this->url->index(); ?>" method="post">
					<span><strong>Username:</strong></span><br />
                    <input type="text" name="user_name" id="username" class="login-input" style="-moz-box-sizing:content-box;"/><br>
					<span><strong>Password:</strong></span><br />
                    <input type="password" name="user_password" id="user_password" class="login-input" style="-moz-box-sizing:content-box;border:1px solid black;"/><br>
					
                    <input type="submit" value="Login" name="btnSub" id="submit_btn"/>
					<!--<span><a href="">Forgot Password?</a></span>-->
                </form>
				</div>
					
				

            </div>
        </div>
    </div>
    <!--<div class="col-lg-6 text-center" style="margin-top: -140px;">
        <div class="panel panel-default" style="margin-left:-50px;border-color:#ffffff;box-shadow: 0 1px 1px rgba(0,0,0,0);">
            <div class="panel-body">
                <img src="<?php //echo images; ?>truck-red.jpg" style="height:420px;">
            </div>
        </div>
    </div>-->
</div>
</body>
</html>
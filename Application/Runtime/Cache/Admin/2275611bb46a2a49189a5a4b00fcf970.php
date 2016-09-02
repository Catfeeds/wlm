<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>未来门后台管理系统</title>
    <link rel="shortcut  icon" type="image/x-icon" href="/Public/Home/images/logo3.ico" media="screen"  />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    <link href="/Public/Admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/Public/Admin/css/bootstrap-responsive.min.css" rel="stylesheet" />
    
    <link href="/Public/Admin/css/font-awesome.css" rel="stylesheet" />
    
    <link href="/Public/Admin/css/adminia.css" rel="stylesheet" /> 
    <link href="/Public/Admin/css/adminia-responsive.css" rel="stylesheet" /> 
    
    <link href="/Public/Admin/css/pages/login.css" rel="stylesheet" /> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
  
  <script src="/Public/Admin/js/jquery-1.7.2.min.js"></script>
  <script src="/Public/Admin/js/bootstrap.js"></script>
  <script src="/Public/layer/layer.js"></script>

  <script src="/Public/Admin/js/hrfd.js"></script>
<body>
	
<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 				
			</a>
			
			<a class="brand" href="./">未来门后台管理系统</a>
			
			<div class="nav-collapse">
			
				<ul class="nav pull-right">
					
					<li class="">
						
						<a href="javascript:;"><i class="icon-chevron-left"></i> Back to Homepage</a>
					</li>
				</ul>
				
			</div> <!-- /nav-collapse -->
			
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->


<div id="login-container">
	
	
	<div id="login-header">
		
		<h3>登陆</h3>
		
	</div> <!-- /login-header -->
	
	<div id="login-content" class="clearfix">
	
	<form id="loginForm">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="username">用户名</label>
						<div class="controls">
							<input type="text" class="" name="username" id="username" autocomplete="on" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">密码</label>
						<div class="controls">
							<input type="password" class="" name="password" id="password" autocomplete="on" />
						</div>
					</div>
				</fieldset>
				<!-- 
				<div id="remember-me" class="pull-left">
					<input type="checkbox" name="remember" id="remember" />
					<label id="remember-label" for="remember">Remember Me</label>
				</div>
				 -->
				<div class="pull-right">
					<a class="btn btn-warning btn-large" href="#" onclick="login()">
						登陆
					</a>
				</div>
				<input type="hidden" id="loginURL" value="<?php echo U('Admin/Login/doLogin');?>">
				<input type="hidden" id="indexURL" value="<?php echo U('Admin/Index/index');?>">
			</form>
			
		</div> <!-- /login-content -->
		
		
		<div id="login-extra">
			
			<!-- <p>还没有注册? <a href="javascript:;">Sign Up.</a></p> -->
			
			<p>忘记密码? <a href="javascript:void(0);" >找回密码</a></p>
			
		</div> <!-- /login-extra -->
	
</div> <!-- /login-wrapper -->

    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


  </body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html> 
<html lang="zh-cn"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="__CSS__/pintuer.css">
<script type="text/javascript" src="__JS__/jquery-1.7.min.js"></script>
<script src="__JS__/pintuer.js"></script>
<style>
body{background:#FFF url(__IMG__/bgp.png) no-repeat;background-size: cover; -moz-background-size: cover; }
.center1 {top: 50%;left: 50%;padding-top:10%;text-align:center;}
.center2 {top: 50%;left: 50%;margin-left:20%;margin-top:10%;}
.center3 {top: 50%;left: 50%;margin-left:20%;margin-top:20%;}
.fontclass{font-size:14px;font-weight:bold;font-family:方正兰亭超细黑简体, 'Arial Narrow';}
.fontclass2{font-size:10px;font-weight:bold;font-family:方正兰亭超细黑简体, 'Arial Narrow';}
.formdiv{width:80%;padding:5px 0 5px 0;}
.punch1{background:#FFF url(__IMG__/btn2.png) no-repeat;background-size:100%;width:70%;margin:3px 0 0 0;border:3px #466C9B solid;}
button.punch {
			background: #C0C0C0;
			border-top: 1px solid #99CCFF;
			border-right: 1px solid #99CCFF;
			border-bottom: 1px solid #99CCFF;
			border-left: 1px solid #99CCFF;
			-webkit-box-shadow: inset 0 1px 10px 1px #C0C0C0, 0 1px 0 #1d2c4d, 0 6px 0 #1f3053, 0 8px 4px 1px #111111;
			box-shadow: inset 0 1px 10px 1px #C0C0C0, 0 1px 0 #1d2c4d, 0 6px 0 #1f3053, 0 8px 4px 1px #111111;
			color: #000;
			font: 14px/1 "helvetica neue", helvetica, arial, sans-serif;
			margin-bottom: 10px;
			padding: 10px 0 12px 0;
			text-align: center;
			text-shadow: 0 -1px 1px #1e2d4d;
			width: 80px;
			height:35px;
			-webkit-background-clip: padding-box; 
			margin-top: 10px; }
			button.punch:hover {
			-webkit-box-shadow: inset 0 0 20px 1px #87adff, 0 1px 0 #1d2c4d, 0 6px 0 #1f3053, 0 8px 4px 1px #111111;
			box-shadow: inset 0 0 20px 1px #87adff, 0 1px 0 #1d2c4d, 0 6px 0 #1f3053, 0 8px 4px 1px #111111;
			cursor: pointer; 
			margin-top: 10px; }
			button.punch:active {
			-webkit-box-shadow: inset 0 1px 10px 1px #5c8bee, 0 1px 0 #1d2c4d, 0 2px 0 #1f3053, 0 4px 3px 0 #111111;
			box-shadow: inset 0 1px 10px 1px #5c8bee, 0 1px 0 #1d2c4d, 0 2px 0 #1f3053, 0 4px 3px 0 #111111;
			margin-top: 10px; }
</style>
</head> 
<body> 
	<div class="container" style="height:100%;"> 
	<!-- 标题START -->
	<div class="center1" >
		<h3>未 来 门 资 本</h3>
		<h4>GATEWAY FUTURE CAPITAL</h4>
		<h3>微 股 权 交 易 中 心</h3>user_name
		<h4>THE EQUITY TRADING CENTER</h4>
	</div>
	<!-- 标题END -->
	<!-- 表单START -->
	<div class="center2">
	<form action="<?php echo U('User/do_login');?>" method="post">
		<div class="formdiv">
		<div style="padding-top:30%;">
			<input type="text" class="input" name="user_name" style="height:25px;border:2px #000 solid;font-size:10px;color:#000;padding:2px;" placeholder="注册手机号"/>
		</div>
		<div style="padding-top:4px;">
			<input type="password" name="user_pwd" class="input" style="height:25px;border:2px #000 solid;font-size:10px;color:#000;padding:2px;" placeholder="密码"/>
		</div>
		<div style="text-align:center;">
			<a href="" style="margin:10px 4px 10px 4px;"><font class="fontclass">忘记密码</font></a>
			<a href="" style="margin:10px 4px 10px 4px;"><font class="fontclass">修改密码</font></a>
		</div>
			<div style="left:50%;margin-left:10%;"><button class="punch1" type="submit" style="width:90%;">登录</button></div>
			
		</div>
		
		
		<div class="formdiv" style="padding-top:30%;">
			<div style="left:50%;margin-left:30%;"><a class="punch1" style="padding-left:20px;padding-right:20px;background-size:auto;" href="<?php echo U('User/register');?>">注册</a></div>
			<div style="margin-left:10%;"><font class="fontclass" style="font-size:12px;">若您还没有账号，请点此注册。</font></div>
		</div>

	</form>
	</div>
	<div class="center3"><font class="fontclass2">温馨提示：联系电话是您密码找回的凭证。</font></div>
	<!-- 表单END -->
	</div> 
</body> 
</html>
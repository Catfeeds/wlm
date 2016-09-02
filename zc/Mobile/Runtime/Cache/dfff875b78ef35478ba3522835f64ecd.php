<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html> 
<html lang="zh-cn"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="__CSS__/pintuer.css">
<link rel="stylesheet" href="__CSS__/buttons.css">
<script type="text/javascript" src="__JS__/jquery-1.7.min.js"></script>
<script src="__JS__/pintuer.js"></script>
<script type="text/javascript" src="__JS__/wlmjy.js"></script>
<style>
body{background:#FFF url(__IMG__/bgp.png) no-repeat;background-size: cover; -moz-background-size: cover; }
.center1 {top: 50%;left: 50%;padding-top:10%;text-align:center;}
.center2 {top: 50%;left: 50%;margin-left:20%;margin-top:10%;}
.center3 {top: 50%;left: 50%;margin-left:20%;}
.fontclass{font-size:14px;font-weight:bold;font-family:方正兰亭超细黑简体, 'Arial Narrow';}
.fontclass2{font-size:10px;font-weight:bold;font-family:方正兰亭超细黑简体, 'Arial Narrow';}
.formdiv{width:80%;padding:5px 0 5px 0;}
.punch1{background:#f5f5f5 no-repeat;width:70%;margin:3px 0 0 0;border:3px #466C9B solid;}
.punch2{background-color:#FFF;width:70%;margin:3px 0 0 0;border:3px #466C9B solid;}
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
			.punch1:active {
			box-shadow: inset 0 0 0 1px #87adff, 0 1px 0 #1d2c4d, 0 6px 0 #1f3053, 0 8px 4px 1px #111111;
			cursor: pointer; 
			margin-top: 3px; }
			.punch1:visited{
			box-shadow: inset 0 0 0 1px #87adff, 0 1px 0 #1d2c4d, 0 6px 0 #1f3053, 0 8px 4px 1px #111111;
			margin-top: 3px; 
			}
			.punch2:active {
			box-shadow: inset 0 0 0 1px #87adff, 0 1px 0 #1d2c4d, 0 6px 0 #1f3053, 0 8px 4px 1px #111111;
			cursor: pointer; 
			margin-top: 3px; }
			.punch3{
			background:#f5f5f5 no-repeat;width:70%;margin:3px 0 0 0;border:3px #466C9B solid;
			box-shadow: inset 0 0 0 1px #87adff, 0 1px 0 #1d2c4d, 0 6px 0 #1f3053, 0 8px 4px 1px #111111;
			margin-top: 3px; 
			}
			button.punch:active {
			-webkit-box-shadow: inset 0 1px 10px 1px #5c8bee, 0 1px 0 #1d2c4d, 0 2px 0 #1f3053, 0 4px 3px 0 #111111;
			box-shadow: inset 0 1px 10px 1px #5c8bee, 0 1px 0 #1d2c4d, 0 2px 0 #1f3053, 0 4px 3px 0 #111111;
			margin-top: 10px; }
</style>
<script type="text/javascript">
        function ChangeClass1() {
            var a = document.getElementById("btn1");
            a.setAttribute("style", "box-shadow: inset 0 0 0 1px hsla(0,0%,0%,.2),inset 0 2px 0 hsla(0,0%,100%,.1),inset 0 1.2em 0 hsla(0,0%,100%,.1),inset 0 0 0 3em hsla(0,0%,100%,.2),inset 0 .25em .5em hsla(0,0%,0%,.05),0 -1px 1px hsla(0,0%,0%,.1),0 1px 1px hsla(0,0%,100%,.25);margin-bottom:3px;color:#ff9966;");
        }                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
		function ChangeClass2() {                                                                                                                                                                                                                                                                                                                                                                                                                            
            var a = document.getElementById("btn2");                                                                                                                                                                                                                                                                                                                                                                                             
            a.setAttribute("style", "box-shadow: inset 0 0 0 1px hsla(0,0%,0%,.2),inset 0 2px 0 hsla(0,0%,100%,.1),inset 0 1.2em 0 hsla(0,0%,100%,.1),inset 0 0 0 3em hsla(0,0%,100%,.2),inset 0 .25em .5em hsla(0,0%,0%,.05),0 -1px 1px hsla(0,0%,0%,.1),0 1px 1px hsla(0,0%,100%,.25);margin-bottom:3px;color:#ff9966;");
        }                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
		function ChangeClass3() {                                                                                                                                                                                                                                                                                                                                                                                                                            
            var a = document.getElementById("btn3");                                                                                                                                                                                                                                                                                                                                                                                             
            a.setAttribute("style", "box-shadow: inset 0 0 0 1px hsla(0,0%,0%,.2),inset 0 2px 0 hsla(0,0%,100%,.1),inset 0 1.2em 0 hsla(0,0%,100%,.1),inset 0 0 0 3em hsla(0,0%,100%,.2),inset 0 .25em .5em hsla(0,0%,0%,.05),0 -1px 1px hsla(0,0%,0%,.1),0 1px 1px hsla(0,0%,100%,.25);margin-bottom:3px;color:#ff9966;");
        }
</script>		
</head> 
<body> 
	<div class="container" style="height:100%;"> 
	<!-- 标题START -->
	<div class="center1" >
		<h3>未 来 门 资 本</h3>
		<h4>GATEWAY FUTURE CAPITAL</h4>
		<h3>微 股 权 交 易 中 心</h3>
		<h4>THE EQUITY TRADING CENTER</h4>
	</div>
	<!-- 标题END -->
	<!-- 表单START -->
	<div class="center2">
	<form action="<?php echo U('User/doRegister');?>" method="post">
		<div class="formdiv">
			<font class="fontclass">您的名字</font>
			<input type="text" name="ex_real_name" class="input" style="border:2px #000 solid;width:90%;"/>
		</div>
		<div class="formdiv">
			<font class="fontclass">您的密码</font>
			<input type="text" name="user_pwd" class="input" style="border:2px #000 solid;width:90%;"/>
		</div>
		<div class="formdiv">
			<font class="fontclass">您的身份</font>
			<div style="left:50%;margin-left:20%;margin-bottom:7px;" onclick="$('#type').val(1)">
			<!-- <a id="btn1" class="punch1" style="background-color:#ccc;padding-left:48px;padding-right:48px;" onclick="ChangeClass1() ">融资方</a> -->
			<a id="btn1" class="button small square blue" href="javascript:void(0);" style="margin-bottom:3px;"  onclick="ChangeClass1() ">&nbsp;&nbsp;融资方&nbsp;&nbsp;</a>
			</div>
			<div style="left:50%;margin-left:20%;margin-bottom:7px;" onclick="$('#type').val(2)">
			<!-- <a id="btn2" class="punch2" style="padding-left:40px;padding-right:40px;" onclick="ChangeClass2() ">个人投资</a> -->
			<a id="btn2" class="button small square blue" href="javascript:void(0);" style="margin-bottom:3px;"  onclick="ChangeClass2() ">个人投资</a>
			</div>
			<div style="left:50%;margin-left:20%;margin-bottom:7px;" onclick="$('#type').val(3)">
			<!-- <a id="btn3" class="punch2" style="padding-left:40px;padding-right:40px;" onclick="ChangeClass3() ">企业投资</a> -->
			<a id="btn3" class="button small square blue" href="javascript:void(0);" style="margin-bottom:3px;"  onclick="ChangeClass3() ">企业投资</a>
			</div>
			<input type="hidden" name="type" id="type" value=""/>
		</div>
		<div class="formdiv">
			<font class="fontclass">您的手机</font>
			<input type="text" id="user_name" name="user_name" class="input" style="border:2px #000 solid;width:90%;"/>
			<div style="text-align:right; margin-top:7px;margin-bottom:7px">
			<!-- <a class="punch1" onclick="sendCode()" href="javascript:void(0)" id="button_code" style="width:50%;height:25px;margin-bottom:5px; padding-left:40px; padding-right:40px; ">发送验证码</a> -->
			<a class="button small square blue" href="javascript:void(0);" style="margin-right:2em;margin-bottom:0;">发送验证码</a>
			</div>
			<div style="text-align:right;">
			<input type="text" class="input" name="code" style="width:80px;border:2px #000 solid;display:inline;margin-right:1.7em;"/>
			</div>
		</div>
		<div class="formdiv">
			<div style="left:50%;margin-left:25%;">
			<!-- <button class="punch1" type="submit" style="width:50%;">提交</button> -->
			<a class="button small square blue" href="javascript:void(0);" >&nbsp;提交</a>
			</div>
		</div>
		<input type="hidden" value="<?php echo U('User/sendCode');?>" id="codeURL" />
	</form>
	</div>
	<div class="center3"><font class="fontclass2">温馨提示：联系电话是您密码找回的凭证。</font></div>
	<!-- 表单END -->
	</div> 
</body> 
</html>
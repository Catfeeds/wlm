<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html> 
<html lang="zh-cn"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/pintuer.css">
<script src="__JS__/pintuer.js"></script>
<script language="javascript" type="text/javascript"> 
var i = 5; 
var intervalid; 
intervalid = setInterval("fun()", 1000); 
function fun() { 
if (i == 0) { 
window.location.href = "<?php echo U('Index/index');?>"; 
clearInterval(intervalid); 
} 
document.getElementById("mes").innerHTML = i; 
i--; 
} 
</script> 
<style>
body{background:#FFF url(__IMG__/bgp.png) no-repeat;background-size: cover; -moz-background-size: cover; }
.center1 {top: 50%;left: 50%;padding-top:10%;text-align:center;}
.center2 {top: 50%;margin-top:40%;}
.fontclass{font-size:12px;font-weight:bold;font-family:方正兰亭超细黑简体, 'Arial Narrow';}
.fontclass2{font-size:12px;font-weight:bold;font-family:方正兰亭超细黑简体, 'Arial Narrow';TEXT-DECORATION: underline;color:#00f;}
.formdiv{width:100%;padding:5px 0 5px 0;}
</style>
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
	
		<div class="formdiv">
	
		<div style="text-align:center;">
			<div><font class="fontclass">恭喜您登陆成功！点击<a href=""><font class="fontclass2">个人中心</font></a>可进入操作界面</font></div>
			<div><font class="fontclass">将在 <span id="mes">5</span> 秒钟后返回首页！</font> </div>
			<div style="margin-top:40%;"><font class="fontclass">若此页面未能跳转，请点此<a href=""><font class="fontclass2">个人中心</font></a></font></div>
			<div style="margin-top:40%;"><font class="fontclass" style="font-size:10px;">温馨提示：联系电话是您密码找回的凭证。</font></div>
		</div>
			
		</div>
		
	</div>
	<!-- 表单END -->
	</div> 
</body> 
</html>
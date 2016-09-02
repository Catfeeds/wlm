<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>温馨提示</title>
<style type="text/css">
*{	margin:0;	padding:0;	}
body{	background:#f1f1f1 no-repeat 0 0;}
.box{	width:80%;	margin:0 auto;	border:1px solid #cdcdcd;	margin-top:35px;}
.box h3{	padding:10px 20px;	color:#636363;	font-size:12px;	border-bottom:1px solid #cdcdcd;	font-weight:normal;}
.box .txt{	padding:50px 0;	text-align:center;	background:#fff;}
.box .txt p{	font-size:36px;	color:#417eb7;	font-family:'宋体';	margin-bottom:20px;}
.box .txt a{	color:#fff;	background:#84bff6 no-repeat 0 0;	padding:5px 10px;	text-decoration:none;	font-size:12px;	border:1px solid #72ade4;	display:inline-block;}
.box .txt a:hover{	text-decoration:underline;}
.power{	width:80%;	margin:0 auto;	margin-top:20px;	text-align:center;	border-top:1px solid #cdcdcd;	font-size:12px;	color:#636363;	padding:10px 0;}
</style>
</head>

<body>
<div class="box">
	<h3>※&nbsp;|&nbsp温馨提示</h3>
    <div class="txt">
    	<p><?php echo($message); echo($error); ?></p>
        <a id="href" href="<?php echo($jumpUrl); ?>">如果您的浏览器没有自动跳转，请点击这里!<b id="wait" style="display:none;"><?php echo($waitSecond); ?></b></a>
    </div>
</div>
<div class="power">
    Powered by maxwei 版权所有 © 2013-2014 maxwei，并保留所有权利。
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),
href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>
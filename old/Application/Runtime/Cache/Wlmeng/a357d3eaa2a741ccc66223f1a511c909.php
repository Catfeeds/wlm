<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>未来门新首页</title>
<link href="/old/Public/Index/css/ui.css" rel="stylesheet" type="text/css">
<link href="/old/Public/Index/css/slides.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="header">
<div class="logo_menu">
    	<div class="logo"><a href="<?php echo U('Wlmeng/Index/index');?>">
		<img src="/old/Public/Index/images/logo2.png" height="91" width="210"></a></div>
        <!-- <div class="stock"><p>IAT:ASX <font id="finance_info_x">0.02</font> (<font id="finance_info_y">0.00</font>)</p></div> -->
		<!-- <script src="js/ga.js" async="" type="text/javascript"></script><script>
		function finance_info() {
			$.ajax({
				url: "/index.php/gu",
				dataType: "json",
				type: "POST",
				success: function(s) {
					if (typeof s.data.x != 'undefined')
					{
						$("#finance_info_x").html(s.data.x);
						$("#finance_info_y").html(s.data.y);
					}
				}
			});
			setTimeout(function() {
				finance_info();
			}, 30000);
			//设置30秒读取一次.. 读取频繁,会被k的.. 同步修改index.php/gu 
		};
		setTimeout(function() {
			finance_info();
		}, 1000);

		</script> -->
        <div class="menu">
        	<ul>
				<li>
					<a href="" class="s1">首页</a><span>|</span>
				</li>
               <li><a href="" class="s2">关于我们</a><span>|</span>
                </li>
                <li><a href="" class="s3">公司业务</a><span>|</span>
                </li>
             <li><a href="" class="s4">集团项目</a><span>|</span>	
                </li>
               <li><a href="" class="s5">微股权交易</a><span>|</span>
                </li>
            	<li><a href="" class="s7">联系我们</a></li>
            </ul>
        </div>
    
    </div>

</div>

<div class="main_ad">
	<div class="banner">
    <img src="/old/Public/Index/images/index_banner.jpg" height="393" width="974"/>
	<!--<div id="slides">
          <div class="slides_container">
                <div class="slide"></div>
             </div>
       </div>-->
</div>

<div class="footer">
	<div class="footer_line">
    	<ul>
        	<li><a href="">首页</a><span>|</span></li>
            <li><a href="">使用条款</a><span>|</span></li>
            <li><a href="">网站地图</a></li>
        </ul>
    </div>
    <div class="copyright">Copyright © 2013 未来门  All rights reserved <span>|</span>Powered by <a href="" target="_blank">aBridge</a></div>
</div>
 <!-- <div class="announcement">本网站假设IAT成功收购和润集团。</div> -->

<script src="/old/Public/Index/js/jquery.js" language="javascript"></script>
<script src="/old/Public/Index/js/common.js" language="javascript"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35089061-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script src="/old/Public/Index/js/slides.js" language="javascript"></script>
<script src="/old/Public/Index/js/jc.js" language="javascript"></script>
<script>
$('.news_con').find('li:last').css({'border':'none'});
/*$('#slides').slides({
	effect: 'fade, fade',
	fadeSpeed: 600
	
});*/

$(".index_conmany").jCarouselLite({
	speed:500,
	auto:3000,
	start: 0,
	visible:1,
	circular: true,
	mouseWheel :true
});


</script>

 </body></html>
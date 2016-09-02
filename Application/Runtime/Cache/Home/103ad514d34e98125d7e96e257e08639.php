<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut  icon" type="image/x-icon" href="/Public/Home/images/logo3.ico" media="screen"  />
    <title>未来门投资管理有限公司-投资管理咨询 WLM</title>
    <meta name="keywords" content="未来门,未来门投资,投资管理,资本运作,金融大数据分析">
    <meta name="description" content="未未来门资本2013年在北京成立，是致力于中国三四线城市、专注优质中小微企业孵化的投行机构。2014年6月，先后在河北省秦皇岛市、内蒙古自治区通辽市设立了分公司。新常态下的中国经济正从量的增长转向质的增长，中小微企业在转型升级的进程中，面临资金“融不到、用不起”的困境。未来门资本秉承创新、协调、绿色、开放、共享的发展理念，将一线城市成熟的资本管理经验与三四线城市中小微企业的资金需求无缝对接，为民间资本进入实体经济特别是中小微企业，探索出一条可靠、高效、便捷的新路径。">
    <link href="/Public/Home/css/ui.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/Home/css/slides.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
  <div class="top">
    <div class="j-row w1080">
      <div class="nav1">欢迎来到未来门资本官网</div>
    </div>
  </div>
  <div class="header" > 
    <div class="logo_menu">
    	<div class="logo"><a href="<?php echo U('Index/index');?>">
		    <img src="/Public/Home/images/logo2.png" height="91" width="210"></a>
      </div>
      <div class="nav">
        <ul>
          <li class="havsub"> <a class="navtt" href="/" title="">首页</a></li>
          <li class="havsub"><a class="navtt" href="<?php echo U('Article/show',array('type'=>4));?>">走进未来门</a></li>
          <!-- <li class="havsub"><a target= "_blank" class="navtt" href="http://www.zhifengbao.com/">成功案例</a></li> -->
          <li class="havsub"><a target= "_blank" class="navtt" href="http://www.sansixianchou.com/">股权投资</a></li>
          <li class="havsub"><a class="navtt" href="<?php echo U('Article/show',array('type'=>5));?>">投后服务</a></li>
          <li class="havsub"><a class="navtt" href="<?php echo U('Zhaopin/zhaopin');?>">招贤纳士</a></li>
          <li class="havsub"><a class="navtt" href="<?php echo U('Article/show',array('type'=>3));?>">联系我们</a></li>
        </ul>
      </div>
    </div>
  </div>

<div class="main_ad">
	<div>
    	<img style="width:100%;height:550px;" src="/Public/Home/images/02.jpg"/> 
  	</div>
</div>
<!-- 集团新闻+集团概述START -->
<div class="content" style="border-bottom; height:600px;">
		<!-- 集团新闻START -->
    	<div class="news_column">
        	<div class="news_title">
            	<h2 style="padding-top:10px;">
					<font style="font-size:16px;color:#006699;">集团新闻</font>
				</h2>
            </div>
            <!-- <div class="green-black"><<?php echo ($page); ?>> -->
	            <div class="news_con" style="width:940px;padding:0 0 20px 0;">
	            	<ul>
		        	    <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><p><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a></p><span><?php echo ($vo["create_time"]); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>		
						</ul>
	            </div>
            <div/>
		</div>
	</div>	<!-- 集团新闻END -->
		
   <div class="clear"></div>
</div>
 
    <!-- 集团新闻+集团概述END -->
<div class="footer ">
  <div class="j-row w1080 ">
    <div class="copyright">
        <div class="footnav"><a href="<?php echo U('Article/show',array('type'=>4));?>">关于我们</a> |　<a href="<?php echo U('Zhaopin/zhaopin');?>">加入我们</a>　｜　<a href="">法律声明</a>　｜　<a href="<?php echo U('Article/show',array('type'=>3));?>">联系我们</a></div>
        <p>地址:河北省秦皇岛市海港区海阳路108号</p>
        <p>版权所有 2016-2018  未来门资本投资管理有限公司   京ICP备15043006号</p>
    </div>
  </div>
</div>


<script src="/Public/Home/js/jquery.js" language="javascript"></script>
<script src="/Public/Home/js/common.js" language="javascript"></script>
<!-- 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35089061-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> -->

<script src="js/slides.js" language="javascript"></script>
<script src="js/jc.js" language="javascript"></script>
<!-- <script>
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


</script> -->

 </body></html>
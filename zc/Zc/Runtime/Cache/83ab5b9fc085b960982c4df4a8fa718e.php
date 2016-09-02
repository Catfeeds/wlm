<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0024)http://z.jd.com/new.html -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="description" content=""/>
<meta name="Keywords" content=""/>
<title>未来门精英</title>

<link rel="stylesheet" href="__PUBLIC__/css/pintuer.css"/>
<link href="__PUBLIC__/css/lanrenzhijia.css" type="text/css" rel="stylesheet" />
<link href="__PUBLIC__/css/tc-style.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/lanrenzhijia.js"></script>
<!-- <script src="js/jquery.js"></script> -->
<script src="__PUBLIC__/js/pintuer.js"></script>

<style>
.selectNumberScreen{ width:100%; height:140px; margin-top:400px;}
.screenBox dl {border-bottom: #006600 1px dashed; width: 768px; overflow: hidden}
.screenBox dl.noborder {border-bottom: 0px; border-left: 0px; border-top: 0px; border-right: 0px}
.screenBox dl.goodstype {border-bottom: #e6e6e6 1px dashed}
.screenBox dl dt {float: left; height: 30px}
.screenBox dl dt {text-align: right; width: 100px; height: 22px; font-weight: 600; padding-top: 8px}
.screenBox dl dd {position: relative; padding-bottom: 5px; padding-left: 0px; width: 620px; padding-right: 48px; float: left; height: 25px; overflow: hidden; padding-top: 0px}
.screenBox dl dd a {line-height: 14px; margin: 9px 25px 0px 0px; display: inline-block; color: #36c; overflow: hidden; text-decoration: none}
.screenBox dl dd a:hover {background: #39c; color: #fff}
.screenBox dl dd a.selected {background: #39c; color: #fff}
.screenBox dl dd span.more {position: absolute; width: 39px; display: block; height: 14px; top: 6px; cursor: pointer; right: 1px}
.screenBox dl dd span.more label {display: inline-block; cursor: pointer}
.hasBeenSelected {border: #b2d1ff 1px solid;padding:2px;width: 784px; margin-top: 10px; overflow: hidden;}
.hasBeenSelected dl {width: 784px; background: #f6f8fd; overflow: hidden}
.hasBeenSelected dl dt {float: left}
.hasBeenSelected dl dd {float: left}
.hasBeenSelected dl dt {text-align: right; line-height: 30px; width: 108px; height: 30px; font-weight: 600}
.hasBeenSelected dl dd {padding-bottom: 4px; padding-left: 0px; width: 676px; padding-right: 0px; padding-top: 0px}
.selectedInfor {border-bottom: #f60 1px solid; position: relative; border-left: #f60 1px solid; padding-bottom: 1px; margin: 4px 10px 0px 0px; padding-left: 5px; padding-right: 17px; display: block; white-space: nowrap; background: #fff; float: left; height: 17px; border-top: #f60 1px solid; border-right: #f60 1px solid; padding-top: 1px}
.selectedInfor label {color: #f60}
.eliminateCriteria {line-height: 21px; margin-top: 4px; width: 80px; float: left; color: #f60; cursor: pointer; font-weight: 600}
.selectedInfor em {background: url("__PUBLIC__//images/close.gif") no-repeat;cursor: pointer;display: block;height: 13px;overflow: hidden;position: absolute;right: 2px;top: 3px;width: 13px;}
.ddclass a{font-size:14px;}
#show_time {
	color: #f00;
	font-size: 12px;
	font-weight: bold;
	width:100%;
	padding-top	:30px;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
	$(".btn").show();
	$(".btn  a:first").addClass("active");	
	$().gallery({
		current: [".show_images_1",".show_images_1_img"],
		left: [".show_images_2",".show_images_2_img"],
		right: [".show_images_3",".show_images_3_img"],
	none: [".show_images_4",".show_images_4_img"],
		duration: 500,
		start: function() {
			$(".header_text").fadeOut(150);
		},
		end: function() {
			$(".header_text").fadeIn(150);
		},
		autoChange : true,
		changeTimeout: 3000,
		stopTarget : ".header_stage"
	});
});
</script>
<script type="text/javascript"> 
function countdown(){
    var show_time = document.getElementById("show_time");
    endtime = new Date("12/31/2020 23:59:59");//结束时间
    today = new Date();//当前时间
    delta_T = endtime.getTime() - today.getTime();//时间间隔
    if(delta_T < 0){
        clearInterval(auto);
        show_time.innerHTML = "倒计时已经结束";
    }
    window.setTimeout(countdown,1000);
    total_days = delta_T/(24*60*60*1000);//总天数
    total_show = Math.floor(total_days);//实际显示的天数
    total_hours = (total_days - total_show)*24;//剩余小时
    hours_show = Math.floor(total_hours);//实际显示的小时数
    total_minutes = (total_hours - hours_show)*60;//剩余的分钟数
    minutes_show = Math.floor(total_minutes);//实际显示的分钟数
    total_seconds = (total_minutes - minutes_show)*60;//剩余的分钟数
    seconds_show = Math.floor(total_seconds);//实际显示的秒数
    show_time.innerHTML = "<font style='color:#000;'>倒计时:</font>" + total_show + "天" + hours_show + "时" + minutes_show + "分" + seconds_show + "秒";
}
countdown();
</script>
</head>
<body>
<!--header-->
<link rel="stylesheet" href="__PUBLIC__/css/pintuer.css"/>

<!-- <script type="text/javascript" src="./js/jquery.min.js"></script> -->



	<!-- header start -->
	<!-- 顶部start -->	
		
		 <div class="layout" id="header" style="color:#fff;background-color:#314751;">
        <div class="container">
            <div class="line">
                <div class="xb5 margin-bottom">
                    <div id="title" style="margin:10px 0 0 0;">
						<a href="<?php echo U('Index/index');?>"><img src="__PUBLIC__/images/logo1.png" style="width:150px;height:65px;"/></a>
                    </div>
                    <!-- <div id="subtitle">简单、实用、精悍，专注于中小站点后台管理系统</div> -->
                </div>
                <div class="xb7" >
                    <ul class="nav nav-menu nav-inline nav-right padding-large-top fixed spy" data-offset-spy="90">
                        <li  class="active">
								<a style="color:#fff;" href="#header">注册</a></li>
                        <li ><a style="color:#fff;" href="#log">登录</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
	<!-- 顶部end -->
     <!--导航-->
		<div class="demo-nav fixed bg-main bg-inverse margin-bottom" style="padding:0;margin:0; background-color:#e9e9e9">
			<div class="container padding-top padding-bottom">
			  <div class="line">
				<div class=" xl12 xs10 xm10 xb11 padding-top nav-navicon" id="header-demo4">
				  <div class="xs8 xm9 xb6">
				  <ul class="nav nav-menu nav-inline nav-pills">
					<li><a href="" style="color:#000;">首页</a></li>
					<li><a href="" style="color:#000;">项目推荐</a></li>
				  </ul>
				  </div>

				  <div class="xs4 xm3 xb3" style="float:right;">
					<form action="search_article.asp" name="Form1" method="get">
					  <div class="input-group padding-little-top">
						<input name="keyword" id="searchKey" class="input" size="30" placeholder="关键词" type="text">
						<select name="types" class="hidden">
					  <option selected="selected" value="1">按标题</option>
					  <option value="2">按内容</option>
					</select>
						<span class="addbtn"><button type="submit" class="button bg">搜!</button></span>
					  </div>
					</form>
				  </div>
				</div>
			  </div>
			</div>
		</div>
    <!--header end-->
	
	<!-- 3D切换START -->
		<div id="wrapper" style="margin-top:20px;">
			<ul class="lanrenzhijia">
				<li class="lanrenzhijia_li show_images_1">
					<a href="" target="_blank"><img class="show_images_1_img" src="__PUBLIC__/images/1.jpg" alt="" /></a></li>
				<li class="lanrenzhijia_li show_images_2">                                                                                                             
					<a href="" target="_blank"><img class="show_images_2_img" src="__PUBLIC__/images/4.jpg" alt="" /></a></li>
				<li class="lanrenzhijia_li show_images_3">                                                                                                             
					<a href="" target="_blank"><img class="show_images_3_img" src="__PUBLIC__/images/2.jpg" alt="" /></a></li>
				<li class="lanrenzhijia_li show_images_4">                                                                                                             
					<a href="" target="_blank"><img class="show_images_4_img" src="__PUBLIC__/images/3.jpg" alt="" /></a></li>
		  </ul>
			<div class="header_text" id="belt"></div>
			<!-- <div class="btn">
				<a class="btn1" rel="1"></a>
				<a class="btn2" rel="2"></a>
				<a class="btn3" rel="3"></a>
				<a class="btn4" rel="4"></a>
			</div> -->
		</div>
	<!-- 3D切换END -->
	
	<!-- 列表选择START -->
	
	<div class="selectNumberScreen">

	<div id="selectList" class="screenBox screenBackground bg" style="padding-top:10px;padding-left:9%;padding-right:9%">
		<dl class="listIndex bg" style="width:1000px;">
		  <dt>项目分类：&nbsp;&nbsp;&nbsp;&nbsp;</dt>
		  <dd class="ddclass" style="width:900px;">
		  <a href="javascript:void(0)" style="color:#f00;font-weight:bold;">全部</a> 
		  <?php echo ($cates); ?>
		  <span class=more><label>更多</label><em class=open></em></span> </dd>
		</dl>
		<dl class="listIndex bg" style="width:1000px;">
		  <dt>价格范围：&nbsp;&nbsp;&nbsp;&nbsp;</dt>
		  <dd  class="ddclass">
		  <a href="javascript:void(0)" style="color:#f00;font-weight:bold;">全部</a> 
		  <a href="javascript:void(0)" >众筹中</a>
		  <a href="javascript:void(0)" style="padding-left:15px;">已结束</a>
		</dl>
		<dl class=" listIndex bg" style="width:1000px;">
		  <dt>操作系统：&nbsp;&nbsp;&nbsp;&nbsp;</dt>
		  <dd  class="ddclass">
		  <a href="javascript:void(0)" style="color:#f00;font-weight:bold;">全部</a> 
		  <a href="javascript:void(0)">上线时间</a> 
		  <a href="javascript:void(0)">众筹金额</a>
		  <a href="javascript:void(0)">关注</a></dd>
		</dl>
	</div>

	
</div>
	<!-- 列表选择END -->
	
	<!-- 项目列表START -->
		<!-- 11 -->
        <div class="task" style="width:95%;padding-left:15%;">
                    <div id="task_list" class="tasklist">
                <ul>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i %2 == 0): ?><li class="task-app1" >
                        <div class="taskmore">
                            <div class="left app" style="width:45%;">
                                                            <a href="<?php echo U('Deal/show',array('id'=>$vo['id']));?>">
                                      <img style="" src="<?php echo ($vo["image"]); ?>" width="220px" height="88px;">
                                </a>
                                <p style="width:220px;"><?php echo ($vo["name"]); ?></p>
                            </div>
                            <div class="right" style="width:45%;">
                                <p class="name">
								<a href="<?php echo U('Deal/show',array('id'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a>
                                </p>
                                <p class="time">截止<?php echo ($vo["end_time"]); ?></p>
								<div id="show_time"> </div>
                                <hr class="fenge">
                                <!-- <p class="come">已有<span> 87 </span>人参与</p> -->
								<div>
									<table>
										<tr>
											<td style="width:31%;padding:0 2px 1px 2px"><div>上线时间</div><div>2015.08.24</div></td>
											<td style="width:31%;padding:0 2px 1px 2px"><div>单笔投资</div><div>￥1.4万</div></td>
											<td style="width:31%;padding:0 2px 1px 2px"><div>融资金融</div><div>￥77万</div></td>
										</tr>
									</table>
								</div>
                                <span class="moreinfo">
                                <!-- <a href="">详情</a> -->
                                </span>
                            </div>
                        </div>
                    </li>
                    <?php else: ?>
                    <li class="task-app2" >
                        <div class="taskmore">
                            <div class="left app" style="width:45%;">
                                                            <a href="<?php echo U('Deal/show',array('id'=>$vo['id']));?>">
                                      <img style="" src="<?php echo ($vo["image"]); ?>" width="220px" height="88px;">
                                </a>
                                <p style="width:220px;"><?php echo ($vo["name"]); ?></p>
                            </div>
                            <div class="right" style="width:45%;">
                                <p class="name">
								<a href="<?php echo U('Deal/show',array('id'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a>
                                </p>
                                <p class="time">截止<?php echo ($vo["end_time"]); ?></p>
								<div id="show_time"> </div>
                                <hr class="fenge">
                                <!-- <p class="come">已有<span> 87 </span>人参与</p> -->
								<div>
									<table>
										<tr>
											<td style="width:31%;padding:0 2px 1px 2px"><div>上线时间</div><div>2015.08.24</div></td>
											<td style="width:31%;padding:0 2px 1px 2px"><div>单笔投资</div><div>￥1.4万</div></td>
											<td style="width:31%;padding:0 2px 1px 2px"><div>融资金融</div><div>￥77万</div></td>
										</tr>
									</table>
								</div>
                                <span class="moreinfo">
                                <!-- <a href="">详情</a> -->
                                </span>
                            </div>
                        </div>
                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            
        </div>
		<!-- 22 -->
	<!-- 项目列表END -->
	<div class="pages" style="display:block"><?php echo ($page); ?></div>

</body>
</html>
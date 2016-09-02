<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=1.0; " />
<title>最新资讯</title>
<style>
#vedio p img{ max-width:90%}
</style>
<link rel="stylesheet" href="__CSS__/pintuer.css" />
<link rel="stylesheet" href="__CSS__/wlmjy.css" />
<link rel="stylesheet" type="text/css" href="__CSS__/component.css" />
<script type="text/javascript" src="__JS__/jquery-1.7.min.js"></script>
<script type="text/javascript" src="__JS__/pintuer.js"></script>
<script type="text/javascript" src="__JS__/wlmjy.js"></script>
<script type="text/javascript" src="__JS__/ichart.1.2.js"></script>
<script src="__JS__/modernizr.custom.js"></script>
<script type="text/javascript" src="__JS__/idangerous.swiper-2.0.min.js"></script>
<script type="text/javascript" src="__LAYER__/layer.js"></script>
<script type="text/javascript">
$(function(){
	function setContentSize() {
		$('.swiper-content').css({
			height: $(window).height()-$('.swiper-nav').height()
		})
	}
	//Nav
	var navSwiper = $('.swiper-nav').swiper({
		visibilityFullFit: true,
		slidesPerView:'auto',
		//Thumbnails Clicks
	})

	$("#second").click(function(){
  		$("#first").attr("class","button");
		$("#second").attr("class","button active");
		$("#thread").attr("class","button");
		$(".content").attr("class","detail content hidden");
		$(".vedio").attr("class","detail vedio show");
		$(".budget").attr("class","detail budget hidden");
	});
	
	$("#first").click(function(){
		$("#second").attr("class","button");
		$("#first").attr("class","button active");
		$("#thread").attr("class","button");
		$(".content").attr("class","detail content show");
		$(".vedio").attr("class","detail vedio hidden");
		$(".budget").attr("class","detail budget hidden");
	});
	$("#thread").click(function(){
		$("#first").attr("class","button");
		$("#second").attr("class","button");
		$("#thread").attr("class","button active");
		$(".content").attr("class","detail content hidden");
		$(".vedio").attr("class","detail vedio hidden");
		$(".budget").attr("class","detail budget show");
	});
	
})

</script>
		<script type="text/javascript">
			$(function(){
				var flow=<?php echo ($x); ?>;
				
				var data = [
				         	{
				         		name : 'PV',
				         		value:flow,
				         		color:'#0d8ecf',
				         		line_width:2
				         	}
				         ];
		         
				var labels = [];
				
				var line = new iChart.LineBasic2D({
					render : 'canvasDiv',
					data: data,
					align:'center',
					title : '',
					subtitle : '',
					footnote : '',
					width : 400,
					height : 200,
					sub_option:{
						smooth : true,//平滑曲线
						point_size:10
					},
					tip:{
						enable:true,
						shadow:true
					},
					legend : {
						enable : false
					},
					crosshair:{
						enable:true,
						line_color:'#62bce9'
					},
					coordinate:{
						width:600,
						valid_width:500,
						height:260,
						axis:{
							color:'#9f9f9f',
							width:[0,0,2,2]
						},
						grids:{
							vertical:{
								way:'share_alike',
						 		value:12
							}
						},
						scale:[{
							 position:'left',	
							 start_scale:0,
							 end_scale:100,
							 scale_space:10,
							 scale_size:2,
							 scale_color:'#9f9f9f'
						},{
							 position:'bottom',	
							 labels:labels
						}]
					}
				});
			//开始画图
			line.draw();
		});
				
			</script>
</head>
<body class="cbp-spmenu-push">
<script src="__JS__/classie.js"></script>
<script>
	var show_top = 0;
	var show_left = 0;
	function showLeftMenu(){
		if(show_top%2 == 0){
			var menuLeft = document.getElementById('menu_left'),
				bodys = document.body;
			classie.toggle( bodys, 'cbp-spmenu-push-toright' );
			classie.toggle( menuLeft, 'cbp-spmenu-open' );
			show_left ++;
		}
		else{
			showTopMenu();
			var menuLeft = document.getElementById('menu_left'),
			bodys = document.body;
			classie.toggle( bodys, 'cbp-spmenu-push-toright' );
			classie.toggle( menuLeft, 'cbp-spmenu-open' );
			show_left ++;
		}
		
	}
	
	function showTopMenu(){
		if(show_left%2 == 0){
			var menuTop = document.getElementById('menu_top');
			classie.toggle( menuTop, 'cbp-spmenu-open' );
			show_top ++;
		}
		else{
			showLeftMenu();
			var menuTop = document.getElementById('menu_top');
			classie.toggle( menuTop, 'cbp-spmenu-open' );
			show_top ++;	
		}
	}
</script>
<div class="toper fixed">
	<div class="line-small" style="height:40px; z-index:900; position:absolute; width:100%">
  		<div class="float-left top_s show_left" style="width:20%;" onclick="showLeftMenu()"><span class="icon-plus-square" id="showleft" style="">&nbsp;</span></div>
  		<div class="float-left top_s show_center" style="width:60%;"><span style="line-height:40px;"><a href="<?php echo U('Index/index');?>" style="color:#fff">未来门交易中心</a></span></div>
  		<div class="float-left top_s show_right" style="width:20%;"><span class="icon-navicon" style="line-height:40px;" id="show_top_icon" onclick="showTopMenu()">&nbsp;</span></div>
    </div>
	<div class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top " id="menu_top">
		<div class="swiper-container swiper-nav">
	<div class="swiper-wrapper">
		<div class="swiper-slide active-nav">
			<div class="txt-border radius-small border-main topmenu_item" onclick="window.location.href='<?php echo U('Deals/focus');?>'">
				<div class="txt radius-small bg-main" style="padding-left:16px;padding-right:16px;padding-top:10px;;line-height:27px;" >
					关注
				</div>
			</div>
		</div>
		<div class="swiper-slide active-nav">
			<div class="txt-border radius-small border-main topmenu_item" onclick="window.location.href='<?php echo U('Car/car');?>'">
				<div class="txt radius-small bg-main" style="padding-left:16px;padding-right:16px;padding-top:10px;;line-height:20px;">
					购物车
				</div>
			</div>
		</div>
		<div class="swiper-slide active-nav">
			<div class="txt-border radius-small border-main topmenu_item" onclick="window.location.href='<?php echo U('Trade/gucang');?>'">
				<div class="txt radius-small bg-main" style="padding-left:16px;padding-right:16px;padding-top:10px;;line-height:20px;">
					股仓
				</div>
			</div>
		</div>
		<div class="swiper-slide active-nav">
			<div class="txt-border radius-small border-main topmenu_item" onclick="window.location.href='<?php echo U('User/center');?>'">
				<div class="txt radius-small bg-main" style="padding-left:16px;padding-right:16px;padding-top:10px;;line-height:15px;">
					个人中心
				</div>
			</div>
		</div>
		<div class="swiper-slide active-nav">
			<div class="txt-border radius-small border-main topmenu_item">
				<div class="txt radius-small bg-main" style="padding-left:16px;padding-right:16px;padding-top:10px;;line-height:27px;">
					消息
				</div>
			</div>
		</div>
		<div class="swiper-slide active-nav">
			<div class="txt-border radius-small border-main topmenu_item">
				<div class="txt radius-small bg-main" style="padding-left:16px;padding-right:16px;padding-top:10px;;line-height:15px;">
					历史记录
				</div>
			</div>
		</div>
		
	</div>
</div>	
	<div class="login1" >
		<div class="login2">
			<?php if($_SESSION['uid'] != null): ?><a href="<?php echo U('User/login');?>"><div class="login" style="width:auto"><span class="icon-user login_icon" style="margin-right:10px"></span><?php echo ($_SESSION['uname']); ?></div></a>
			<?php else: ?>
				<a href="<?php echo U('User/login');?>"><div class="login"><span class="icon-user login_icon"></span>登陆</div></a>
				<a href="<?php echo U('User/register');?>"><div class="login"><span class="icon-users login_icon"></span>注册</div></a><?php endif; ?>
			
		</div>
	</div>
		
</div>
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left border border-main" id="menu_left">
    	<div style="text-align:right; color:#FFF; padding-right:20px; background:#314751" onclick="showLeftMenu()">
        	<span class="icon-chevron-left" ></span>
        </div>
		
		<div class="detail ">
			<ul class="list-text list-underline list-striped myinfo">
  				<li>
  					<form style="padding-top:8px;">
						<input type="text" class="input float-left" placeholder="搜索" style="width:70%" /><button class="button bg-main float-left">搜索</button>
					</form>
  				</li>
			</ul>
		</div>
		<div class="detail ment-left-all">
			<div class="line-big float-left ment-left-left" style="width:50px; height:100%; margin:0;">
					<?php if($_SESSION['wlm_mobile_type'] == 1): ?><div class="menu-left-left-item border-left"><h5 onclick="window.location.href='<?php echo U('Index/index');?>'"><strong>股权投资</strong></h5></div>
					<?php else: ?>
						<div class="menu-left-left-item"><h5 onclick="window.location.href='<?php echo U('Index/index');?>'"><strong>股权投资</strong></h5></div><?php endif; ?>
					
					<?php if($_SESSION['wlm_mobile_type'] == 2): ?><div class="menu-left-left-item border-left"><h5 onclick="window.location.href='<?php echo U('Index/rec');?>'"><strong>股权转让</strong></h5></div>
					<?php else: ?>
						<div class="menu-left-left-item "><h5 onclick="window.location.href='<?php echo U('Index/rec');?>'"><strong>股权转让</strong></h5></div><?php endif; ?>
					
					
					<div class="menu-left-left-item " onclick="window.location.href='<?php echo U('News/index');?>'"><h5><strong>项目追踪</strong></h5></div>
			</div>
			<div class="line-small leftmunt_item float-left" style="width:188px; height:100%; margin-left:20xp;  background-color:#fff;	">
				<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="txt radius-small <?php echo ($vo["class"]); ?> menu-left-right-item" style="width:60px;line-height:24px;" onclick="window.location.href='<?php echo ($vo["golist_url"]); ?>'"><?php echo ($vo["name"]); ?></div>
					<!-- <?php if($vo["name"] == '影视类'): ?><div class="txt radius-small <?php echo ($vo["class"]); ?> menu-left-right-item" style="width:56px;line-height:24px;" onclick="window.location.href='<?php echo ($vo["golist_url"]); ?>'"><?php echo ($vo["name"]); ?></div><?php endif; ?> --><?php endforeach; endif; else: echo "" ;endif; ?>
				<style>
				.menu-left-right-item {
				    height: 125px;
				    padding: 2px 20px 2px 15px;
				    text-align: center;
					margin-left:10px;
					word-wrap:break-word;word-break:nomal;
					float:left;
					line-height:22px;
				}
				</style>
			</div>
		</div>
		
		
    </div>
</div>
<div class="main main_pro">
	<div class="detail">
		<p align="center"><img src="<?php echo ($info["image"]); ?>" style="width:90%" class="img-responsive"/></p>					
	</div>
	<?php if($info['source_vedio'] != ''): ?><embed width="100%" height="380" allowfullscreen="true" allowscriptaccess="never" menu="false" loop="false" play="true" wmode="transparent" src="<?php echo ($info['source_vedio']); ?>" pluginspage="http://www.macromedia.com/go/getflashplayer" class="edui-faked-video" type="application/x-shockwave-flash"><?php endif; ?>
	<div class="pro_tab center">
		<div class="button-group border-main" style="width:100%">
  			<button type="button" class="button active" id="first" style="width:33.3%">产品说明书</button>
  			<button type="button" class="button" id="second" style="width:33.3%">投资回报</button>
			<button type="button" class="button" id="thread" style="width:33.3%">募集进展</button>
		</div>
		
		<div class="detail content" id="content" style="margin-top:30px;">
			<?php echo (htmlspecialchars_decode($info["description"])); ?>

		</div>
		<div class="detail vedio hidden" id="vedio">
			<?php echo (htmlspecialchars_decode($info["shouyi"])); ?>
		</div>
		<div class="detail budget hidden" style="padding-bottom:50px;" id="budget">
			<?php if($info['focus'] == 1): ?><button class="button icon-heart bg-gray button-big" style="margin-top:20px; width:70%" onclick="dofoucs(<?php echo ($info["id"]); ?>)" id="foucs1"> 取消关注（<?php echo ($info["focus_count"]); ?>）</button>
			<?php else: ?>
				<button class="button icon-heart bg-dot button-big" style="margin-top:20px; width:70%" onclick="dofoucs(<?php echo ($info["id"]); ?>)" id="foucs1"> 关注（<?php echo ($info["focus_count"]); ?>）</button><?php endif; ?>
			
			<div class="sapce xs3" style="margin-top:20px; width:95%">
				<div class="panel">
					<div class="panel-body">
						<p style="text-align:right">
							<?php if($info['isclose'] == 0): ?><span class="tag bg-dot">众筹中</span>
							<?php else: ?>
								<span class="tag bg-gray">已结束</span><?php endif; ?>
						</p>
						<h4 style="text-align:left"><strong>已筹到</strong></h4>
						<h2 style="text-align:left; margin-top:20px;"><strong>￥<?php echo ($info["support_amount"]); ?></strong></h2>
						<h5 style="text-align:left"><?php echo ($info["tips"]); ?></h5>
						<div class="progress progress-small inv_progress" style="margin-top:20px;">
  							<div class="progress-bar bg-blue" style="width:<?php echo ($info["jindu2"]); ?>%;"></div>
						</div>
						<h5 style="margin-top:20px; text-align:left;"><?php echo ($info["support_count"]); ?>名支持者</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="fouceURL" value="<?php echo U('Deal/dofoucs');?>" />
<input type="hidden" id="carURL" value="<?php echo U('Car/incar');?>" />
<input type="hidden" id="loginURL" value="<?php echo U('User/login');?>" />

<div class="at_bottom">
	<!-- <button class="button bg" ata-toggle="click" data-target="#mydialog" data-mask="1" data-width="50%">立即认购</button> -->
	<?php if($info['focus'] == 1): ?><button class="button bg" onclick="dofoucs(<?php echo ($info["id"]); ?>)" id="foucs2">取消关注</button>
	<?php else: ?>
		<button class="button bg" onclick="dofoucs(<?php echo ($info["id"]); ?>)" id="foucs2">关注</button><?php endif; ?>
	
	<button class="button bg" onclick="incar(<?php echo ($info["id"]); ?>)" id="incar" >加购物车</button>
	<button class="button bg dialogs" data-toggle="click" data-target="#mydialog" data-mask="1" data-width="70%">立即认购</button>

<div id="mydialog">
  <div class="dialog">
  	<form action="<?php echo U('Trade/buy');?>" method="post">
    <div class="dialog-body">
     	<strong>购买份数：</strong><br/><input type="text" name="deal_num" class="input" style="width:60px; margin-top:20px; display:inline-block" value="1" /></button>
    </div>
    <input type="submit" value="提交" style="display:none" id="sub_buy"/>
    <input type="hidden" value="<?php echo ($info["id"]); ?>" name="deal_id"/>
    <input type="hidden" value="<?php echo ($info["price"]); ?>" name="price"/>
    <div class="dialog-foot">
      <button class="button dialog-close">取消</button>
      <a class="button bg-green" href="#" onclick="$('#sub_buy').click()">确认</a>
    </div>
    </form>
  </div>
</div>
</div>


</body>
</html>
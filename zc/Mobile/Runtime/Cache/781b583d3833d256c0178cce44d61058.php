<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=1.0; " />
<title>首页</title>
<link rel="stylesheet" href="__CSS__/pintuer.css" />
<link rel="stylesheet" href="__CSS__/wlmjy.css" />
<link rel="stylesheet" type="text/css" href="__CSS__/component.css" />
<script type="text/javascript" src="__JS__/jquery-1.7.min.js"></script>
<script type="text/javascript" src="__JS__/pintuer.js"></script>
<script type="text/javascript" src="__JS__/wlmjy.js"></script>
<script src="__JS__/modernizr.custom.js"></script>
<script type="text/javascript" src="__JS__/idangerous.swiper-2.0.min.js"></script>
<script type="text/javascript" src="__JS__/ichart.1.2.js"></script> 
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
		onSlideClick: function(){
			contentSwiper.swipeTo( navSwiper.clickedSlideIndex )
		}
	})

	
})

$(function(){
	var width = $('#leftmunt_item').width();
	var height = width;
	$(".leftmunt_item_h").height(height);
	$(".leftmunt_item_h").css('line-height',5);
});

</script>
</head>

<body class="cbp-spmenu-push" style="background: linear-gradient(to bottom, #ece4d9 0%,#e9dfd1 100%);">

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
		
	}
	
	function showTopMenu(){
		if(show_left%2 == 0){
			var menuTop = document.getElementById('menu_top');
			classie.toggle( menuTop, 'cbp-spmenu-open' );
			show_top ++;
		}
	}
</script>
	<div class="milky">暂无信息</div>
</body>
</html>
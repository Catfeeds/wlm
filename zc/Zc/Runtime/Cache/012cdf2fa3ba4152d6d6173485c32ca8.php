<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0043)http://zhong.ronmei.com/index.php?ctl=deals -->
<html>
<!-- head开始 -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title><?php echo ($news["title"]); ?></title>
<!-- 关键字部分 -->
<meta name="keywords" content="">
<!-- 网页描述部分 -->
<meta name="description" content="">
<!-- CSS样式部分 -->
<link rel="stylesheet" href="__PUBLIC__/css/pintuer.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/index.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/base.css"/>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/css.css"/>

<link media="screen" rel="stylesheet" href="__PUBLIC__/css/demo.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/nav.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/14c4c0d24fba6ed25d8b6758064ef7b8.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/4f524199e137c62e16dddd92b3d1cb95.css">
<!-- 引用js部分 -->
<script type="text/javascript" src="__PUBLIC__/js/dc.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/ag.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/index.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/42d9a46911d50cafdc667075f2cff7ec.js"></script>
<script src="__PUBLIC__/js/ncfpb.1.1.min.js"></script>
<script src="__PUBLIC__/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="__PUBLIC__/js/2cc0475e1160ea574d0a9b5ebea60136.js"></script>

<script type="text/javascript">
jQuery(document).ready(function(){
	var qcloud={};
	$('[_t_nav]').hover(function(){
		var _nav = $(this).attr('_t_nav');
		clearTimeout( qcloud[ _nav + '_timer' ] );
		qcloud[ _nav + '_timer' ] = setTimeout(function(){
		$('[_t_nav]').each(function(){
		$(this)[ _nav == $(this).attr('_t_nav') ? 'addClass':'removeClass' ]('nav-up-selected');
		});
		$('#'+_nav).stop(true,true).slideDown(200);
		}, 150);
	},function(){
		var _nav = $(this).attr('_t_nav');
		clearTimeout( qcloud[ _nav + '_timer' ] );
		qcloud[ _nav + '_timer' ] = setTimeout(function(){
		$('[_t_nav]').removeClass('nav-up-selected');
		$('#'+_nav).stop(true,true).slideUp(200);
		}, 150);
	});
});
</script>
</head>
<!-- head结束 -->

<!-- body体 -->
<body>


<div class="container-layout padding-top padding-bottoms fixed">
    
      <div class="line">
        <div class="xl12 xs3 xm3 xb2">
			<button class="button icon-navicon float-right" data-target="#header-demo"></button>
			<img onclick="window.location.href='http://www.weilaimen.org'" src="__PUBLIC__/images/wlm_logo.png" style=" margin-left:30px;" />
		</div>
        <div class=" xl12 xs9 xm9 xb10 nav-navicon" id="header-demo">
    
          <div class="xs8 xm6 xb5 padding-small" style="margin-top:23px;">
            <ul class="nav nav-menu nav-inline nav-big" id="menu">
            	<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['next'] == ''): ?><li>
            				<?php if($vo['url'] != '/zc/index.php?'): ?><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></a>
            				<?php else: ?>
            					<a href="#" onclick="$('#baidu_submit').click()"><?php echo ($vo["name"]); ?></a><?php endif; ?>
            			</li>
            		<?php else: ?>
            			<li>
            				<a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?><span class="arrow"></span></a>
            				<ul class="drop-menu">
            					<?php if(is_array($vo['next'])): $i = 0; $__LIST__ = $vo['next'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nvo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($nvo["url"]); ?>"><?php echo ($nvo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            				</ul>
            			</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </div>
          <div class="xs4 xm3 xb4" style="margin-top:23px;">
            <form>
              <div class="input-group padding-little-top">
                <input type="text" class="input border-main" id="keywords" name="keywords" size="30" placeholder="关键词" />
                <span class="addbtn">
					<button type="button" class="button bg-main" onclick="search()" style="height:35px; ">搜！</button>
				</span>
              </div>
            </form>
          </div>
          <div class="navbar-text navbar-right hidden-s header_msg" style="padding-top:8px; margin-top:23px; margin-right:20px">
		  <?php if($_SESSION['uid'] == ''): ?><a href="<?php echo U('User/login');?>">登录</a>
		  	<font>|</font>
		  	<a href="<?php echo U('User/register');?>">注册</a>
		  <?php else: ?>
		  	<img style="height:30px; width:30px" src="<?php echo C('IMG_URL');?>/public/avatar/000/00/00/<?php echo ($_SESSION['id']); ?>virtual_avatar_middle.jpg"/>
		  	<a href="<?php echo U('User/center');?>"><?php echo ($_SESSION['uname']); ?></a>
		  	|<a href="<?php echo U('User/out');?>">退出</a><?php endif; ?>
		  
		  </div>
  </div>
    
        </div>
<div style="display:none">
<form action="http://www.baidu.com/baidu" target="_blank">
<table bgcolor="#FFFFFF"><tr><td>
<input name=tn type=hidden value=baidu>
<input type="text" name="word" id="baidu_word" value="<?php echo ($keyword); ?>" size=30>
<input type="submit" id="baidu_submit" value="百度搜索">
</td></tr></table>
</form>
</div>
</div>



			<!--导航栏结束-->
			
	<!-- 头部结束 -->
	<div class="blank"></div>
	
<div class="wrap" style="margin-top:120px;">
	<div style="border:1px solid #ccc;">
		<div style="font-size:20px;padding:20px; border-bottom:2px solid green;text-align:center;">
     	<?php echo ($news["title"]); ?>
    	</div>
    	<div style="padding:20px;border:1px solid #f1f1f1;text-align:center;">
    	作者：<?php echo ($news["author"]); ?> 关键字：<?php echo ($news["keywords"]); ?> 时间：<?php echo (date("Y-m-d",$news["addtime"])); ?>
    	<div style="padding:10px;border:1px solid #f1f1f1;background:1px solid #f0f0f0;margin-top:10px;"><?php echo ($news["intro"]); ?></div>
    	</div>
    	<div style="padding:20px;border:1px solid #f1f1f1;">
		<?php echo ($news["content"]); ?>
		</div>
		<div>
		<div style="padding:20px;">		
		<?php echo nextPage($news[id]);?>
		</div>
		</div>
	</div>
</div>

<div class="container-layout bg-gray bg-inverse padding-big-top padding-big-bottom">

  <div class="table-responsive padding hidden-l">
    <ul class="nav nav-sitemap">
      <li><a href="#">新闻资讯</a>
        <ul>
          <li><a href="#">新闻公告</a></li>
          <li><a href="#">业界资讯</a></li>
          <li><a href="#">媒体报道</a></li>
        </ul>
      </li>
      <li><a href="#">产品中心</a>
        <ul>
          <li><a href="#">产品分类</a></li>
          <li><a href="#">产品品牌</a></li>
          <li><a href="#">产品特色</a></li>
        </ul>
      </li>
      <li><a href="#">技术反馈</a>
        <ul>
          <li><a href="#">售后服务</a></li>
          <li><a href="#">营销网络</a></li>
          <li><a href="#">服务支持</a></li>
        </ul>
      </li>
      <li><a href="#">留言反馈</a></li>
      <li><a href="#">联系方式</a></li>
    </ul>
  </div>

  <div class="text-center">版权所有 © Pintuer.com All Rights Reserved，图ICP备：380959609</div>

</div>

</body></html>
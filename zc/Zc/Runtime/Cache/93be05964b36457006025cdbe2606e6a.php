<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0042)http://zhong.ronmei.com/index.php?ctl=news -->
<html>
<!-- head开始 -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title><?php echo getConf('SEO_TITLE');?>-最新动态</title>
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
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/14c4c0d24fba6ed25d8b6758064ef7b8.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/4f524199e137c62e16dddd92b3d1cb95.css">
<!-- 引用js部分 -->
<script type="text/javascript" async="" src="__PUBLIC__/js/dc.js"></script>
<script type="text/javascript" async="" src="__PUBLIC__/js/ag.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/index.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/42d9a46911d50cafdc667075f2cff7ec.js"></script>
<script async="" src="__PUBLIC__/js/ncfpb.1.1.min.js"></script>
<script src="__PUBLIC__/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="__PUBLIC__/js/2cc0475e1160ea574d0a9b5ebea60136.js"></script>
<script type="text/javascript">
var APP_ROOT = '';
var LOADER_IMG = 'http://zhong.ronmei.com/app/Tpl/codec2i/images/lazy_loading.gif';
var ERROR_IMG = 'http://zhong.ronmei.com/app/Tpl/codec2i/images/image_err.gif';
var isbaidu = 1;
</script>

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
<body style="background-color:#f3f3f3">
<!-- 头部分开始 -->
    <div class="header">
        <div class="wrap clearfix">     
            <!--导航栏开始-->   
	
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
			
        </div>
        <input type="hidden" value="64624432" id="csrf_token">      
    </div> 
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/cc14c3f1663e95c143d3eed8054140d9.css">
<script type="text/javascript" src="__PUBLIC__/js/5c6d70cfb04069730272d1755f9003ba.js"></script>


<div class="blank"></div>
<div class="news_d" style="margin-top:120px;">
	<div class="page_title">
		最新动态		</div>
<div class="blank"></div>
<style>
.news_d{width:960px;height:auto;margin:0 auto 0 auto;overflow:hidden;}
.news_d .news_list_ul{width:100%;height:auto;float:left;margin-top:10px;}
.news_d .news_list_ul li{width:100%;height:230px;}
.news_d .news_list_ul li .pic{width:180px;height:230px;float:left;}
.news_d .news_list_ul li .pic img{float:left;}
.news_d .news_list_ul li .pic span{display:block;float:left;margin-top:10px;margin-left:10px;}
.news_d .news_list_ul li .title_r{float:left;margin-left:25px;width:720px;height:230px;}
.au_info{width:100%;height:25px;line-height:25px;float:left;}
.l_info{width:100%;height:140px;float:left;overflow:hidden;margin-top:10px;font-size:14px;}
.news_pages{text-align:center;}
</style>		
<ul class="news_list_ul"> 
	<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li>
	<div class="pic">
	<a href="<?php echo U('News/html',array('id'=>$vo['id']));?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img  alt="<?php echo ($vo["title"]); ?>" src="<?php echo ($vo["image"]); ?>"></a>
	</div>
	<div class="title_r">
	<a href="<?php echo U('News/html',array('id'=>$vo['id']));?>" class="news_update_title"><?php echo ($vo["title"]); ?></a>
	<div class="blank"></div>	
	<div class="au_info">	
	作者：<a class="linkgreen" href="javascript:;" style="font-size:14px;"><?php echo ($vo["author"]); ?></a>
	标签：<a class="linkgreen" href="javascript:;" style="font-size:14px;"><?php echo ($vo["keywords"]); ?></a>
	<div class="passdate" style="margin-left:20px">点击量：<?php echo ($vo["hits"]); ?></div>
	<div class="passdate"><?php echo (date("Y-m-d",$vo["addtime"])); ?></div>
	</div>
	<div class="l_info">
		<?php echo ($vo["intro"]); ?>
		<div class="blank"></div>
	</div>
	</div>
	</li><?php endforeach; endif; ?>
</ul>
<div class="news_pages"><?php echo ($page); ?></div>
</div>
<div class="blank"></div>

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
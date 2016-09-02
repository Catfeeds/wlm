<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0024)http://z.jd.com/new.html -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content=""/>
    <meta name="Keywords" content=""/>
    <title>未来门精英-登录</title>
	<link rel="stylesheet" href="__PUBLIC__/css/style.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/pintuer.css"/>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/css.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/style4.css" />
	<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/pintuer.js"></script>
	
</head>
<body style="background-image: url('__PUBLIC__/images/hero-bg.jpg'); ">
<!--header-->

<style>
.user-right {
    border-left: 3px solid #ddd;
    border-top: 0 none;
    margin-top: 0;
    padding: 120px 0;
}
.user-right {
    
    margin-top: 50px;
    padding: 50px 0;
}
</style>


	<!-- header start -->
     <!--导航-->
    
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

 

    <!--header end-->
   
<!-- start -->

		<div class="app-cam" style="height:400px;margin-top:120px;margin-bottom:20px;">
			<div style="margin:0 0 0 10em;"><img src="__PUBLIC__/images/wlm_logo.png" class="img-responsive" alt="" style="height:90px;"></div>
			<form method="post" action="<?php echo U('User/do_login');?>">
				<input type="text" name="user_name" class="text" style="border:2px #f3f3f3 solid;width:100%;" value="请输入您的帐号" onfocus="this.value = &#39;&#39;;" onblur="if (this.value == &#39;&#39;) {this.value = &#39;您的帐号&#39;;}"/>
				<input type="password" name="user_pwd" style="border:2px #f3f3f3 solid;width:100%;" value="请输入您的密码" onfocus="this.value = &#39;&#39;;" onblur="if (this.value == &#39;&#39;) {this.value = &#39;您的密码&#39;;}"/>
				<input type="submit" id="sub" value="登陆" style="display:none" />
				<!-- 新按钮start -->
				<div style="margin:10px 0 10px  130px;">
				<a href="#" onclick="$('#sub').click()" class="a-btn">
						<span class="a-btn-text">快来登录</span> 
						<span class="a-btn-slide-text">嗨起来!</span>
						<span class="a-btn-icon-right"><span></span></span>
				</a>
				</div>
				<!-- 新按钮end -->
				<!-- 新按钮start -->
				<div style="margin:10px 0 50px  130px;">
				<a href="<?php echo U('User/register');?>" class="a-btn">
						<span class="a-btn-text">快来加入</span> 
						<span class="a-btn-slide-text">动起来!</span>
						<span class="a-btn-icon-right"><span></span></span>
				</a>
				</div>
				<!-- 新按钮end -->
				<br/>
				<br/>
			</form>
		</div>
<!-- end -->


<!-- 页尾信息start -->

<!--footer-->
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
<!--footer end-->
<!-- 页尾信息end -->


</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0024)http://z.jd.com/new.html -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="Keywords" content="">
    <title>未来门精英-注册</title>
        
</head>
<body style="background-color:#f3f3f3">
<!--header-->
<!-- <link rel="stylesheet" type="text/css" href="./css/style_12_common.css"> -->

	<link rel="stylesheet" href="__PUBLIC__/css/pintuer.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/index.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/base.css"/>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/css.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/style4.css" />
	
	<script src="__PUBLIC__/umeditor/third-party/jquery.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/pintuer.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/register.js"></script>
	<script type="text/javascript" src="__PUBLIC__/layer/layer.js"></script>

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
<div class="container" id="container" style="background-color:#fff;height:500px;margin-top:120px">

	<div class="line">
		<div class="x5 x1-move">
		</div>
	</div>
	<br><br>
	
	<!-- 左侧部分start -->
	<div class="space xs5 xs1-move">
		<h3 class="padding-bottom border-bottom icon-caret-right"> 会员登录</h3>
		<br>
		<div id="notes"></div>
		<br>
		<form class="form-x" id="register">
			<input type="hidden" value="<?php echo U('User/insert');?>" id="insURL"/>
			<input type="hidden" value="<?php echo U('Index/index');?>" id="indexURL"/>
              <div class="form-group">
                <div class="label"><label for="username">手机号码</label></div>
                <div class="field">
                  <input class="input" id="user_name" name="user_name" onblur="sendCode()" size="30" placeholder="您的手机号码" data-validate="required:手机号不可为空" type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="label"><label for="code">验证码</label></div>
                <div class="field">
                  <input class="input" id="code" name="code" size="30" placeholder="您收到的验证码" data-validate="required:验证码不可为空" type="text">
                  <button class="button margin-top" id="button_code" onclick="sendCode()" >重新获取验证码</button>
                </div>
              </div>
              <div class="form-group">
                <div class="label"><label for="password">登陆密码</label></div>
                <div class="field">
                  <input class="input" id="user_pwd" name="user_pwd" size="30" placeholder="请输入密码" data-validate="required:密码不能为空" type="password">
                </div>
              </div>
              <div class="form-group">
                <div class="label"><label for="password">重复密码</label></div>
                <div class="field">
                  <input class="input" id="user_repwd" name="user_repwd" size="30" placeholder="请重复密码" data-validate="repeat#user_pwd:两次密码输入不一致" type="password">
                </div>
              </div>
            
			  <!-- 按钮start -->
			 <div style="margin:10px 0 50px  130px;">
				<a href="#" onclick="register()" class="a-btn">
						<span class="a-btn-text">赶快注册</span> 
						<span class="a-btn-slide-text">点起来!</span>
						<span class="a-btn-icon-right"><span></span></span>
				</a>
			 </div>
			  <!-- 按钮end -->
            </form>
	</div>
		<!-- 左侧部分end -->
		
		<!-- 右侧部分start -->
		 <div class="space xs5 xs1-move text-center user-right">
          <h3>已是会员</h3>
            <br>
            <a href="<?php echo U('User/login');?>" class="text-main">点这里登录</a>，登录网站会员，享会员服务。
            <br><br><br>
            <h3>未收到注册确认邮件?</h3>
            <br>
            <a class="text-main" href="<?php echo U('User/register');?>">点击这里</a> 重发送邮件或修改确认邮箱
            <br>
        </div>
		<!-- 右侧部分end -->
		<input type="hidden" value="<?php echo U('User/sendCode');?>" id="codeURL" />
			<input type="hidden" value="<?php echo U('User/insert');?>" id="insURL" />
			<input type="hidden" value="<?php echo U('Index/index');?>" id="indexURL" />

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
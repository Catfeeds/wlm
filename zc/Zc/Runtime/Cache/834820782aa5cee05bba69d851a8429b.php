<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0024)http://z.jd.com/new.html -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="Keywords" content="">
    <title>未来门精英-个人中心</title>
        
</head>
<body style="background-color:#f3f3f3">
<!--header-->
<!-- <link rel="stylesheet" type="text/css" href="./css/style_12_common.css"> -->
<link rel="stylesheet" href="__PUBLIC__/css/pintuer.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/css.css"/>
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/pintuer.js"></script>
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
<div class="container margin-big-top margin-big-bottom" style=" background-color:#f3f3f3;margin-top:120px">
<div class="margin border padding-big" style="background-color:#FFFFFF; height:200px">
	<div class="float-left" style="width:20%">
		<img src="images/user-unlogin-icon.png" width="128" height="128" class="img-border radius-small" />
	</div>
	<div class="float-left margin-big-left" style="width:70%">
		<div style="width:100%" style="display:block;">
			<?php echo ($info["user_name"]); ?>
		</div>
		<div class="margin-top padding-big" style="width:100%;display:block; background-color:#f3f3f3; height:90px">
				<div class="float-left margin-left border-small border-right" style="width:30%">
					<h4><strong>0</strong></h4>
					<p>关注</p>
				</div>
				<div class="float-left margin-left border-small border-right" style="width:30%">
					<h4><strong>0</strong></h4>
					<p>支持</p>
				</div>
				<div class="float-left margin-left" style="width:30%">
					<h4><strong>0</strong></h4>
					<p>购物车</p>
				</div>
		</div>
		<div style="width:100%">
			<button class="button border-yellow float-right margin-top">编辑个人信息</button>
		</div>
	</div>
	<div style="width:20%; height:500px; margin-top:50px; background-color:#FFFFFF" class="float-left border padding">
		<div class="padding" style="width:100%; background-color:#C42706; color:#FFFFFF"><span style="margin:0 auto">个人设置</span></div>
		<div class="button-group-y" style="width:100%">
			<button type="button" class="button" >个人资料</button>
  			<button type="button" class="button" >修改密码</button>
		</div>
		<div class="padding" style="width:100%; background-color:#C42706; color:#FFFFFF"><span style="margin:0 auto">项目相关</span></div>
		<div class="button-group-y" style="width:100%">
			<button type="button" class="button" >我的项目</button>
  			<button type="button" class="button" >我的关注</button>
			<button type="button" class="button" >购物车</button>
		</div>
	</div>
	<div style="width:70%;background-color:#FFFFFF;margin-top:50px;" class="float-right border padding-big margin-big-left">
		<form method="post" class="form-x" action="<?php echo U('User/updateInfo');?>" name="userInfo">
			<div class="form-group">
				<div class="label">
					<label for="user_name">账号</label>
				</div>
				<div class="field">
					<input id="user_name"  class="input" type="text" disabled="disabled" value="<?php echo ($info["user_name"]); ?>"/>
					<div class="input-note">&nbsp;</div>
				</div>
				<div class="label">
					<label for="email">邮箱</label>
				</div>
				<div class="field">
					<input id="email"  class="input" type="text" disabled="disabled" value="<?php echo ($info["email"]); ?>"/>
					<div class="input-note">&nbsp;</div>
				</div>
				<div class="label">
					<label for="email">手机</label>
				</div>
				<div class="field">
					<input id="email"  class="input" type="text" value="<?php echo ($info["user_name"]); ?>"/>
					<div class="input-note">&nbsp;</div>
				</div>
				<div class="label">
					<label for="email">所属地区</label>
				</div>
				<div class="field">
					<input id="city" name="city" class="input" type="text" value="<?php echo ($info["city"]); ?>"/>
					<div class="input-note">&nbsp;</div>
				</div>
				<div class="label">
					<label for="email">性别</label>
				</div>
				<div class="field" style="margin:5px 0 0 0;"> 
					<!-- <input id="email"  class="input" type="text" /> -->
					<select name="sex">
            				<option value="2" <?php if($info["sex"] == '2'): ?>selected<?php endif; ?>>未知</option>
            				<option value="1" <?php if($info["sex"] == '1'): ?>selected<?php endif; ?>>男</option>
            				<option value="0" <?php if($info["sex"] == '0'): ?>selected<?php endif; ?>>女</option>
            		</select>
					<div class="input-note">&nbsp;</div>
				</div>
				<div class="label">
					<label for="email">简介</label>
				</div>
				<div class="field">
					<textarea id="intro" name="intro" class="input" type="text" ><?php echo ($info["intro"]); ?></textarea>
					<div class="input-note">&nbsp;</div>
				</div>
				<div class="label">
					<label for="email">真实姓名</label>
				</div>
				<div class="field">
					<input id="truename" name="truename" class="input" type="text" value="<?php echo ($info["ex_real_name"]); ?>"/>
					<div class="input-note">&nbsp;</div>
				</div>
				<!-- <button class="button bg float-right" onclick="submitYouFrom(<?php echo U('User/updateInfo');?>)">提交</button> -->
				<input class="button bg float-right" type="submit" value="提交" />
				<!-- <input type="hidden" value="<?php echo U('Deal/dofoucs');?>"  id="foucs"/> -->
			</div>
 
		</form>
		<script type="text/javascript" language="javascript">
		function submitYouFrom(path){ 
			$('form1').action=path; 
			$('form1').submit();
		}</script>
		
	</div>
</div>
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
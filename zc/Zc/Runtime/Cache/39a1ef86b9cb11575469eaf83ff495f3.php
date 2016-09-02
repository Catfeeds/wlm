<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0024)http://z.jd.com/new.html -->
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="Keywords" content="" />
    <title>未来门精英-introduce</title>
    <link rel="stylesheet" href="__PUBLIC__/css/pintuer.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/index.css"/>
	<link rel="stylesheet" href="__PUBLIC__/css/base.css"/>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/css.css"/>
	<!-- 引用jquery -->
	<script src="__PUBLIC__/umeditor/third-party/jquery.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/pintuer.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
	<!-- 样式文件 -->
	<link rel="stylesheet" href="__PUBLIC__/umeditor/themes/default/css/umeditor.css"/>
	
	<!-- 配置文件 -->
	<script type="text/javascript" src="__PUBLIC__/umeditor/umeditor.config.js"></script>
	<!-- 编辑器源码文件 -->
	<script type="text/javascript" src="__PUBLIC__/umeditor/umeditor.min.js"></script>
	<!-- 语言包文件 -->
	<script type="text/javascript" src="__PUBLIC__/umeditor/lang/zh-cn/zh-cn.js"></script>
	<!-- 实例化编辑器代码 -->
	<script type="text/javascript">
		 //var um = UM.getEditor('myEditor');
		$(function(){
			window.um = UM.getEditor('myEditor', {
				/* 传入配置参数,可配参数列表看umeditor.config.js */
				toolbar: ['source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
            'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
            '| justifyleft justifycenter justifyright justifyjustify |',
            'link unlink | emotion image video  | map',
            '| horizontal print preview fullscreen', 'drafts', 'formula']
			});
		});
	</script>

	
	
	<style>
	.share {
    clear: none;
    float: left;
	margin-top:10px;
	text-align:center;
	}
	</style>
</head>
<body style="background-color:#f3f3f3">
<!--header-->

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
	
	
   <!-- 主体部分start -->
   <div class="container" style="background-color:#fff;padding-top:20px;padding-bottom:20px; margin-top:120px">
   
   
	<form>
   <!-- introduce页面-->
		<div class="float-left" style="width:100%;margin:60px 0 100px 0;text-align:center;">
		
		<div class="step">
			<div class="step-bar active" style="width:25%;"><span class="step-point icon-check"></span><span class="step-text">第一步</span></span></div>
			<div class="step-bar complete" style="width:25%;"><span class="step-point">2</span><span class="step-text">第二步</span></div>
			<div class="step-bar complete" style="width:25%;"><span class="step-point">3</span><span class="step-text">第三步</span></div>
			<div class="step-bar complete" style="width:25%;"><span class="step-point">4</span><span class="step-text">第四步</span></div>
		</div>
		
			<div style="text-align:left; margin-top:50px">
				<button class="button bg-main button-big button-block">发起项目</button>
			</div>
			
			<div style="text-align:left;margin-top:50px;">
				<font class="bg-main" style="font-size:14px;font-weight:bold;color:#000;background-color:#fff;margin-left:30px;">项目分类：</font>
				<div class="form-group" style="margin-left:50px;">
					<div class="field">
						<div class="button-group radio">
							<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label class="button">
								<input type="radio" data-validate="radio:请选择" value="<?php echo ($vo["id"]); ?>" name="cate_id" /><?php echo ($vo["name"]); ?>
							</label><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
				
			</div>
			
			
			<div style="text-align:left;margin:15px 0 0 50px;">
				<font style="font-size:14px;font-weight:bold;">项目名称:</font>
				<input type="text" class="input" placeholder="文本框" /><!-- 对应css中287行 -->
			</div>
			
			<div style="text-align:left;margin:15px 0 0 50px;">
				<font style="font-size:14px;font-weight:bold;">项目说明:</font>
				<input type="text" class="input" placeholder="文本框" /><!-- 对应css中287行 -->
			</div>
			
			<div style="text-align:left;margin:15px 0 0 50px;">
				<font style="font-size:14px;font-weight:bold;">筹资金额:</font>
				<input type="text" class="input" style="width:49%;" placeholder="文本框" />元<!-- 对应css中287行 -->
			</div>
			
			<div style="text-align:left;margin:15px 0 0 50px;">
				<font style="font-size:14px;font-weight:bold;">筹资上限:</font>
				<input type="text" class="input" style="width:49%;" placeholder="文本框" />%<!-- 对应css中287行 -->
			</div>
			
			<div style="text-align:left;margin:15px 0 0 50px;">
				<font style="font-size:14px;font-weight:bold;">筹资天数:</font>
				<input type="text" class="input" style="width:49%;" placeholder="文本框" />天<!-- 对应css中287行 -->
			</div>
			
			<div style="text-align:left;margin:15px 0 0 50px;">
				<font style="font-size:12px;font-weight:bold;">首屏图片:</font>
				<!-- 对应css中1068行 -->
				<button class="button bg-dot" style="height:30px;line-height:10px;">上传首屏图片</button><font style="font-size:12px;margin-left:10px;color:#666666;">拼图，是国内一款开源的专业响应式网页前端框架。</font>
			</div>
			<div style="text-align:left;margin:15px 0 0 110px;">
				<div class="media">
					<a href="#">
					<img src="./images/sl226_170.png" class="radius" alt="...">
					</a>
				</div>
			</div>
			
			<!-- <div style="text-align:left;margin:15px 0 0 50px;">
				<font style="font-size:12px;font-weight:bold;">预热图片:</font>
				<!-- 对应css中1068行 --
				<button class="button bg-dot" style="height:30px;line-height:10px;">上传预热图片</button><font style="font-size:12px;margin-left:10px;color:#666666;">拼图，是国内一款开源的专业响应式网页前端框架。</font>
			</div>
			<div style="text-align:left;margin:15px 0 0 110px;">
				<div class="media">
					<a href="#">
					<img src="./images/sl226_170.png" class="radius" alt="...">
					</a>
				</div>
			</div> -->
			
			<!-- <div style="text-align:left;margin:15px 0 0 50px;">
				<font style="font-size:12px;font-weight:bold;">项目图片:</font>
				<!-- 对应css中1068行 --
				<button class="button bg-dot" style="height:30px;line-height:10px;">上传项目图片</button><font style="font-size:12px;margin-left:10px;color:#666666;">拼图，是国内一款开源的专业响应式网页前端框架。</font>
			</div>
			<div style="text-align:left;margin:15px 0 0 110px;">
				<div class="media">
					<a href="#">
					<img src="./images/sl495_170.png" class="radius" alt="...">
					</a>
				</div>
			</div> -->
			
			<!-- <div style="text-align:left;margin:15px 0 0 50px;">
				<font style="font-size:12px;font-weight:bold;">移动端图片:</font>
				<!-- 对应css中1068行 --
				<button class="button bg-dot" style="height:30px;line-height:10px;">上传移动端图片</button><font style="font-size:12px;margin-left:10px;color:#666666;">拼图，是国内一款开源的专业响应式网页前端框架。</font>
			</div>
			<div style="text-align:left;margin:15px 0 0 110px;">
				<div class="media">
					<a href="#">
					<img src="./images/sl495_170.png" class="radius" alt="...">
					</a>
				</div>
			</div> -->
			
			<div style="text-align:left;margin:15px 0 0 50px;">
				<font style="font-size:12px;font-weight:bold;">视频介绍:</font>
				<input type="text" class="input" placeholder="请输入乐视视频播放的地址" /><!-- 对应css中287行 -->
			</div>
			
			<div style="text-align:left;margin:15px 0 0 50px;">
				<font style="font-size:12px;font-weight:bold;">项目简介:</font>
				<textarea rows="5" class="input" placeholder="多行文本框"></textarea>
				<br>
				<!-- <font style="font-size:12px;font-weight:bold;">项目简介是会显示在未来门众筹首页的~</font> --><!-- 对应css中287行 -->
			</div>
			
			<div style="text-align:left;margin:15px 0 0 50px;">
				<font style="font-size:12px;font-weight:bold;">项目详情:</font>
				<!-- 加载编辑器的容器 -->
				<!--style给定宽度可以影响编辑器的最终宽度-->
				<script type="text/plain" id="myEditor" style="width:1000px;height:240px;">
				<p>这里我可以写一些输入提示</p>
				</script>
			</div>
			
			
		</div>
   		</form>
   </div>
   <!-- 主体部分end -->


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